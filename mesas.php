
<?php
     include_once("protect.php");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>
    <link rel="shortcut icon" href="./imagens//LogSGLINFOR.png" type="image/x-icon">
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
<p class="HoraSistema"><i class="fa fa-clock" id="NavIconCalendary"></i><?php date_default_timezone_set('Africa/Luanda'); 
echo date('H:i'); ?></p>
    <a href="materias.php" class="linkNav" >  <i class="fa fa-tools" id="NavIcon1"></i> Materias </a>
    <a href="estatistica.php" class="linkNav"> <i class="fa fa-line-chart" id="NavIcon2"></i> Estatística </a>
    <a href="usuarios.php" class="linkNav"> <i class="fa fa-users" id="NavIcon3"></i> Contas </a>
    <a href="acerca.php" class="linkNav"> <i class="fa fa-info" id="NavIcon4"></i> Acerca </a>
    <a href="#" class="linkNav" onclick="abrirModal()"> <i class="fa fa-computer" id="NavIcon5"></i> Dados</a>
    <a href="sair.php" class="linkNav"> <i class="fa fa-outdent" id="NavIcon6"></i> Sair </a>
    
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
                    <h4>Mesas</h4>
                </div>
                <div>
                    <?php if($_SESSION['Funcao']=='Professor'){
                        echo"<button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#CadMesaModal'>
                        Cadastrar
                    </button>";
                    }
                    else{
                        
                    }?>
                    

                </div>

            </div>
        </div>
        <hr>
            <?php
                 if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        <div class="row">
            <div class="col-lg-12">
                <span class="listar-Mesas"></span>



            </div>
        </div>
    </div>

    <!--Teste de modal Visualizar-->
    <div class="modal fade" id="visMesa" tabindex="-1" aria-labelledby="visMesaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visMesaModalLabel">Detalhes da Mesa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Codigo Mesa</dt>
                        <dd class="col-sm-9"><span id="Cod_mesa"></span></dd>

                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9"><span id="Nome"></span></dd>

                        <dt class="col-sm-3">Computadores  </dt>
                        <dd class="col-sm-9"><span id="NºComputadores"></span></dd>

                        <dt class="col-sm-3">Alunos</dt>
                        <dd class="col-sm-9"><span id="NºAlunos"></span></dd>

                        <dt class="col-sm-3">Observacao</dt>
                        <dd class="col-sm-9"><span id="Observacao"></span></dd>
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
            if(empty($_POST['Nome']) || empty($_POST['NComputadores']) || empty($_POST['NAlunos']) || empty($_POST['Observacao'])){
                echo "<div class='alert alert-danger' role='alert' >Campos obrigatório!</div>";
            }
            else{
                 //Recebendo os dados apartir do metodo post
            $nome = $_POST['Nome'];
            $NºComputadores = $_POST['NComputadores'];
            $NºAlunos = $_POST['NAlunos'];
            $Observacao = $_POST['Observacao'];
            $DataRegisto = date('Y-m-d');

       
            //Inserir no BD
            $sql = $pdo->prepare("INSERT INTO mesas VALUES (default,?,?,?,?,?)");

if($sql->execute(array($nome, $NºComputadores, $NºAlunos,  $Observacao, $DataRegisto))){
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

        $SendEditMesa = filter_input(INPUT_POST, 'SendEditMesa', FILTER_SANITIZE_STRING);
        if($SendEditMesa){
        //Receber os dados do formulário
        $Cod_mesa1 = filter_input(INPUT_POST, 'Cod_mesa1', FILTER_SANITIZE_NUMBER_INT);
        $Nome1 = filter_input(INPUT_POST, 'Nome1', FILTER_SANITIZE_STRING);
        $NComputadores1 = filter_input(INPUT_POST, 'NComputadores1', FILTER_SANITIZE_STRING);
        $NAlunos1 = filter_input(INPUT_POST, 'NAlunos1', FILTER_SANITIZE_STRING);
        $Observacao1 = filter_input(INPUT_POST, 'Observacao1', FILTER_SANITIZE_STRING);

        if(empty($_POST['Nome1']) || empty($_POST['NComputadores1']) || empty($_POST['NAlunos1']) || empty($_POST['Observacao1'])){
            echo "<div class='alert alert-danger'>Campos obrigatório!</div>";
        }
        else{
             //Atualizar no BD
 $result_mesa = "UPDATE mesas SET Nome=:Nome1, NºComputadores=:NComputadores1, NºAlunos=:NAlunos1, Observacao=:Observacao1 WHERE Cod_mesa=$Cod_mesa1";

 $update_mesa = $pdo->prepare($result_mesa);

 $update_mesa->bindParam(':Nome1', $Nome1);
 $update_mesa->bindParam(':NComputadores1', $NComputadores1);
 $update_mesa->bindParam(':NAlunos1', $NAlunos1);
 $update_mesa->bindParam(':Observacao1', $Observacao1);
     
 

     if($update_mesa->execute()){
     echo "<div class='alert alert-success'>Dados Actualizado Com Sucesso!</div>";

     }else{
     echo "<div class='alert alert-danger'>Houve um erro!</div>";

     }    

        }


        }



    ?>




    <div class="modal fade" id="CadMesaModal" tabindex="-1" aria-labelledby="CadMesaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadMesaModalLabel">Cadastrar mesa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="Cad-mesa-form" method="POST">
                        <div class="mb-3">

                            <div class="mb-3">
                                <label for="Nome" class="col-form-label">Mesa</label>
                                <input type="text" name="Nome" class="form-control" id="Nome" placeholder="Mesa" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="NºComputadores" class="col-form-label">Computadores</label>
                                <input type="text" name="NComputadores" class="form-control" id="NºComputadores" placeholder="NºComputadores" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="NºAlunos" class="col-form-label">Alunos</label>
                                <input type="text" name="NAlunos" class="form-control" id="NºAlunos" placeholder="NºAlunos" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="Observacao" class="col-form-label">Observação</label>
                                <input type="text" name="Observacao" class="form-control" id="Observacao" placeholder="Observação" autocomplete="off" >
                            </div>

                           

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar" id="Cad-mesa-btn" name="acao"/>
                            </div>


                    </form>

                </div>


            </div>

        </div>

    </div>

    </article>

    <!-- Fim Janela Modal CadModal -->



     <!--Janela Modal EditarModal -->

    <div class="modal fade" id="editMesaModal" tabindex="-1" aria-labelledby="editMesaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMesaModalLabel">Editar Mesa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="edit-mesa-form" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="Cod_mesa1" id="editid">


                            <div class="mb-3">
                                <label for="nome" class="col-form-label">Nome</label>
                                <input type="text" name="Nome1" class="form-control" id="editnome" placeholder="Digite o nome mesa" >
                            </div>

                            <div class="mb-3">
                                <label for="NºComputadores1" class="col-form-label">NºComputadores</label>
                                <input type="text" name="NComputadores1" class="form-control" id="editNºComputadores" placeholder="Digite o NºComputadores" >
                            </div>

                            <div class="mb-3">
                                <label for="NºAlunos1" class="col-form-label">NºAlunos</label>
                                <input type="text" name="NAlunos1" class="form-control" id="editNºAlunos" placeholder="Digite o NºAlunos" >
                            </div>

                            <div class="mb-3">
                                <label for="Observacao1" class="col-form-label">Observação</label>
                                <input type="text" name="Observacao1" class="form-control" id="editObservacao" placeholder="Observação" >
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-outline-warning btn-sm" value="Salvar" id="edit-mesa-btn" name="SendEditMesa"/>
                            </div>


                    </form>

                </div>


            </div>

        </div>

    </div>
    <!-- Fim Janela Modal EditarModal -->

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="mesas.js"></script>
</body>
</html>