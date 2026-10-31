<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A TacacsCommand record.
 */
readonly class TacacsCommand extends Data
{
    protected const LISTS = ['command_args' => TacacsCommandArgs::class];

    /**
     * @param  Collection<int, TacacsCommandArgs>|null  $command_args
     */
    public function __construct(
        /** Shell Command. */
        public ?string $command = null,
        /** List of Command Arguments. A collection of TacacsCommandArgs. */
        public ?Collection $command_args = null,
        /** Enable to permit unmatched arguments. */
        public ?bool $permit_unmatched_args = null,
    ) {}
}
