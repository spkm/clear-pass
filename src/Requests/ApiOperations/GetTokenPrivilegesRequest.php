<?php

namespace spkm\ClearPass\Requests\ApiOperations;

/**
 * The first version's request for the token's privileges: GET /oauth/privileges.
 *
 * @deprecated Use ApiOperations\TokenPrivileges\GetTokenPrivilegesRequest (or ClearPass::apiOperations()->tokenPrivileges()).
 */
class GetTokenPrivilegesRequest extends TokenPrivileges\GetTokenPrivilegesRequest {}
