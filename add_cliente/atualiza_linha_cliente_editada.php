 <?php

        // create database connectivity  
        require_once('php_action/db_connect.php'); 







      if (isset($_POST['id_cli'])) {  
           $id_proposta = $_POST['id_cli'];  

    //var_dump($_POST);
    //die();
          

                                                    //$sql = "SELECT * FROM tab_clientes";
                                                    $sql_cli = "SELECT * FROM tab_clientes WHERE id_cli = {$id_proposta}";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_cli = mysqli_query($connect, $sql_cli);



                                                    if(mysqli_num_rows($resultado_cli) > 0){

                                                        while($dados_cli = mysqli_fetch_array($resultado_cli)){

                                                        
                                                           // $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'nome_cli'=>$dados['nome_cli'], 'cpf_cli'=>$dados['cpf_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'id_orgao'=>$dados['id_orgao'], 'parce_contrato'=>$dados['parce_contrato'], 'situa_contrato'=>$dados['situa_contrato'], 'id_bccompra_contrato'=>$dados['id_bccompra_contrato']);
                                                            
                                                            $json_dados_cli = array ('id_cli'=>$dados_cli['id_cli'], 'nome_cli'=>$dados_cli['nome_cli'], 'cpf_cli'=>$dados_cli['cpf_cli'], 'identidade_cli'=>$dados_cli['identidade_cli'], 'cep_cli'=>$dados_cli['cep_cli'], 'endereco_cli'=>$dados_cli['endereco_cli'], 'numero_cli'=>$dados_cli['numero_cli'], 'comple_cli'=>$dados_cli['comple_cli'], 'bairro_cli'=>$dados_cli['bairro_cli'], 'cidade_cli'=>$dados_cli['cidade_cli'], 'uf_cli'=>$dados_cli['uf_cli'], 'datanasc_cli'=>$dados_cli['datanasc_cli']);

                                                            echo json_encode($json_dados_cli, JSON_UNESCAPED_UNICODE);                                                            
                                                            

                                                        }
                                                    }
          
        }          
          
 






             
?>







































