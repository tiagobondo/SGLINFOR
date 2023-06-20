<?php
    include_once("protect.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas</title>
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
<p class="HoraSistema"><i class="fa fa-line-calendary" id="NavIconCalendary"></i><?php date_default_timezone_set('Africa/Luanda'); $data = date('d-m-Y'); echo $data; ?></p>
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
                    <h4>Usuários</h4>
                </div>
                <div>
                    <?php if($_SESSION['Funcao'] =='Professor'){
                        echo "<button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#CadUserModal'>
                        Cadastrar
                    </button>";
                    } 
                    else{

                    }?>
                    

                </div>

            </div>
        </div>
        <hr>
            
        <div class="row">
            <div class="col-lg-12">
                <span class="listar-Usuarios"></span>



            </div>
        </div>
    </div>

    <!--Teste de modal Visualizar-->
    <div class="modal fade" id="visUsuario" tabindex="-1" aria-labelledby="visUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visUsuarioModalLabel">Detalhes de Usuários</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9"><span id="Id"></span></dd>

                        <dt class="col-sm-3">Usuário</dt>
                        <dd class="col-sm-9"><span id="Usuario"></span></dd>

                        <dt class="col-sm-3">Senha</dt>
                        <dd class="col-sm-9"><span id="Senha"></span></dd>

                        <dt class="col-sm-3">Cod_cargo</dt>
                        <dd class="col-sm-9"><span id="Cod_cargo"></span></dd>

                        <dt class="col-sm-3">DataRegisto</dt>
                        <dd class="col-sm-9"><span id="DataRegisto"></span></dd>

                        <dt class="col-sm-3">NomeCompleto</dt>
                        <dd class="col-sm-9"><span id="NomeCompleto"></span></dd>

                        <dt class="col-sm-3">Funcao</dt>
                        <dd class="col-sm-9"><span id="Funcao"></span></dd>

                        <dt class="col-sm-3">Nºdocumento</dt>
                        <dd class="col-sm-9"><span id="Nºdocumento"></span></dd>

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
            if(empty($_POST['Usuario']) || empty($_POST['Senha']) || empty($_POST['Cod_cargo']) || empty($_POST['NomeCompleto']) || empty($_POST['Funcao']) || empty($_POST['Nºdocumento'])){
                echo "<div class='alert alert-danger' role='alert' >Campos obrigatorio!</div>";

            }
                
            else{
                 //Recebendo os dados apartir do metodo post
            $Usuario = $_POST['Usuario'];
            $Senha = $_POST['Senha'];
            $Cod_cargo = $_POST['Cod_cargo'];
            $DataRegisto = date('Y-m-d');
            $NomeCompleto = $_POST['NomeCompleto'];
            $Funcao = $_POST['Funcao'];
            $Nºdocumento = $_POST['Nºdocumento'];
       
            //Inserir no BD
            $sql = $pdo->prepare("INSERT INTO usuarios VALUES (default,?,?,?,?,?,?,?)");

if($sql->execute(array($Usuario, $Senha, $Cod_cargo, $DataRegisto,  $NomeCompleto, $Funcao, $Nºdocumento))){
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

        $SendEditUser = filter_input(INPUT_POST, 'SendEditUser', FILTER_SANITIZE_STRING);
        if($SendEditUser){
        //Receber os dados do formulário
        $ID = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
        $Usuario1 = filter_input(INPUT_POST, 'Usuario1', FILTER_SANITIZE_STRING);
        $Senha1 = filter_input(INPUT_POST, 'Senha1', FILTER_SANITIZE_STRING);
        $Cod_cargo1 = filter_input(INPUT_POST, 'Cod_cargo1', FILTER_SANITIZE_STRING);
        $NomeCompleto1 = filter_input(INPUT_POST, 'NomeCompleto1', FILTER_SANITIZE_STRING);
        $Funcao1 = filter_input(INPUT_POST, 'Funcao1', FILTER_SANITIZE_STRING);
        $Ndocumento1 = filter_input(INPUT_POST, 'Ndocumento1', FILTER_SANITIZE_STRING);

        if(empty($_POST['Usuario1']) || empty($_POST['Senha1']) || empty($_POST['Cod_cargo1']) || empty($_POST['NomeCompleto1']) || empty($_POST['Funcao1']) || empty($_POST['Ndocumento1'])){
            echo "<div class='alert alert-danger'>Campos obrigatórios!</div>";

        }
        else{
            //Atualizar no BD
 $result_mesa = "UPDATE usuarios SET Usuario=:Usuario1, Senha=:Senha1, Cod_cargo=:Cod_cargo1, NomeCompleto=:NomeCompleto1, Funcao=:Funcao1, Nºdocumento=:Ndocumento1 WHERE Id=$ID";

 $update_mesa = $pdo->prepare($result_mesa);

 $update_mesa->bindParam(':Usuario1', $Usuario1);
 $update_mesa->bindParam(':Senha1', $Senha1);
 $update_mesa->bindParam(':Cod_cargo1', $Cod_cargo1);
 $update_mesa->bindParam(':NomeCompleto1', $NomeCompleto1);
 $update_mesa->bindParam(':Funcao1', $Funcao1);
 $update_mesa->bindParam(':Ndocumento1', $Ndocumento1);
     
 

     if($update_mesa->execute()){
     echo "<div class='alert alert-success'>Dados Actualizado Com Sucesso!</div>";

     }else{
     echo "<div class='alert alert-danger'>Houve um erro!</div>";

     }    

        }



        
        }



    ?>




    <div class="modal fade" id="CadUserModal" tabindex="-1" aria-labelledby="CadUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CadUserModalLabel">Cadastrar usuários</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="Cad-user-form" method="POST">
                        <div class="mb-3">


                            <div class="mb-3">
                                <label for="Usuario" class="col-form-label">Usuario</label>
                                <input type="text" name="Usuario" class="form-control" id="Usuario" placeholder="Usuário" autocomplete="off" maxlength="10">
                            </div>

                            <div class="mb-3">
                                <label for="Senha" class="col-form-label">Senha</label>
                                <input type="text" name="Senha" class="form-control" id="Senha" placeholder="Senha" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="iCod_cargo" class="col-form-label">Cargo</label>
                                <select name="Cod_cargo" id="iCod_cargo" class="form-control">
                                <?php
                                $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                $result_cargos = "SELECT * FROM cargos";
                                $result_cargos = $pdo->prepare($result_cargos);
                                $result_cargos->execute();

                                while($row_result = $result_cargos->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value="<?php echo $row_result['Cod_cargo']; ?>"><?php echo $row_result['Cod_cargo']; ?>
                                </option><?php
                                }
                                ?>


                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="NomeCompleto" class="col-form-label">Nome completo</label>
                                <input type="text" name="NomeCompleto" class="form-control" id="NomeCompleto" placeholder="Nome completo" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="Funcao" class="col-form-label">Função</label>
                                <input type="text" name="Funcao" class="form-control" id="Funcao" placeholder="Função" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="Nºdocumento" class="col-form-label">Portador do BI</label>
                                <input type="text" name="Nºdocumento" class="form-control" id="Nºdocumento" placeholder="NºBilhete" >
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

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Editar usuaríos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="edit-user-form" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="ID" id="editid">


                            <div class="mb-3">
                                <label for="Usuario" class="col-form-label">Usuário</label>
                                <input type="text" name="Usuario1" class="form-control" id="editUsuario" placeholder="usuário" autocomplete="off" maxlength="10">
                            </div>

                            <div class="mb-3">
                                <label for="Senha1" class="col-form-label">Senha</label>
                                <input type="text" name="Senha1" class="form-control" id="editSenha" placeholder="Senha" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="Cod_cargo1" class="col-form-label">Cargo</label>
                                <input type="text" name="Cod_cargo1" class="form-control" id="editCod_cargo" placeholder="NºCargo" autocomplete="off">
                            </div>


                            <div class="mb-3">
                                <label for="NomeCompleto1" class="col-form-label">Nome completo</label>
                                <input type="text" name="NomeCompleto1" class="form-control" id="editNomeCompleto" placeholder="Nome completo" autocomplete="off" >
                            </div>

                            <div class="mb-3">
                                <label for="Funcao1" class="col-form-label">Função</label>
                                <input type="text" name="Funcao1" class="form-control" id="editFuncao" placeholder="Função" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="Ndocumento1" class="col-form-label">Portador do BI</label>
                                <input type="text" name="Ndocumento1" class="form-control" id="editNºdocumento" placeholder="NºBilhete" autocomplete="off">
                            </div>

                            


                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-outline-warning btn-sm" value="Salvar" id="edit-user-btn" name="SendEditUser"/>
                            </div>


                    </form>

                </div>


            </div>

        </div>

    </div>
    <!-- Fim Janela Modal EditarModal -->

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="usuarios.js"></script>
</body>
</html>