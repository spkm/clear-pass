<?php

namespace spkm\ClearPass\Requests\Logs\LoginAudit;

use spkm\ClearPass\Data\Logs\LoginAudit;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get previous login details for an admin user: GET /login-audit/{name}.
 */
class GetLoginAuditRequest extends ItemRequest
{
    protected ?string $dto = LoginAudit::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/login-audit/'.rawurlencode((string) $this->name);
    }
}
