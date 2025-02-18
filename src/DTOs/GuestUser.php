<?php

namespace spkm\ClearPass\DTOs;

use Carbon\Carbon;
use InvalidArgumentException;
use spkm\ClearPass\Enums\GuestUserExpirationAction;

class GuestUser
{
    public function __construct(
        public int $role_id,
        public string $username,
        public string $password,
        public Carbon $start_time,
        public Carbon $expire_time,
        public string $sponsor_name,
        public string $sponsor_profile,
        public bool $enabled,
        public array $custom_fields = [],
        public ?int $id = null,
        public ?Carbon $create_time = null,
        public ?string $role_name = null,
        public ?GuestUserExpirationAction $do_expire = null,
        public ?string $email = null,
        public ?string $mac = null,
        public ?string $notes = null,
        public ?int $simultaneous_use = null,
        public ?string $sponsor_email = null,
        public ?string $visitor_company = null,
        public ?string $visitor_name = null,
        public ?string $visitor_phone = null
    ) {
        // Enforce password length constraint
        if (strlen($this->password) > 64) {
            throw new InvalidArgumentException('Password must not exceed 64 characters.');
        }
    }
}
