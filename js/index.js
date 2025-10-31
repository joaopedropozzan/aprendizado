document.addEventListener("DOMContentLoaded", () => {
    carregarDados();
});
document.getElementById('novo').addEventListener('click', () => {
    window.location.href = '../home/projeto_final_novo.html';
});
document.getElementById('logoff').addEventListener('click', () => {
    window.location.href = '../login/';
});

async function carregarDados (){
    const retorno = await fetch("../php/projeto_final_get.php");
    const resposta = await retorno.json();

    if (resposta.status === "ok"){
        const registros = resposta.data;
        let html = `<table>
        <tr>
            <td>Nome</td>
            <td>Usuario</td>
            <td>Senha</td>
            <td>Ativo</td>
            <td>#</td>
        </tr>`;

        for(let i = 0; i < registros.length;i++){
            let objeto = registros[i];
            html += `<tr>
                        <td>${objeto.nome}</td>
                        <td>${objeto.usuario}</td>
                        <td>${objeto.senha}</td>
                        <td>${objeto.ativo}</td>
                        <td>
                        <a href="projeto_final_alterar.html?id=${objeto.id}">Alterar</a>
                        <a href="#" onclick="excluir(${objeto.id})">Excluir </a>
                        </td>
                    </tr>`;
        }
        html += "</table>";
        document.getElementById("lista").innerHTML += html;
    }else{
        alert("Erro:" + resposta.mensagem);
    }
}
async function excluir(id){
    const  retorno = await fetch('../php/projeto_final_excluir.php?id=' + id);
    const resposta = await retorno.json();
    if(resposta.status === 'ok'){
        alert(resposta.mensagem);
        window.location.reload();
    }
}