<?php namespace DrMVC\App\Controllers;

use DrMVC\Helpers\UUID;
use DrMVC\Helpers\Cleaner;
use DrMVC\App\Models\Example;

/**
 * Class Index
 * @package DrMVC\App\Controllers
 */
class Index extends Main
{
    /**
     * @var Example
     */
    public $_example;

    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Create test class
        $this->_example = new Example();
    }

    /**
     * Index page action
     */
    public function action_index()
    {
        // Page title
        $this->view->data['title'] = $this->language->get('index');

        // Simple examples how to work with methods
        $this->view->data['uuid'] = UUID::v4();
        $this->view->data['dummy'] = Cleaner::run('~!@#$%^&*()_+');

        // Render the templates
        $this->view->render('templates/header');
        $this->view->render('index');
        $this->view->render('templates/footer');
    }

}
