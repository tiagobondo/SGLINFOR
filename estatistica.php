<?php
    include_once("protect.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatística</title>
    <link rel="shortcut icon" href="./imagens//LogSGLINFOR.png" type="image/x-icon">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/icones/css/all.min.css">
    <link rel="stylesheet" href="estilos/icones/css/regular.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
</head>
<body>

    <article class="articleConteudos">
        <h4>Estatística</h4>
       
            <article class="articleEstatistica" id="EstatisticaBomEstado">
                <h5 class="Titulo" >Materias em bom estado</h5><i class="fa fa-check" id="IconBom"></i>
                <h3 class="Quantidade">
                <?php
                                  $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                  $sql = $pdo->prepare("SELECT COUNT(Nome) AS total from `materias` Where Estado='Bom' ");
                                  $sql->execute();
                     
                                  $row = $sql->fetch(PDO::FETCH_ASSOC);
                                  echo $row['total'];
                     
                                  $sql->execute();
                ?>
                   


                </h3>

        
            </article>
            <article class="articleEstatistica" id="EstatisticaMauEstado">
                <h5 class="Titulo" >Materias em mau estado</h5><i class="fa fa-multiply" id="IconMau"></i>
                <h3 class="Quantidade">
                <?php
                                  $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                  $sql = $pdo->prepare("SELECT COUNT(Nome) AS total from `materias` Where Estado='Mau' ");
                                  $sql->execute();
                     
                                  $row = $sql->fetch(PDO::FETCH_ASSOC);
                                  echo $row['total'];
                     
                                  $sql->execute();
                ?>

                </h3>
        
            </article>
            <article class="articleEstatistica" id="EstatisticaMaterial">
            <i class="fa fa-tools" id="IconMaterial"></i>
                <h5 class="Titulo">Total de materias</h5>
                <h3 class="Quantidade">
                <?php
                                  $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                  $sql = $pdo->prepare("SELECT COUNT(Nome) AS total from `materias` ");
                                  $sql->execute();
                     
                                  $row = $sql->fetch(PDO::FETCH_ASSOC);
                                  echo $row['total'];
                     
                                  $sql->execute();
                ?>
                     
                </h3>
        
            </article>
            <article class="articleEstatistica" id="EstatisticaMarcas">
                <h5 class="Titulo" >Diferentes marcas</h5><i class="fa fa-clipboard" id="IconMarcas"></i>
                <h3 class="Quantidade">
                <?php
                                 $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                  $sql = $pdo->prepare("SELECT COUNT(Nome) AS total from `marcas` ");
                                  $sql->execute();
                     
                                  $row = $sql->fetch(PDO::FETCH_ASSOC);
                                  echo $row['total'];
                     
                                  $sql->execute();
                ?>


                </h3>
        
            </article>

            <article class="articleEstatistica" id="EstatisticaMesas">
                <h5 class="Titulo">Total de mesas</h5><i class="fa fa-table" id="IconMesas"></i>
                <h3 class="Quantidade">
                <?php
                                  $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                  $sql = $pdo->prepare("SELECT COUNT(Nome) AS total from `mesas` ");
                                  $sql->execute();
                     
                                  $row = $sql->fetch(PDO::FETCH_ASSOC);
                                  echo $row['total'];
                     
                                  $sql->execute();
                ?>

                </h3>
        
            </article>

            <article class="articleEstatistica" id="EstatisticaUsuarios">
                <h5 class="Titulo">Total de usuários</h5><i class="fa fa-users" id="IconUsers"></i>
                <h3 class="Quantidade">
                <?php
                                  $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');
                                  $sql = $pdo->prepare("SELECT COUNT(Usuario) AS total from `usuarios` ");
                                  $sql->execute();
                     
                                  $row = $sql->fetch(PDO::FETCH_ASSOC);
                                  echo $row['total'];
                     
                                  $sql->execute();
                ?>

                </h3>
        
            </article>

            
            
            <h6 class="dataEstatistica"><?php
            date_default_timezone_set('Africa/Luanda');
            $data = date('Y-m-d');
            echo $data;
        
        ?></h6>
          

        


    </article>
   

    
    

    <script src="custom.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>