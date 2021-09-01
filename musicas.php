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
      
      
      
      
      header('Location: index.php');

?>

