<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $assunto = $_POST['assunto'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $emailU = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $ip = $_SERVER["REMOTE_ADDR"];
    $SO = PHP_OS;

    $email = new PHPMailer();
    $email->isSMTP();
    $email->Host = "smtp.gmail.com";
    $email->SMTPAuth = "true";
    $email->SMTPSecure = "tls";
    $email->Port = "587";

    $email->Username = "testephpmailer02@gmail.com";
    $email->Password = "tuquinha1";
    $email->Subject = $assunto;
    $email->setFrom("testephpmailer02@gmail.com");
    $email->Body = "Nome: " . $nome . "\n\r" . "Telefone: " . $telefone . "\n\r" . "Email: " . $emailU . "\n\r" ."Mensagem: " . $mensagem . "\n\r" . "IP:" . $ip . "\n\r" . "Sistema Operacional: " . $SO . "";
    $email->addAddress("testephpmailer02@gmail.com");

    if($email->Send()){
        print "O email foi enviado";
    } else {
        print "O email não foi enviado";
    }
    $email->smtpClose();


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