<?php
global $conexao;
include_once('conexao.php');
$tabela = [];
$retorno = [
    'status' => 'ok', // ok ou nok
    'mensagem' => 'Registros encontrados', // mensagem de sucesso ou erro
    'data' => [] // efetivamente o retorno
];

// As variáveis que eu irei receber por $_POST;
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$ativo = $_POST['ativo'];
//$kfeoqfoji

$stmt = $conexao->prepare("INSERT INTO projeto(nome,usuario,senha,ativo) VALUES (?,?,?,?)"); // prepara a query
$stmt->bind_param("sssi",$nome,$usuario,$senha,$ativo);
$stmt->execute(); // executa a query

if($stmt->affected_rows > 0){
    $retorno = [
        'status' => 'ok', // ok ou nok
        'mensagem' => 'Registro inserido com sucesso', // mensagem de sucesso ou erro (mensagem corrigida)
        'data' => [] // efetivamente o retorno
    ];
}else {
    $retorno = [
        'status' => 'nok', // ok ou nok
        'mensagem' => 'Não foi possivel inserir o Registro', // mensagem de sucesso ou erro
        'data' => [] // efetivamente o retorno
    ];
}

$stmt->close();
$conexao->close();
header("Content-type:application/json;charset=utf-8");
echo json_encode($retorno);