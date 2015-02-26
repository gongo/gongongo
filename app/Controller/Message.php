<?php
namespace Gongongo\Controller;

use \Gongo_App_Controller;
use \Gongongo\Model\Message as Model;

class Message extends Gongo_App_Controller
{
    public function getIndex($app)
    {
        $app->context->messages = Model::all();
        return $this->view->render($app, 'messages');
    }

    public function postIndex($app)
    {
        Model::save($app->request->sendtext);
        return $this->getIndex($app);
    }
}
