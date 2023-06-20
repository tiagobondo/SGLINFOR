<?php
    session_start();

include_once "conexao.php";
if($_SESSION['Funcao'] =='Professor'){
    $pagina = filter_input(INPUT_GET,"pagina",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($pagina)){
        //Calcular o inicio da visualização
        $qnt_result_pg = 4; //Quantiadde de registro em cada pagina
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_usuario="SELECT * FROM `usuarios` Order By Id DESC LIMIT $inicio,$qnt_result_pg ";
    $result_usuario = $pdo->prepare($query_usuario);
    $result_usuario->execute();;

   
    $dados = "<div class='table-responsive'>

            <table class='table table-striped table-bordered'>
                <thead>
                        <tr>
                        <th>Cargo</th>
                        <th>Data</th> 
                        <th>Nome completo</th> 
                        <th>Função</th> 
                        <th>Portador do BI</th> 
                        <th>Ação</th>
                        </tr>
                </thead>
                <tbody>";

    while($row_usuarios = $result_usuario->fetch(PDO::FETCH_ASSOC)){
        extract($row_usuarios);

        $dados .="<tr>
                    <td>$Cod_cargo</td>
                    <td >$DataRegisto</td>
                    <td >$NomeCompleto</td>
                    <td >$Funcao</td>
                    <td >$Nºdocumento</td>
                <td>
                <button id='$Id' class='btn btn-outline-primary btn-sm ' onclick='VisualizarDados($Id)'>Visualizar</button>  
                <button id='$Id' class='btn btn-outline-warning btn-sm' onclick='editarUsuariosDados($Id)'>Editar</button>
                <a href='apagarusuarios.php?Id=$Id' id='$Id' class='btn btn-outline-danger btn-sm'>Apagar</a>
                </td>

                </tr>" ;  
    }

    $dados.=" </tbody>
            </table>
            </div>";

        //Somar a quantidade de materias 
        $query_pg = "SELECT COUNT(Id) AS num_result FROM `usuarios`";
        $result_pg = $pdo->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de páginas
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
        
       
        $max_links = 2;


        $dados.='<nav arial-label="page navigation example" id="ControlPaginacao"><ul class="pagination justify-content-center">';

        $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios(1)'>Primeira</a></li>";

        for($pag_ant = $pagina-$max_links; $pag_ant<=$pagina -1;$pag_ant++){
            if($pag_ant >= 1){
                $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios($pag_ant)'>$pag_ant</a></li>"; 
            }
            
        }
        

        $dados.= "<li class='page-item'><a href='#' class='page-link'> $pagina</a></li>";
        for($pag_dep = $pagina+1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <=$quantidade_pg){
                $dados.= "<li class='page-item' ><a href='#' class='page-link' onclick='listarUsuarios($pag_dep)'>$pag_dep</a></li>";
            }
            
        }

        
        $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios($quantidade_pg)'>Última</a></li>";
        $dados.= '</ul></nav>';

        echo $dados;
    }
}
else{
    
    $pagina = filter_input(INPUT_GET,"pagina",FILTER_SANITIZE_NUMBER_INT);

    if(!empty($pagina)){
        $user = $_SESSION['Id'];
        //Calcular o inicio da visualização
        $qnt_result_pg = 4; //Quantiadde de registro em cada pagina
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_usuario="SELECT * FROM `usuarios` Where Id = $user Order By Id DESC LIMIT $inicio,$qnt_result_pg ";
    $result_usuario = $pdo->prepare($query_usuario);
    $result_usuario->execute();;

   
    $dados = "<div class='table-responsive'>

            <table class='table table-striped table-bordered'>
                <thead>
                        <tr>
                        <th>Nº</th> 
                        <th>Usuário</th> 
                        <th>Senha</th>
                        <th>Cargo</th>
                        <th>Data</th> 
                        <th>Nome completo</th> 
                        <th>Função</th> 
                        <th>Portador do BI</th> 
                        <th>_______Ações_________</th>
                        </tr>
                </thead>
                <tbody>";

    while($row_usuarios = $result_usuario->fetch(PDO::FETCH_ASSOC)){
        extract($row_usuarios);

        $dados .="<tr>
                    <td>$Id</td>
                    <td>$Usuario</>
                    <td>$Senha</td>
                    <td>$Cod_cargo</td>
                    <td >$DataRegisto</td>
                    <td >$NomeCompleto</td>
                    <td >$Funcao</td>
                    <td >$Nºdocumento</td>
                    <td> 
                <button id='$Id' class='btn btn-outline-primary btn-sm ' onclick='VisualizarDados($Id)'>Visualizar</button> 
                <button id='$Id' class='btn btn-outline-warning btn-sm' onclick='editarUsuariosDados($Id)'>Editar</button>
                </td>
                </tr>" ;  
    }

    $dados.=" </tbody>
            </table>
            </div>";

        //Somar a quantidade de materias 
        $query_pg = "SELECT COUNT(Id) AS num_result FROM `usuarios`";
        $result_pg = $pdo->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de páginas
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
        
       
        $max_links = 2;


        $dados.='<nav arial-label="page navigation example" id="ControlPaginacao"><ul class="pagination justify-content-center">';

        $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios(1)'>Primeira</a></li>";

        for($pag_ant = $pagina-$max_links; $pag_ant<=$pagina -1;$pag_ant++){
            if($pag_ant >= 1){
                $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios($pag_ant)'>$pag_ant</a></li>"; 
            }
            
        }
        

        $dados.= "<li class='page-item'><a href='#' class='page-link'> $pagina</a></li>";
        for($pag_dep = $pagina+1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <=$quantidade_pg){
                $dados.= "<li class='page-item' ><a href='#' class='page-link' onclick='listarUsuarios($pag_dep)'>$pag_dep</a></li>";
            }
            
        }

        
        $dados.= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios($quantidade_pg)'>Última</a></li>";
        $dados.= '</ul></nav>';

        echo $dados;
    }

}
   
    

    

?>