<?php

namespace spkm\ClearPass\Data\SessionControl;

use Carbon\CarbonImmutable;
use spkm\ClearPass\Data\Data;

/**
 * A ActiveSession record.
 */
readonly class ActiveSession extends Data
{
    public function __construct(
        /** Number of octets received from the client during the session. */
        public ?int $acctinputoctets = null,
        /** Number of octets sent to the client during the session. */
        public ?int $acctoutputoctets = null,
        /** Policy Manager session identifier. */
        public ?string $acctsessionid = null,
        /** Duration of the session, in seconds. */
        public ?int $acctsessiontime = null,
        /** Start time of the session. */
        public ?CarbonImmutable $acctstarttime = null,
        /** End time of the session. */
        public ?CarbonImmutable $acctstoptime = null,
        /** Reason for termination of this session. */
        public ?string $acctterminatecause = null,
        /** Access point name associated with the session. */
        public ?string $ap_name = null,
        /** Aruba user role of the session. */
        public ?string $arubauserrole = null,
        /** Aruba user vlan of the session. */
        public ?string $arubauservlan = null,
        /** MAC address of the network access device. */
        public ?string $calledstationid = null,
        /** Calling-Station-Id attribute; often the MAC address of the client. */
        public ?string $callingstationid = null,
        /** UUID of the CPPM server. */
        public ?string $cppm_uuid = null,
        /** IP address of the client. */
        public ?string $framedipaddress = null,
        /** Accounting identifier of the record. */
        public ?string $id = null,
        /** MAC address of the client device. */
        public ?string $mac_address = null,
        /** Name of the network device. */
        public ?string $nas_name = null,
        /** IP address of the network access device. */
        public ?string $nasipaddress = null,
        /** Port identifier assigned by the network access device. */
        public ?string $nasportid = null,
        /** Port type reported by the network access device. */
        public ?string $nasporttype = null,
        /** Role name of the user associated with the session. */
        public ?string $role_name = null,
        /** Service type. */
        public ?string $servicetype = null,
        /** Email address of the sponsor. */
        public ?string $sponsor_email = null,
        /** Sponsor of the guest user associated with the session. */
        public ?string $sponsor_name = null,
        /** Operator profile name of the sponsor. */
        public ?string $sponsor_profile_name = null,
        /** SSID associated with the session. */
        public ?string $ssid = null,
        /** The current state of the session (active, stale, closed). */
        public ?string $state = null,
        /** Total number of octets sent and received during the session. */
        public ?int $total_traffic = null,
        /** Time when the session record was last updated. */
        public ?CarbonImmutable $updated_at = null,
        /** Username associated with the session. */
        public ?string $username = null,
        /** The visitor’s mobile carrier. */
        public ?string $visitor_carrier = null,
        /** The visitor’s company name. */
        public ?string $visitor_company = null,
        /** The visitor’s name. */
        public ?string $visitor_name = null,
        /** The visitor’s phone number. */
        public ?string $visitor_phone = null,
    ) {}
}
