<?php

include_once "conexao.php";

    $Cod_cargo = filter_input(INPUT_GET,"Cod_cargo",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($Cod_cargo)){
        $query_cargo = "SELECT Cod_cargo, Nome FROM cargos WHERE Cod_cargo = :Cod_cargo LIMIT 1";
        $result_cargo = $pdo->prepare($query_cargo);
        $result_cargo->bindParam('Cod_cargo',$Cod_cargo);
        $result_cargo->execute();

        $row_cargo = $result_cargo->fetch(PDO::FETCH_ASSOC);

        $retorna = ['erro' => false,'dados' =>$row_cargo];

    }

    else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert' >Erro:Nenhum encontrado! </div>"];

    }

    echo json_encode($retorna);

    ?>