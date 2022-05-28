<?php


namespace App\core;

use App\core\Router;
use App\core\View;
use App\core\Controller;
use App\Controller\siteController;
use App\core\connection\MedooDatabase;
use App\core\Validation;
use App\core\Response;
use App\core\Session;
use App\middleware\CheckAccess;

class Application
{
    public static $ROOT_DIR;
    public Router $router;
    public static Application $app;
    public View $view;
    public Controller $controller;
    public Response $response;
    public  Validation $validation;
    public  MedooDatabase $Connection;
    public Session $session;
    public CheckAccess $checkAccess;
    public EmailProcess $emailProcess;
    public function __construct($path,$config)
    {
        date_default_timezone_set('Asia/Tehran');
        self::$ROOT_DIR = $path;
        self::$app = $this;
        $this->Connection = new MedooDatabase($config['db']);
        $this->controller = new Controller;
        $this->session = new Session;
        $this->emailProcess = new EmailProcess($config['email']);
        $this->validation = new Validation;
        $this->checkAccess = new CheckAccess;
        $this->view = new View;
        $this->response = Response::getInstance();
        $this->router = new Router;
    }


    public function get($path, $callback)
    {
        $this->router->get($path, $callback);
    }
    public function post($path, $callback)
    {
        $this->router->post($path, $callback);
    }
    public function run()
    {
        return $this->router->solve();
    }
}
