 <?php

        // create database connectivity  
        require_once('php_action/db_connect.php'); 



    //var_dump($_GET);
    //die();

      if (isset($_GET['id_proposta'])) {  
           $id_proposta = $_GET['id_proposta'];  
        }


                                                    //$sql = "SELECT * FROM tab_clientes";
                                                    $sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli AND id_contrato = {$id_proposta}";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado = mysqli_query($connect, $sql);



                                                    if(mysqli_num_rows($resultado) > 0){

                                                        while($dados = mysqli_fetch_array($resultado)){

                                                        
                                                            $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'nome_cli'=>$dados['nome_cli'], 'cpf_cli'=>$dados['cpf_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'id_orgao'=>$dados['id_orgao'], 'parce_contrato'=>$dados['parce_contrato'], 'situa_contrato'=>$dados['situa_contrato'], 'id_bccompra_contrato'=>$dados['id_bccompra_contrato']);

                                                            echo json_encode($json_dados);                                                            
                                                            

                                                        }
                                                    }
          
          
          
             
?>