<?php
// Assim que se comenta
$servidor = "localhost:3306";
$usuario = "root";
$senha = "";
$banco = "pf";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if($conexao->connect_error){
    echo $conexao ->connect_error;
};
?>