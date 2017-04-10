<?php namespace DrMVC\App\Controllers;

use DrMVC\Helpers\UUID;
use DrMVC\Helpers\Cleaner;
use DrMVC\App\Models\Example;

/**
 * Class Index
 * @package Application\Controllers
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
        // Store all data into array variable
        $this->view->data = array(
            // Page title
            'title' => $this->language->get('index'),

            // Add styles and scripts
            'styles_vendor' => $this->styles_vendor,
            'scripts_vendor' => $this->scripts_vendor,
            'styles' => $this->styles,
            'scripts' => $this->scripts,

            // Append the language
            'lng' => $this->language,

            // Generate the uuid
            'uuid' => UUID::v4()
        );

        // Simple cleaning
        $this->view->data['dummy'] = Cleaner::run('~!@#$%^&*()_+');

        // Render the templates
        $this->view->render('templates/header');
        $this->view->render('index');
        $this->view->render('templates/footer');
    }

}
