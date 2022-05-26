<?php

namespace App\Controller\AuthController;

use App\core\Application;
use App\core\Request;
use App\core\Controller;
use App\core\View;
use App\core\connection\MedooDatabase;
use App\core\Response;
use App\models\Doctor;

class AuthController  extends Controller
{

    public function register()
    {
        $body = Request::getInstance()->getBody();
        $class = ucfirst($body['role']);
        $classSet = "App\\models\\$class";
        $authValidation = Application::$app->validation->loadData($body);
        $validationRules = $authValidation->registerRules();

        $validations = $authValidation->validation($validationRules);
        $user = $authValidation->findOneRegister($classSet);



        if ($validations && !$user) {
            unset($body['confirmPassword']);
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
        $table = ucfirst($body['role']);


        $authValidation = Application::$app->validation->loadData($body);
        $validationRules = $authValidation->loginRules();

        $validations = $authValidation->validation($validationRules);
        $user = $authValidation->findOneLogin(lcfirst($table));



        // var_dump($body);
        // exit();
        if ($validations && $user) {

            Application::$app->session->put('id', $user["id"]);
            Application::$app->session->put('email', $user["email"]);
            Application::$app->session->put('massage', "welcome to the hospital");
            Application::$app->session->put('proses', true);
            Application::$app->session->put('role', $table);


            return Application::$app->response->redirect('/', ['id' => $user["id"]]);
        }

        echo $this->render('login');
    }
    public function logout()
    {
        Application::$app->session->deleteAll();
        $massage = ['massage' => 'You have been logged out'];
        Response::redirect('/home', $massage);
    }
}
