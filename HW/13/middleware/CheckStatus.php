<?php

namespace App\middleware;

use App\core\Application;

class CheckStatus
{

    public function check()
    {
        $errors = null;
        $checkSet = Application::$app->session->get('proses');

        if (($checkSet) == false) {
            $errors['errorW'] = 'you account not active';
            Application::$app->response->redirect('/home', $errors);
            return false;
        }
    }
}
