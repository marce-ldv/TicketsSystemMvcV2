<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb854553bf0a8dc2395a001fa9529e37c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb854553bf0a8dc2395a001fa9529e37c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb854553bf0a8dc2395a001fa9529e37c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
