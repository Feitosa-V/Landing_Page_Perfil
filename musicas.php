<?php
    
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
            $idMusica = $_POST['id'] ?? null;
            if($idMusica){
                  $id = $idMusica;
                  $query = "UPDATE musicas SET imagem='$urlMusica', nome='$nomeMusica', iframe='$iframeMusica' WHERE id = $id";
                  $update = $pdo->query($query);
                  if($update){
                        echo json_encode(["status" => true, "message" => "Sucesso", $query]);
                  }
                  else
                  {
                        echo json_encode(["status" => false, "message" => "Não foi possivel atualizar"]);
                  }
            } else {
                  if($urlMusica == "" && $nomeMusica == "" && $iframeMusica == ""){
                        echo json_encode(["status" => false, "message" => "Um dos campos não foi informado"]);
                  } else {
                        $pdo->query("INSERT INTO musicas (imagem, nome, iframe) VALUES ('$urlMusica','$nomeMusica', '$iframeMusica')");
                        echo json_encode(["status" => true, "message" => "Sucesso"]);
                  }
            }

            
      }

      function loadMusics(){
            require_once 'connectDb.php';
            $remove = $pdo->query("SELECT * FROM musicas");
            echo json_encode($remove->fetchAll(PDO::FETCH_ASSOC));
      }

?>

