<?php

use Carbon\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use spkm\ClearPass\DTOs\GuestUser;
use spkm\ClearPass\Enums\GuestUserExpirationAction;
use spkm\ClearPass\Facades\ClearPass;
use spkm\ClearPass\Requests\ApiOperations\GetTokenInfoRequest;
use spkm\ClearPass\Requests\ApiOperations\GetTokenPrivilegesRequest;
use spkm\ClearPass\Requests\Identities\CreateGuestUserRequest;
use spkm\ClearPass\Requests\Identities\DeleteGuestUserByUsernameRequest;
use spkm\ClearPass\Requests\Identities\DeleteGuestUserRequest;
use spkm\ClearPass\Requests\Identities\GetGuestUserByUsernameRequest;
use spkm\ClearPass\Requests\Identities\GetGuestUserRequest;
use spkm\ClearPass\Requests\Identities\GetGuestUsersRequest;
use spkm\ClearPass\Requests\Identities\ReplaceGuestUserByUsernameRequest;
use spkm\ClearPass\Requests\Identities\ReplaceGuestUserRequest;
use spkm\ClearPass\Requests\Identities\UpdateGuestUserByUsernameRequest;
use spkm\ClearPass\Requests\Identities\UpdateGuestUserRequest;
use spkm\ClearPass\Requests\PolicyElements\GetRoleByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\GetRoleRequest;
use spkm\ClearPass\Requests\PolicyElements\GetRolesRequest;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

/*
 * Code written for version 1 (such as creating guest Wi-Fi accounts from a DTOs\GuestUser) must keep sending the same
 * requests.
 */

function v1Guest(array $overrides = []): GuestUser
{
    return new GuestUser(...array_merge([
        'role_id' => 2,
        'username' => 'visitor@example.com',
        'password' => 'a-strong-password',
        'start_time' => Carbon::parse('2026-01-01T09:00:00+00:00'),
        'expire_time' => Carbon::parse('2026-01-03T09:00:00+00:00'),
        'sponsor_name' => 'Reception',
        'sponsor_profile' => 'API',
        'enabled' => true,
        'create_time' => Carbon::parse('2026-01-01T09:00:00+00:00'),
        'do_expire' => GuestUserExpirationAction::DELETE_AND_LOGOUT,
        'notes' => 'Day visitor',
        'simultaneous_use' => 1,
        'visitor_name' => 'A Visitor',
    ], $overrides));
}

it('creates a guest account from a DTO with the body version 1 sent', function () {
    $mockClient = FakeClearPass::respondWith([CreateGuestUserRequest::class => MockResponse::make(['id' => 5, 'username' => 'visitor@example.com', 'expire_time' => 1767430800], 201)]);

    $response = FakeClearPass::connector()->send(new CreateGuestUserRequest(v1Guest()));

    expect($response->status())->toBe(201)
        ->and($response->json()['expire_time'])->toBe(1767430800)
        ->and(FakeClearPass::received($mockClient, CreateGuestUserRequest::class)->getMethod())->toBe(Method::POST)
        ->and(FakeClearPass::urisReceived($mockClient, CreateGuestUserRequest::class)[0])->toBe(FakeClearPass::API_URL.'/guest')
        ->and(FakeClearPass::bodiesReceived($mockClient, CreateGuestUserRequest::class)[0])->toBe([
            'create_time' => 1767258000,
            'custom_fields' => [],
            'do_expire' => 4,
            'email' => null,
            'enabled' => true,
            'expire_time' => 1767430800,
            'id' => null,
            'mac' => null,
            'notes' => 'Day visitor',
            'password' => 'a-strong-password',
            'role_id' => 2,
            'role_name' => null,
            'simultaneous_use' => 1,
            'sponsor_email' => null,
            'sponsor_name' => 'Reception',
            'sponsor_profile' => 'API',
            'start_time' => 1767258000,
            'username' => 'visitor@example.com',
            'visitor_company' => null,
            'visitor_name' => 'A Visitor',
            'visitor_phone' => null,
        ]);
});

