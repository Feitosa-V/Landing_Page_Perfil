<?php

      // if(isset($_POST['editar'])){
      //       $_SESSION['editando'] = true;
      // }

      // if(isset($_SESSION['editando'])){
      //       updateMusic();
      //       unset($_SESSION['editando']);
      // }else{
      //       insertMusic();
      // }
    
      $requestGet = $_GET;
      $requestPOST = $_POST;

      if(isset($requestGet['request']) && $requestGet['request'] == 'List')
      {
            loadMusics();
      }
      if(isset($requestPOST['request']) && $requestPOST['request'] == 'Insert')
      {
            insertMusic();
      }
      if(isset($requestPOST['request']) && $requestPOST['request'] == 'Delete')
      {
            deleteMusic();
      }
      if(isset($requestPOST['request']) && $requestPOST['request'] == 'Delete')
      {
            updateMusic();
      }
      

      // $urlMusica = $_POST['imagem'] ?? "";
      // $nomeMusica = $_POST['nome'] ?? "";
      // $iframeMusica = $_POST['iframe'] ?? "";
      
      // if($urlMusica == "" && $nomeMusica == "" && $iframeMusica == ""){
      //       return false;
      // } else {
      //       $pdo->query("INSERT INTO musicas (imagem, nome, iframe) VALUES ('$urlMusica','$nomeMusica', '$iframeMusica');");
      // }
       
      // header('Location: index.php');


      function updateMusic(){
            require_once 'connectDb.php';

            $urlMusica = $_POST['imagem'] ?? "";
            $nomeMusica = $_POST['nome'] ?? "";
            $iframeMusica = $_POST['iframe'] ?? "";

            $id = $_POST['id'];
            $query = "UPDATE musicas SET imagem='$urlMusica', nome='$nomeMusica', iframe='$iframeMusica' WHERE id = $id";
            $update = $pdo->query($query);
            if($update){
                  echo json_encode(["status" => true, "message" => "Sucesso", $query]);
            }
            else
            {
                  echo json_encode(["status" => false, "message" => "Não foi possivel atualizar"]);
            }
      }

      function deleteMusic(){
            require_once 'connectDb.php';
            $id = $_POST['id'];
            $query = "DELETE FROM musicas WHERE id = $id";
            $remover = $pdo->query($query);
            if($remover){
                  echo json_encode(["status" => true, "message" => "Sucesso", $query]);
            }
            else
            {
                  echo json_encode(["status" => false, "message" => "Não foi possivel apagar"]);
            }
      }

      function insertMusic(){
            require_once 'connectDb.php';
            $urlMusica = $_POST['imagem'] ?? "";
            $nomeMusica = $_POST['nome'] ?? "";
            $iframeMusica = $_POST['iframe'] ?? "";

            if($urlMusica == "" && $nomeMusica == "" && $iframeMusica == ""){
                  echo json_encode(["status" => false, "message" => "Um dos campos não foi informado"]);
            } else {
                  $pdo->query("INSERT INTO musicas (imagem, nome, iframe) VALUES ('$urlMusica','$nomeMusica', '$iframeMusica')");
                  echo json_encode(["status" => true, "message" => "Sucesso"]);
            }
      }
      function loadMusics(){
            require_once 'connectDb.php';
            $remove = $pdo->query("SELECT * FROM musicas");
            echo json_encode($remove->fetchAll(PDO::FETCH_ASSOC));
      }




?>

