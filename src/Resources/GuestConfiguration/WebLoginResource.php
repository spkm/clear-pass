<?php

namespace spkm\ClearPass\Resources\GuestConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GuestConfiguration\WebLogin;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\CreateWebLoginRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\DeleteWebLoginByPageNameRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\DeleteWebLoginRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\GetWebLoginByPageNameRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\GetWebLoginRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\GetWebLoginsRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\ReplaceWebLoginByPageNameRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\ReplaceWebLoginRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\UpdateWebLoginByPageNameRequest;
use spkm\ClearPass\Requests\GuestConfiguration\WebLogin\UpdateWebLoginRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage web logins, from ClearPass::guestConfiguration()->webLogins().
 *
 * @extends Builder<WebLogin>
 */
class WebLoginResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, WebLogin::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetWebLoginsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateWebLoginRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetWebLoginRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateWebLoginRequest($id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceWebLoginRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteWebLoginRequest($id, $options);
    }

    /**
     * Get a web login page by page-name: GET /weblogin/page-name/{page-name}.
     */
    public function findByPageName(string $pageName): ?WebLogin
    {
        return $this->fetchOrNull(new GetWebLoginByPageNameRequest($pageName));
    }

    /**
     * Update some fields of a web login page by page-name: PATCH /weblogin/page-name/{page-name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByPageName(string $pageName, array|Data $attributes = [], array $options = []): ?WebLogin
    {
        return $this->fetch(new UpdateWebLoginByPageNameRequest($pageName, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a web login page by page-name: PUT /weblogin/page-name/{page-name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByPageName(string $pageName, array|Data $attributes = [], array $options = []): ?WebLogin
    {
        return $this->fetch(new ReplaceWebLoginByPageNameRequest($pageName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a web login page by page-name: DELETE /weblogin/page-name/{page-name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByPageName(string $pageName, array $options = []): bool
    {
        $this->fetch(new DeleteWebLoginByPageNameRequest($pageName, $options));

        return true;
    }
}
