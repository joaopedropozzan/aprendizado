// Primeira etapa - Receber o valor por get e armazenar no input hidden ID
// Segunda etapa - Fazer um fetch no projeto_final_get.php e preencher os campos
document.addEventListener('DOMContentLoaded', () => {
    // Pega a URL e grava na variavel
    var url = new URLSearchParams(window.location.search);
    // Busca na URL o ID e armazena na variável ID
    var id = url.get('id');
    buscarDados(id);
})
async function buscarDados(id){
    const retorno = await fetch("../php/projeto_final_get.php?id=" + id);
    const resposta = await retorno.json();
    if(resposta.status == "ok"){
        alert('sucesso!' + resposta.mensagem);
        var reg = resposta.data[0]
        document.getElementById('nome').value = reg.nome;
        document.getElementById('usuario').value = reg.usuario;
        document.getElementById("senha").value = reg.senha;
        document.getElementById('ativo').value = reg.ativo;
        document.getElementById('id').value = reg.id;
    }else{
        alert('erro' + resposta.mensagem)
    }
}

document.getElementById("enviar").addEventListener('click', function (){
    //Chamar a função FETCHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH
    alterar();
});

async function alterar(){
    var nome = document.getElementById('nome').value;
    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;
    var ativo = document.getElementById('ativo').value;
    var id = document.getElementById('id').value;

    // Corpo da requisição
    const fd = new FormData
    fd.append('nome', nome);
    fd.append('usuario', usuario);
    fd.append('senha', senha);
    fd.append('ativo', ativo);

    const retorno = await fetch("../php/projeto_final_alterar.php?id=" + id , {
        method: "POST",
        body: fd
    });

    const resposta = await retorno.json();
    if(resposta.status == "ok"){
        alert('sucesso!' + resposta.mensagem);
    }else{
        alert('erro' + resposta.mensagem)
    }
}