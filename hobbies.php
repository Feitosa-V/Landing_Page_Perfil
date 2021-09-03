<?php

    $requestGet = $_GET;
    $requestPOST = $_POST;

    if(isset($requestGet['request']) && $requestGet['request'] == 'List')
    {
        loadHobbies();
    }
    if(isset($requestPOST['request']) && $requestPOST['request'] == 'Insert')
    {
        insertHobbies();
    }
    if(isset($requestPOST['request']) && $requestPOST['request'] == 'Delete')
    {
        deleteHobbies();
    }

    function deleteHobbies(){
        require_once 'connectDb.php';
        $id = $_POST['id'];
        $query = "DELETE FROM hobbies WHERE id = $id";
        $remover = $pdo->query($query);
        if($remover){
              echo json_encode(["status" => true, "message" => "Sucesso", $query]);
        }
        else
        {
              echo json_encode(["status" => false, "message" => "Não foi possivel apagar"]);
        }
    }

    function insertHobbies(){
        require_once 'connectDb.php';
        $nomeHobbie = $_POST['nomeHobbie'] ?? "";
        $lottie = $_POST['lottie'] ?? "";
        $idHobbie = $_POST['id'] ?? null;
        if($idHobbie){
              $id = $idHobbie;
              $query = "UPDATE hobbies SET  nomeHobbie='$nomeHobbie', lottie='$lottie' WHERE id = $id";
              $update = $pdo->query($query);
              if($update){
                    echo json_encode(["status" => true, "message" => "Sucesso", $query]);
              }
              else
              {
                    echo json_encode(["status" => false, "message" => "Não foi possivel atualizar"]);
              }
        } else {
              if($nomeHobbie == "" && $lottie == ""){
                    echo json_encode(["status" => false, "message" => "Um dos campos não foi informado"]);
              } else {
                    $pdo->query("INSERT INTO hobbies (nomeHobbie, lottie) VALUES ('$nomeHobbie', '$lottie')");
                    echo json_encode(["status" => true, "message" => "Sucesso"]);
              }
        }
   
    }

    function loadHobbies(){
        require_once 'connectDb.php';
        $remove = $pdo->query("SELECT * FROM hobbies");
        echo json_encode($remove->fetchAll(PDO::FETCH_ASSOC));
    }



?>