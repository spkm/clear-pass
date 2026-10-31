<?php

namespace spkm\ClearPass\Resources\GuestConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The GuestConfiguration API: ClearPass::guestConfiguration().
 *
 * @extends BaseResource<Data>
 */
class GuestConfigurationResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage pass templates.
     */
    public function digitalPassTemplates(): DigitalPassTemplateResource
    {
        return new DigitalPassTemplateResource($this->connector);
    }

    /**
     * Manage settings in Configuration -> Authentication.
     */
    public function guestAuthenticationConfiguration(): GuestAuthenticationConfigurationResource
    {
        return new GuestAuthenticationConfigurationResource($this->connector);
    }

    /**
     * Manage settings in Configuration -> Guest Manager.
     */
    public function guestManager(): GuestManagerResource
    {
        return new GuestManagerResource($this->connector);
    }

    /**
     * Manage print templates.
     */
    public function printTemplates(): PrintTemplateResource
    {
        return new PrintTemplateResource($this->connector);
    }

    /**
     * Manage web logins.
     */
    public function webLogins(): WebLoginResource
    {
        return new WebLoginResource($this->connector);
    }
}
