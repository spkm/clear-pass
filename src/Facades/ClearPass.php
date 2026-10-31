<?php

namespace spkm\ClearPass\Facades;

use Illuminate\Support\Facades\Facade;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\ClearPassPaginator;
use spkm\ClearPass\ClearPassService;
use spkm\ClearPass\Query\Builder;

/**
 * @method static \spkm\ClearPass\Resources\ApiOperations\ApiOperationsResources apiOperations()
 * @method static \spkm\ClearPass\Resources\CertificateAuthority\CertificateAuthorityResources certificateAuthority()
 * @method static \spkm\ClearPass\Resources\EndpointVisibility\EndpointVisibilityResources endpointVisibility()
 * @method static \spkm\ClearPass\Resources\EnforcementProfile\EnforcementProfileResources enforcementProfile()
 * @method static \spkm\ClearPass\Resources\GlobalServerConfiguration\GlobalServerConfigurationResources globalServerConfiguration()
 * @method static \spkm\ClearPass\Resources\GuestActions\GuestActionsResources guestActions()
 * @method static \spkm\ClearPass\Resources\GuestConfiguration\GuestConfigurationResources guestConfiguration()
 * @method static \spkm\ClearPass\Resources\Identities\IdentitiesResources identities()
 * @method static \spkm\ClearPass\Resources\Insight\InsightResources insight()
 * @method static \spkm\ClearPass\Resources\Integrations\IntegrationsResources integrations()
 * @method static \spkm\ClearPass\Resources\LocalServerConfiguration\LocalServerConfigurationResources localServerConfiguration()
 * @method static \spkm\ClearPass\Resources\Logs\LogsResources logs()
 * @method static \spkm\ClearPass\Resources\PlatformCertificates\PlatformCertificatesResources platformCertificates()
 * @method static \spkm\ClearPass\Resources\PolicyElements\PolicyElementsResources policyElements()
 * @method static \spkm\ClearPass\Resources\SessionControl\SessionControlResources sessionControl()
 * @method static \spkm\ClearPass\Resources\ToolsAndUtilities\ToolsAndUtilitiesResources toolsAndUtilities()
 * @method static ClearPassConnector connection(string $name)
 * @method static Response send(Request $request)
 * @method static ClearPassPaginator paginate(Request $request, ?int $perPage = null)
 * @method static Builder<\spkm\ClearPass\Data\Data> from(string $path)
 * @method static Response get(string $path, array<string, mixed> $query = [])
 * @method static Response post(string $path, array<string, mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static Response put(string $path, array<string, mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static Response patch(string $path, array<string, mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static Response delete(string $path, array<string, mixed> $query = [])
 *
 * @see ClearPassService
 * @see ClearPassConnector
 */
class ClearPass extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'clearpass';
    }
}
