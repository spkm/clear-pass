<?php

namespace spkm\ClearPass\Requests\ToolsAndUtilities\EmailSend;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\ToolsAndUtilities\EmailSend;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Send an Email: POST /email/send.
 */
class SendEmailRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = EmailSend::class;

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
        return '/email/send';
    }
}
