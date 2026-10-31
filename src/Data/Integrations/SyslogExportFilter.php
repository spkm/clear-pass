<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A SyslogExportFilter record.
 */
readonly class SyslogExportFilter extends Data
{
    /**
     * @param  array<int, string>|null  $syslog_servers
     * @param  array<int, string>|null  $cluster_servers
     * @param  array<int, string>|null  $selected_columns
     */
    public function __construct(
        /** Numeric id of syslog export filter. */
        public ?int $id = null,
        /** List of syslog servers for syslog export filter. */
        public ?array $syslog_servers = null,
        /** Name of syslog export filter. */
        public ?string $name = null,
        /** Export Template type for syslog export filter. One of: AuditRecords, InsightLogs, SessionLogs, AccountingLogs, Events. */
        public ?string $export_template = null,
        /** Export Event format type for syslog export filter. One of: Standard, Leef, Cef, RFC5424. */
        public ?string $export_event_format_type = null,
        /** Local Facility Level for syslog export filter. One of: LOCAL0, LOCAL1, LOCAL2, LOCAL3, LOCAL4, LOCAL5, LOCAL6, LOCAL7. */
        public ?string $local_facility_level = null,
        /** Status of syslog export filter. */
        public ?bool $enabled = null,
        /** List of ClearPass servers for syslog export filter. */
        public ?array $cluster_servers = null,
        /** Custom SQL for syslog export filter. */
        public ?string $custom_sql = null,
        /** Data Filter name for syslog export filter. */
        public ?string $data_filter = null,
        /** Description of syslog export filter. */
        public ?string $description = null,
        /** Field group name for syslog export filter. */
        public ?string $field_group_name = null,
        /** null. */
        public ?bool $include_audit_data = null,
        /** List of selected columns for syslog export filter. */
        public ?array $selected_columns = null,
    ) {}
}
