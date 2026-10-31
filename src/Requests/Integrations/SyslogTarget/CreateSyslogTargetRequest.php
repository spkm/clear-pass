<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogTarget;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\SyslogTarget;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new syslog target: POST /syslog-target.
 */
class CreateSyslogTargetRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SyslogTarget::class;

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
        return '/syslog-target';
    }
}
