<?php
include_once('conexao.php');


$tabela = [];

$retorno = [
    'status' => 'ok', // ok ou nok
    'mensagem' => 'Registros encontrados', // mensagem de sucesso ou erro
    'data' => $tabela // efetivamente o retorno
];

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conexao->prepare("DELETE FROM projeto WHERE id = ?"); // prepara a query
    $stmt->bind_param("i",$id);
    $stmt->execute(); // executa a query

    if($stmt->affected_rows > 0){
        $retorno = [
            'status' => 'ok', // ok ou nok
            'mensagem' => 'Registro excluído com sucesso', // mensagem de sucesso ou erro (mensagem corrigida)
            'data' => $tabela // efetivamente o retorno
        ];
    }else {
        $retorno = [
            'status' => 'nok', // ok ou nok
            'mensagem' => 'Não foi possivel excluir o ID', // mensagem de sucesso ou erro
            'data' => $tabela // efetivamente o retorno
        ];
    }
} // <--- CHAVE ADICIONADA AQUI

$conexao->close();
// Corrigindo o typo: "uft-8" para "utf-8"
header("Content-type:application/json;charset=utf-8");
echo json_encode($retorno);