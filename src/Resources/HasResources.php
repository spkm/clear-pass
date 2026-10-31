<?php

namespace spkm\ClearPass\Resources;

/**
 * A resource group for every API ClearPass documents, on the connector and so on the ClearPass facade.
 */
trait HasResources
{
    /**
     * The ApiOperations API.
     */
    public function apiOperations(): ApiOperations\ApiOperationsResources
    {
        return new ApiOperations\ApiOperationsResources($this);
    }

    /**
     * The CertificateAuthority API.
     */
    public function certificateAuthority(): CertificateAuthority\CertificateAuthorityResources
    {
        return new CertificateAuthority\CertificateAuthorityResources($this);
    }

    /**
     * The EndpointVisibility API.
     */
    public function endpointVisibility(): EndpointVisibility\EndpointVisibilityResources
    {
        return new EndpointVisibility\EndpointVisibilityResources($this);
    }

    /**
     * The EnforcementProfile API.
     */
    public function enforcementProfile(): EnforcementProfile\EnforcementProfileResources
    {
        return new EnforcementProfile\EnforcementProfileResources($this);
    }

    /**
     * The GlobalServerConfiguration API.
     */
    public function globalServerConfiguration(): GlobalServerConfiguration\GlobalServerConfigurationResources
    {
        return new GlobalServerConfiguration\GlobalServerConfigurationResources($this);
    }

    /**
     * The GuestActions API.
     */
    public function guestActions(): GuestActions\GuestActionsResources
    {
        return new GuestActions\GuestActionsResources($this);
    }

    /**
     * The GuestConfiguration API.
     */
    public function guestConfiguration(): GuestConfiguration\GuestConfigurationResources
    {
        return new GuestConfiguration\GuestConfigurationResources($this);
    }

    /**
     * The Identities API.
     */
    public function identities(): Identities\IdentitiesResources
    {
        return new Identities\IdentitiesResources($this);
    }

    /**
     * The Insight API.
     */
    public function insight(): Insight\InsightResources
    {
        return new Insight\InsightResources($this);
    }

    /**
     * The Integrations API.
     */
    public function integrations(): Integrations\IntegrationsResources
    {
        return new Integrations\IntegrationsResources($this);
    }

    /**
     * The LocalServerConfiguration API.
     */
    public function localServerConfiguration(): LocalServerConfiguration\LocalServerConfigurationResources
    {
        return new LocalServerConfiguration\LocalServerConfigurationResources($this);
    }

    /**
     * The Logs API.
     */
    public function logs(): Logs\LogsResources
    {
        return new Logs\LogsResources($this);
    }

    /**
     * The PlatformCertificates API.
     */
    public function platformCertificates(): PlatformCertificates\PlatformCertificatesResources
    {
        return new PlatformCertificates\PlatformCertificatesResources($this);
    }

    /**
     * The PolicyElements API.
     */
    public function policyElements(): PolicyElements\PolicyElementsResources
    {
        return new PolicyElements\PolicyElementsResources($this);
    }

    /**
     * The SessionControl API.
     */
    public function sessionControl(): SessionControl\SessionControlResources
    {
        return new SessionControl\SessionControlResources($this);
    }

    /**
     * The ToolsAndUtilities API.
     */
    public function toolsAndUtilities(): ToolsAndUtilities\ToolsAndUtilitiesResources
    {
        return new ToolsAndUtilities\ToolsAndUtilitiesResources($this);
    }
}
