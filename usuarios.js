const tbody = document.querySelector(".listar-Usuarios");
const CadForm = document.getElementById('Cad-user-form');
const editForm = document.getElementById('edit-user-form');
const msgAlerta = document.getElementById('msgAlerta');

//Listar os Dados
const listarUsuarios = async (pagina) => {
    const dados = await fetch("./listusuarios.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);

//Visualizção dos dados
async function VisualizarDados(Id) {
    const dados = await fetch('visusuarios.php?Id=' + Id);
    const resposta = await dados.json();
   // console.log(resposta);

   if (resposta['erro']) {

    alert('Houve um erro!');
}
const visModal = new bootstrap.Modal(document.getElementById('visUsuario'));
visModal.show();

document.getElementById('Id').innerHTML = resposta['dados'].Id;

document.getElementById('Usuario').innerHTML = resposta['dados'].Usuario;

document.getElementById('Senha').innerHTML = resposta['dados'].Senha;

document.getElementById('Cod_cargo').innerHTML = resposta['dados'].Cod_cargo;

document.getElementById('DataRegisto').innerHTML = resposta['dados'].DataRegisto;

document.getElementById('NomeCompleto').innerHTML = resposta['dados'].NomeCompleto;

document.getElementById('Funcao').innerHTML = resposta['dados'].Funcao;

document.getElementById('Nºdocumento').innerHTML = resposta['dados'].Nºdocumento;
}

//Editar Dados no Banco
async function editarUsuariosDados(Id){
    const dados = await fetch('visusuarios.php?Id=' +Id);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    else{
        const editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
        editModal.show();

        document.getElementById('editid').value = resposta['dados'].Id;

        document.getElementById('editUsuario').value = resposta['dados'].Usuario;

        document.getElementById('editSenha').value = resposta['dados'].Senha;

        document.getElementById('editCod_cargo').value = resposta['dados'].Cod_cargo;

        document.getElementById('editNomeCompleto').value = resposta['dados'].NomeCompleto;

        document.getElementById('editFuncao').value = resposta['dados'].Funcao;

        document.getElementById('editNºdocumento').value = resposta['dados'].Nºdocumento;
    }
}
//Modal de Opcoes


function abrirModal(){
    const modal = document.getElementById('janela-modal')
    modal.classList.add('abrir')

    modal.addEventListener('click',(e) =>{
        if(e.target.id=='fechar' || e.target.id=='janela-modal')

        modal.classList.remove('abrir')
    })
};
