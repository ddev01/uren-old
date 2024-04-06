<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
    ->withPaths([__DIR__ . '/app', __DIR__ . '/bootstrap', __DIR__ . '/config', __DIR__ . '/public', __DIR__ . '/resources', __DIR__ . '/routes', __DIR__ . '/tests'])
    // uncomment to reach your current PHP version
    // ->withPhpSets()
    ->withSets([LaravelSetList::LARAVEL_110, SetList::DEAD_CODE, SetList::CODE_QUALITY, LevelSetList::UP_TO_PHP_81])
    ->withRules([AddVoidReturnTypeWhereNoReturnRector::class]);