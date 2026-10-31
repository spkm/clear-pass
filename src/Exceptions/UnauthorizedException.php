<?php

namespace spkm\ClearPass\Exceptions;

use spkm\ClearPass\ClearPassApiException;

/**
 * ClearPass refused the token or the client lacks the privilege for the operation (401, 403).
 */
class UnauthorizedException extends ClearPassApiException {}
