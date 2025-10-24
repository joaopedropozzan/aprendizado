<?php
global $conexao;
include_once('conexao.php');
// Vamos montar o SELECT
// 1ª Situação - SEM RECEBER O ID por GET
// 2ª Situação - RECEBENDO O ID por GET
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conexao->prepare("SELECT * FROM projeto WHERE id = ?"); // prepara a query
    $stmt->bind_param("i",$id);
}else{
    $stmt = $conexao->prepare("SELECT * FROM projeto"); // prepara a query

}
$stmt->execute(); // executa a query
$resultado = $stmt->get_result(); // pega o resultado

$tabela = []; // array para enviar para o Front
if($resultado->num_rows > 0){
    // criar o laço de repetição para ler o resultado
    while($linha = $resultado->fetch_assoc()){
        $tabela[] = $linha;
    }
}else{
    echo "não encontrou nenhum registro!";
}

$stmt->close();
$conexao->close();

echo '<pre>';
var_dump($tabela);
echo '</pre>';