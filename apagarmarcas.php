<?php

include_once "conexao.php";


$Cod_marca = filter_input(INPUT_GET, "Cod_marca",FILTER_SANITIZE_NUMBER_INT);


    if(!empty($Cod_marca)){
        sleep(5);

        $query_marca = "DELETE FROM marcas WHERE Cod_marca=:Cod_marca";
        $result_marca = $pdo->prepare($query_marca);
        $result_marca->bindParam('Cod_marca',$Cod_marca);
        

        if($result_marca->execute()){
            sleep(2);
            $msg="<div class='alert alert-success'>Apagado Com sucesso!</div>";
            header("Location: marcas.php");
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