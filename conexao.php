<?php

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB_NAME','agenda');

try{
$PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname='. MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
$PDO ->exec("set name utf8");
}

catch(PDOException $e){

    echo  'Erro ao conectar a banco de dados '. MYSQL_DB_NAME .'.'. $e->getMessage();
}
