<?php
global $conexao;
include_once('conexao.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // As variáveis que eu ireir receber por $_POST;
    $nome = "Giulio Lindo";
    $usuario = "foo@bla";
    $senha = "1234";
    $ativo = 1;

    $stmt = $conexao->prepare("UPDATE projeto SET nome = ?, usuario = ?, senha = ?, ativo = ? WHERE id = ?"); // prepara a query
    $stmt->bind_param("sssii",$nome,$usuario,$senha,$ativo,$id);
    $stmt->execute(); // executa a query
    $stmt->close();
}else{
    echo "Não é possivel alterar um registro sem ID";
}
$conexao->close();