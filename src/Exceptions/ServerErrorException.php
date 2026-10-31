<?php

namespace spkm\ClearPass\Exceptions;

use spkm\ClearPass\ClearPassApiException;

/**
 * ClearPass failed (5xx, 408), or answered a success with something other than JSON.
 */
class ServerErrorException extends ClearPassApiException {}
