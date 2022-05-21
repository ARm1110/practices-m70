<?php

namespace App\core;

use App\core\Application;

class View
{

    public $layout = "main";
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }



    public function renderView($view, $params = [])
    {
        $layout =  Controller::$layout;

        foreach ($params as $key => $value) {
            $$key = $value;
        };

        ob_start();
        include Application::$ROOT_DIR . "/views/$view.php";
        $body = ob_get_clean();
        include Application::$ROOT_DIR . "/views/layouts/$layout.php";
        $main = ob_get_contents();
        ob_end_clean();
        return str_replace('{{content}}', $body, $main);




        //!impediment
        // $viewContent = $this->renderOnlyView($view, $params);
        // $layoutContent = $this->layoutContent();
        // return str_replace('{{content}}', $viewContent, $layoutContent);
    }


    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {

       
        $layout =  Controller::$layout;

        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }



    protected function renderOnlyView($view, $params)
    {


        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
