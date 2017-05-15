<?php namespace DrMVC\App\Controllers;

/**
 * Class Error
 * @package DrMVC\App\Controllers
 */
class Error extends Main
{
    /**
     * Error constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function action_index()
    {
        $this->view->data['title'] = '404';

        $this->view->render('templates/header');
        $this->view->render('error');
        $this->view->render('templates/footer');
    }
}