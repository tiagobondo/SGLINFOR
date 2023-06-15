<?php

include_once "conexao.php";


$Cod_material = filter_input(INPUT_GET, "Cod_material",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($Cod_material)){
        $query_material = "DELETE FROM materias WHERE Cod_material=:Cod_material";
        $result_material = $pdo->prepare($query_material);
        $result_material->bindParam('Cod_material',$Cod_material);
        

        if($result_material->execute()){
            sleep(2);
            $msg="<div class='alert alert-success'>Apagado Com sucesso!</div>";
            header("Location: materias.php");
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