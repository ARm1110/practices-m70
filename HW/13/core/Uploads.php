<?php

namespace App\core;

class uploads extends Controller
{

 public function addPicture(){
    var_dump($_FILES);
    exit(1);
    if(isset($_FILES['newPicture']) && $_FILES['newPicture']['error'] == UPLOAD_ERR_OK){
    $info = getimagesize($_FILES['newPicture']['tmp_name']);
    
    $allowedTypes = [IMAGETYPE_JPEG=>'.jpg',
                     IMAGETYPE_PNG=>'.png',
                     IMAGETYPE_GIF=>'.gif'];//accept jpg, png, gif

    if($info === false){ // no go
      $this->view('homeDoctor/addPicture', ['error'=>'Bad file format']);
    }else if(!array_key_exists($info[2], $allowedTypes)){ // no go
      $this->view('product/addPicture',['error'=>'Not an accepted file type']);
    }else{
      //save the picture in the images folder
      $path = getcwd().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;
      $filename = uniqid().$allowedTypes[$info[2]];
      move_uploaded_file($_FILES['newPicture']['tmp_name'], $path.$filename);
 
      $newPicture = $this->model('Picture');
      $newPicture->product_id = $product_id;
      $newPicture->filename = $filename;
      $newPicture->description = $_POST['description'];
      $newPicture->create();
      header('location:/product/index');
    }
  }else{
    $this->view('product/addPicture');
  }
}
}
