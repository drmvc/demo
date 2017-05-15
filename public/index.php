<?php
// Enable autoloader
include __DIR__ . "/../vendor/autoload.php";

// Set the application directory
$apppath = '../app/';

// Define the absolute paths for configured directories
define('DOCROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('APPPATH', realpath($apppath) . DIRECTORY_SEPARATOR);
define('SYSPATH', realpath(__DIR__) . DIRECTORY_SEPARATOR);

// Default configurations
DrMVC\Core\Config::load('config');

// Apply routes
DrMVC\Core\Config::load('routes');

// Start session
DrMVC\Core\Session::init();

// Render current page
DrMVC\Core\Request::factory(true)->execute()->render();
