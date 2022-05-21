<?php

namespace App\Controller\AuthController;

use App\core\Application;
use App\core\Request;
use App\core\Controller;
use App\core\View;
use App\core\connection\MedooDatabase;
use App\models\Doctor;

class AuthController  extends Controller
{

    public function register()
    {
        $body = Request::getInstance()->getBody();

        $authValidation = Application::$app->validation->loadData($body);
        $validationRules = $authValidation->registerRules();

        $validations = $authValidation->validation($validationRules);
        $user = $authValidation->findOneRegister();



        if ($validations && !$user) {
            unset($body['confirmPassword']);
            $class = ucfirst($body['role']);

            var_dump($class::class);
            exit();

            $class::do()->setRegister($body['role'], $body);
            //Todo
            // Application::$app->Connection->getMedoo()->insert($body['role'], $body);
            return Application::$app->response->redirect('/home');
        }

    
       
        echo $this->render('register');
    }









    public function login()
    {
        $body = Request::getInstance()->getBody();
        // var_dump($body);
        // exit;
        $authValidation = Application::$app->validation->loadData($body);
        $validationRules = $authValidation->loginRules();

        $validations = $authValidation->validation($validationRules);
        $user = $authValidation->findOneLogin();

        if ($validations && $user) {
            //Application::$app->session->sessionStart('id', $user['id']);
            return Application::$app->response->redirect('/');
        }

        echo $this->render('login');
    }
}
