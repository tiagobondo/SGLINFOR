<?php

include_once "conexao.php";

    $Cod_mesa = filter_input(INPUT_GET,"Cod_mesa",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($Cod_mesa)){
        $query_mesa = "SELECT Cod_mesa, Nome, NºComputadores, NºAlunos, Observacao FROM mesas WHERE Cod_mesa = :Cod_mesa LIMIT 1";
        $result_mesa = $pdo->prepare($query_mesa);
        $result_mesa->bindParam('Cod_mesa',$Cod_mesa);
        $result_mesa->execute();

        $row_mesa = $result_mesa->fetch(PDO::FETCH_ASSOC);

        $retorna = ['erro' => false,'dados' =>$row_mesa];

    }

    else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];

    }

    echo json_encode($retorna);