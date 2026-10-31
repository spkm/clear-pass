<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A OperatorProfile record.
 */
readonly class OperatorProfile extends Data
{
    /**
     * @param  array<int, string>|null  $privileges
     */
    public function __construct(
        /** Enter a name for this operator profile. */
        public ?string $name = null,
        /** Select the default operator filtering to apply to guest accounts. */
        public ?string $sponsor_filter = null,
        /** Comments or descriptive text about the operator profile. */
        public ?string $comment = null,
        /** If unchecked, operators with this profile will not be able to log in. */
        public ?bool $enabled = null,
        /** Enter a comma-delimited list of field=value pairs to create a session filter. */
        public ?string $filter_radacct = null,
        /** Enter a comma-delimited list of field=value pairs to create an account filter. */
        public ?string $filter_useraccount = null,
        public ?int $id = null,
        /** Select the default language to use for operators with this profile. */
        public ?string $lang = null,
        /** Maximum number of devices the operator can create. Leave blank for no limit. */
        public ?string $max_devices = null,
        /** Maximum number of guests the operator can create. Leave blank for no limit. */
        public ?string $max_users = null,
        /** Override the Change Expiration form. */
        public ?string $override_change_expiration = null,
        /** Override the Create Multiple Guest Accounts form. */
        public ?string $override_create_multi = null,
        /** Override the Create Multiple Accounts Results form. */
        public ?string $override_create_multi_result = null,
        /** Override the Create New Guest Account form. */
        public ?string $override_create_user = null,
        /** Override the Create New Guest Account Receipt form. */
        public ?string $override_create_user_receipt = null,
        /** Override the Edit Account form. */
        public ?string $override_guest_edit = null,
        /** Override the Updated Account Details form. */
        public ?string $override_guest_edit_receipt = null,
        /** Override the Export Guest Accounts view. */
        public ?string $override_guest_export = null,
        /** Override the Edit Accounts view. */
        public ?string $override_guest_multi = null,
        /** Override the Edit Guest Accounts form. */
        public ?string $override_guest_multi_form = null,
        /** Override the Edit Multiple Accounts Results form. */
        public ?string $override_guest_multi_result = null,
        /** Override the Active Sessions view. */
        public ?string $override_guest_sessions = null,
        /** Override the Manage Guest Accounts view. */
        public ?string $override_guest_users = null,
        /** Override the Create New Device form. */
        public ?string $override_mac_create = null,
        /** Override the Create New Device Receipt form. */
        public ?string $override_mac_create_receipt = null,
        /** Override the Edit Device form. */
        public ?string $override_mac_edit = null,
        /** Override the Updated Device Details form. */
        public ?string $override_mac_edit_receipt = null,
        /** Override the Export Devices view. */
        public ?string $override_mac_export = null,
        /** Override the Manage Devices view. */
        public ?string $override_mac_list = null,
        /** Override the Edit Devices view. */
        public ?string $override_mac_multi = null,
        /** Override the Edit Guest Devices form. */
        public ?string $override_mac_multi_form = null,
        /** Override the Edit Multiple Devices Results form. */
        public ?string $override_mac_multi_result = null,
        /** If checked, you can specify different default forms and views to use. */
        public ?bool $override_ui = null,
        /** Select the privileges that will be granted to this operator login. */
        public ?array $privileges = null,
        /** The initial page to show this operator after logging in. */
        public ?string $start_page = null,
        /** Select the default time zone for operators with this profile. */
        public ?string $timezone_id = null,
        /** Select the visitor account roles that these operators are permitted to use. */
        public ?string $user_dbs_list = null,
        /** Choose the skin to use for operators with this profile. */
        public ?string $userskin = null,
        public ?string $userskin_name = null,
    ) {}
}
