<?php
require_once __DIR__ . '/../vendor/autoload.php';

$config = new \DrMVC\Config();
$config->load(__DIR__ . '/../app/database.php', 'database');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \DrMVC\App($config);
$app
    ->get('/', \MyApp\Controllers\Index::class)
    ->get('/zzz', \MyApp\Controllers\Index::class)
    ->get('/zzz/<action>', \MyApp\Controllers\Index::class)
    ->get('/aaa', function(Request $request, Response $response, $args) {
        print_r($args);
    });

echo $app->run();
