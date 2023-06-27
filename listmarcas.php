<?php
    session_start();

include_once "conexao.php";
    if($_SESSION['Funcao']=='Professor'){
        $pagina = filter_input(INPUT_GET,"pagina",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($pagina)){
        //Calcular o inicio da visualização
        $qnt_result_pg = 5; //Quantiadde de registro em cada pagina
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_mesas="SELECT * FROM `marcas` Order By Cod_marca DESC LIMIT $inicio,$qnt_result_pg ";
    $result_mesas = $pdo->prepare($query_mesas);
    $result_mesas->execute();;

   
    $dados = "<div class='table-responsive'>

            <table class='table table-striped table-bordered'>
                <thead>
                        <tr>
                        <th>Nº</th> 
                        <th>Marca</th> 
                        <th>Data</th> 
                        <th>Ações</th>
                        </tr>
                </thead>
                <tbody>";

    while($row_mesas = $result_mesas->fetch(PDO::FETCH_ASSOC)){
        extract($row_mesas);

        $dados .="<tr>
                    <td>$Cod_marca</td>
                    <td>$Nome</td>
                    <td>$DataRegisto</td>
                <td> 
                <button id='$Cod_marca' class='btn btn-outline-primary btn-sm ' onclick='VisualizarDados($Cod_marca)'>Visualizar</button> 
                <button id='$Cod_marca' class='btn btn-outline-warning btn-sm' onclick='editarMarcasDados($Cod_marca)'>Editar</button>
                <a href='apagarmarcas.php?Cod_marca=$Cod_marca' id='$Cod_marca' class='btn btn-outline-danger btn-sm'>Apagar</a>
                </td>

                </tr>" ;  
    }

    $dados.=" </tbody>
            </table>
            </div>";

        //Somar a quantidade de materias 
        $query_pg = "SELECT COUNT(Cod_marca) AS num_result FROM `marcas`";
        $result_pg = $pdo->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de páginas
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
        
       
        $max_links = 2;


        $dados.='<nav arial-label="page navigation example" id="ControlPaginacao"><ul class="pagination justify-content-center">';

        $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMarcas(1)'>Primeira</a></li>";

        for($pag_ant = $pagina-$max_links; $pag_ant<=$pagina -1;$pag_ant++){
            if($pag_ant >= 1){
                $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMarcas($pag_ant)'>$pag_ant</a></li>"; 
            }
            
        }
        

        $dados.= "<li class='page-item'><a href='#' class='page-link'> $pagina</a></li>";
        for($pag_dep = $pagina+1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <=$quantidade_pg){
                $dados.= "<li class='page-item' ><a href='#' class='page-link' onclick='listarMarcas($pag_dep)'>$pag_dep</a></li>";
            }
            
        }

        
        $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMarcas($quantidade_pg)'>Última</a></li>";
        $dados.= '</ul></nav>';

        echo $dados;
    }

    }
    else{
        $pagina = filter_input(INPUT_GET,"pagina",FILTER_SANITIZE_NUMBER_INT);

        if(!empty($pagina)){
            //Calcular o inicio da visualização
            $qnt_result_pg = 4; //Quantiadde de registro em cada pagina
            $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
    
        $query_mesas="SELECT * FROM `marcas` Order By Cod_marca DESC LIMIT $inicio,$qnt_result_pg ";
        $result_mesas = $pdo->prepare($query_mesas);
        $result_mesas->execute();;
    
       
        $dados = "<div class='table-responsive'>
    
                <table class='table table-striped table-bordered'>
                    <thead>
                            <tr>
                            <th>Marca</th> 
                            <th>Data</th> 
                            <th>Ação</th>
                            </tr>
                    </thead>
                    <tbody>";
    
        while($row_mesas = $result_mesas->fetch(PDO::FETCH_ASSOC)){
            extract($row_mesas);
    
            $dados .="<tr>
                        <td>$Nome</td>
                        <td>$DataRegisto</td>
                    <td> 
                    <button id='$Cod_marca' class='btn btn-outline-primary btn-sm ' onclick='VisualizarDados($Cod_marca)'>Visualizar</button> 
                    </td>
    
                    </tr>" ;  
        }
    
        $dados.=" </tbody>
                </table>
                </div>";
    
            //Somar a quantidade de materias 
            $query_pg = "SELECT COUNT(Cod_marca) AS num_result FROM `marcas`";
            $result_pg = $pdo->prepare($query_pg);
            $result_pg->execute();
            $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
    
            //Quantidade de páginas
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
            
           
            $max_links = 2;
    
    
            $dados.='<nav arial-label="page navigation example" id="ControlPaginacao"><ul class="pagination justify-content-center">';
    
            $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMarcas(1)'>Primeira</a></li>";
    
            for($pag_ant = $pagina-$max_links; $pag_ant<=$pagina -1;$pag_ant++){
                if($pag_ant >= 1){
                    $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMarcas($pag_ant)'>$pag_ant</a></li>"; 
                }
                
            }
            
    
            $dados.= "<li class='page-item'><a href='#' class='page-link'> $pagina</a></li>";
            for($pag_dep = $pagina+1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <=$quantidade_pg){
                    $dados.= "<li class='page-item' ><a href='#' class='page-link' onclick='listarMarcas($pag_dep)'>$pag_dep</a></li>";
                }
                
            }
    
            
            $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMarcas($quantidade_pg)'>Última</a></li>";
            $dados.= '</ul></nav>';
    
            echo $dados;

    }
}

    
   
    

    

?>