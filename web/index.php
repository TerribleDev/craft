<?php
/**
 * Craft web bootstrap file
 */

// Define path constants
define('CRAFT_BASE_PATH', dirname(__DIR__));
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH . '/vendor');

// Load Composer's autoloader
require_once CRAFT_VENDOR_PATH . '/autoload.php';

// Load dotenv?
if (class_exists('Dotenv\Dotenv') && file_exists(CRAFT_BASE_PATH . '/.env')) {
    Dotenv\Dotenv::create(CRAFT_BASE_PATH)->load();
}

// Define additional PHP constants
// (see https://craftcms.com/docs/3.x/config/#php-constants)
define('CRAFT_ENVIRONMENT', getenv('ENVIRONMENT') ?: 'production');
define('CRAFT_LICENSE_KEY', getenv('CRAFT_LICENSE_KEY'));
define('CRAFT_STORAGE_PATH', getenv('CRAFT_STORAGE_PATH') ?: '../storage');
// ...

// Load and run Craft
/** @var craft\web\Application $app */
$app = require CRAFT_VENDOR_PATH . '/craftcms/cms/bootstrap/web.php';
$app->run();
