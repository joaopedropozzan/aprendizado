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

    // 1ª Situação
    if($resultado->num_rows > 0){ // num_rows retorna quantas rows foram obtidas na linha 9 ($resultado)
        // criar o laço de repetição para ler o resultado
        while ($linha = $resultado->fetch_assoc()){ // $linha é o i, itera cada parte do resultado
            $tabela[] = $linha;
        }
    }else{
        echo 'não encontrou nenhum registro!';
    }
    echo '<pre>';
    var_dump($tabela); //printa tudo
    echo '</pre>';

    // 2ª Situação
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $stmt = $conexao->prepare("SELECT * FROM projeto WHERE ID = ?"); //prepara a query
      $stmt->bind_param('i', $id); //puxa o id
    }
    else{$stmt = $conexao->prepare("SELECT * FROM projeto"); // Prepara a query
    };
