<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3ff21cc0e1c1643c8b2d55d3f9e24d93
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

        spl_autoload_register(array('ComposerAutoloaderInit3ff21cc0e1c1643c8b2d55d3f9e24d93', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3ff21cc0e1c1643c8b2d55d3f9e24d93', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit3ff21cc0e1c1643c8b2d55d3f9e24d93::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}
