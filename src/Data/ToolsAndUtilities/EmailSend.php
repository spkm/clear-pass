<?php

namespace spkm\ClearPass\Data\ToolsAndUtilities;

use spkm\ClearPass\Data\Data;

/**
 * A EmailSend record.
 */
readonly class EmailSend extends Data
{
    /**
     * @param  array<string, mixed>|null  $to
     * @param  array<string, mixed>|null  $bcc_recipients
     * @param  array<string, mixed>|null  $cc_recipients
     * @param  array<string, mixed>|null  $headers
     */
    public function __construct(
        /** List of Recipients Email Address (e.g., ["a@example.com", "b@example.com"]). */
        public ?array $to = null,
        /** Email Body. */
        public ?string $message = null,
        /** List of BCC recipients Email Address (e.g., ["a@example.com", "b@example.com"]). */
        public ?array $bcc_recipients = null,
        /** List of CC recipients Email Address (e.g., ["a@example.com", "b@example.com"]). */
        public ?array $cc_recipients = null,
        /** Email headers (e.g., {"Content-Type":"text/plain; charset=UTF-8","Content-Transfer-Encoding": "8bit"}). */
        public ?array $headers = null,
        /** Email Subject. */
        public ?string $subject = null,
    ) {}
}
