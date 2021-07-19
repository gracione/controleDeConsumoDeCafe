<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita31dbd69e9b905cd160fe0de840ed0e4
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita31dbd69e9b905cd160fe0de840ed0e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita31dbd69e9b905cd160fe0de840ed0e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita31dbd69e9b905cd160fe0de840ed0e4::$classMap;

        }, null, ClassLoader::class);
    }
}
