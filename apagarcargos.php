<?php

include_once "conexao.php";

$Cod_cargo = filter_input(INPUT_GET, "Cod_cargo",FILTER_SANITIZE_NUMBER_INT);


    if(!empty($Cod_cargo)){
        $query_cargos = "DELETE FROM cargos WHERE Cod_cargo=:Cod_cargo";
        $result_cargos = $pdo->prepare($query_cargos);
        $result_cargos->bindParam('Cod_cargo',$Cod_cargo);
        

        if($result_cargos->execute()){
            header("Location: cargos.php");
            sleep(1);
            $msg="<div class='alert alert-success'>Cargo apagado Com sucesso!</div>";
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert' >Cargo apagado com sucesso! </div>"];
          
            

        }
        else{
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro: Houve Um erro! </div>"];
           

        }
     }

    else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];
        

    }

  

    ?>