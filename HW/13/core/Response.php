<?php

namespace App\core;



class Response{

    
    private static $instance = null;
  
 
    private function __construct()
    {
    }
      
    public static function getInstance()
    {
      if (self::$instance == null)
      {
        self::$instance = new Response();
      }
   
      return self::$instance;
    }
    
    public function setStatusCode(int $statue)
    {
        http_response_code($statue);
    }
}
