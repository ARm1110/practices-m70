<?php

namespace App\core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\core\Application;

class EmailProcess
{
    protected $mail;
    public function __construct($config)
    {
        // var_dump($config);
        // exit;
        $this->mail = new PHPMailer(true);
        $this->host = $config['host'];
        $this->port = $config['port'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->encryption = $config['encryption'];
    }

    public function sendMail($user_email, $token, $role)
    {
        $expFormat = mktime(
            date("H"),
            date("i") + 10,
            date("s"),
            date("m"),
            date("d"),
            date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        Application::$app->Connection->getMedoo()->insert('password_reset_temp', [
            'email' => $user_email,
            'token' => $token,
            'expire_date' => $expDate
        ]);
        $output = '
 <!doctype html>
 <html lang="en-US">
 
 <head>
 <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
 <title>Reset Password Email Template</title>
 <meta name="description" content="Reset Password Email Template.">
 <style type="text/css">
 a:hover {text-decoration: underline !important;}
 </style>
 </head>
 
 <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
 <!--100% body table-->
 <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
 style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
 <tr>
 <td>
 <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
 align="center" cellpadding="0" cellspacing="0">
 <tr>
 <td style="height:80px;">&nbsp;</td>
 </tr>
 <tr>
 <td style="text-align:center;">
 
 <img width="60" src="https://i.ibb.co/hL4XZp2/android-chrome-192x192.png" title="logo" alt="logo">
 </a>
 </td>
 </tr>
 <tr>
 <td style="height:20px;">&nbsp;</td>
 </tr>
 <tr>
 <td>
 <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
 style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
 <tr>
 <td style="height:40px;">&nbsp;</td>
 </tr>
 <tr>
 <td style="padding:0 35px;">
 <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">You have
 requested to reset your password</h1>
 <span
 style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
 <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
 We cannot simply send you your old password. A unique link to reset your
 password has been generated for you. To reset your password, click the
 following link and follow the instructions.
 </p>
 <button href="javascript:void(0);"
 style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;"><a href="http://127.0.0.1:8080/reset-pass?token=' . $token . '&email=' . $user_email . '&role=' . $role . '&action=reset">click to rest password</a></button>
 </td>
 </tr>
 <tr>
 <td style="height:40px;">&nbsp;</td>
 </tr>
 </table>
 </td>
 <tr>
 <td style="height:20px;">&nbsp;</td>
 </tr>
 <tr>
 <td style="text-align:center;">
 <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.rakeshmandal.com</strong></p>
 </td>
 </tr>
 <tr>
 <td style="height:80px;">&nbsp;</td>
 </tr>
 </table>
 </td>
 </tr>
 </table>
 <!--/100% body table-->
 </body>
 
 </html>';
        $body = $output;
        $subject = "Password Recovery";

        $email_to = $user_email;
        $fromserver = $this->username;
        $this->mail->IsSMTP();
        $this->mail->Host = $this->host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->username;
        $this->mail->Password = $this->password;
        $this->mail->SMTPSecure = $this->encryption;
        $this->mail->Port = $this->port;

        $this->mail->IsHTML(true);
        $this->mail->From = "$email_to";
        $this->mail->FromName = "Forget Password";
        $this->mail->Sender = $fromserver; // indicates ReturnPath header
        $this->mail->Subject = $subject;
        $this->mail->Body = $body; //output to show user
        $this->mail->AddAddress($email_to);
        if (!$this->mail->Send()) {
            $data = [
                'errorD' => 'Error!'
            ];
            return Application::$app->response->redirect('/home', $data);
        } else {
            $data = [
                'success' => 'Email send . please check your email to reset your password'
            ];
            return Application::$app->response->redirect('/home', $data);
        }
    }
}
