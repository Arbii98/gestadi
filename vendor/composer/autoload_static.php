<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9fa0665949dad73e34c7426f2cbf7661
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpOffice\\PhpWord\\' => 18,
        ),
        'L' => 
        array (
            'Laminas\\Escaper\\' => 16,
        ),
        'G' => 
        array (
            'Gestadi\\Gestadi\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpword/src/PhpWord',
        ),
        'Laminas\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-escaper/src',
        ),
        'Gestadi\\Gestadi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9fa0665949dad73e34c7426f2cbf7661::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9fa0665949dad73e34c7426f2cbf7661::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9fa0665949dad73e34c7426f2cbf7661::$classMap;

        }, null, ClassLoader::class);
    }
}