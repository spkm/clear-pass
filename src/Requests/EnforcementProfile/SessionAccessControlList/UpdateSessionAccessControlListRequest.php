<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\SessionAccessControlList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Session Access Control List: PATCH /enforcement-profile-dur/session-access-control-list/{product_name}/{session_access_control_list_id}.
 */
class UpdateSessionAccessControlListRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = SessionAccessControlList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $sessionAccessControlListId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/session-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->sessionAccessControlListId;
    }
}
