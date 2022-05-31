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

        if ($validations && $user) {

            Application::$app->session->put('id', $user["id"]);
            Application::$app->session->put('email', $user["email"]);
            Application::$app->session->put('massage', "welcome to the hospital");
            Application::$app->session->put('proses', $user["statuse"]);
            Application::$app->session->put('role', $table);


            return Application::$app->response->redirect('/', ['id' => $user["id"]]);
        }

        echo $this->render('login');
    }


    public function passwordForgets()
    {
        $body = Request::getInstance()->getBody();
        $table = ucfirst($body['role']);


        $authValidation = Application::$app->validation->loadData($body);
        $validationRules = $authValidation->passwordForgets();

        $validations = $authValidation->validation($validationRules);
        $user = $authValidation->findOneForgets(lcfirst($table));
        if ($validations && $user) {
            $token = md5(time());
            Application::$app->emailProcess->sendMail($body['email'], $token, lcfirst($table));
        }
        echo $this->render('passwordForgets');
    }

    public function resetPass()
    {
        $body = Request::getInstance()->getBody();
        $table = ucfirst($body['role']);
        $pass1 = $body['password'];
        $pass2 = $body['confirmPassword'];
        $results = Application::$app->Connection->getMedoo()->select('password_reset_temp', '*', ['token' => $body['token']]);

        if ($pass1 != $pass2) {
            $data = [
                'errorW' => 'password not match back to gmail try again!'
            ];
            Application::$app->response->redirect('/home', $data);
        }
        if ($pass1 != $pass2) {
            $data = [
                'errorW' => 'password not match back to gmail try again!'
            ];
            Application::$app->response->redirect('/home', $data);
        }
        if (strtotime($results[0]['expire_date']) < time()) {
            $data = [
                'errorW' => 'Expire this link!'
            ];
            Application::$app->response->redirect('/home', $data);
            return false;
        }
        if (empty($results)) {
            $data = [
                'errorD' => 'invalid access back to gmail try again!'
            ];
            Application::$app->response->redirect('/home', $data);
            return false;
        }

        $data = [
            'password' => $body['password']
        ];
        Application::$app->Connection->getMedoo()->update($table, $data, ['email' => $body['email']]);
        Application::$app->Connection->getMedoo()->delete('password_reset_temp', ['email' => $body['email']]);
        $data = [
            'success' => 'password has been changed!'
        ];
        Application::$app->response->redirect('/home', $data);
    }
    public function logout()
    {
        Application::$app->session->deleteAll();
        $massage = ['massage' => 'You have been logged out'];
        Application::$app->response->redirect('/home', $massage);
    }
}
