<?php
    include_once("protect.php");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca</title>
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
        <p>
        <mark>SGLINFOR</mark> denominado sistema de gestão do laboratório de informática do <strong><em>Instituto Médio Politécnico do Uíge</em></strong>, o <mark>SGLINFOR</mark>  tem como função ajudar no gerenciamento do laboratório de informática desde o controle dos materiais que nela se encontram e melhor supervisionamento.
        </p>
        <img src="./imagens/computers-332238_1280.jpg" alt="" id="ImagemAbout">
        <p>
        O <mark>SGLINFOR</mark>  permite ao usuário <strong><em>cadastrar, visualizar, deletar registros do banco de dados,</em></strong> e também permite gerir vários usuários para o sistema. Caso encontre qualquer dúvida ou dificuldade ao usar o sistema entre em contacto com o Dev <a href="https://github.com/tiagobondo" target="_blank" >Tiago Bondo</a> para mais esclarecimento. 
        </p>
        <p>
        Para a execução do mesmo, utilizou se diversos conhecimentos sobre <strong><em>Banco de Dados, Linguagens de Programação, Linguagem de Marcação e Linguagem de Estilização</em></strong>. Tais a citar:
                                    <ul>
                                    <li>MySQL</li>
                                    <li>PHP</li>
                                    <li>JavaScript</li>
                                    <li>HTML5 e CSS3</li>
                                    </ul>

        </p>
        <p>
        E não deixar de citar o freemwork <strong><em>Bootstrap</em></strong>.
        <mark>SGLINFOR</mark> levou se a execução como um trabalho de fim do ano na disciplina de TLP (Técnica e Linguagem de Programação) na orientação do Eng.Afonso Augusto Menata.

        </p>
    
   
    </article>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="marcas.js"></script>
</body>
</html>