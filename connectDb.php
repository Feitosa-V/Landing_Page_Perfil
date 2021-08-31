<?php
      $pdo;
      
      try{
            $pdo = new PDO("mysql:host=localhost;dbname=desafiosn","root","");
      } catch(PDOException $e) {
            echo "Erro do banco" . $e->getMessage();
      }
      
      
      

?>