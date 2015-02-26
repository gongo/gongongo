<?php
namespace Gongongo;

use \Gongo_App_View;

class View extends Gongo_App_View
{
    public $uses = array(
        'template' => 'Gongo_App_Html_Twig',
    );
}
