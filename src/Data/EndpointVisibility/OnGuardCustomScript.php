<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A OnGuardCustomScript record.
 */
readonly class OnGuardCustomScript extends Data
{
    /**
     * @param  array<string, mixed>|null  $attributes
     * @param  array<string, mixed>|null  $output_details
     * @param  array<string, mixed>|null  $rules
     */
    public function __construct(
        /** Name of Custom Script. */
        public ?string $name = null,
        /** OS Type of Custom Script. One of: linux, macos, windows. */
        public ?string $os_type = null,
        /** Type of Custom Script. One of: agentScriptEnforcementProfile, autoRemediation, healthCollection. */
        public ?string $script_type = null,
        /** Attributes of Custom Script, allowed attributes - Path,Command,SHA256,ExecutionLevel,WaitTime,PassResults,SuccessMsg,FailureMsg,ProgressMsg,Description,DownloadURL,ValidateURLCert,ScriptExecutionTimeOut,SignerName (e.g. {"Path": "/home/aruba/scripts","SHA256": "cfd6...f7ca","ExecutionLevel": "User","Command": "runscript.sh","SignerName": "signer"}). */
        public ?array $attributes = null,
        /** Description of Custom Script. */
        public ?string $description = null,
        /** Numeric ID of Custom Script. */
        public ?int $id = null,
        /** Output Details of Custom Script, applicable only for health collection scripts (e.g. {"ExitCode":"Integer", "OutVar1":"Boolean", "OutVar2":"String"}). */
        public ?array $output_details = null,
        /** Output Format of Custom Script, applicable only for health collection scripts. One of: json, keyValuePair. */
        public ?string $output_format = null,
        /** Rule Evaluation Algorithm for rules of Custom Script, applicable only for health collection scripts. One of: first-applicable, evaluate-all. */
        public ?string $rule_eval_algo = null,
        /** List of Rules for Custom Script, applicable only for health collection scripts (e.g. [{"match_type":"OR","health_status":"Healthy","condition":[{"type":"Script","name":"ExitCode","oper":"EQUALS","value":"0"}]}]). */
        public ?array $rules = null,
    ) {}
}
