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
        
            $classSet = "App\\models\\$class";
      

            try {
                $classSet::do()->setRegister($body);
            } catch (\Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }


            
            return Application::$app->response->redirect('/home');
        }



        echo $this->render('register');
    }









    public function login()
    {
        $body = Request::getInstance()->getBody();
    
        $authValidation = Application::$app->validation->loadData($body);
        $validationRules = $authValidation->loginRules();

        $validations = $authValidation->validation($validationRules);
        $user = $authValidation->findOneLogin();

        if ($validations && $user) {
           
            return Application::$app->response->redirect('/');
        }

        echo $this->render('login');
    }
}
