<?php
global $conexao;
include_once('conexao.php'); // once signfica que ele é executado uma vez somente
    //Vamos montar o select
    // 1ª situação - SEM RECEBER O ID por GET
    // 2ª situação - RECEBENDO O ID por GET
    $stmt = $conexao->prepare("SELECT * FROM projeto"); //Prepara a query
    $stmt->execute(); // Executa a query
    $resultado = $stmt->get_result(); // Pega o resultado
    $tabela = []; // array que enviara ao front

    if($resultado->num_rows > 0){
        // criar o laço de repetição para ler o resultado
        while ($linha = $resultado->fetch_assoc()){
            $tabela[] = $linha;
        }
    }else{
        echo 'não encontrou nenhum registro!';
    }
    echo '<pre>';
    var_dump($tabela);
    echo '</pre>';
