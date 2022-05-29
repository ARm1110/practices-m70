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

class managementController extends Controller
{



    public function userActive()
    {
        Application::$app->checkAccess->check('id', 'management');
        Application::$app->Connection->getMedoo()->update('doctor', ['statuse' => 1], ['id' => $_GET['id']]);
        $data = [
            'success' => 'user active successfully'
        ];
        Controller::setLayout('main2');
        Application::$app->response->redirect('/Dashboard/Management', $data);
    }
    public function userDisable()
    {
        Application::$app->checkAccess->check('id', 'management');
        Application::$app->Connection->getMedoo()->update('doctor', ['statuse' => 0], ['id' => $_GET['id']]);
        $data = [
            'errorW' => 'user disable successfully'
        ];
        Controller::setLayout('main2');
        Application::$app->response->redirect('/Dashboard/Management', $data);
    }
}
