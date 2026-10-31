<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogTarget;

use spkm\ClearPass\Data\Integrations\SyslogTarget;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of syslog target: GET /syslog-target.
 */
class GetSyslogTargetsRequest extends ListRequest
{
    protected ?string $dto = SyslogTarget::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-target';
    }
}
