<?php

include_once "conexao.php";

    $Id = filter_input(INPUT_GET,"Id",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($Id)){
     $query_usuario = "SELECT Id, Usuario, Senha, Cod_cargo, DataRegisto, NomeCompleto, Funcao, Nºdocumento FROM usuarios WHERE Id = :Id LIMIT 1";
        $result_usuario = $pdo->prepare($query_usuario);
        $result_usuario->bindParam('Id',$Id);
        $result_usuario->execute();

        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

        $retorna = ['erro' => false,'dados' =>$row_usuario];

    }

    else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];

    }

    echo json_encode($retorna);