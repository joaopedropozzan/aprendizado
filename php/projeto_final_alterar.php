<?php
    include_once 'conexao.php';
    global $conexao, $id, $nome, $usuario, $senha, $ativo;
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        //As variaveis que eu irei receber por $_POST;
        $nome = 'João lindao 1';
        $usuario = 'joao@tomaaa.com';
        $senha = '123';
        $ativo = '1';


        $stmt = $conexao->prepare("UPDATE projeto SET nome = ?, usuario = ?, senha = ?, ativo = ? WHERE id = ?");
        $stmt->bind_param('sssii', $nome, $usuario, $senha, $ativo, $id);
        $stmt->execute();
        $stmt->close();
    }
    else{echo 'não é possivel alterar um registro sem ID';}
    $conexao->close();
