<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A OnGuardActivity record.
 */
readonly class OnGuardActivity extends Data
{
    /**
     * @param  array<string, mixed>|null  $host_mac_list
     */
    public function __construct(
        /** Numeric ID of the endpoints that have the ClearPass OnGuard. */
        public ?int $id = null,
        /** User logged onto the endpoint. */
        public ?string $user = null,
        /** MAC Address of the endpoint. */
        public ?string $host_mac = null,
        /** IP Address of the endpoint. */
        public ?string $host_ip = null,
        /** OS of the endpoint. */
        public ?string $host_os = null,
        /** Registered Policy Manager Server. */
        public ?string $server_name = null,
        /** Status of the OnGuard agent. */
        public ?string $agent_status = null,
        /** type. */
        public ?string $type = null,
        /** Timestamp of registration. */
        public ?string $registered_at = null,
        /** Timestamp of unregistration. */
        public ?string $last_unregistered_at = null,
        /** Device Category of the endpoint. */
        public ?string $device_category = null,
        /** OS Family of the endpoint. */
        public ?string $device_os_family = null,
        /** Device name of the endpoint. */
        public ?string $device_name = null,
        /** Is a static IP. */
        public ?bool $static_ip = null,
        /** Last seen Health Status of the endpoint. */
        public ?string $last_seen_health_status = null,
        /** Unhealthy health class of the endpoint. */
        public ?string $unhealthy_health_classes = null,
        /** Action. One of: RestartSession, Bounce. */
        public ?string $action = null,
        /** Agentless OnGuard Log of the endpoint. */
        public ?string $agentless_onguard_log = null,
        /** Application Response. */
        public ?string $application_response = null,
        /** Status of the endpoint. One of: NO_CHANGE, BLOCK_ACCESS, ALLOW_ACCESS. */
        public ?string $endpoint_status = null,
        /** List of host MAC Address. */
        public ?array $host_mac_list = null,
        /** URL. */
        public ?string $info_url = null,
        /** Is a broadcast. */
        public ?bool $is_broadcast = null,
        /** Message. */
        public ?string $message = null,
        /** Posture Evaluation Results. */
        public ?string $posture_evaluation_results = null,
        /** Posture request. */
        public ?string $posture_request = null,
        /** Posture response. */
        public ?string $posture_response = null,
        /** Response Message. */
        public ?string $response_message = null,
    ) {}
}
