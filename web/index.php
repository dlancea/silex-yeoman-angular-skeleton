<?php
/**
 * Front Controller
 */

namespace AppName;

/*
 *  App setup
 */
require_once __DIR__ . '/../vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request;

$app = new \Silex\Application();

// Set root path
$app['root_path'] = realpath(__DIR__ . '/../');

// Get configuration settings
$app['config'] = include $app['root_path'] . '/app/config/config.php';

// Setup services and misc application level settings
\AppName\Bootstrap::setup($app);

// Create Routes
include $app['root_path'] . '/app/config/routes.php';


/*
 *  Run application
 */
$app->run();


class AppNameException extends \Exception{}
class AppNameNoRecordException extends AppNameException{}
