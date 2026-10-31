<?php

use Carbon\CarbonImmutable;
use spkm\ClearPass\Query\Filter;
use spkm\ClearPass\Query\Operator;
use spkm\ClearPass\Query\Query;

enum ExampleState: string
{
    case Active = 'active';
}

it('writes each operator as ClearPass reads it', function (Operator|string $operator, mixed $value, mixed $expected) {
    expect(Filter::make()->where('f', $operator, $value)->toArray())->toBe(['f' => $expected]);
})->with([
    'equal' => ['=', 'x', 'x'],
    'equal word' => ['eq', 'x', 'x'],
    'enum operator' => [Operator::Equal, 5, 5],
    'not equal' => ['!=', 'x', ['$ne' => 'x']],
    'not equal <>' => ['<>', 'x', ['$ne' => 'x']],
    'greater' => ['>', 2, ['$gt' => 2]],
    'greater or equal' => ['>=', 2, ['$gte' => 2]],
    'less' => ['<', 2.5, ['$lt' => 2.5]],
    'less or equal' => ['<=', 2, ['$lte' => 2]],
    'in' => ['in', ['a', 'b'], ['$in' => ['a', 'b']]],
    'in from a collection' => ['$in', collect([1, 2]), ['$in' => [1, 2]]],
    'not in' => ['not in', ['a'], ['$nin' => ['a']]],
    'nin' => ['nin', ['a'], ['$nin' => ['a']]],
    'contains' => ['contains', 'ab', ['$contains' => 'ab']],
    'like' => ['like', 'ab', ['$contains' => 'ab']],
    'regex' => ['regex', '^a', ['$regex' => '^a']],
    'matches' => ['matches', '^a', ['$regex' => '^a']],
    'exists' => ['exists', true, ['$exists' => true]],
    'not exists' => ['$exists', false, ['$exists' => false]],
    'bool' => ['=', true, true],
    'enum value' => ['=', ExampleState::Active, 'active'],
]);

it('writes dates as ISO 8601, or as timestamps for a model that keeps them so', function () {
    $date = CarbonImmutable::parse('2026-01-01T00:00:00+00:00');

    expect(Filter::make()->where('t', '>', $date)->toArray())->toBe(['t' => ['$gt' => '2026-01-01T00:00:00+00:00']])
        ->and(Filter::make('U')->where('t', '>', $date)->toArray())->toBe(['t' => ['$gt' => 1767225600]])
        ->and(Filter::make('U')->where('t', 'in', [$date])->toArray())->toBe(['t' => ['$in' => [1767225600]]]);
});

it('puts conditions on different fields, and different operators on one field, in one object', function () {
    $filter = Filter::make()->where('a', '=', 1)->where('b', '>', 2)->where('b', '<', 5)->where('c', 'regex', 'x', 'i');

    expect($filter->toArray())->toBe(['a' => 1, 'b' => ['$gt' => 2, '$lt' => 5], 'c' => ['$regex' => 'x', '$options' => 'i']]);
});

it('ANDs explicitly when one object cannot hold the conditions', function () {
    expect(Filter::make()->where('a', '=', 1)->where('a', '=', 2)->toArray())->toBe(['$and' => [['a' => 1], ['a' => 2]]])
        ->and(Filter::make()->where('a', '>', 1)->where('a', '>', 2)->toArray())->toBe(['$and' => [['a' => ['$gt' => 1]], ['a' => ['$gt' => 2]]]])
        ->and(Filter::make()->where('a', '=', 1)->where('a', '>', 2)->toArray())->toBe(['$and' => [['a' => 1], ['a' => ['$gt' => 2]]]]);
});

