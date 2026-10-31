<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\ClearPassService;
use spkm\ClearPass\ClearPassServiceProvider;
use spkm\ClearPass\Facades\ClearPass;
use spkm\ClearPass\Tests\Fixtures\ExampleListRequest;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

it('binds the service as a singleton behind the facade', function () {
    expect(app('clearpass'))->toBeInstanceOf(ClearPassService::class)
        ->and(app('clearpass'))->toBe(app('clearpass'))
        ->and(ClearPass::getFacadeRoot())->toBe(app('clearpass'));
});

it('loads the config with its environment names', function () {
    expect(config('clearpass'))->toHaveKeys(['base_url', 'client_id', 'client_secret', 'connections', 'timeouts', 'retries', 'reauthenticate', 'cache', 'pagination'])
        ->and(config('clearpass.pagination.per_page'))->toBe(100)
        ->and(file_get_contents(__DIR__.'/../../config/clearpass.php'))->toContain("env('CLEAR_PASS_BASE_URL')", "env('CLEAR_PASS_ID')", "env('CLEAR_PASS_SECRET')", "env('CLEAR_PASS_RETRIES')", "env('CLEAR_PASS_CACHE', false)");
});

it('registers the install command and the config to publish', function () {
    $paths = ServiceProvider::pathsToPublish(ClearPassServiceProvider::class, 'clearpass-config');

    expect(Artisan::all())->toHaveKey('clearpass:install')
        ->and($paths)->toHaveCount(1)
        ->and(realpath((string) array_key_first($paths)))->toBe(realpath(__DIR__.'/../../config/clearpass.php'))
        ->and(array_values($paths)[0])->toBe(config_path('clearpass.php'));
});

it('builds the default connector from config the first time it is used', function () {
    config()->set('clearpass.base_url', 'https://clearpass.school.test/');
    config()->set('clearpass.client_id', 'id');
    config()->set('clearpass.client_secret', 'secret');
    $mockClient = FakeClearPass::respondWithToken([ExampleListRequest::class => FakeClearPass::list([])]);

    ClearPass::send(new ExampleListRequest);

    expect(FakeClearPass::received($mockClient, ExampleListRequest::class)->getUrl())->toBe('https://clearpass.school.test/api/example')
        ->and(FakeClearPass::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer issued-token');
});

it('says which setting the default connection is missing', function (string $setting) {
    config()->set('clearpass.base_url', 'https://clearpass.school.test');
    config()->set('clearpass.client_id', 'id');
    config()->set('clearpass.client_secret', 'secret');
    config()->set("clearpass.$setting", '');

    expect(fn () => ClearPass::send(new ExampleListRequest))->toThrow(InvalidArgumentException::class, "The default ClearPass connection needs a $setting.");
})->with(['base_url', 'client_id', 'client_secret']);

it('gives a named connection its own connector, once', function () {
    config()->set('clearpass.connections.other', ['base_url' => 'https://other.test', 'client_id' => 'other', 'client_secret' => 'other-secret']);

    $connection = ClearPass::connection('other');

    expect($connection)->toBeInstanceOf(ClearPassConnector::class)
        ->and($connection->resolveBaseUrl())->toBe('https://other.test/api')
        ->and(ClearPass::connection('other'))->toBe($connection)
        ->and(fn () => ClearPass::connection('missing'))->toThrow(InvalidArgumentException::class, 'No ClearPass connection named "missing"');

    config()->set('clearpass.connections.broken', ['base_url' => 'https://x.test', 'client_id' => 'x']);
    expect(fn () => ClearPass::connection('broken'))->toThrow(InvalidArgumentException::class, 'The ClearPass connection "broken" needs a client_secret.');
});

it('refuses a method the connector does not have', function () {
    config()->set('clearpass.base_url', 'https://clearpass.school.test');
    config()->set('clearpass.client_id', 'id');
    config()->set('clearpass.client_secret', 'secret');

    expect(fn () => ClearPass::nothing())->toThrow(BadMethodCallException::class, 'Method nothing does not exist.');
});
