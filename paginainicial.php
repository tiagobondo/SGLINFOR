
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/icones/css/all.min.css">
    <link rel="stylesheet" href="estilos/icones/css/regular.min.css">
</head>

<body class="articlePaginaInicial">
<header>
        <p class="NomeSistema">Sistema de Gestão do Laboratório de Informática</p>
</header>

<nav class="NavBotoes">

<p class="TituloUsuario"><?php echo $_SESSION['Usuario']; ?></p>

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


    <article class="article">
       
   

    </article>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="custom.js"></script>
</body>
</html>