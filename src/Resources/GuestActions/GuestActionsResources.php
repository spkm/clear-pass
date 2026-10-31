<?php

namespace spkm\ClearPass\Resources\GuestActions;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GuestActions\GenerateGuestReceiptResponse;
use spkm\ClearPass\Data\GuestActions\GuestDigitalReceiptResponse;
use spkm\ClearPass\Data\GuestActions\SmsReceiptResponse;
use spkm\ClearPass\Data\GuestActions\SmtpReceiptResponse;
use spkm\ClearPass\Data\GuestActions\SponsorshipApprovalResponse;
use spkm\ClearPass\Requests\GuestActions\GenerateGuestDigitalPass\GenerateGuestDigitalPassRequest;
use spkm\ClearPass\Requests\GuestActions\GenerateGuestReceipt\GenerateGuestReceiptRequest;
use spkm\ClearPass\Requests\GuestActions\SendSmsReceipt\SendSmsReceiptRequest;
use spkm\ClearPass\Requests\GuestActions\SendSmtpReceipt\SendSmtpReceiptRequest;
use spkm\ClearPass\Requests\GuestActions\SponsorshipApproval\ApproveSponsorshipRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The GuestActions API: ClearPass::guestActions().
 *
 * @extends BaseResource<Data>
 */
class GuestActionsResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Accept or reject a guest sponsorship request: POST /guest/{guest_id}/sponsor.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options  Query options: gsr_id
     */
    public function approveSponsorship(int $guestId, array|Data $body = [], array $options = []): ?SponsorshipApprovalResponse
    {
        return $this->fetch(new ApproveSponsorshipRequest($guestId, $this->payloadOf($body), $options));
    }

    /**
     * Generate digital pass for guest account based on template specified by ID: GET /guest/{guest_id}/pass/{id}.
     */
    public function generateGuestDigitalPass(int $guestId, int $id): ?GuestDigitalReceiptResponse
    {
        return $this->fetch(new GenerateGuestDigitalPassRequest($guestId, $id));
    }

    /**
     * Generate print template for guest account, using specified template ID: GET /guest/{guest_id}/receipt/{id}.
     */
    public function generateGuestReceipt(int $guestId, int $id): ?GenerateGuestReceiptResponse
    {
        return $this->fetch(new GenerateGuestReceiptRequest($guestId, $id));
    }

    /**
     * Resend guest receipt for guest account, via SMS: POST /guest/{guest_id}/sendreceipt/sms.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function sendSmsReceipt(int|string $guestId, array|Data $body = [], array $options = []): ?SmsReceiptResponse
    {
        return $this->fetch(new SendSmsReceiptRequest($guestId, $this->payloadOf($body), $options));
    }

    /**
     * Resend guest receipt for guest account, via SMTP: POST /guest/{guest_id}/sendreceipt/smtp.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function sendSmtpReceipt(int|string $guestId, array|Data $body = [], array $options = []): ?SmtpReceiptResponse
    {
        return $this->fetch(new SendSmtpReceiptRequest($guestId, $this->payloadOf($body), $options));
    }
}
