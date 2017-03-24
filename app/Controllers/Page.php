<?php namespace DrMVC\App\Controllers;

use DrMVC\Core\Controller;
use DrMVC\Core\View;

/**
 * Class Page
 * @package Application\Controllers
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

        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;

        $data['lng'] = $this->language;

        $this->view->render('templates/header', $data);
        $this->view->render('page', $data);
        $this->view->render('templates/footer', $data);
    }

    /**
     * Action /page/another
     */
    public function action_another()
    {
        $data['title'] = $this->language->get('page_another');

        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;

        $data['lng'] = $this->language;

        $this->view->render('templates/header', $data);
        $this->view->render('page_another', $data);
        $this->view->render('templates/footer', $data);
    }

}
