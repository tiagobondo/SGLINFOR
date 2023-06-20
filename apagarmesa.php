<?php
session_start();
ob_start();

include_once "conexao.php";

$Cod_mesa = filter_input(INPUT_GET, "Cod_mesa",FILTER_SANITIZE_NUMBER_INT);


    if(!empty($Cod_mesa)){
        $query_mesa = "DELETE FROM mesas WHERE Cod_mesa=:Cod_mesa";
        $result_mesa = $pdo->prepare($query_mesa);
        $result_mesa->bindParam('Cod_mesa',$Cod_mesa);
        

        if($result_mesa->execute()){
            sleep(1);
            header("Location: mesas.php");
            $_SESSION['msg'] = "<p style='color: green;'>Mesa apagado com sucesso!</p>";
          
            

        }
        else{
            $_SESSION['msg'] = "<p style='color: green;'>Mesa apagado com sucesso!</p>";
           

        }
     }

    else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];
        

    }

  

    ?>