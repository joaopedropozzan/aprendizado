<?php
global $conexao;
include_once('conexao.php');
$retorno = [
    'status' => 'ok', // ok ou nok
    'mensagem' => 'Registro alteradp com sucesso', // mensagem de sucesso ou erro (mensagem corrigida)
    'data' => [] // efetivamente o retorno
];
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // As variáveis que eu ireir receber por $_POST;
    $nome       = $_POST['nome'];
    $usuario    = $_POST['usuario'];
    $senha      = $_POST['senha'];
    $ativo      = $_POST['ativo'];

    $stmt = $conexao->prepare("UPDATE projeto SET nome = ?, usuario = ?, senha = ?, ativo = ? WHERE id = ?"); // prepara a query
    $stmt->bind_param("sssii",$nome,$usuario,$senha,$ativo,$id);
    $stmt->execute(); // executa a query
    if($stmt->affected_rows > 0){
        $retorno = [
            'status' => 'ok', // ok ou nok
            'mensagem' => 'Registro alteradp com sucesso', // mensagem de sucesso ou erro (mensagem corrigida)
            'data' => [] // efetivamente o retorno
        ];
    }else {
        $retorno = [
            'status' => 'nok', // ok ou nok
            'mensagem' => 'Registro não foi alterado', // mensagem de sucesso ou erro
            'data' => [] // efetivamente o retorno
        ];
    }
    $stmt->close();
}else{
    $retorno = [
        'status' => 'nok', // ok ou nok
        'mensagem' => 'Não foi alterar o registro sem o ID', // mensagem de sucesso ou erro
        'data' => [] // efetivamente o retorno
    ];
}
$conexao->close();
$retorno = [
    'status' => 'ok', // ok ou nok
    'mensagem' => 'Registros encontrados', // mensagem de sucesso ou erro
    'data' => [] // efetivamente o retorno
];
header("Content-type:application/json;charset=utf-8");
echo json_encode($retorno);