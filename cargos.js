const tbody = document.querySelector(".listar-Cargos");
const CadForm = document.getElementById('Cad-cargo-form');
const editForm = document.getElementById('edit-cargo-form');
const msgAlerta = document.getElementById('msgAlerta');

const listarCargos = async (pagina) => {
    const dados = await fetch("./listcargos.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarCargos(1);

async function VisualizarDados(Cod_cargo) {
    const dados = await fetch('viscargos.php?Cod_cargo=' + Cod_cargo);
    const resposta = await dados.json();
    // console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    const visModal = new bootstrap.Modal(document.getElementById('visCargo'));
    visModal.show();

    document.getElementById('Cod_cargo').innerHTML = resposta['dados'].Cod_cargo;

    document.getElementById('Nome').innerHTML = resposta['dados'].Nome;


}



async function editarCargosDados(Cod_cargo){
    const dados = await fetch('viscargos.php?Cod_cargo=' +Cod_cargo);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    else{
        const editModal = new bootstrap.Modal(document.getElementById('editCargoModal'));
        editModal.show();

        document.getElementById('editid').value = resposta['dados'].Cod_cargo;

        document.getElementById('editnome').value = resposta['dados'].Nome;

    }
}



//MOdal de opcoes

function abrirModal(){
    const modal = document.getElementById('janela-modal')
    modal.classList.add('abrir')

    modal.addEventListener('click',(e) =>{
        if(e.target.id=='fechar' || e.target.id=='janela-modal')

        modal.classList.remove('abrir')
    })
};
