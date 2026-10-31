<?php

namespace spkm\ClearPass\DTOs;

use Carbon\Carbon;
use InvalidArgumentException;
use JsonSerializable;
use spkm\ClearPass\Enums\GuestUserExpirationAction;

/**
 * A guest account to create or change, as the package's first version took it. It serialises to the body
 * ClearPass expects, with times as Unix timestamps, so it can be given to any guest account request. New code can
 * use Data\Identities\GuestUser, the model those requests return, instead.
 */
class GuestUser implements JsonSerializable
{
    /**
     * @param  array<string, mixed>  $custom_fields
     */
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
        public ?string $current_state = null,
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
        if (strlen($this->password) > 64) {
            throw new InvalidArgumentException('Password must not exceed 64 characters.');
        }
    }

    /**
     * The account as ClearPass takes it: every field, with times as Unix timestamps.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'create_time' => $this->create_time?->timestamp,
            'custom_fields' => $this->custom_fields,
            'do_expire' => $this->do_expire?->value,
            'email' => $this->email,
            'enabled' => $this->enabled,
            'expire_time' => $this->expire_time->timestamp,
            'id' => $this->id,
            'mac' => $this->mac,
            'notes' => $this->notes,
            'password' => $this->password,
            'role_id' => $this->role_id,
            'role_name' => $this->role_name,
            'simultaneous_use' => $this->simultaneous_use,
            'sponsor_email' => $this->sponsor_email,
            'sponsor_name' => $this->sponsor_name,
            'sponsor_profile' => $this->sponsor_profile,
            'start_time' => $this->start_time->timestamp,
            'username' => $this->username,
            'visitor_company' => $this->visitor_company,
            'visitor_name' => $this->visitor_name,
            'visitor_phone' => $this->visitor_phone,
        ];
    }
}
