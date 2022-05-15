<?php

namespace App\controller;


use App\core\View;

class dashboardController
{

    public function dashboardDoctor()
    {
        (new View)->showDashboard('home', ["list" => "profileEdited"]);
    }

    



    public function profileEdited()
    {
        (new View)->showDashboard('profileEdited',["list"=> "profileEdited"]);
    }








    public function dashboardManagement()
    {
        (new View)->showDashboardManagement('home',["list"=>"AcceptList"]);
    }


    public function AcceptList()
    {
        (new View)->showDashboardManagement('checkDoctorList',["list"=>"AcceptList"]);
    }


}