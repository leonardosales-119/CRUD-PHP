<?php

require_once "conexao.php";


if(isset($_GET["q"])){

    $id = $_GET["q"];

    $sql = "DELETE FROM contato WHERE IdContato = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id',$id);
    $result = $stmt->execute();

    if($result){
        
        $stmt->rowCount() . "Linha deletada";
        header("Location:index.php");
        echo "pegou";  
        
    }else{
        var_dump($stmt->errorInfo());
        print_r ($result);
        exit;  
    }
}
