<?php
require_once('../php/conexao.php');
global $conexao, $id, $resultado;

if(isset($_GET['id'])){
    $stmt = $_GET['id'];
    $stmt = $conexao->prepare("DELETE FROM * projeto WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();//exec query
    $stmt->close();
}else {
    echo("nao eh possivel excluir sem o id");}
$conexao->close();
header('Content-Type: application/json');
echo json_encode($resultado);
?>