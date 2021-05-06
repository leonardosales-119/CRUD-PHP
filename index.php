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
    
<form class = "card" method = "post" action = "insert.php">

<label for="inputNome">nome</label>
<input type="text" name = "nome" id "inputNome">

<label for="inputTelefone">Telefone</label>
<input type="text"  name = "telefone" id "inputTelefone">

<label for="inputEmail">email</label>
<input type="email" name = "email" id "inputEmail">

<label for="inputEndereco">Endereço</label>
<input type="text" name = "endereco" id "inputEndereco">



<button type = "submit" name = "botaoExe" >enviar mensagem</button>
</form>

<table class="table table-dark">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Nome</th>
    <th scope="col">Telefone</th>
    <th scope="col">E-mail</th>
    <th scope="col">Endereço</th>
    <th scope="col">Ações</th>
    </tr>
    </thead>

   <?php require_once "select.php"; ?>

<!--tabela dando echo-->

<?php foreach ($rows as $item){ ?>
<tr>
<th scope = "row"><?php echo $item["IdContato"];?></th>
<td> <?php echo $item["NomeContato"];?> </td>
<td> <?php echo $item["TelefoneContato"];?> </td>
<td> <?php echo $item["EmailContato"];?> </td>
<td> <?php echo $item["EnderecoContato"];?> </td>



<td>
    <a href="update.php?u=<?php echo $item["IdContato"];?>"><img width ="25px" height ="25px" src="image/update.png"/></a>
    <a href="delete.php?q=<?php echo $item["IdContato"];?>"><img width ="25px" height ="25px" src="image/delete.png"/></a>

</td>
</tr>

<?php } ?>







</body>
</html>