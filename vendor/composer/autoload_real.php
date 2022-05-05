<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit56b378ea7e3631e26ec92ce04e2e2080
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit56b378ea7e3631e26ec92ce04e2e2080', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit56b378ea7e3631e26ec92ce04e2e2080', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit56b378ea7e3631e26ec92ce04e2e2080::getInitializer($loader)();

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit56b378ea7e3631e26ec92ce04e2e2080::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire56b378ea7e3631e26ec92ce04e2e2080($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire56b378ea7e3631e26ec92ce04e2e2080($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
