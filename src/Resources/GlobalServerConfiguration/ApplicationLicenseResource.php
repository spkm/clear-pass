<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GlobalServerConfiguration\ApplicationLicense;
use spkm\ClearPass\Data\GlobalServerConfiguration\ApplicationLicenseSummary;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense\ActivateApplicationLicenseOfflineRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense\ActivateApplicationLicenseOnlineRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense\CreateApplicationLicenseRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense\DeleteApplicationLicenseRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense\GetApplicationLicenseRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense\GetApplicationLicensesRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense\GetApplicationLicenseSummaryRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense\ReplaceApplicationLicenseRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage application license, from ClearPass::globalServerConfiguration()->applicationLicenses().
 *
 * @extends Builder<ApplicationLicense>
 */
class ApplicationLicenseResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ApplicationLicense::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApplicationLicensesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateApplicationLicenseRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetApplicationLicenseRequest((int) $id);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceApplicationLicenseRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteApplicationLicenseRequest((int) $id, $options);
    }

    /**
     * Activate license online by license id: PATCH /application-license/activate-online/{license_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function activateOnline(int $licenseId, array $options = []): ?ApplicationLicense
    {
        return $this->fetch(new ActivateApplicationLicenseOnlineRequest($licenseId, $options));
    }

    /**
     * Activate license offline by license id: PATCH /application-license/activate-offline/{license_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function activateOffline(int $licenseId, array $options = []): ?ApplicationLicense
    {
        return $this->fetch(new ActivateApplicationLicenseOfflineRequest($licenseId, $options));
    }

    /**
     * Get application license summary: GET /application-license/summary.
     */
    public function summary(): ?ApplicationLicenseSummary
    {
        return $this->fetch(new GetApplicationLicenseSummaryRequest);
    }
}
