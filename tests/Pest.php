<?php

use Saloon\Config;
use spkm\ClearPass\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| Every test boots the package in Testbench with an array cache. No request may reach a real ClearPass: anything
| sent without a mock client throws a StrayRequestException. Fake ClearPass with Tests\Helpers\FakeClearPass.
|
*/

Config::preventStrayRequests();

pest()->extend(TestCase::class)->in('Feature', 'Spec');
