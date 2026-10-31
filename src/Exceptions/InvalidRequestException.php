<?php

namespace spkm\ClearPass\Exceptions;

use spkm\ClearPass\ClearPassApiException;

/**
 * ClearPass could not accept the request (400, 406, 415, or a 422 that is a ValidationException).
 */
class InvalidRequestException extends ClearPassApiException {}
