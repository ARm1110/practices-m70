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
        Application::$app->checkStatus->check();
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
        Application::$app->checkStatus->check();
        Application::$app->Connection->getMedoo()->update('doctor', ['statuse' => 0], ['id' => $_GET['id']]);
        $data = [
            'errorW' => 'user disable successfully'
        ];
        Controller::setLayout('main2');
        Application::$app->response->redirect('/Dashboard/Management', $data);
    }
    public function addSection()
    {
        Application::$app->checkAccess->check('id', 'management');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $management = Application::$app->session->get('id');
        $clinicName = $body['clinic'];
        $data = [
            'name' => $clinicName,
            'management_id' => $management

        ];
        Application::$app->Connection->getMedoo()->insert('clinic_section', $data);
        $data = [
            'success' => 'add section successfully'
        ];
        Controller::setLayout('main2');
        Application::$app->response->redirect('/Dashboard/Management', $data);
    }
    public function sectionDelete()
    {
        Application::$app->checkAccess->check('id', 'management');
        Application::$app->checkStatus->check();
        Application::$app->Connection->getMedoo()->delete('clinic_section', ['id' => $_GET['id']]);
        $data = [
            'success' => 'delete section successfully'
        ];
        Controller::setLayout('main2');
        Application::$app->response->redirect('/Dashboard/Management', $data);
    }
    public function sectionRename()
    {
        Application::$app->checkAccess->check('id', 'management');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $clinicID = $body['clinic_id'];
        $clinicName = $body['clinicName'];

        $data = [
            'name' => $clinicName
        ];
        Application::$app->Connection->getMedoo()->update('clinic_section', $data, ['id' => $clinicID]);
        $data = [
            'success' => 'rename section successfully'
        ];
        Controller::setLayout('main2');
        Application::$app->response->redirect('/Dashboard/Management', $data);
    }
    public function accountActive()
    {
        Application::$app->checkAccess->check('id', 'management');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $managementID = $body['id'];
        Application::$app->Connection->getMedoo()->update('management', ['statuse' => 1], ['id' => $managementID]);
        $data = [
            'success' => 'account active successfully'
        ];
        Controller::setLayout('main2');
        Application::$app->response->redirect('/Dashboard/Management', $data);
    }
    public function accountDisable()
    {
        Application::$app->checkAccess->check('id', 'management');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $managementID = $body['id'];
        Application::$app->Connection->getMedoo()->update('management', ['statuse' => 0], ['id' => $managementID]);
        $data = [
            'success' => 'account disable successfully'
        ];
        Application::$app->session->change('proses',false);
        Controller::setLayout('main2');
        Application::$app->response->redirect('/Dashboard/Management', $data);
    }
    public function listShow()
    {
        Application::$app->checkAccess->check('id', 'management');
        Application::$app->checkStatus->check();
        $result = Application::$app->Connection->getMedoo()->select(
            'management',
            [
                'id',
                'email',
                'statuse'
            ]
        );
        // var_dump($result);
        // exit;
        Controller::setLayout('main2');
        echo $this->render('management/listActive', [
            "navbar" => [
                "link1" => '/list/Accept',
                'viw1' => "Panel Profile",
                "link2" => '/add/section',
                'viw2' => "section",
                "link3" => '/management/account/active',
                'viw3' => "accept management"
            ],
            "result" => $result
        ]);
    }
}
