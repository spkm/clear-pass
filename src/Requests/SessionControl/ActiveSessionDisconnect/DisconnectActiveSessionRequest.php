<?php

namespace spkm\ClearPass\Requests\SessionControl\ActiveSessionDisconnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\SessionControl\ActiveSessionAction;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Disconnect active session: POST /session/{id}/disconnect.
 */
class DisconnectActiveSessionRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ActiveSessionAction::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/session/'.rawurlencode((string) $this->id).'/disconnect';
    }
}
