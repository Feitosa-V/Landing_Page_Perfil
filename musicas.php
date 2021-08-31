<?php

      require_once 'connectDb.php';

      //session_start();
      $urlMusica = $_POST['imagem'] ?? "";
      $nomeMusica = $_POST['nome'] ?? "";
      $iframeMusica = $_POST['iframe'] ?? "";
      
      if($urlMusica == "" && $nomeMusica == "" && $iframeMusica == ""){
            return false;
      } else {
            $pdo->query("INSERT INTO musicas (imagem, nome, iframe) VALUES ('$urlMusica','$nomeMusica', '$iframeMusica');");
      }
      
      $res = array();
      $cmd = $pdo->query("SELECT imagem FROM musicas");
      $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
      
      
      header('Location: index.php');

?>

