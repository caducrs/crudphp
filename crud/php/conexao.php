<?php

$servidor = "localhost";
$banco = "id21918513_bd_aluno";
$usuario = "id21918513_caduzada";
$senha = "Kadufor@2020";

try{
    $conn = new PDO("mysql:host=$servidor;dbname=$banco",$usuario, $senha);

}catch(PDOException $E){
    echo("Erro de conexao".$E->getMessage());
}

?>