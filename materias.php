<?php
    include_once("protect.php");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
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
<p class="HoraSistema"><i class="fa fa-calendar" id="NavIconCalendary"></i><?php date_default_timezone_set('Africa/Luanda'); $data = date('d-m-Y'); echo $data; ?></p>
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
                    <h4>Materias</h4>
                </div>
                <div>
                    <?php if($_SESSION['Funcao'] =='Professor'){
                        echo "<button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#CadMaterialModal'>
                        Cadastrar
                    </button>";

                    } 
                    else{
                        
                    }?>
                    

                </div>
                <div>
                    <?php if($_SESSION['Funcao'] =='Professor'){
                        echo "<button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#Confirm'>
                        Apagar todos os dados
                    </button>";

                    } 
                    else{
                        
                    }?>
                    

                </div>
                <div class="modal fade" id="Confirm" tabindex="-1" aria-labelledby="ConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ConfirmModalLabel">Pretendes apagar todos os dados?</h5>
                </div>
                <div class="modal-body">
                    <form method="post">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Não</button>
                <input type="submit" class="btn btn-outline-warning btn-sm" value="Sim" id="Cad-material-btn" name="EliminarTudo"/>         
                </div>
                </form>
                

            </div>

        </div>
    </div>

            </div>
        </div>
        <hr>
            
        <div class="row">
            <div class="col-lg-12">
                <span class="listar-Materias"></span>



            </div>
        </div>
    </div>

    <!--Teste de modal Visualizar-->
    <div class="modal fade" id="visMaterial" tabindex="-1" aria-labelledby="visMaterialModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visMaterialModalLabel">Detalhes do material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nº</dt>
                        <dd class="col-sm-9"><span id="Cod_material"></span></dd>

                        <dt class="col-sm-3">Material</dt>
                        <dd class="col-sm-9"><span id="Nome"></span></dd>

                        <dt class="col-sm-3">Estado</dt>
                        <dd class="col-sm-9"><span id="Estado"></span></dd>

                        <dt class="col-sm-3">Mesa</dt>
                        <dd class="col-sm-9"><span id="Cod_mesa"></span></dd>

                        <dt class="col-sm-3">Marca</dt>
                        <dd class="col-sm-9"><span id="Cod_marca"></span></dd>

                        <dt class="col-sm-3">Processador</dt>
                        <dd class="col-sm-9"><span id="Processador"></span></dd>

                        <dt class="col-sm-3">RAM</dt>
                        <dd class="col-sm-9"><span id="RAM"></span></dd>

                        <dt class="col-sm-3">Windows</dt>
                        <dd class="col-sm-9"><span id="Windows"></span></dd>

                        <dt class="col-sm-3">Edição</dt>
                        <dd class="col-sm-9"><span id="Edicao"></span></dd>

                        <dt class="col-sm-3">Tipo de Sistema</dt>
                        <dd class="col-sm-9"><span id="Tipo_sistema"></span></dd>

                        <dt class="col-sm-3">HD</dt>
                        <dd class="col-sm-9"><span id="HD"></span></dd>

                        <dt class="col-sm-3">Observação</dt>
                        <dd class="col-sm-9"><span id="Observacao"></span></dd>
                    </dl>    
                    
                </div>

            </div>

        </div>

    </div>
    <!--Fim  de modal Visualizar  -->

    <!--Modal Apagar Todos os dados-->
    <?php
            if(isset($_POST['EliminarTudo'])){
                include_once('conexao.php');

                $sql= $pdo->prepare("DELETE FROM `materias`");

                if($sql->execute()){
                    echo "<div class='alert alert-success' role='alert' >Todos os dados apagado!</div>";
                }
                else{
                    echo "<div class='alert alert-danger' role='alert' >Falha ao apagar todos os dados!</div>";

                }
            }
    ?>

     <!--Fim Modal apagar Todos os dados-->
    
    <!--Janela Modal CadModal -->
    <!--PHP De Insercão dos dados na tabela-->
    <?php
        date_default_timezone_set('Africa/Luanda');
        include_once "conexao.php";

        if(isset($_POST['acao'])){
            if(empty($_POST['nome']) || empty($_POST['estado']) || empty($_POST['cod_mesa']) || empty($_POST['cod_marca']) || empty(['processador']) || empty($_POST['ram'])  || empty(['win_dows']) || empty($_POST['edicao']) || empty($_POST['tipo_sistema']) || empty($_POST['hd']) || empty($_POST['observacao'])){
                echo "<div class='alert alert-danger' role='alert' >Campos obrigatório!</div>";
      

            }
            else{
                //Recebendo os dados apartir do metodo post
            $nome = $_POST['nome'];
            $estado = $_POST['estado'];
            $cod_mesa = $_POST['cod_mesa'];
            $cod_marca = $_POST['cod_marca'];
            $processador = $_POST['processador'];
            $ram = $_POST['ram'];
            $win_dows = $_POST['win_dows'];
            $edicao = $_POST['edicao'];
            $tipo_sistema = $_POST['tipo_sistema'];
            $hd = $_POST['hd'];
            $observacao = $_POST['observacao'];
            $DataRegisto = date('Y-m-d');

            //Inserir no BD
            $sql = $pdo->prepare("INSERT INTO materias VALUES (default,?,?,?,?,?,?,?,?,?,?,?,?)");

if($sql->execute(array($nome, $estado, $cod_mesa, $cod_marca,  $processador, $ram ,  $win_dows, $edicao, $tipo_sistema,  $hd,  $observacao,  $DataRegisto))){
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

$SendEditCont = filter_input(INPUT_POST, 'SendEditCont', FILTER_SANITIZE_STRING);
if($SendEditCont){
//Receber os dados do formulário
$Cod_material1 = filter_input(INPUT_POST, 'Cod_material1', FILTER_SANITIZE_NUMBER_INT);
$nome1 = filter_input(INPUT_POST, 'Nome1', FILTER_SANITIZE_STRING);
$Estado1 = filter_input(INPUT_POST, 'Estado1', FILTER_SANITIZE_STRING);
$Cod_mesa1 = filter_input(INPUT_POST, 'Cod_mesa1', FILTER_SANITIZE_STRING);
$Cod_marca1 = filter_input(INPUT_POST, 'Cod_marca1', FILTER_SANITIZE_STRING);
$Processador1 = filter_input(INPUT_POST, 'Processador1', FILTER_SANITIZE_STRING);
$RAM1 = filter_input(INPUT_POST, 'RAM1', FILTER_SANITIZE_STRING);
$Win_dows1 = filter_input(INPUT_POST, 'Win_dows1', FILTER_SANITIZE_STRING);
$Edicao1 = filter_input(INPUT_POST, 'Edicao1', FILTER_SANITIZE_STRING);
$Tipo_Sistema1 = filter_input(INPUT_POST, 'Tipo_Sistema1', FILTER_SANITIZE_STRING);
$HD1 = filter_input(INPUT_POST, 'HD1', FILTER_SANITIZE_STRING);
$Observacao1 = filter_input(INPUT_POST, 'Observacao1', FILTER_SANITIZE_STRING);

if(empty($_POST['Nome1']) || empty($_POST['Estado1']) || empty($_POST['Cod_mesa1']) || empty($_POST['Cod_marca1']) || empty(['Processador1']) || empty($_POST['RAM1'])  || empty(['Win_dows1']) || empty($_POST['Edicao1']) || empty($_POST['Tipo_Sistema1']) || empty($_POST['HD1']) || empty($_POST['Observacao1'])){
    echo "<div class='alert alert-danger'>Campos obrigatorio!</div>";
}
else{
    
//Atualizar no BD
$result_msg_cont = "UPDATE materias SET Nome=:nome, Estado=:estado, Cod_mesa=:Cod_mesa, Cod_marca=:Cod_marca, Processador=:Processador, RAM=:RAM,  Win_dows=:Win_dows, Edicao=:Edicao, Tipo_Sistema=:Tipo_Sistema, HD=:HD, Observacao=:Observacao WHERE Cod_material=$Cod_material1";

$update_material = $pdo->prepare($result_msg_cont);
$update_material->bindParam(':nome', $nome1);
$update_material->bindParam(':estado', $Estado1);
$update_material->bindParam(':Cod_mesa', $Cod_mesa1);
$update_material->bindParam(':Cod_marca', $Cod_marca1);
$update_material->bindParam(':Processador', $Processador1);
$update_material->bindParam(':RAM', $RAM1);
$update_material->bindParam(':Win_dows', $Win_dows1);
$update_material->bindParam(':Edicao', $Edicao1);
$update_material->bindParam(':Tipo_Sistema', $Tipo_Sistema1);
$update_material->bindParam(':HD', $HD1);
$update_material->bindParam(':Observacao', $Observacao1);


if($update_material->execute()){
echo "<div class='alert alert-success'>Dados Actualizado Com Sucesso!</div>";

}
else{
echo "<div class='alert alert-danger'>Houve um erro!</div>";

}    

}



}

?>




    <div class="modal fade" id="CadMaterialModal" tabindex="-1" aria-labelledby="CadMaterialModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadMaterialModalLabel">Cadastrar material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="Cad-material-form" method="POST">
                        <div class="mb-3">


                            <div class="mb-3">
                                <label for="nome" class="col-form-label">Material</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Material" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="estado" class="col-form-label">Estado</label>
                                <input type="text" name="estado" class="form-control" id="estado" placeholder="Bom/Mau" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="cod_mesa" class="col-form-label">Mesa</label>
                                <select name="cod_mesa" id="cod_mesa" class="form-control">

                                <?php
                                $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                $result = "SELECT * FROM mesas";
                                $result = $pdo->prepare($result);
                                $result->execute();

                                while($row_result = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value="<?php echo $row_result['Cod_mesa']; ?>"><?php echo $row_result['Cod_mesa']; ?>
                                </option><?php
                                }
                                ?>


                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="cod_marca" class="col-form-label">Marca</label>
                                <select name="cod_marca" id="cod_marca" class="form-control">
                                <?php
                                $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                $result = "SELECT * FROM marcas";
                                $result = $pdo->prepare($result);
                                $result->execute();

                                while($row_result = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value="<?php echo $row_result['Cod_marca']; ?>"><?php echo $row_result['Cod_marca']; ?>
                                </option><?php
                                }
                                ?>


                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="processado" class="col-form-label">Processador</label>
                                <input type="text" name="processador" class="form-control" id="processador" placeholder="Processador" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="ram" class="col-form-label">RAM</label>
                                <input type="text" name="ram" class="form-control" id="ram" placeholder="Memória RAM" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="win_dows" class="col-form-label">Windows</label>
                                <input type="text" name="win_dows" class="form-control" id="win_dows" placeholder="Windows" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="edicao" class="col-form-label">Edição</label>
                                <input type="text" name="edicao" class="form-control" id="edicao" placeholder="Edição do windows" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="tipo_sistema" class="col-form-label">Tipo de sistema</label>
                                <input type="text" name="tipo_sistema" class="form-control" id="tipo_sistema" placeholder="64bits/32bits" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="hd" class="col-form-label">HD</label>
                                <input type="text" name="hd" class="form-control" id="hd" placeholder="Disco duro" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="observacao" class="col-form-label">Observação</label>
                                <input type="text" name="observacao" class="form-control" id="observacao" placeholder="Observação" autocomplete="off">
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar" id="Cad-material-btn" name="acao"/>
                            </div>


                    </form>

                </div>


            </div>

        </div>

    </div>

    </article>

    <!-- Fim Janela Modal CadModal -->



     <!--Janela Modal EditarModal -->

    <div class="modal fade" id="editMaterialModal" tabindex="-1" aria-labelledby="editMaterialModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMaterialModalLabel">Editar material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="edit-material-form" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="Cod_material1" id="editid">


                            <div class="mb-3">
                                <label for="nome" class="col-form-label">Material</label>
                                <input type="text" name="Nome1" class="form-control" id="editnome" placeholder="Material" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="estado" class="col-form-label">Estado</label>
                                <input type="text" name="Estado1" class="form-control" id="editestado" placeholder="Bom/Mau" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="cod_mesa" class="col-form-label">Mesa</label>
                                <input type="text" name="Cod_mesa1" class="form-control" id="editcod_mesa" placeholder="Mesa" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="cod_marca" class="col-form-label">Marca</label>
                                <input type="text" name="Cod_marca1" class="form-control" id="editcod_marca" placeholder="NºMarca" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="processado" class="col-form-label">Processador</label>
                                <input type="text" name="Processador1" class="form-control" id="editprocessador" placeholder="Processador" >
                            </div>

                            <div class="mb-3">
                                <label for="ram" class="col-form-label">RAM</label>
                                <input type="text" name="RAM1" class="form-control" id="editram" placeholder="Memória RAM" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="win_dows" class="col-form-label">Windows</label>
                                <input type="text" name="Win_dows1" class="form-control" id="editwin_dows" placeholder="Windows" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="edicao" class="col-form-label">Edição</label>
                                <input type="text" name="Edicao1" class="form-control" id="editedicao" placeholder="Edição do windows" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="tipo_sistema" class="col-form-label">Tipo de sistema</label>
                                <input type="text" name="Tipo_Sistema1" class="form-control" id="edittipo_sistema" placeholder="64bits/32bits" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="hd" class="col-form-label">HD</label>
                                <input type="text" name="HD1" class="form-control" id="edithd" placeholder="Disco duro" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="observacao" class="col-form-label">Observação</label>
                                <input type="text" name="Observacao1" class="form-control" id="editobservacao" placeholder="Observação" autocomplete="off">
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-outline-warning btn-sm" value="Salvar" id="edit-material-btn" name="SendEditCont"/>
                            </div>


                    </form>

                </div>


            </div>

        </div>

    </div>
    <!-- Fim Janela Modal EditarModal -->

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="custom.js"></script>
</body>
</html>