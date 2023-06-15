<?php

include_once "conexao.php";

    $pagina = filter_input(INPUT_GET,"pagina",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($pagina)){
        //Calcular o inicio da visualização
        $qnt_result_pg = 4; //Quantiadde de registro em cada pagina
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_mesas="SELECT * FROM `mesas` Order By Cod_mesa DESC LIMIT $inicio,$qnt_result_pg ";
    $result_mesas = $pdo->prepare($query_mesas);
    $result_mesas->execute();;

   
    $dados = "<div class='table-responsive'>

            <table class='table table-striped table-bordered'>
                <thead>
                        <tr>
                        <th>Nº</th> 
                        <th>Mesa</th> 
                        <th>Computadores</th> 
                        <th>Alunos</th>
                        <th>Observação</th> 
                        <th>Data</th> 
                        <th>_____________Ações___________</th>
                        </tr>
                </thead>
                <tbody>";

    while($row_mesas = $result_mesas->fetch(PDO::FETCH_ASSOC)){
        extract($row_mesas);

        $dados .="<tr>
                    <td>$Cod_mesa</td>
                    <td>$Nome</>
                    <td>$NºComputadores</td>
                    <td>$NºAlunos</td>
                    <td >$Observacao</td>
                    <td >$DataRegisto</td>
                <td> 
                <button id='$Cod_mesa' class='btn btn-outline-primary btn-sm ' onclick='VisualizarDados($Cod_mesa)'>Visualizar</button> 
                <button id='$Cod_mesa' class='btn btn-outline-warning btn-sm' onclick='editarMesasDados($Cod_mesa)'>Editar</button>
                <a href='apagarmesa.php?Cod_mesa=$Cod_mesa' id='$Cod_mesa' class='btn btn-outline-danger btn-sm'>Apagar</a>
                </td>

                </tr>" ;  
    }

    $dados.=" </tbody>
            </table>
            </div>";

        //Somar a quantidade de materias 
        $query_pg = "SELECT COUNT(Cod_mesa) AS num_result FROM `mesas`";
        $result_pg = $pdo->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de páginas
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
        
       
        $max_links = 2;


        $dados.='<nav arial-label="page navigation example" id="ControlPaginacao"><ul class="pagination justify-content-center">';

        $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMesas(1)'>Primeira</a></li>";

        for($pag_ant = $pagina-$max_links; $pag_ant<=$pagina -1;$pag_ant++){
            if($pag_ant >= 1){
                $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMesas($pag_ant)'>$pag_ant</a></li>"; 
            }
            
        }
        

        $dados.= "<li class='page-item'><a href='#' class='page-link'> $pagina</a></li>";
        for($pag_dep = $pagina+1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <=$quantidade_pg){
                $dados.= "<li class='page-item' ><a href='#' class='page-link' onclick='listarMesas($pag_dep)'>$pag_dep</a></li>";
            }
            
        }

        
        $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarMesas($quantidade_pg)'>Última</a></li>";
        $dados.= '</ul></nav>';

        echo $dados;
    }
   
    

    

?>