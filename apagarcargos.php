<?php

include_once "conexao.php";


$Cod_cargo = filter_input(INPUT_GET, "Cod_cargo",FILTER_SANITIZE_NUMBER_INT);


    if(!empty($Cod_cargo)){
        $query_cargo = "DELETE FROM cargos WHERE Cod_cargo=:Cod_cargo";
        $result_cargo = $pdo->prepare($query_cargo);
        $result_cargo->bindParam('Cod_cargo',$Cod_cargo);
        
        if($result_cargo->execute()){
            sleep(1);
            header("Location: cargos.php");
        }
        else{
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro: Houve Um erro! </div>"];
            header("Location: cargos.php");
            
        }
     }

    else{
        header("Location: cargos.php");
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];
        header("Location: cargos.php");
    }

  

    ?>