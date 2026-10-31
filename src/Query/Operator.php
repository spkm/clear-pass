<?php

namespace spkm\ClearPass\Query;

use InvalidArgumentException;

/**
 * The comparisons ClearPass's JSON filter understands, as {"field": {"$op": value}}.
 */
enum Operator: string
{
    case Equal = '$eq';
    case NotEqual = '$ne';
    case GreaterThan = '$gt';
    case GreaterOrEqual = '$gte';
    case LessThan = '$lt';
    case LessOrEqual = '$lte';
    case In = '$in';
    case NotIn = '$nin';
    case Contains = '$contains';
    case Regex = '$regex';
    case Exists = '$exists';

    /**
     * The operator for a ClearPass code or a familiar symbol: '=', '!=', '<>', '>', '>=', '<', '<=', 'in', 'not in',
     * 'contains', 'like', 'regex', 'matches', 'exists' and the codes without their '$' are accepted too.
     */
    public static function parse(self|string $operator): self
    {
        if ($operator instanceof self) {
            return $operator;
        }

        $normalised = strtolower(trim($operator));

        return self::tryFrom($normalised) ?? self::tryFrom('$'.$normalised) ?? match ($normalised) {
            '=', '==' => self::Equal,
            '!=', '<>' => self::NotEqual,
            '>' => self::GreaterThan,
            '>=' => self::GreaterOrEqual,
            '<' => self::LessThan,
            '<=' => self::LessOrEqual,
            'not in' => self::NotIn,
            'like' => self::Contains,
            'matches' => self::Regex,
            default => throw new InvalidArgumentException('"'.$operator.'" is not a ClearPass filter operator.'),
        };
    }

    /**
     * Whether the operator compares against a list of values.
     */
    public function takesList(): bool
    {
        return in_array($this, [self::In, self::NotIn], true);
    }
}
