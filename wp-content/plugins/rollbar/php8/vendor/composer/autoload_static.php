<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite4a2fe4d5128497f90c12b222e9741d0
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rollbar\\Wordpress\\Tests\\' => 24,
            'Rollbar\\Wordpress\\' => 18,
            'Rollbar\\' => 8,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
            'Michelf\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rollbar\\Wordpress\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../tests',
        ),
        'Rollbar\\Wordpress\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../src',
        ),
        'Rollbar\\' => 
        array (
            0 => __DIR__ . '/..' . '/rollbar/rollbar/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Michelf\\' => 
        array (
            0 => __DIR__ . '/..' . '/michelf/php-markdown/Michelf',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite4a2fe4d5128497f90c12b222e9741d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite4a2fe4d5128497f90c12b222e9741d0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite4a2fe4d5128497f90c12b222e9741d0::$classMap;

        }, null, ClassLoader::class);
    }
}
