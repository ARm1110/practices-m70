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

class doctorController extends Controller
{
    use uploads;
    public function profileEdited()

    {
        Application::$app->checkAccess->check('id', 'doctor');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $userID = Application::$app->session->get('id');
        $imgID = $body['imgID'];
        $this->addPicture('file', $imgID, $userID);
    }
    public function addTime()
    {

        Application::$app->checkAccess->check('id', 'doctor');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $doctorID = Application::$app->session->get('id');
        $days = $body['days'];
        $startTime = $body['start_worktime'];
        $endTime = $body['end_worktime'];
        $data = [
            'week_days' => $days,
            'start_worktime' => $startTime,
            'end_worktime' => $endTime,
            'doctor_id' => $doctorID
        ];
        Application::$app->Connection->getMedoo()->insert('worktime', $data);
        Application::$app->response->redirect('/Profile/Edit', ['success' => 'set new time successfully']);
    }
    public function deleteWorkDay()
    {
        Application::$app->checkAccess->check('id', 'doctor');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $workTimeID = $body['workTimeID'];
        Application::$app->Connection->getMedoo()->delete('worktime', ['id' => $workTimeID]);
        Application::$app->response->redirect('/Profile/Edit', ['success' => 'delete work day successfully']);
    }
    public function changedClinicSection()
    {
        Application::$app->checkAccess->check('id', 'doctor');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $doctorID = Application::$app->session->get('id');
        $clinicSectionID = $body['clinic'];
        $data = [
            'clinic_id' => $clinicSectionID
        ];
        Application::$app->Connection->getMedoo()->update('doctor', $data, ['id' => $doctorID]);
        Application::$app->response->redirect('/Profile/Edit', ['success' => 'set new clinic section successfully']);
    }
    public function visitShow()
    {
        Application::$app->checkAccess->check('id', 'doctor');
        Application::$app->checkStatus->check();
        $doctorID = Application::$app->session->get('id');
        $result = Doctor::do()->bootTable($doctorID);

        Controller::setLayout('main3');
        echo $this->render('doctor/visit', ['result' => $result]);
    }
    public function visitAccept()
    {
        Application::$app->checkAccess->check('id', 'doctor');
        Application::$app->checkStatus->check();
        $body = Request::getInstance()->getBody();
        $doctorID = Application::$app->session->get('id');
        $visitID = $body['id'];
       
        $data = [
            'statuse' => true
        ];
        Application::$app->Connection->getMedoo()->update('appointment', $data, ['id' => $visitID]);
        Application::$app->response->redirect('/visit/appointment', ['success' => 'accept visit successfully']);
    }
}
