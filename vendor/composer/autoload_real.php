<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4c4684bb30f1ebe8188c176a4f8121af
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit4c4684bb30f1ebe8188c176a4f8121af', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit4c4684bb30f1ebe8188c176a4f8121af', 'loadClassLoader'));

        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        if ($useStaticLoader) {
            require_once __DIR__ . '/autoload_static.php';

            call_user_func(\Composer\Autoload\ComposerStaticInit4c4684bb30f1ebe8188c176a4f8121af::getInitializer($loader));
        } else {
            $map = require __DIR__ . '/autoload_namespaces.php';
            foreach ($map as $namespace => $path) {
                $loader->set($namespace, $path);
            }

            $map = require __DIR__ . '/autoload_psr4.php';
            foreach ($map as $namespace => $path) {
                $loader->setPsr4($namespace, $path);
            }

            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

        spl_autoload_register(array('ComposerAutoloaderInit4c4684bb30f1ebe8188c176a4f8121af', 'autoload'), true, true);

        $loader->register(true);

        if ($useStaticLoader) {
            $includeFiles = Composer\Autoload\ComposerStaticInit4c4684bb30f1ebe8188c176a4f8121af::$files;
        } else {
            $includeFiles = require __DIR__ . '/autoload_files.php';
        }
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire4c4684bb30f1ebe8188c176a4f8121af($fileIdentifier, $file);
        }

        return $loader;
    }

    public static function autoload($class)
    {
        $dir = dirname(dirname(__DIR__)) . '/';
        $prefixes = array('Oro\\Bundle\\CacheBundle');
        foreach ($prefixes as $prefix) {
            if (0 !== strpos($class, $prefix)) {
                continue;
            }
            $path = $dir . implode('/', array_slice(explode('\\', $class), 3)).'.php';
            if (!$path = stream_resolve_include_path($path)) {
                return false;
            }
            require $path;

            return true;
        }
    }
}

function composerRequire4c4684bb30f1ebe8188c176a4f8121af($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        require $file;

        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
    }
}
