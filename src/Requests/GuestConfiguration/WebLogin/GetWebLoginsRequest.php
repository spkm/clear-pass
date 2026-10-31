<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\WebLogin;

use spkm\ClearPass\Data\GuestConfiguration\WebLogin;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of web login pages: GET /weblogin.
 */
class GetWebLoginsRequest extends ListRequest
{
    protected ?string $dto = WebLogin::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/weblogin';
    }
}
