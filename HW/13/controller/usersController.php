<?php

namespace App\controller;

use App\core\connection\MedooDatabase;
use App\core\Controller;
use App\core\Application;
use App\core\View;
use App\models\TableDoctor;
use App\models\Doctor;
use App\core\Request;
use App\core\uploads;
use App\Models\Management;
use App\Models\Users;

class usersController extends Controller
{
    public function showHome()
    {
        Application::$app->checkAccess->check('id', 'users');

        Controller::setLayout('main3');
        echo $this->render('users/home');
    }
    public function showAppointment()
    {
        Application::$app->checkAccess->check('id', 'users');

        $result = Users::do()->visitSearch();



        Controller::setLayout('main3');
        echo $this->render('users/appointment', ['result' => $result]);
    }
    public function deleteAppointment()
    {
        Application::$app->checkAccess->check('id', 'users');
        $body = Request::getInstance()->getBody();
        $id = $body['id'];
       $result= Application::$app->Connection->getMedoo()->delete('appointment', ['id' => $id]);
        if (!empty($result)) {
            $data = [
                'success' => 'Appointment deleted successfully'
            ];
        }else {
            $data = [
                'errorD' => 'Appointment deleted not successfully'
            ];
        }
       

        Application::$app->response->redirect('/dashboard/patient', $data);
    }
}
