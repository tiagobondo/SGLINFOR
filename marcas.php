<?php
    include_once("protect.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/icones/css/all.min.css">
    <link rel="stylesheet" href="estilos/icones/css/regular.min.css">
</head>

<body>
<header>
        <p class="NomeSistema">Sistema de Gestão do Laboratório de Informática</p>
        <p id="PUser"><?php echo $_SESSION['Usuario']; ?></p> <abbr title="<?php echo $_SESSION['NomeCompleto']; ?>"><img src="./icones//icons8_Male_User_50px.png" alt="" id="ImgUser"></abbr>
</header>

<nav class="NavBotoes">

<p class="TituloUsuario"><?php echo $_SESSION['Funcao']; ?></p>
<p class="linhaHorizontal">______________________________</p>
    <a href="materias.php" class="linkNav" >  <i class="fa fa-tools" id="NavIcon"></i> Materias </a>
    <a href="estatistica.php" class="linkNav"> <i class="fa fa-line-chart" id="NavIcon"></i> Estatística </a>
    <a href="usuarios.php" class="linkNav"> <i class="fa fa-users" id="NavIcon"></i> Contas </a>
    <a href="acerca.php" class="linkNav"> <i class="fa fa-info" id="NavIcon"></i> Acerca </a>
    <a href="#" class="linkNav" onclick="abrirModal()"> <i class="fa fa-computer" id="NavIcon"></i> Dados</a>
    <a href="sair.php" class="linkNav"> <i class="fa fa-outdent" id="NavIcon"></i> Sair </a>
    
    <div class="janela-modal" id="janela-modal">
    <div class="modal1">

    <a href="marcas.php" class="Painel" >   Marcas </a>
    <a href="mesas.php" class="Painel">  Mesas </a>
    <a href="cargos.php" class="Painel">  cargos </a>

        
        </div>
        
    </div>
</nav>


    <article class="articleConteudos">
    
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4>Marcas</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#CadMarcaModal">
                        Cadastrar
                    </button>

                </div>

            </div>
        </div>
        <hr>
            
        <div class="row">
            <div class="col-lg-12">
                <span class="listar-Marcas"></span>



            </div>
        </div>
    </div>

    <!--Teste de modal Visualizar-->
    <div class="modal fade" id="visMarca" tabindex="-1" aria-labelledby="visMarcaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visMarcaModalLabel">Detalhe da marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nº</dt>
                        <dd class="col-sm-9"><span id="Cod_marca"></span></dd>

                        <dt class="col-sm-3">Marca</dt>
                        <dd class="col-sm-9"><span id="Nome"></span></dd>

                        
                    </dl>    
                    
                </div>

            </div>

        </div>

    </div>
    <!--Fim  de modal Visualizar  -->
    
    <!--Janela Modal CadModal -->
    <!--PHP De Insercão dos dados na tabela-->
    <?php
        date_default_timezone_set('Africa/Luanda');
        include_once "conexao.php";

        if(isset($_POST['acao'])){
            if(empty($_POST['Nome'])){
                echo "<div class='alert alert-danger' role='alert' >Campo obrigatório!</div>";
            }
            else{
                 //Recebendo os dados apartir do metodo post
            $Nome = $_POST['Nome'];
            $DataRegisto = date('Y-m-d');
    
            //Inserir no BD
            $sql = $pdo->prepare("INSERT INTO marcas VALUES (default,?,?)");

            if($sql->execute(array($Nome, $DataRegisto))){
                echo "<div class='alert alert-success' role='alert' >Cadastrado com sucesso!</div>";
      
            }
            else{
                echo "<div class='alert alert-danger' role='alert' >Nenhum dados Inserido!</div>";
            }

            }

           
        }
    
    ?>

    <!--PHP De Insercão dos dados na tabela-->
     <?php

include_once("conexao.php");

$SendEditMarca = filter_input(INPUT_POST, 'SendEditMarca', FILTER_SANITIZE_STRING);
if($SendEditMarca){
//Receber os dados do formulário
$Cod_marca1 = filter_input(INPUT_POST, 'Cod_marca1', FILTER_SANITIZE_NUMBER_INT);
$nome1 = filter_input(INPUT_POST, 'Nome1', FILTER_SANITIZE_STRING);

if(empty($_POST['Nome1'])){
    echo "<div class='alert alert-danger'>Campo obrigatório!</div>";
}
else{
    
//Atualizar no BD
$result_msg_cont = "UPDATE marcas SET Nome=:Nome1 WHERE Cod_marca=$Cod_marca1";

$update_material = $pdo->prepare($result_msg_cont);
$update_material->bindParam(':Nome1', $nome1);

if($update_material->execute()){
echo "<div class='alert alert-success'>Dados Actualizado Com Sucesso!</div>";

}else{
echo "<div class='alert alert-danger'>Houve um erro!</div>";

}    

}



}



?>




    <div class="modal fade" id="CadMarcaModal" tabindex="-1" aria-labelledby="CadMarcaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadMarcaModalModalLabel">Cadastrar marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="Cad-marca-form" method="POST">
                        <div class="mb-3">

                            <div class="mb-3">
                                <label for="Nome" class="col-form-label">Marca</label>
                                <input type="text" name="Nome" class="form-control" id="Nome" placeholder="Marca" autocomplete="off">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar" id="Cad-marca-btn" name="acao"/>
                            </div>


                    </form>

                </div>


            </div>

        </div>

    </div>

    </article>

    <!-- Fim Janela Modal CadModal -->



     <!--Janela Modal EditarModal -->

    <div class="modal fade" id="editMarcaModal" tabindex="-1" aria-labelledby="editMarcaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMarcaModalLabel">Editar marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="edit-marca-form" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="Cod_marca1" id="editid">


                            <div class="mb-3">
                                <label for="Nome1" class="col-form-label">Marca</label>
                                <input type="text" name="Nome1" class="form-control" id="editnome" placeholder="Marca" autocomplete="off" >
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-outline-warning btn-sm" value="Salvar" id="edit-marca-btn" name="SendEditMarca"/>
                            </div>


                    </form>

                </div>


            </div>

        </div>

    </div>
    <!-- Fim Janela Modal EditarModal -->

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="marcas.js"></script>
</body>
</html>