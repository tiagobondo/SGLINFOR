<?php

include_once "conexao.php";

$Id = filter_input(INPUT_GET, "Id",FILTER_SANITIZE_NUMBER_INT);
    if($Id=='1'){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro: Houve Um erro com sucesso! </div>"];
        header("Location: usuarios.php");
    }
    else{
        if(!empty($Id)){
            $query_usuarios = "DELETE FROM usuarios WHERE Id=:Id";
            $result_usuarios = $pdo->prepare($query_usuarios);
            $result_usuarios->bindParam('Id',$Id);
            
    
            if($result_usuarios->execute()){
                sleep(1);
                $msg="<div class='alert alert-success'>Apagado Com sucesso!</div>";
                header("Location: usuarios.php");
                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert' >Apagado com sucesso! </div>"];
              
                
    
            }
            else{
                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro: Houve Um erro com sucesso! </div>"];
               
    
            }
         }
    
        else{
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];
            
    
        }
    

    }


    
  

    ?>