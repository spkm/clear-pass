<?php

namespace spkm\ClearPass\Requests;

use Saloon\Enums\Method;

/**
 * A GET for one record: by its id, by another key such as its name, or the one record a setting has.
 */
abstract class ItemRequest extends ClearPassRequest
{
    protected Method $method = Method::GET;

    protected string $responseShape = self::ONE;

    protected bool $cacheable = true;
}
