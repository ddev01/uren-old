<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/public',
        __DIR__ . '/resources',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
    ])
    ->withSets([
        LaravelSetList::LARAVEL_110,
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_83,
    ])
    ->withRules([
        AddVoidReturnTypeWhereNoReturnRector::class,
    ])
    ->withSkip([
        // Skipping specific Rector rules
        RectorLaravel\Rector\StaticCall\RouteActionCallableRector::class,
        Rector\CodeQuality\Rector\Array_\CallableThisArrayToAnonymousFunctionRector::class,
        Rector\Php70\Rector\StaticCall\StaticCallOnNonStaticToInstanceCallRector::class,
        Rector\Php81\Rector\Array_\FirstClassCallableRector::class,

        // Skipping specific files
        __DIR__ . '/_ide_helper.php',
        __DIR__ . '/_ide_helper_models.php',
        __DIR__ . '/.phpstorm.meta.php',
    ]);
