<?php

include_once "conexao.php";

    $Cod_material = filter_input(INPUT_GET,"Cod_material",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($Cod_material)){
        $query_material = "SELECT Cod_material, Nome, Estado, Cod_mesa, Cod_marca, Processador, RAM, Win_dows, Edicao, Tipo_Sistema, HD, Observacao FROM materias WHERE Cod_material = :Cod_material LIMIT 1";
        $result_material = $pdo->prepare($query_material);
        $result_material->bindParam('Cod_material',$Cod_material);
        $result_material->execute();

        $row_material = $result_material->fetch(PDO::FETCH_ASSOC);

        $retorna = ['erro' => false,'dados' =>$row_material];

    }

    else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];

    }

    echo json_encode($retorna);