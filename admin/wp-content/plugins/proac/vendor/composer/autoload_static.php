<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit994b2b1abb4f2787dae0a4e36a0ff372
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'ProAc\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ProAc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit994b2b1abb4f2787dae0a4e36a0ff372::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit994b2b1abb4f2787dae0a4e36a0ff372::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}