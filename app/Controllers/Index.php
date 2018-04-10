<?php

namespace MyApp\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Index
{
    public function action_index(Request $request, Response $response, $args)
    {
        $out = [
            'dummy',
            'array'
        ];

        $json = json_encode($out);
        header('Content-Type: application/json');
        $response->getBody()->write($json);
    }
}
