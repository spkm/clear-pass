<?php

namespace spkm\ClearPass\Requests\GuestActions\SendSmsReceipt;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestActions\SmsReceiptResponse;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Resend guest receipt for guest account, via SMS: POST /guest/{guest_id}/sendreceipt/sms.
 */
class SendSmsReceiptRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SmsReceiptResponse::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $guestId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/'.rawurlencode((string) $this->guestId).'/sendreceipt/sms';
    }
}
