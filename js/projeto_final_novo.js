document.getElementById("enviar").addEventListener('click', function (){
    //Chamar a função FETCHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH
   novo();
});

async function novo(){
    var nome = document.getElementById('nome').value;
    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;
    var ativo = document.getElementById('ativo').value;

    // Corpo da requisição
    const fd = new FormData
    fd.append('nome', nome);
    fd.append('usuario', usuario);
    fd.append('senha', senha);
    fd.append('ativo', ativo);

    const retorno = await fetch("../php/projeto_final_novo.php", {
        method: "POST",
        body: fd
    });

    const resposta = await retorno.json();
    if(resposta.status === "ok"){
        alert('sucesso!' + resposta.mensagem);
        window.location.href = '../home/index.html'
    }else{
        alert('erro' + resposta.mensagem)
    }
}