<?php

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\ClearPassService;
use spkm\ClearPass\Facades\ClearPass;
use spkm\ClearPass\Resources\HasResources;

it('hints every resource group and every public connector method for the IDE', function () {
    $docblock = (string) (new ReflectionClass(ClearPass::class))->getDocComment();
    $resources = array_map(fn (ReflectionMethod $method) => $method->getName(), (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));
    $service = array_map(fn (ReflectionMethod $method) => $method->getName(), array_filter((new ReflectionClass(ClearPassService::class))->getMethods(ReflectionMethod::IS_PUBLIC), fn (ReflectionMethod $method) => ! str_starts_with($method->getName(), '__')));
    $connector = ['send', 'paginate', 'from', 'get', 'post', 'put', 'patch', 'delete'];

    expect($resources)->not->toBeEmpty();

    foreach ([...$resources, ...$service, ...$connector] as $method) {
        expect($docblock)->toContain(" $method(");
    }

    foreach ($connector as $method) {
        expect(method_exists(ClearPassConnector::class, $method))->toBeTrue();
    }
});
