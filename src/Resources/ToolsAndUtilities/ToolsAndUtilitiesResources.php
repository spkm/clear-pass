<?php

namespace spkm\ClearPass\Resources\ToolsAndUtilities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\ToolsAndUtilities\EmailSend;
use spkm\ClearPass\Data\ToolsAndUtilities\SmsSendResponse;
use spkm\ClearPass\Requests\ToolsAndUtilities\EmailSend\SendEmailRequest;
use spkm\ClearPass\Requests\ToolsAndUtilities\SmsSend\SendSmsRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The ToolsAndUtilities API: ClearPass::toolsAndUtilities().
 *
 * @extends BaseResource<Data>
 */
class ToolsAndUtilitiesResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Generate a random MPSK.
     */
    public function randomMpskGenerator(): RandomMpskGeneratorResource
    {
        return new RandomMpskGeneratorResource($this->connector);
    }

    /**
     * Generate a random password.
     */
    public function randomPasswordGenerator(): RandomPasswordGeneratorResource
    {
        return new RandomPasswordGeneratorResource($this->connector);
    }

    /**
     * Send an Email: POST /email/send.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function sendEmail(array|Data $body = [], array $options = []): ?EmailSend
    {
        return $this->fetch(new SendEmailRequest($this->payloadOf($body), $options));
    }

    /**
     * Send an SMS message: POST /sms/send.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function sendSms(array|Data $body = [], array $options = []): ?SmsSendResponse
    {
        return $this->fetch(new SendSmsRequest($this->payloadOf($body), $options));
    }
}
