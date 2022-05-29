<?php

namespace App\core;

trait uploads
{

  public function addPicture($inputName,  $imgID,  $userID)
  {
 
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
      $info = getimagesize($_FILES[$inputName]['tmp_name']);

      $allowedTypes = [
        IMAGETYPE_JPEG => '.jpg',
        IMAGETYPE_PNG => '.png',
        IMAGETYPE_GIF => '.gif'
      ]; //accept jpg, png, gif

      if ($info === false) { // no go
        Application::$app->response->redirect('', ['errorW' => 'Bad file format']);
      } else if (!array_key_exists($info[2], $allowedTypes)) { // no go
        Application::$app->response->redirect('', ['errorW' => 'Not an accepted file type']);
      } else {
        //save the picture in the images folder
        $path = getcwd() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;

        $filename = uniqid() . $allowedTypes[$info[2]];

        move_uploaded_file($_FILES[$inputName]['tmp_name'], $path . $filename);

        Application::$app->Connection->getMedoo()->update(
          'doctor_profile',
          [
            'url_picture' => $filename
          ],
          [
            'id' => $imgID
          ]
        );
        Application::$app->response->redirect('', ['success' => 'Picture added']);
      }
    } else {

      Application::$app->response->redirect('', ['errorW' => 'No file uploaded']);
    }
  }
}
