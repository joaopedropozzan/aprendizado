<?php
include_once 'conexao.php';
global $conexao;
//As variaveis que eu irei receber por $_POST;
$nome = 'Joao lindao';
$usuario = 'joao@tomaaa.com';
$senha = '123';
$ativo = '1';


$stmt = $conexao->prepare("INSERT INTO projeto(nome,usuario,senha,ativo) VALUES (?, ?, ?, ?)");
$stmt->bind_param('sssi', $nome, $usuario, $senha, $ativo);
$stmt->execute();
$stmt->close();
$conexao->close();

