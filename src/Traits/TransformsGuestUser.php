<?php

namespace spkm\ClearPass\Traits;

trait TransformsGuestUser
{
    protected function transformGuestUser(): array
    {
        if (! isset($this->guestUser)) {
            throw new \RuntimeException('Property "guestUser" is not set in the consuming class.');
        }

        return [
            'create_time' => $this->guestUser->create_time->timestamp,
            'custom_fields' => $this->guestUser->custom_fields,
            'do_expire' => $this->guestUser->do_expire,
            'email' => $this->guestUser->email,
            'enabled' => $this->guestUser->enabled,
            'expire_time' => $this->guestUser->expire_time->timestamp,
            'id' => $this->guestUser->id,
            'mac' => $this->guestUser->mac,
            'notes' => $this->guestUser->notes,
            'password' => $this->guestUser->password,
            'role_id' => $this->guestUser->role_id,
            'role_name' => $this->guestUser->role_name,
            'simultaneous_use' => $this->guestUser->simultaneous_use,
            'sponsor_email' => $this->guestUser->sponsor_email,
            'sponsor_name' => $this->guestUser->sponsor_name,
            'sponsor_profile' => $this->guestUser->sponsor_profile,
            'start_time' => $this->guestUser->start_time->timestamp,
            'username' => $this->guestUser->username,
            'visitor_company' => $this->guestUser->visitor_company,
            'visitor_name' => $this->guestUser->visitor_name,
            'visitor_phone' => $this->guestUser->visitor_phone,
        ];
    }
}
