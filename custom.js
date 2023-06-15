const tbody = document.querySelector(".listar-Materias");
const CadForm = document.getElementById('Cad-material-form');
const editForm = document.getElementById('edit-material-form');
const msgAlerta = document.getElementById('msgAlerta');

const listarMaterias = async (pagina) => {
    const dados = await fetch("./list.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarMaterias(1);



async function VisualizarDados(Cod_material) {
    const dados = await fetch('visualizar.php?Cod_material=' + Cod_material);
    const resposta = await dados.json();
   // console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    const visModal = new bootstrap.Modal(document.getElementById('visMaterial'));
    visModal.show();

    document.getElementById('Cod_material').innerHTML = resposta['dados'].Cod_material;

    document.getElementById('Nome').innerHTML = resposta['dados'].Nome;

    document.getElementById('Estado').innerHTML = resposta['dados'].Estado;

    document.getElementById('Cod_mesa').innerHTML = resposta['dados'].Cod_mesa;

    document.getElementById('Cod_marca').innerHTML = resposta['dados'].Cod_marca;

    document.getElementById('Processador').innerHTML = resposta['dados'].Processador;

    document.getElementById('RAM').innerHTML = resposta['dados'].RAM;

    document.getElementById('Windows').innerHTML = resposta['dados'].Win_dows;

    document.getElementById('Edicao').innerHTML = resposta['dados'].Edicao;

    document.getElementById('Tipo_sistema').innerHTML = resposta['dados'].Tipo_Sistema;

    document.getElementById('HD').innerHTML = resposta['dados'].HD;

    document.getElementById('Observacao').innerHTML = resposta['dados'].Observacao;

}


async function editarMateriasDados(Cod_material){
    const dados = await fetch('visualizar.php?Cod_material=' +Cod_material);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    else{
        const editModal = new bootstrap.Modal(document.getElementById('editMaterialModal'));
        editModal.show();

        document.getElementById('editid').value = resposta['dados'].Cod_material;

        document.getElementById('editnome').value = resposta['dados'].Nome;

        document.getElementById('editestado').value = resposta['dados'].Estado;

        document.getElementById('editcod_mesa').value = resposta['dados'].Cod_mesa;

        document.getElementById('editcod_marca').value = resposta['dados'].Cod_marca;

        document.getElementById('editprocessador').value = resposta['dados'].Processador;

        document.getElementById('editram').value = resposta['dados'].RAM;

        document.getElementById('editwin_dows').value = resposta['dados'].Win_dows;

        document.getElementById('editedicao').value = resposta['dados'].Edicao;

        document.getElementById('edittipo_sistema').value = resposta['dados'].Tipo_Sistema;

        document.getElementById('edithd').value = resposta['dados'].HD;

        document.getElementById('editobservacao').value = resposta['dados'].Observacao;
    }
}

/*
    editForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const dadosForm = new FormData(editForm);
        //console.log(dadosForm);

        const dados = await fetch("editar.php",{
            method:"POST",
            body: dadosForm
        });

        const resposta = await dados.json();
        console.log(resposta);


    });

    */

    /*
    async function apagarMateriasDados(Cod_material){
        console.log("Acessou A Funcao "+ Cod_material);

        const dados = await fetch('apagar.php?='+ Cod_material);

        const resposta = await dados.json();
        if(resposta['erro']){
            msgAlerta.innerHTML = resposta['msg'];
        }
        else{
            msgAlerta.innerHTML = resposta['msg'];
            listarMaterias(1);

        }

    }
    */

function abrirModal(){
    const modal = document.getElementById('janela-modal')
    modal.classList.add('abrir')

    modal.addEventListener('click',(e) =>{
        if(e.target.id=='fechar' || e.target.id=='janela-modal')

        modal.classList.remove('abrir')
    })
};

//Animacao no texto da tela de login
