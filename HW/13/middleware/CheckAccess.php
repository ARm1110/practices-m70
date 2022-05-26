<?php

namespace App\middleware;

use App\core\Application;

class CheckAccess
{

    public function check($data, $table)
    {

        $errors = null;
        $checkSet = Application::$app->session->exists($data);
        $getRole = Application::$app->session->get('role');
        $getEmail = Application::$app->session->get('email');
        $checkGet = Application::$app->session->get($data);
        $where = [
            'id' => $checkGet,
            'email' => $getEmail
        ];

        if (($checkSet) == false) {
            $errors['errorW'] = 'you most first login';
            Application::$app->response->redirect('/home', $errors);
        }


        $result =  Application::$app->Connection->getMedoo()->select($table, '*', $where);
        // var_dump($result);
        // exit;
        if (empty($result)) {
            $errors['errorD'] = 'You Not Access This Panel';
            Application::$app->response->redirect('/home', $errors);
        }
    }
}
