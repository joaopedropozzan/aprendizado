<?php
include_once('conexao.php');
global $conexao;
$retorno = [
    'status' => '', // ok ou nok
    'mensagem' => '', // mensagem de sucesso ou erro
    'data' => [] // efetivamente o retorno
];

// Vamos montar o SELECT
// 1ª situação - SEM RECEBER O ID por GET
// 2ª Situação - RECEBENDO o ID por GET

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexao->prepare("SELECT * FROM projeto WHERE id = ?");
    $stmt->bind_param("i", $id);
} else {
    $stmt = $conexao->prepare("SELECT * FROM projeto"); // prepara a query
}

$stmt->execute(); // executa a query
$resultado = $stmt->get_result(); // pega o resultado

$tabela = []; // Array para enviar para o Front
if($resultado->num_rows > 0) {
    // Criar o laço de repetição para ler o resultado
    // fetch_assoc transforma os atributos do SQL em dicionários
    while($linha = $resultado->fetch_assoc()) {
        $tabela[] = $linha;
    }

    $retorno = [
        'status' => 'ok', // ok ou nok
        'mensagem' => 'Registros encontrados', // mensagem de sucesso ou erro
        'data' => $tabela // efetivamente o retorno
    ];
} else {
    $retorno = [
        'status' => 'nok', // ok ou nok
        'mensagem' => 'Nenhum registro encontrado', // mensagem de sucesso ou erro
        'data' => [] // efetivamente o retorno
    ];
} // <-- Colchete de fechamento do 'else' que estava faltando

$stmt->close();
$conexao->close();

header("Content-type:application/json;charset:utf-8");
echo json_encode($retorno);
?>