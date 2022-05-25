<?php

namespace App\middleware;

use App\core\Application;

class CheckAccess
{

    public function doctor($data)
    {
        
        $errors = null;
        $checkGet = Application::$app->session->get($data);
        $where = ['id' => $checkGet];
        $checkSet = Application::$app->session->exists($data);
        
        if (($checkSet) == false) {
            $errors['errorW'] = 'you most first login';
            Application::$app->response->redirect('/home', $errors);
        }


        $result =  Application::$app->Connection->getMedoo()->select('doctor', 'id', $where);

        if (empty($result)) {
            $errors['errorD'] = 'You Not Access This Panel';
            Application::$app->response->redirect('/home', $errors);
        }
    }

    public function management($data)
    {
        //todo
        $where = ['id' => $data];
        return Application::$app->Connection->getMedoo()->select('management', ['id'], $where);
    }

    public function users($data)
    {
        //todo
        $where = ['id' => $data];
        return Application::$app->Connection->getMedoo()->select('users', ['id'], $where);
    }
}
