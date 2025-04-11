<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit40aa654f2e66c20881ae0572fe987a10
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
        'P' => 
        array (
            'Prath\\TourIndiaBackend\\' => 23,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'Prath\\TourIndiaBackend\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit40aa654f2e66c20881ae0572fe987a10::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit40aa654f2e66c20881ae0572fe987a10::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit40aa654f2e66c20881ae0572fe987a10::$classMap;

        }, null, ClassLoader::class);
    }
}
