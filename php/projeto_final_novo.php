<?php
global $conexao;
include_once('conexao.php');
// As variáveis que eu ireir receber por $_POST;
$nome = "Giulio Lindo 2";
$usuario = "foo@bla";
$senha = "1234";
$ativo = 1;

$stmt = $conexao->prepare("INSERT INTO projeto(nome,usuario,senha,ativo) VALUES (?,?,?,?)"); // prepara a query
$stmt->bind_param("sssi",$nome,$usuario,$senha,$ativo);
$stmt->execute(); // executa a query
$stmt->close();

$conexao->close();