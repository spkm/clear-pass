<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A CLISettings record.
 */
readonly class CLISettings extends Data
{
    public function __construct(
        /** Command prompt regex of the network device. */
        public ?string $command_prompt_regex = null,
        /** Enable password of the network device. */
        public ?string $enable_password = null,
        /** Enable prompt regex of the network device. */
        public ?string $enable_prompt_regex = null,
        /** Password of the network device. */
        public ?string $password = null,
        /** Password prompt regex of the network device. */
        public ?string $password_prompt_regex = null,
        /** SSH/Telnet port number of the network device. */
        public ?int $port = null,
        /** Access type of the network device. One of: SSH, Telnet. */
        public ?string $type = null,
        /** Username of the network device. */
        public ?string $username = null,
        /** Username prompt regex of the network device. */
        public ?string $username_prompt_regex = null,
    ) {}
}
