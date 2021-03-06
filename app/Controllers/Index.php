<?php

namespace MyApp\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Index extends View
{
    public function action_index(Request $request, Response $response, $args)
    {
        $out = $this->view->render('pages/index.twig');
        $response->getBody()->write($out);
    }
}
