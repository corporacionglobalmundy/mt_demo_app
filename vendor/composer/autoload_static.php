<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fdcf788de11a4f77a9eba3ec252768a
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MagicTelecomAPILib\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MagicTelecomAPILib\\' => 
        array (
            0 => __DIR__ . '/..' . '/magictelecom/magictelecomapi/src',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/',
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest' => 
            array (
                0 => __DIR__ . '/..' . '/apimatic/unirest-php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fdcf788de11a4f77a9eba3ec252768a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fdcf788de11a4f77a9eba3ec252768a::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit0fdcf788de11a4f77a9eba3ec252768a::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0fdcf788de11a4f77a9eba3ec252768a::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
