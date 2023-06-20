<?php

include_once "conexao.php";

$Cod_cargo = filter_input(INPUT_GET, "Cod_cargo",FILTER_SANITIZE_NUMBER_INT);


    if(!empty($Cod_cargo)){
        $query_mesa = "DELETE FROM cargos WHERE Cod_cargo=:Cod_cargo";
        $result_mesa = $pdo->prepare($query_mesa);
        $result_mesa->bindParam('Cod_cargo',$Cod_cargo);
        

        if($result_mesa->execute()){
            sleep(2);
            $msg="<div class='alert alert-success'>Apagado Com sucesso!</div>";
            header("Location:cargos.php");
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert' >Apagado com sucesso! </div>"];
          
            

        }
        else{
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro: Houve Um erro com sucesso! </div>"];
           

        }
     }

    else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];
        

    }

  

    ?>