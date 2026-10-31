<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A TacacsCommandConfig record.
 */
readonly class TacacsCommandConfig extends Data
{
    protected const LISTS = ['commands' => TacacsCommand::class];

    /**
     * @param  Collection<int, TacacsCommand>|null  $commands
     */
    public function __construct(
        /** Specify which commands with arguments are permitted/denied. A collection of TacacsCommand. */
        public ?Collection $commands = null,
        /** Enable to permit unmatched commands. */
        public ?bool $permit_unmatched_cmds = null,
        /** Service Type. One of: Shell, PIX Shell. */
        public ?string $service_type = null,
    ) {}
}
