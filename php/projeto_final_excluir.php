<?php
include_once('conexao.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conexao->prepare("DELETE FROM projeto WHERE id = ?"); // prepara a query
    $stmt->bind_param("i",$id);
    $stmt->execute(); // executa a query
    $stmt->close();
}else{
    echo "Não é possivel excluir um registro sem ID";
}
$conexao->close();