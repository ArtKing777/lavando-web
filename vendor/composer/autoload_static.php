<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit327ae0b208c34e901caf2ebaddef3a51
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit327ae0b208c34e901caf2ebaddef3a51::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit327ae0b208c34e901caf2ebaddef3a51::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit327ae0b208c34e901caf2ebaddef3a51::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}