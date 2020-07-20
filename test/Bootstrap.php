<?php
/**
 * @copyright Copyright (c) 2014 Laminas Technologies USA Inc. (http://www.zend.com)
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace ApiSkeletonsTest\Doctrine\Hydrator\Strategy;

use Laminas\Loader\AutoloaderFactory;
use RuntimeException;

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);
date_default_timezone_set('utc');

/**
 * Test bootstrap, for setting up autoloading
 *
 * @subpackage UnitTest
 */
class Bootstrap
{
    protected static $serviceManager;

    public static function init()
    {
        static::initAutoloader();
    }

    protected static function initAutoloader()
    {
        $vendorPath = static::findParentPath('vendor');

        if (is_readable($vendorPath . '/autoload.php')) {
            $loader = include $vendorPath . '/autoload.php';
            return;
        }

        $laminasPath = getenv('LAMINAS_PATH') ?: (defined('LAMINAS_PATH') ? LAMINAS_PATH : (is_dir($vendorPath . '/LAMINAS/library') ? $vendorPath . '/LAMINAS/library' : false));

        if (!$laminasPath) {
            throw new RuntimeException('Unable to load LAMINAS. Run `php composer.phar install` or define a LAMINAS_PATH environment variable.');
        }

        if (isset($loader)) {
            $loader->add('Laminas', $laminasPath . '/Laminas');
        } else {
            include $laminasPath . '/Laminas/Loader/AutoloaderFactory.php';
            AutoloaderFactory::factory(array(
                'Laminas\Loader\StandardAutoloader' => array(
                    'autoregister_zf' => true,
                    'namespaces' => array(
                        'ApiSkeletons\OAuth2\Doctrine\Permissions\Acl' => __DIR__ . '/../src/',
                        __NAMESPACE__ => __DIR__,
                    ),
                ),
            ));
        }
    }

    protected static function findParentPath($path)
    {
        $dir = __DIR__;
        $previousDir = '.';
        while (!is_dir($dir . '/' . $path)) {
            $dir = dirname($dir);
            if ($previousDir === $dir) return false;
            $previousDir = $dir;
        }
        return $dir . '/' . $path;
    }
}

Bootstrap::init();
