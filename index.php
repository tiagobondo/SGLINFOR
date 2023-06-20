<?php
    include_once('conexao.php');
    

    if(isset($_POST['acao2'])){
        if(empty($_POST['usuario']) or empty($_POST['senha'])){
            $erro_login = "Necessário preencher campo vazio!";
        }
        else{
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = $pdo->prepare("SELECT * FROM `usuarios` WHERE Usuario = ? AND Senha = ? LIMIT 1");
        $sql->execute(array($usuario,$senha));

        $user = $sql->fetch(PDO::FETCH_ASSOC);
        if($user){
            sleep(1);
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['Id'] = $user['Id'];
            $_SESSION['Usuario'] = $user['Usuario'];
            $_SESSION['Funcao'] = $user['Funcao'];
            $_SESSION['NomeCompleto'] = $user['NomeCompleto'];
            
            header("location: estatistica.php");
            
            
        }
        else{
           
            $erro_login = "Usuário ou Senha incorretos!";

        }
    }
}


?>

<?php
    include_once("conexao.php");
    $SendRectCont = filter_input(INPUT_POST, 'SendRectCont', FILTER_SANITIZE_STRING);
    if($SendRectCont){
        //Receber os dados do formulário
        $Id = filter_input(INPUT_POST, 'Id', FILTER_SANITIZE_NUMBER_INT);
        $Ndocumento = filter_input(INPUT_POST, 'Ndocumento', FILTER_SANITIZE_STRING);

        if(empty($_POST['Id'])){
            echo $erro_login = "Necesário preencher o nº da conta!";
        }
        elseif(empty($_POST['Ndocumento'])){
            echo $erro_login = "Necesário preencher o portador do BI!";
        }
        else{

        //Inserindo os dados no Banco de Dados
        $sql = $pdo->prepare("SELECT * FROM `usuarios` WHERE Id = ? AND Nºdocumento = ? LIMIT 1");
        $sql->execute(array($Id,$Ndocumento));
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        if($user){
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['Id'] = $user['Id'];
            $_SESSION['Usuario'] = $user['Usuario'];
            $_SESSION['Funcao'] = $user['Funcao'];
            $_SESSION['NomeCompleto'] = $user['NomeCompleto'];
           
            
            header("location: estatistica.php");
            
            
        }
        else{
            $erro_login = "Erro na verificação!";

        }
    }

        

    }
?>

<!--Ação recuperar conta de usuário-->



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./imagens//LogSGLINFOR.png" type="image/x-icon">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/icones/css/all.min.css">
    <link rel="stylesheet" href="estilos/icones/css/regular.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
</head>
<body class="bodyLogin">

    <form class="formularioLogin" method="POST">

        
        <h1 class="TituloLogin" >SGLINFOR</h1>

        <?php if(isset($erro_login)){?>
        <div id="erroLogin" class="alert alert-danger" role="alert">
        <?php echo $erro_login; ?>
      
        </div>
        <?php } ?>
       

        <div class="caixaInput">
                <p>
                <label for="iuser" class="labellogin">Usuário</label> <br>
                <i class="fa fa-user" id="loginIcon1"></i><input type="text" name="usuario" id="iuser" maxlength="20" class="inputLogin" autocomplete="off">
            </p>
            <p>
                <label for="isenha" class="labellogin">Senha</label> <br>
                <i class="fa fa-lock" id="loginIcon2"></i><input type="password" name="senha" id="isenha" class="inputLogin">
            </p>
            <p>
                <input type="Submit" name="acao2" value="Entrar" class="botaoIniciarsessao"> 
            </p>
        </div>

        <div class="CaixaLink">

            <p>
                <a href="#" class="linkcadastrar" data-bs-toggle="modal" data-bs-target="#recuperarModal"> Esqueceste a senha ?</a>
            </p>
            <p class="SGLINFOR" id="text">
               
            </p>

        </div>
          
        <div class="modal fade" id="recuperarModal" tabindex="-1" aria-labelledby="recuperarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recuperarModalLabel">Recuperar conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="Cad-cargo-form" method="POST">
                        <div class="mb-3">

                            <div class="mb-3">
                                <label for="id" class="col-form-label">Conta de acesso</label>
                                <input type="text" name="Id" class="form-control" id="id" placeholder="Nºda conta de acesso" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="indocumento" class="col-form-label">Portador do BI</label>
                                <input type="text" name="Ndocumento" class="form-control" id="indocumento" placeholder="Bilhete" autocomplete="off">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-outline-success btn-sm" value="Verificar" id="Cad-cargo-btn" name="SendRectCont"/>
                            </div>


                    </form>

                </div>
            </div>

        </div>

    </div>

    <script defer>

const el = document.querySelector('#text');
const texto = "Sistema de Gestão do Laboratório de Informática";
const intervalo = 200;


function showText (el, texto, intervalo){

    const char = texto.split("").reverse();

    const typer = setInterval(() => {

        if(!char.length){
            return clearInterval(typer);
        }

        const next = char.pop();
        
        el.innerHTML += next;
        
    }, intervalo);

}

showText(el, texto, intervalo);
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>