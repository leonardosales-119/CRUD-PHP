<?php
    require_once 'conexao.php';

//CONSULTA
$sql = "select*from contato;";
//O PDO PREPARAR A CONSULTA
$stmt = $PDO-> prepare($sql);
//EXECUTAR A CONSULTA
$result = $stmt->execute();
//BUSCA TODA A CONSULTA E ME DEVOLVE EM VETOR ASSOCIATIVO
$rows = $stmt->fetchALL(PDO::FETCH_ASSOC);


