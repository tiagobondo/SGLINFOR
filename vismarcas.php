<?php

include_once "conexao.php";

    $Cod_marca = filter_input(INPUT_GET,"Cod_marca",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($Cod_marca)){
        $query_mesa = "SELECT Cod_marca, Nome FROM marcas WHERE Cod_marca = :Cod_marca LIMIT 1";
        $result_mesa = $pdo->prepare($query_mesa);
        $result_mesa->bindParam('Cod_marca',$Cod_marca);
        $result_mesa->execute();

        $row_mesa = $result_mesa->fetch(PDO::FETCH_ASSOC);

        $retorna = ['erro' => false,'dados' =>$row_mesa];

    }

    else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];

    }

    echo json_encode($retorna);