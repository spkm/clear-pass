<?php

namespace spkm\ClearPass\Exceptions;

/**
 * ClearPass rejected the record sent (422); validationMessages() says which fields and why.
 */
class ValidationException extends InvalidRequestException {}
