<?php

require_once "conexao.php";

if(isset($_POST["botaoExe"])){

    //declara variaveis do formulario 
    $nome =  $_POST["nome"];
    $telefone =  $_POST["telefone"];
    $email =  $_POST["email"];
    $endereco =  $_POST["endereco"];

    //prepara o sql
    $sql =  "INSERT INTO contato(NomeContato, TelefoneContato,EmailContato,EnderecoContato)".
     " VALUES (:nome,:telefone,:email,:endereco)";

     $stmt = $PDO->prepare($sql);

     //vincula os parametros
     $stmt->bindParam(':nome',$nome);
     $stmt->bindParam(':telefone',$telefone);
     $stmt->bindParam(':email',$email);
     $stmt->bindParam(':endereco',$endereco);

     //executa 
     $result = $stmt->execute();

     if (!$result){

        var_dump($stmt->errorInfo());
        exit;
     }else{
         $stmt->rowCount() . "linha inserida";
         header("Location: index.php");
         
     }

}

?>


