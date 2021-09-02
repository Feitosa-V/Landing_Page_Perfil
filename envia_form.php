<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $email = new PHPMailer();

    $email->isSMTP();
    $email->Host = "smtp.gmail.com";
    $email->SMTPAuth = "true";
    $email->SMTPSecure = "tls";
    $email->Port = "587";

    $email->username = "vifesi4321@gmail.com";
    $email->password = "vifesi4321@gmail.com";
    $email->Subject = "Email de teste a partir do localhost";
    $email->setFrom("vifesi4321@gmail.com");
    $email->Body = "Email de teste a partir do localhost";
    $email->addAdress("vifesi4321@gmail.com");

    if($email->Send()){
        print "O email foi enviado";
    } else {
        print "O email não foi enviado";
    }
    $email->smtpClose()



    // function get_client_ip() {
    //     $ipaddress = '';
    //     if (isset($_SERVER['HTTP_CLIENT_IP']))
    //         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    //     else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    //         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //     else if(isset($_SERVER['HTTP_X_FORWARDED']))
    //         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    //     else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    //         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    //     else if(isset($_SERVER['HTTP_FORWARDED']))
    //         $ipaddress = $_SERVER['HTTP_FORWARDED'];
    //     else if(isset($_SERVER['REMOTE_ADDR']))
    //         $ipaddress = $_SERVER['REMOTE_ADDR'];
    //     else
    //         $ipaddress = 'UNKNOWN';
    //     return $ipaddress;
    // }

    // echo $_SERVER['HTTP_USER_AGENT'];
    

?>