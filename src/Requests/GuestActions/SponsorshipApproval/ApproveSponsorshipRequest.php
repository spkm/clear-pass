<?php

namespace spkm\ClearPass\Requests\GuestActions\SponsorshipApproval;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestActions\SponsorshipApprovalResponse;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Accept or reject a guest sponsorship request: POST /guest/{guest_id}/sponsor.
 */
class ApproveSponsorshipRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SponsorshipApprovalResponse::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: gsr_id
     */
    public function __construct(protected int $guestId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/'.$this->guestId.'/sponsor';
    }
}
