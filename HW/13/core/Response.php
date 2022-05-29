<?php

namespace App\core;

class Response
{
  private static $instance = null;


  private function __construct()
  {
  }

  public static function getInstance()
  {
    if (self::$instance == null) {
      self::$instance = new Response();
    }

    return self::$instance;
  }

  public function setStatusCode(int $code)
  {
    http_response_code($code);
  }
  public  function  redirect($path, $query = null)
  {
    return header('Location:' . $path . '?' . http_build_query($query, '', '&;'));
  }
}
