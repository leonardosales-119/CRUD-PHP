<?php

require_once "conexao.php";

if(isset($_GET["u"])){


    $id = $_GET["u"];

    $sql = "SELECT * FROM contato WHERE IdContato = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id',$id);
    $result = $stmt->execute();
    $rows= $stmt->fetchALL(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    
    <title>Document</title>
</head>
<body>
    
<form class = "card" method = "post" action = "">

<label for="inputNome">nome</label>
<input type="text" value="<?php echo ($rows[0]["NomeContato"]) ?>" name = "nome" id "inputNome">

<label for="inputTelefone">Telefone</label>
<input value="<?php echo ($rows[0]["TelefoneContato"]) ?>" type="text"  name = "telefone" id "inputTelefone">

<label for="inputEmail">email</label>
<input type="email" value="<?php echo ($rows[0]["EmailContato"]) ?>" name = "email" id "inputEmail">

<label for="inputEndereco">Endereço</label>
<input type="text" value="<?php echo ($rows[0]["EnderecoContato"]) ?>" name = "endereco" id "inputEndereco">

<button type = "submit" name = "atualizar" >enviar mensagem</button>
</form>

<?php
if(isset($_POST["atualizar"])){

//declara variaveis do formulario 
$nome =  $_POST["nome"];
$telefone =  $_POST["telefone"];
$email =  $_POST["email"];
$endereco =  $_POST["endereco"];

//prepara o sql
$sql_update ="UPDATE contato set NomeContato = :nome, TelefoneContato = :telefone,EmailContato = :email,EnderecoContato = :endereco WHERE IdContato = :id";

 $stmt_update = $PDO->prepare($sql_update);

 //vincula os parametros
 $stmt_update->bindParam(':id',$id);
 $stmt_update->bindParam(':nome',$nome);
 $stmt_update->bindParam(':telefone',$telefone);
 $stmt_update->bindParam(':email',$email);
 $stmt_update->bindParam(':endereco',$endereco);

 //executa 
 $result_update = $stmt_update->execute();

 if ($result_update){

    $stmt_update->rowCount() . "linha inserida";
    header('Location:index.php');
   
}else{
    var_dump($stmt_update->errorInfo());
     
 }

}


?>


</BOdy>
</HTML>