<?php

namespace spkm\ClearPass\Resources\CertificateAuthority;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\CertificateAuthority\OnboardUser;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\CertificateAuthority\OnboardUser\DeleteOnboardUserRequest;
use spkm\ClearPass\Requests\CertificateAuthority\OnboardUser\GetOnboardUserRequest;
use spkm\ClearPass\Requests\CertificateAuthority\OnboardUser\GetOnboardUsersRequest;
use spkm\ClearPass\Requests\CertificateAuthority\OnboardUser\UpdateOnboardUserRequest;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Onboard users, from ClearPass::certificateAuthority()->onboardUsers().
 *
 * @extends Builder<OnboardUser>
 */
class OnboardUserResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, OnboardUser::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetOnboardUsersRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetOnboardUserRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateOnboardUserRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteOnboardUserRequest($id, $options);
    }
}