it('nests or, and and not groups', function () {
    $filter = Filter::make()->where('a', '=', 1)->or(Filter::make()->where('b', '=', 2))->where('c', '=', 3)->not(Filter::make()->where('d', '=', 4));

    expect($filter->toArray())->toBe(['$or' => [['a' => 1], ['b' => 2]], 'c' => 3, '$not' => ['d' => 4]])
        ->and(Filter::make()->or(Filter::make()->where('a', '=', 1), Filter::make()->where('b', '=', 2))->toArray())->toBe(['$or' => [['a' => 1], ['b' => 2]]])
        ->and(Filter::make()->and(Filter::make()->where('a', '=', 1))->toArray())->toBe(['$and' => [['a' => 1]]])
        ->and(Filter::make()->or(Filter::make()->where('a', '=', 1))->or(Filter::make()->where('b', '=', 2))->toArray())->toBe(['$or' => [['$or' => [['a' => 1]]], ['b' => 2]]]);
});

it('is immutable and serialises to JSON', function () {
    $empty = Filter::make();
    $one = $empty->where('a', '=', 1);

    expect($empty->isEmpty())->toBeTrue()
        ->and($empty->toArray())->toBe([])
        ->and($empty->toJson())->toBe('{}')
        ->and($one->isEmpty())->toBeFalse()
        ->and($one->toJson())->toBe('{"a":1}')
        ->and((string) $one)->toBe('{"a":1}')
        ->and(json_encode($one))->toBe('{"a":1}')
        ->and(Filter::make()->where('url', '=', 'http://x/y')->toJson())->toBe('{"url":"http://x/y"}');
});

it('refuses what ClearPass could not read', function () {
    expect(fn () => Filter::make()->where('bad name', '=', 1))->toThrow(InvalidArgumentException::class, '"bad name" is not a ClearPass field name')
        ->and(fn () => Filter::make()->where('a', '~', 1))->toThrow(InvalidArgumentException::class, '"~" is not a ClearPass filter operator')
        ->and(fn () => Filter::make()->where('a', '=', null)->toArray())->toThrow(InvalidArgumentException::class, 'use whereNull()')
        ->and(fn () => Filter::make()->where('a', 'in', 'x')->toArray())->toThrow(InvalidArgumentException::class, 'needs a list of values')
        ->and(fn () => Filter::make()->where('a', 'in', [])->toArray())->toThrow(InvalidArgumentException::class, 'needs at least one value')
        ->and(fn () => Filter::make()->where('a', '=', new stdClass)->toArray())->toThrow(InvalidArgumentException::class, 'must be a string, number, bool, date or enum')
        ->and(Filter::make()->where('a.b-c:d', '=', 1)->toArray())->toBe(['a.b-c:d' => 1]);
});

it('compiles a query to ClearPass\'s parameters', function () {
    $query = Query::make()->where('a', '=', 1)->orderBy('name', 'desc')->offset(50)->limit(25)->calculateCount();

    expect($query->toArray())->toBe(['filter' => '{"a":1}', 'sort' => '-name', 'offset' => 50, 'limit' => 25, 'calculate_count' => 'true'])
        ->and((string) $query)->toBe('filter={"a":1}&sort=-name&offset=50&limit=25&calculate_count=true')
        ->and(Query::make()->toArray())->toBe([])
        ->and(Query::make()->orderBy('id')->toArray())->toBe(['sort' => '+id'])
        ->and($query->withoutPaging()->toArray())->toBe(['filter' => '{"a":1}', 'sort' => '-name', 'calculate_count' => 'true'])
        ->and($query->getLimit())->toBe(25)
        ->and($query->getOffset())->toBe(50)
        ->and($query->getSort())->toBe('-name')
        ->and($query->countsRecords())->toBeTrue()
        ->and(Query::make()->filter()->isEmpty())->toBeTrue()
        ->and($query->withFilter(Filter::make())->toArray())->not->toHaveKey('filter');
});

it('refuses paging ClearPass would not accept', function () {
    expect(fn () => Query::make()->limit(0))->toThrow(InvalidArgumentException::class, 'between 1 and 1000')
        ->and(fn () => Query::make()->limit(1001))->toThrow(InvalidArgumentException::class, 'between 1 and 1000')
        ->and(fn () => Query::make()->offset(-1))->toThrow(InvalidArgumentException::class, 'cannot be negative')
        ->and(fn () => Query::make()->orderBy('a', 'sideways'))->toThrow(InvalidArgumentException::class, 'Sort direction must be "asc" or "desc"');
});
