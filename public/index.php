<?php

ini_set('memory_limit', '-1');

// Enable autoloader
include __DIR__ . "/../vendor/autoload.php";

// Application and system paths
$apppath = __DIR__ . '/../app';
$syspath = __DIR__ . '/../vendor/drmvc/framework';

// Include framework bootstrap
include $syspath . "/bootstrap.php";

// Load class
use DrMVC\Core\Session;
use DrMVC\Core\Request;

// Start session
Session::init();

// Render current page
Request::factory(true)->execute()->render();
