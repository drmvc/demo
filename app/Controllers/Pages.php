<?php

namespace MyApp\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Pages extends View
{
    public function action_index(Request $request, Response $response, $args)
    {
        $response->getBody()->write('index');
    }

    public function action_other(Request $request, Response $response, $args)
    {
        $response->getBody()->write('other');
    }

    public function action_page1(Request $request, Response $response, $args)
    {
        $response->getBody()->write('page1');
    }

    public function action_page2(Request $request, Response $response, $args)
    {
        $response->getBody()->write('page2');
    }

}
