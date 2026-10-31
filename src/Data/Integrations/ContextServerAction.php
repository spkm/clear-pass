<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A ContextServerAction record.
 */
readonly class ContextServerAction extends Data
{
    /**
     * @param  array<string, mixed>|null  $attributes
     * @param  array<string, mixed>|null  $headers
     */
    public function __construct(
        /** Numeric ID of the Context Server Action. */
        public ?int $id = null,
        /** Server Type of the Context Server Action. One of: Aruba Activate, VMware AirWatch, JAMF, MobileIron Core, IBM MaaS360, SAP Afaria, SOTI, Google Admin Console, Palo Alto Networks Panorama, Palo Alto Networks Firewall, Juniper Networks SRX, Citrix XenMobile, Generic HTTP Context Server, Aruba Airwave, Aruba Central, ClearPass Cloud Proxy, Aruba IntroSpect. */
        public ?string $server_type = null,
        /** Action Name of the Context Server Action. */
        public ?string $action_name = null,
        /** Http method of the Context Server Action. One of: GET, POST, PATCH, PUT, DELETE. */
        public ?string $http_method = null,
        /** Description of the Context Server Action. */
        public ?string $description = null,
        /** Authentication Method of the Context Server Action. One of: none, basic, oauth2, cert. */
        public ?string $auth_method = null,
        /** URL of the Context Server Action. */
        public ?string $url = null,
        /** Action Type of the Context Server Action. One of: Send_Login_Info, Send_HIP_Report, Register_Device, Register_Role, Register_Posture, Send_Logout_Info, Unregister_Device, Unregister_Role, Unregister_Posture. */
        public ?string $action_type = null,
        /** Attributes of the Context Server Action (e.g., [{"attr_name":"key1", "attr_value":"value1", "is_sensitive":true},{"attr_name":"key2", "attr_value":"value2", "is_sensitive": false}]). */
        public ?array $attributes = null,
        /** Content of the Context Server Action. */
        public ?string $content = null,
        /** Content-Type of the Context Server Action. Note : For CUSTOM type use any string. One of: HTML, JSON, PLANE, XML. */
        public ?string $content_type = null,
        /** Headers(key/value pairs) of the Context Server Action (e.g., [{"attr_name":"key1", "attr_value":"value1"},{"attr_name":"key2", "attr_value":"value2"}]). */
        public ?array $headers = null,
        /** Server Name of the Context Server Action. */
        public ?string $server_name = null,
    ) {}
}
