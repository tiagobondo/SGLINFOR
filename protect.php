<style>

    h2{
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }
   
   
</style>

<?php
     if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['Id'])){
        sleep(2);
        die("<h2>Você precisa estar logado para acessar está página!</h2><p><a href=\"index.php\" >Login</a></p>");
        
    }
?>



