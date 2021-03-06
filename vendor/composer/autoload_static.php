<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite016d50c48632790d6927c8affcd886f
{
    public static $files = array (
        '948ad5488880985ff1c06721a4e447fe' => __DIR__ . '/..' . '/cakephp/utility/bootstrap.php',
        '72142d7b40a3a0b14e91825290b5ad82' => __DIR__ . '/..' . '/cakephp/core/functions.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        '028fdea3165c4ba1ecccc83b7fec69fc' => __DIR__ . '/..' . '/cakephp/collection/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Slim\\Views\\' => 11,
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'C' => 
        array (
            'Cake\\Validation\\' => 16,
            'Cake\\Utility\\' => 13,
            'Cake\\ORM\\' => 9,
            'Cake\\Event\\' => 11,
            'Cake\\Datasource\\' => 16,
            'Cake\\Database\\' => 14,
            'Cake\\Core\\' => 10,
            'Cake\\Collection\\' => 16,
        ),
        'B' => 
        array (
            'Boom\\' => 5,
        ),
        'A' => 
        array (
            'Apps\\' => 5,
            'Admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Slim\\Views\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/php-view/src',
        ),
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Cake\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/validation',
        ),
        'Cake\\Utility\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/utility',
        ),
        'Cake\\ORM\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/orm',
        ),
        'Cake\\Event\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/event',
        ),
        'Cake\\Datasource\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/datasource',
        ),
        'Cake\\Database\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/database',
        ),
        'Cake\\Core\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/core',
        ),
        'Cake\\Collection\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/collection',
        ),
        'Boom\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Boom',
        ),
        'Apps\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Apps',
        ),
        'Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Admin',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite016d50c48632790d6927c8affcd886f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite016d50c48632790d6927c8affcd886f::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite016d50c48632790d6927c8affcd886f::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
