<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $assunto = $_POST['assunto'] ?? "";
    $nome = $_POST['nome'] ?? "";
    $telefone = $_POST['telefone'] ?? "";
    $emailU = $_POST['email'] ?? "";
    $mensagem = $_POST['mensagem'] ?? "";
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
    $email->Body = "Nome: " . $nome . "\n\r" . "Telefone: " . $telefone . "\n\r" . "Email: " . $emailU . "\n\r" ."Mensagem: " . $mensagem . "\n\r" . "IP: " . $ip . "\n\r" . "Sistema Operacional: " . $SO . "";
    $email->addAddress("testephpmailer02@gmail.com");

    if($email->Send()){
        //header("Location: index.php");
        echo "Formulario enviado com sucesso!";
    } else {
        echo "O email não foi enviado";
    }
    
    $email->smtpClose();

    require_once 'connectDb.php';

    $data = [
        'assunto' => $_POST['assunto'] ?? "",
        'nome' => $_POST['nome'] ?? "",
        'telefone' => $_POST['telefone'] ?? "",
        'email' => $_POST['email'] ?? "",
        'mensagem' => $_POST['mensagem'] ?? "",
        'ip' => $_SERVER["REMOTE_ADDR"],
        'SO' => PHP_OS,
    ];

    

    $stmt = $pdo->prepare('INSERT INTO contato (assunto, nome, telefone, email, mensagem,ip, sistema_operacional) VALUES (:assunto, :nome, :telefone, :email, :mensagem, :ip, :SO )');

    try{
        $pdo->beginTransaction();
        $stmt->execute($data);
        $pdo->commit();
        //echo 'Formulario enviado com sucesso!';
    } catch (Exception $e) {
        $pdo->rollback();
        throw $e;
    }

    // $pdo->query("INSERT INTO contato (assunto, nome, telefone, email, mensagem,ip, sistema_operacional) VALUES ('$assunto','$nome', '$telefone', '$emailU', '$mensagem', '$ip' ,'$SO')");
    
?>