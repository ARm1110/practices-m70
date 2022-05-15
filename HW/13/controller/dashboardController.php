<?php

namespace App\controller;


use App\core\View;

class dashboardController
{

    public function dashboardDoctor()
    {
        (new View)->showDashboard('home');
    }

    public function profileEdited()
    {
        (new View)->showDashboard('profileEdited');
    }
}