<?php

    $requestGetH = $_GET;
    $requestPOSTH = $_POST;

    if(isset($requestGetH['request']) && $requestGetH['request'] == 'ListH')
    {
        loadHobbies();
    }
    if(isset($requestPOSTH['request']) && $requestPOSTH['request'] == 'InsertH')
    {
        insertHobbies();
    }
    if(isset($requestPOSTH['request']) && $requestPOSTH['request'] == 'Delete')
    {
        deleteHobbies();
    }

    function deleteHobbies(){
        require_once 'connectDb.php';
        $id = $_POST['idHobbie'];
        $query = "DELETE FROM hobbies WHERE idHobbie = $id";
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
        $idHobbie = $_POST['idHobbie'] ?? null;
        if($idHobbie){
              $id = $idHobbie;
              $query = "UPDATE hobbies SET  nomeHobbie='$nomeHobbie', lottie='$lottie' WHERE idHobbie = $id";
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