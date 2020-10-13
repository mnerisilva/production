 <?php

        // create database connectivity  
        require_once('php_action/db_connect.php'); 







      if (isset($_POST['id_proposta'])) {  
           $id_proposta = $_POST['id_proposta'];  

    //var_dump($_POST);
    //die();
          

                                                    //$sql = "SELECT * FROM tab_clientes";
                                                    $sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, P.situa_contrato FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli AND id_contrato = {$id_proposta}";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado = mysqli_query($connect, $sql);



                                                    if(mysqli_num_rows($resultado) > 0){

                                                        while($dados = mysqli_fetch_array($resultado)){

                                                        
                                                           // $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'nome_cli'=>$dados['nome_cli'], 'cpf_cli'=>$dados['cpf_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'id_orgao'=>$dados['id_orgao'], 'parce_contrato'=>$dados['parce_contrato'], 'situa_contrato'=>$dados['situa_contrato'], 'id_bccompra_contrato'=>$dados['id_bccompra_contrato']);
                                                            
                                                            $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'nome_cli'=>$dados['nome_cli'], 'cpf_cli'=>$dados['cpf_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'nome_orgao'=>nome_orgao($dados['id_orgao'], $connect), 'parce_contrato'=>$dados['parce_contrato'], 'descricao_situacao'=>descricao_situacao($dados['situa_contrato'], $connect), 'motivo_descricao_situacao'=>motivo_descricao_situacao($dados['situa_contrato'], $connect), 'cor_situacao'=>cor_situacao($dados['situa_contrato'], $connect), 'bccompra_nome'=>nome_bccompra($dados['id_bccompra_contrato'], $connect));

                                                            echo json_encode($json_dados, JSON_UNESCAPED_UNICODE);                                                            
                                                            

                                                        }
                                                    }
          
        }          
          
 
































































            function nome_orgao($id_orgao, $connect){


                                                                //$sql = "SELECT * FROM tab_clientes";
                                                                $sql_orgao = "SELECT id_orgao, nome_orgao FROM tab_orgao WHERE id_orgao = {$id_orgao} LIMIT 1";
                                                                /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                                
                                                                
                                                                $resultado_orgao = mysqli_query($connect, $sql_orgao);
                
               



                                                                if(mysqli_num_rows($resultado_orgao) > 0){

                                                                    while($dados_orgao = mysqli_fetch_array($resultado_orgao)){


                                                                        return $dados_orgao['nome_orgao'];



                                                                    }
                                                                }    



            }   




















            function descricao_situacao($id_situacao, $connect){


                                                                //$sql = "SELECT * FROM tab_clientes";
                                                                $sql_situacao = "SELECT * FROM tab_situacao WHERE id_situacao = {$id_situacao} LIMIT 1";
                                                                /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                                $resultado_situacao = mysqli_query($connect, $sql_situacao);



                                                                if(mysqli_num_rows($resultado_situacao) > 0){

                                                                    while($dados_situacao = mysqli_fetch_array($resultado_situacao)){


                                                                        return $dados_situacao['descricao_situacao'];



                                                                    }
                                                                }    



            }   













            function motivo_descricao_situacao($situa_contrato, $connect){


                                                                //$sql = "SELECT * FROM tab_clientes";
                                                                $sql_motivo_descricao_situacao = "SELECT * FROM tab_situacao WHERE id_situacao = {$situa_contrato} LIMIT 1";
                                                                /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                                $resultado_motivo_descricao_situacao = mysqli_query($connect, $sql_motivo_descricao_situacao);



                                                                if(mysqli_num_rows($resultado_motivo_descricao_situacao) > 0){

                                                                    while($dados_motivo_descricao_situacao = mysqli_fetch_array($resultado_motivo_descricao_situacao)){


                                                                        return $dados_motivo_descricao_situacao['motivo_descricao_situacao'];



                                                                    }
                                                                }    



            }   











            function cor_situacao($situa_contrato, $connect){


                                                                //$sql = "SELECT * FROM tab_clientes";
                                                                $sql_cor_situacao = "SELECT * FROM tab_situacao WHERE id_situacao = {$situa_contrato} LIMIT 1";
                                                                /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                                $resultado_cor_situacao = mysqli_query($connect, $sql_cor_situacao);



                                                                if(mysqli_num_rows($resultado_cor_situacao) > 0){

                                                                    while($dados_cor_situacao = mysqli_fetch_array($resultado_cor_situacao)){


                                                                        return $dados_cor_situacao['cor_situacao'];



                                                                    }
                                                                }    



            }  





















            function nome_bccompra($id_bccompra_contrato, $connect){


                                                                //$sql = "SELECT * FROM tab_clientes";
                                                                $sql_nome_bccompra = "SELECT * FROM tab_bccompra WHERE id_bccompra_contrato = {$id_bccompra_contrato} LIMIT 1";
                                                                /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                                $resultado_nome_bccompra = mysqli_query($connect, $sql_nome_bccompra);



                                                                if(mysqli_num_rows($resultado_nome_bccompra) > 0){

                                                                    while($dados_nome_bccompra = mysqli_fetch_array($resultado_nome_bccompra)){


                                                                        return $dados_nome_bccompra['nome_bccompra'];



                                                                    }
                                                                }    



            }  













             
?>







































