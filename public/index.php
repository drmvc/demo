<?php
// Set the full path to the docroot
define('DOCROOT', realpath(dirname(__FILE__)) . '/' . DIRECTORY_SEPARATOR);

$application = 'Application'; // Applcations specifed directory.
$modules = 'Modules'; // Modules location.
$system = 'System'; // System base classes location.

if (!is_dir($application) AND is_dir(DOCROOT . $application)) $application = DOCROOT . $application;
if (!is_dir($modules) AND is_dir(DOCROOT . $modules)) $modules = DOCROOT . $modules;
if (!is_dir($system) AND is_dir(DOCROOT . $system)) $system = DOCROOT . $system;

// Define the absolute paths for configured directories
define('APPPATH', realpath($application) . DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules) . DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system) . DIRECTORY_SEPARATOR);

// Clean up the configuration vars
unset($application, $modules, $system);

// Bootstrap the application
require SYSPATH . 'bootstrap.php';

// Load class
use System\Core\Request;
use System\Core\Session;

// Start session
Session::init();
// Render current page
Request::factory(true)->execute()->render();
