const tbody = document.querySelector(".listar-Marcas");
const CadForm = document.getElementById('Cad-marca-form');
const editForm = document.getElementById('edit-marca-form');
const msgAlerta = document.getElementById('msgAlerta');


//Listar os Dados
const listarMarcas = async (pagina) => {
    const dados = await fetch("./listmarcas.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarMarcas(1);

//Visualizção dos dados
async function VisualizarDados(Cod_marca) {
    const dados = await fetch('vismarcas.php?Cod_marca=' + Cod_marca);
    const resposta = await dados.json();
   //console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    const visModal = new bootstrap.Modal(document.getElementById('visMarca'));
    visModal.show();

    document.getElementById('Cod_marca').innerHTML = resposta['dados'].Cod_marca;

    document.getElementById('Nome').innerHTML = resposta['dados'].Nome;
    

}

//Editar Dados no Banco
async function editarMarcasDados(Cod_marca){
    const dados = await fetch('vismarcas.php?Cod_marca=' +Cod_marca);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {

        alert('Houve um erro!');
    }
    else{
        const editModal = new bootstrap.Modal(document.getElementById('editMarcaModal'));
        editModal.show();

        document.getElementById('editid').value = resposta['dados'].Cod_marca;

        document.getElementById('editnome').value = resposta['dados'].Nome;

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


function apagarmarcas(){
    alert('AAAAAA');
}



