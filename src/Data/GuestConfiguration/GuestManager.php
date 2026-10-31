<?php

namespace spkm\ClearPass\Data\GuestConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A GuestManager record.
 */
readonly class GuestManager extends Data
{
    /**
     * @param  array<string, mixed>|null  $guest_account_expiry_options
     * @param  array<string, mixed>|null  $guest_modify_expire_time_options
     * @param  array<string, mixed>|null  $guest_lifetime_options
     * @param  array<string, mixed>|null  $guest_initial_sequence_options
     */
    public function __construct(
        /** The method used to generate random account usernames. One of: nwa_digits_password, nwa_letters_password, nwa_novowels_password, nwa_lettersdigits_password, nwa_picture_password, nwa_sequence. */
        public ?string $random_username_method = null,
        /** The length, in characters, of generated account usernames. */
        public ?int $random_username_length = null,
        /** The method used to generate a random account password. One of: nwa_digits_password, nwa_letters_password, nwa_novowels_password, nwa_lettersdigits_password, nwa_alnum_password, nwa_strong_password, nwa_complex_password, nwa_complexity_password, nwa_words_password, nwa_picture_password. */
        public ?string $random_password_method = null,
        /** Number of characters to include in randomly-generated account passwords. */
        public ?int $random_password_length = null,
        /** Password complexity to enforce for manually-entered guest passwords. Requires the random password type ‘A password matching the password complexity requirements’ and the field validator ‘NwaIsValidPasswordComplexity’ for manual password entry. One of: none, case, number, alphanumeric, casenumeric, punctuation, complex. */
        public ?string $guest_password_complexity = null,
        /** The minimum number of characters that a guest password must contain. */
        public ?int $guest_password_minimum = null,
        /** Default action to take when the expire_time is reached. Note that a logout can only occur if the NAS is RFC-3576 compliant. One of: 4, 3, 2, 1. */
        public ?int $guest_do_expire = null,
        /** The available options to select from when choosing the expiration time of a guest account (expire_after). Expiration times are specified in hours. */
        public ?array $guest_account_expiry_options = null,
        /** The available options to select from when modifying an account's expiration (modify_expire_time). Note some items may be dynamically removed based on the state of the account. */
        public ?array $guest_modify_expire_time_options = null,
        /** The available options to select from when choosing the lifetime of a guest account (expire_postlogin). Lifetime values are specified in minutes. */
        public ?array $guest_lifetime_options = null,
        /** Account expiration emails are sent this many days before the account expires. Enter a value between 1 and 30. */
        public ?int $g_action_notify_account_expiration_duration = null,
        /** Specify when to send to the recipients in the Copies To list. One of: never, always_cc, always_bcc. */
        public ?string $g_action_notify_account_expire_copies = null,
        /** An optional list of email addresses to which copies of expiry notifications will be sent. */
        public ?string $g_action_notify_account_expire_copies_to = null,
        /** Specify where to send emails if the user’s account doesn’t have an email address recorded. One of: none, fixed, domain. */
        public ?string $g_action_notify_account_expire_email_unknown = null,
        /** Domain to append to the username to form an email address. */
        public ?string $g_action_notify_account_expire_email_unknown_domain = null,
        /** Address used when no email address is known for a user. */
        public ?string $g_action_notify_account_expire_email_unknown_fixed = null,
        /** If checked, users will receive an email notification when their device’s network credentials are due to expire. Accounts must contain the ’expired_notify_status’ field with a value of ’1’. Once a notification is sent, this field will show as ’0’. */
        public ?bool $g_action_notify_account_expire_enabled = null,
        /** The plain text or HTML print template to use when generating an email message. One of: 2, 13, 7, 12, 5, 6, 1, 3, 8, 9, 11, 10, 14, 4. */
        public ?int $g_action_notify_account_expire_message = null,
        /** The format in which to send email receipts. One of: , plaintext, html_embedded, receipt, default, Aruba Amigopod Skin, Blank Skin, ClearPass Guest Skin, Custom Skin 1, Custom Skin 2, Galleria Skin, Galleria Skin 2. */
        public ?string $g_action_notify_account_expire_skin = null,
        /** Enter a subject for the notification email. */
        public ?string $g_action_notify_account_expire_subject = null,
        /** Specify when to send to the recipients in the Copies To list. One of: never, always_cc, always_bcc. */
        public ?string $g_action_notify_device_expire_copies = null,
        /** An optional list of email addresses to which copies of expiry notifications will be sent. */
        public ?string $g_action_notify_device_expire_copies_to = null,
        /** Specify where to send emails if the user’s account doesn’t have an email or sponsor_email address recorded. One of: none, fixed. */
        public ?string $g_action_notify_device_expire_email_unknown = null,
        /** Address used when no email address is known for a device. */
        public ?string $g_action_notify_device_expire_email_unknown_fixed = null,
        /** The plain text or HTML print template to use when generating an email message. One of: 2, 13, 7, 12, 5, 6, 1, 3, 8, 9, 11, 10, 14, 4. */
        public ?int $g_action_notify_device_expire_message = null,
        /** The format in which to send email receipts. One of: , plaintext, html_embedded, receipt, default, Aruba Amigopod Skin, Blank Skin, ClearPass Guest Skin, Custom Skin 1, Custom Skin 2, Galleria Skin, Galleria Skin 2. */
        public ?string $g_action_notify_device_expire_skin = null,
        /** Enter a subject for the notification email. */
        public ?string $g_action_notify_device_expire_subject = null,
        /** Template code to display on the Guest Manager start page, under the “About Guest Network Access” heading. Leave blank to use the default text, or enter a hyphen (“-”) to remove the default text and the heading. */
        public ?string $guest_about_guest_network_access = null,
        /** The URL of a terms and conditions page. The URL will appear in any terms checkbox with: {nwa_global name=guest_account_terms_of_use_url} It is recommended to upload your terms in Content Manager, where the files will be referenced with the "public/" prefix. Alternatively, you can edit Terms and Conditions under Configuration > Pages > Web Pages. If your site is hosted externally, be sure the proper access control lists (ACLs) are in place. If terms are not required, it is recommended to edit the terms field on your forms to a UI type "hidden" and an Initial Value of 1. */
        public ?string $guest_account_terms_of_use_url = null,
        /** Enable limiting the number of active sessions a guest account may have. Enter 0 to allow an unlimited number of sessions. */
        public ?int $guest_active_sessions = null,
        /** Create multi next available sequence number. These values will be used when multi_initial_sequence is set to -1. */
        public ?array $guest_initial_sequence_options = null,
        /** Characters which cannot appear in a user-generated password. */
        public ?string $guest_password_disallowed = null,
        /** Comma separated list of words disallowed in the random words password generator. */
        public ?string $guest_password_disallowed_words = null,
        /** Guest receipts can print simply by selecting the template in the dropdown, or by clicking a link. */
        public ?bool $guest_receipt_print_button = null,
        /** If selected, guest and device Wi-Fi passwords may be displayed to an operator. This is only possible if operators have the View Passwords privilege as well. */
        public ?bool $guest_view_account_password = null,
        /** Format picture (see below) describing the passwords that will be created for visitors. • Alphanumeric characters are passed through without modification. • ‘#’ is replaced with a random digit [0-9]. • ‘$’ or ‘?’ is replaced with a random letter [A-Za-z] • ‘_’ is replaced with a random lowercase letter [a-z] • ‘^’ is replaced with a random uppercase letter [A-Z] • ‘*’ is replaced with a random letter or digit [A-Za-z0-9]. • ‘!’ is replaced with a random punctuation symbol [excluding apostrophe, quotes] • ‘&’ is replaced with a random character (union of sets ! and *) • ‘@’ is replaced with a random letter or digit, excluding vowels • '%' is replaced with a random letter or digit, excluding vowels and anything that looks like another (il1, B8, O0, Z2). */
        public ?string $random_password_picture = null,
        /** Identifier string to prepend to usernames. Dynamic entries based on a user attribute can be entered as '_' + attribute. For example '_role_name'. The username length will determine the length of the numeric sequence only. Recommend 4. */
        public ?string $random_username_multi_prefix = null,
        /** Format picture (see below) describing the usernames that will be created for visitors. • Alphanumeric characters are passed through without modification. • ‘#’ is replaced with a random digit [0-9]. • ‘$’ or ‘?’ is replaced with a random letter [A-Za-z] • ‘_’ is replaced with a random lowercase letter [a-z] • ‘^’ is replaced with a random uppercase letter [A-Z] • ‘*’ is replaced with a random letter or digit [A-Za-z0-9]. • ‘!’ is replaced with a random punctuation symbol [excluding apostrophe, quotes] • ‘&’ is replaced with a random character (union of sets ! and *) • ‘@’ is replaced with a random letter or digit, excluding vowels • '%' is replaced with a random letter or digit, excluding vowels and anything that looks like another (il1, B8, O0, Z2). */
        public ?string $random_username_picture = null,
        /** The SSID of the wireless LAN, if applicable. This will appear on guest account print receipts. */
        public ?string $site_ssid = null,
        /** The WPA key for the wireless LAN, if applicable. This will appear on guest account print receipts. */
        public ?string $site_wpa_key = null,
    ) {}
}
