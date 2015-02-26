<?php
namespace Gongongo\Controller;

use \Gongo_App_Controller;

class Root extends Gongo_App_Controller
{
    public $uses = array(
        'view'          => 'Gongongo\View',
        '/repositories' => 'Gongongo\Controller\Repository',
        '/messages'     => 'Gongongo\Controller\Message',
    );

    public function getIndex($app)
    {
        return $this->view->render($app, 'index');
    }
}
