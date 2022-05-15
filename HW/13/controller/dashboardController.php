<?php

namespace App\controller;


use App\core\View;

class dashboardController
{

    public function dashboardDoctor()
    {
        (new View)->showDashboard('home', ["list" => "profileEdited", "list2" => "home"]);
    }

    



    public function profileEdited()
    {
        (new View)->showDashboard('profileEdited',["list"=>"profileEdited", "list2" => "home"]);
    }








    public function dashboardManagement()
    {
        (new View)->showDashboardManagement('home',["list"=>"AcceptList", "list2" => "add section"]);
    }


    public function AcceptList()
    {
        (new View)->showDashboardManagement('checkDoctorList',["list"=>"AcceptList" ,"list2" => "add section"]);
    }

    public function addSection()
    {
        (new View)->showDashboardManagement('addSection', ["list" => "AcceptList", "list2" => "add section"]);
    }



}