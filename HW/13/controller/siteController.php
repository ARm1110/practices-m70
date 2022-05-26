<?php

namespace App\Controller;

use App\core\Controller;
use App\core\View;
use App\models\Doctor;
use App\models\Users;
use App\core\Request;
use App\core\Application;

class siteController extends Controller
{

    public function index()
    {

        $records = null;
        if (Application::$app->session->exists('id')) {
            $table = $_SESSION['role'];

            $class = "App\\models\\$table";;
            $data = ['status' => true];
            $where = ['id' => $_SESSION['id']];
            $column = ['firstName', 'lastName', 'email'];
            // $class::do()->update($data, $where);
            $records =  $class::do()->select($column, $where);
        }






        echo $this->render('home', ['data' => $records]);
    }

    public function error404()
    {
        echo $this->render('errors/_404');
    }


    public function login()
    {

        echo $this->render('login');
    }


    public function register()
    {

        echo $this->render('register');
    }

    public function passwordForgets()
    {

        echo $this->render('passwordForgets');
    }


    public function seeProfile()
    {

        echo $this->render('seeProfile');
    }
    public function appointment()
    {
        Application::$app->checkAccess->check('id', 'users');

        $body = Request::getInstance()->getBody();
        $where = $body['id'];
        $recordsDoctor =  Doctor::do()->appointments($where);

        $getID = Application::$app->session->get('id');
        //todo
        $recordsUser =  Users::do()->getData($getID);




        echo $this->render('appointment', ['user' => $recordsUser, 'doctor' => $recordsDoctor]);
    }


    public function admin()
    {
        Controller::setLayout('mainAdmin');
        echo $this->render('admin/home');
    }
}
