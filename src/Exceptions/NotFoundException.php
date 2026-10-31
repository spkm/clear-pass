<?php

namespace spkm\ClearPass\Exceptions;

use spkm\ClearPass\ClearPassApiException;

/**
 * ClearPass has no record at the path (404).
 */
class NotFoundException extends ClearPassApiException {}
