<?php

namespace spkm\ClearPass\Requests\ToolsAndUtilities\SmsSend;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\ToolsAndUtilities\SmsSendResponse;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Send an SMS message: POST /sms/send.
 */
class SendSmsRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SmsSendResponse::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/sms/send';
    }
}
