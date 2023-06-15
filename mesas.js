const tbody = document.querySelector(".listar-Mesas");
const CadForm = document.getElementById('Cad-mesa-form');
const editForm = document.getElementById('edit-mesa-form');
const msgAlerta = document.getElementById('msgAlerta');


//Listar os Dados
const listarMesas = async (pagina) => {
    const dados = await fetch("./listmesas.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarMesas(1);

//Visualizção dos dados
async function VisualizarDados(Cod_mesa) {
    const dados = await fetch('vismesa.php?Cod_mesa=' + Cod_mesa);
    const resposta = await dados.json();
   // console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    const visModal = new bootstrap.Modal(document.getElementById('visMesa'));
    visModal.show();

    document.getElementById('Cod_mesa').innerHTML = resposta['dados'].Cod_mesa;

    document.getElementById('Nome').innerHTML = resposta['dados'].Nome;

    document.getElementById('NºComputadores').innerHTML = resposta['dados'].NºComputadores;

    document.getElementById('NºAlunos').innerHTML = resposta['dados'].NºAlunos;

    document.getElementById('Observacao').innerHTML = resposta['dados'].Observacao;

}

//Editar Dados no Banco
async function editarMesasDados(Cod_mesa){
    const dados = await fetch('vismesa.php?Cod_mesa=' +Cod_mesa);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    else{
        const editModal = new bootstrap.Modal(document.getElementById('editMesaModal'));
        editModal.show();

        document.getElementById('editid').value = resposta['dados'].Cod_mesa;

        document.getElementById('editnome').value = resposta['dados'].Nome;

        document.getElementById('editNºComputadores').value = resposta['dados'].NºComputadores;

        document.getElementById('editNºAlunos').value = resposta['dados'].NºAlunos;

        document.getElementById('editObservacao').value = resposta['dados'].Observacao;
    }
}


function abrirModal(){
    const modal = document.getElementById('janela-modal')
    modal.classList.add('abrir')

    modal.addEventListener('click',(e) =>{
        if(e.target.id=='fechar' || e.target.id=='janela-modal')

        modal.classList.remove('abrir')
    })
};
