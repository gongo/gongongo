<?php
namespace Gongongo\Controller;

use \Gongo_App_Controller;
use Gongongo\Model\GitHub;

class Repository extends Gongo_App_Controller
{
    public function getIndex($app)
    {
        $client = new GitHub;
        $app->context->repositories = $client->getRepositories('gongo');
        return $this->view->render($app, 'repositories');
    }
}
