<?php

namespace MyApp\Controllers;

class View
{
    protected $view;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Views/');
        $this->view = new \Twig_Environment($loader);
    }
}
