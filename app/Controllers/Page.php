<?php namespace DrMVC\App\Controllers;

/**
 * Class Page
 * @package DrMVC\App\Controllers
 */
class Page extends Main
{
    /**
     * Page constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Action /page/index
     */
    public function action_index()
    {
        $data['title'] = $this->language->get('page');

        $this->view->render('templates/header');
        $this->view->render('page');
        $this->view->render('templates/footer');
    }

    /**
     * Action /page/another
     */
    public function action_another()
    {
        $data['title'] = $this->language->get('page_another');

        $this->view->render('templates/header');
        $this->view->render('page_another');
        $this->view->render('templates/footer');
    }

}
