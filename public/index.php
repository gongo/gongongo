<?php
require '../vendor/autoload.php';

date_default_timezone_set('Asia/Tokyo');

if (preg_match('/\.(?:png|js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

if (php_sapi_name() === 'cli-server') {
    $_GET['__url__'] = $_SERVER['REQUEST_URI'];
}

class Application extends Gongo_App
{
    public $uses = array(
        'root' => '\Gongongo\Controller\Root'
    );
}

$app = new Application(dirname(__FILE__) . '/..');
$app->init()->run();
