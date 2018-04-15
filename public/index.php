<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Config instance
$config = new \DrMVC\Config();

// Application instance
$app = new \DrMVC\App($config);

// Set routes
$app
    ->get('/', \MyApp\Controllers\Index::class)
    ->get('/dynamic/<action>', \MyApp\Controllers\Pages::class)
    ->get('/static/', \MyApp\Controllers\Pages::class . ':page1')
    ->get('/static/other', \MyApp\Controllers\Pages::class . ':page2');

// Run worker
echo $app->run();
