<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd1601ca25af03239db5a90eafbb20694
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'ProductImport\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ProductImport\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd1601ca25af03239db5a90eafbb20694::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd1601ca25af03239db5a90eafbb20694::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
