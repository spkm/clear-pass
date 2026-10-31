<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ClearPassPortal record.
 */
readonly class ClearPassPortal extends Data
{
    public function __construct(
        /** If specified, User will be redirected to the selected ClearPass application login page. One of: ClearPass Guest, ClearPass Insight, ClearPass Policy Manager, ClearPass Onboard. */
        public ?string $app_name = null,
        /** Default Landing page Copyright text. */
        public ?string $copyright = null,
        /** Default Landing page Footer. */
        public ?string $footer = null,
        /** If specified, User will be redirected to the selected Guest Web Login/Self-Registration Portal. */
        public ?string $guest_portal = null,
        /** Default Landing page Header. */
        public ?string $header = null,
        /** Default Landing page Title. */
        public ?string $title = null,
        /** Redirect URL constructed based on the Guest Portal name(guest_portal) or Application Login Page(app_name). */
        public ?string $url = null,
    ) {}
}
