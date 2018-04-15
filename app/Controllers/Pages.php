<?php

namespace MyApp\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Pages extends View
{
    public function action_index(Request $request, Response $response, $args)
    {
        $out = $this->view->render('pages/page_index.twig');
        $response->getBody()->write($out);
    }

    public function action_other(Request $request, Response $response, $args)
    {
        $out = $this->view->render('pages/page_other.twig');
        $response->getBody()->write($out);
    }

    public function action_page1(Request $request, Response $response, $args)
    {
        $out = $this->view->render('pages/page_page1.twig');
        $response->getBody()->write($out);
    }

    public function action_page2(Request $request, Response $response, $args)
    {
        $out = $this->view->render('pages/page_page2.twig');
        $response->getBody()->write($out);
    }

}