it('sends the version 1 guest requests to the same paths with the same queries', function (callable $make, string $method, string $uri) {
    $request = $make();
    $mockClient = FakeClearPass::respondWith([$request::class => MockResponse::make(['id' => 1], $method === 'DELETE' ? 204 : 200)]);

    FakeClearPass::connector()->send($request);

    expect(FakeClearPass::received($mockClient, $request::class)->getMethod()->value)->toBe($method)
        ->and(FakeClearPass::urisReceived($mockClient, $request::class)[0])->toBe(FakeClearPass::API_URL.$uri);
})->with([
    'list' => [fn () => new GetGuestUsersRequest, 'GET', '/guest?offset=0&limit=100&calculate_count=true'],
    'list with query' => [fn () => new GetGuestUsersRequest(['limit' => 5, 'filter' => '{"role_id":2}']), 'GET', '/guest?offset=0&limit=5&calculate_count=true&filter=%7B%22role_id%22%3A2%7D'],
    'by id' => [fn () => new GetGuestUserRequest(7, ['x' => 'y']), 'GET', '/guest/7?x=y'],
    'by username' => [fn () => new GetGuestUserByUsernameRequest('a@b.c'), 'GET', '/guest/username/a%40b.c'],
    'update' => [fn () => new UpdateGuestUserRequest(v1Guest(['id' => 7])), 'PATCH', '/guest/7'],
    'update by username' => [fn () => new UpdateGuestUserByUsernameRequest(v1Guest(), ['change_of_authorization' => 'true']), 'PATCH', '/guest/username/visitor%40example.com?change_of_authorization=true'],
    'replace' => [fn () => new ReplaceGuestUserRequest(v1Guest(['id' => 7])), 'PUT', '/guest/7'],
    'replace by username' => [fn () => new ReplaceGuestUserByUsernameRequest(v1Guest()), 'PUT', '/guest/username/visitor%40example.com'],
    'delete' => [fn () => new DeleteGuestUserRequest(7), 'DELETE', '/guest/7'],
    'delete by username' => [fn () => new DeleteGuestUserByUsernameRequest('a@b.c', ['change_of_authorization' => 'true']), 'DELETE', '/guest/username/a%40b.c?change_of_authorization=true'],
    'roles' => [fn () => new GetRolesRequest, 'GET', '/role?offset=0&limit=100&calculate_count=true'],
    'role' => [fn () => new GetRoleRequest(2), 'GET', '/role/2'],
    'role by name' => [fn () => new GetRoleByNameRequest('Guest'), 'GET', '/role/name/Guest'],
    'token info' => [fn () => new GetTokenInfoRequest, 'GET', '/oauth/me'],
    'token info by POST' => [fn () => new GetTokenInfoRequest(Method::POST), 'POST', '/oauth/me'],
    'token privileges' => [fn () => new GetTokenPrivilegesRequest, 'GET', '/oauth/privileges'],
]);

it('still needs an id or username on the DTO for the requests that address one', function () {
    expect(fn () => new UpdateGuestUserRequest(v1Guest()))->toThrow(InvalidArgumentException::class, 'Guest User ID is required')
        ->and(fn () => new ReplaceGuestUserRequest(v1Guest()))->toThrow(InvalidArgumentException::class, 'Guest User ID is required')
        ->and(fn () => new GuestUser(role_id: 2, username: 'u', password: str_repeat('x', 65), start_time: now(), expire_time: now(), sponsor_name: 's', sponsor_profile: 'p', enabled: true))
        ->toThrow(InvalidArgumentException::class, 'Password must not exceed 64 characters.');
});

it('pages through guests with the facade as version 1 did', function () {
    config()->set('clearpass.base_url', 'https://clearpass.school.test');
    config()->set('clearpass.client_id', 'id');
    config()->set('clearpass.client_secret', 'secret');
    $pages = [
        FakeClearPass::list(array_map(fn ($i) => ['id' => $i], range(1, 100)), 150, FakeClearPass::link('next')),
        FakeClearPass::list(array_map(fn ($i) => ['id' => $i], range(101, 150)), 150),
    ];
    $mockClient = FakeClearPass::respondWithToken([GetGuestUsersRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    $items = [];
    foreach (ClearPass::paginate(new GetGuestUsersRequest) as $response) {
        $items = [...$items, ...$response->json('_embedded.items')];
    }

    expect($items)->toHaveCount(150)
        ->and(FakeClearPass::queriesReceived($mockClient, GetGuestUsersRequest::class))->toBe([
            ['offset' => 0, 'limit' => 100, 'calculate_count' => 'true'],
            ['offset' => 100, 'limit' => 100, 'calculate_count' => 'true'],
        ]);
});

it('reads a found guest with json() and a missing one by status, as version 1 callers do', function () {
    FakeClearPass::respondWith([GetGuestUserByUsernameRequest::class => MockResponse::make(['id' => 1, 'expire_time' => 1767430800, 'current_state' => 'active'])]);
    $found = FakeClearPass::connector()->send(new GetGuestUserByUsernameRequest('a@b.c'));

    FakeClearPass::respondWith([GetGuestUserByUsernameRequest::class => FakeClearPass::problem(404, 'Not Found')]);
    $missing = FakeClearPass::connector()->send(new GetGuestUserByUsernameRequest('none'));

    expect($found->json()['expire_time'])->toBe(1767430800)
        ->and($found->dto())->toBeInstanceOf(spkm\ClearPass\Data\Identities\GuestUser::class)
        ->and($missing->status())->toBe(404)
        ->and($missing->failed())->toBeTrue();
});
