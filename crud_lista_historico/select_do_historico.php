 <?php
        session_start();
        // create database connectivity  
        require_once('../php_action/db_connect.php');




        
        

      if (isset($_POST['id_proposta']) && $_POST['id_proposta'] != '') { 
           $id_proposta = $_POST['id_proposta'];

    //var_dump($_POST);
    //echo '<br />'.$id_proposta;
   //die();
          

                                                    //$sql = "SELECT * FROM tab_clientes";
                                                    $sql_hist = "SELECT * FROM tab_proposta_historico WHERE id_contrato = {$id_proposta} ORDER BY data_inclusao DESC";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_hist = mysqli_query($connect, $sql_hist);



                                                    if(mysqli_num_rows($resultado_hist) > 0){

                                                        while($dados_hist = mysqli_fetch_array($resultado_hist)){

                                                        
                                                           // $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'nome_cli'=>$dados['nome_cli'], 'cpf_cli'=>$dados['cpf_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'id_orgao'=>$dados['id_orgao'], 'parce_contrato'=>$dados['parce_contrato'], 'situa_contrato'=>$dados['situa_contrato'], 'id_bccompra_contrato'=>$dados['id_bccompra_contrato']);
                                                            
                                                            $json_dados_hist[] = array ('id_hist'=>$dados_hist['id_hist'], 'id_contrato'=>$dados_hist['id_contrato'], 'id_user'=>$dados_hist['id_user'], 'postagem_hist'=>$dados_hist['postagem_hist'], 'postagem_status'=>$dados_hist['postagem_status'], 'data_ult_modi'=>$dados_hist['data_ult_modi'], 'data_inclusao'=>$dados_hist['data_inclusao'], 'primeiro_nome_usuario'=>capturaNomeUsuario($connect, $dados_hist['id_user']), 'foto_usuario_link'=>capturaLinkFotoUsuario($connect, $dados_hist['id_user']));
                                                    
                                                            
                                                            

                                                        } 
                                                       
                                                        echo json_encode($json_dados_hist, JSON_UNESCAPED_UNICODE); 
                                                           
                                                    } else {
                                                        echo 'false';
                                                    }
                                                    //die();
          
                                                    
                                                    

                                                                                                            
          
        }     
          
 

function capturaNomeUsuario($connect, $id_user){
    
            $primeiro_nome_usuario = '';
            //$sql = "SELECT * FROM tab_clientes";
            $sql_user = "SELECT * FROM tab_usuarios WHERE id_user = {$id_user}";
            /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

            $resultado_user = mysqli_query($connect, $sql_user);



            if(mysqli_num_rows($resultado_user) > 0){

                while($dados_user = mysqli_fetch_array($resultado_user)){


                   // $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'nome_cli'=>$dados['nome_cli'], 'cpf_cli'=>$dados['cpf_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'id_orgao'=>$dados['id_orgao'], 'parce_contrato'=>$dados['parce_contrato'], 'situa_contrato'=>$dados['situa_contrato'], 'id_bccompra_contrato'=>$dados['id_bccompra_contrato']);

                    //$json_dados_hist[] = array ('id_hist'=>$dados_hist['id_hist'], 'id_contrato'=>$dados_hist['id_contrato'], 'id_user'=>$dados_hist['id_user'], 'postagem_hist'=>$dados_hist['postagem_hist'], 'postagem_status'=>$dados_hist['postagem_status'], 'data_ult_modi'=>$dados_hist['data_ult_modi'], 'data_inclusao'=>$dados_hist['data_inclusao'], 'teste_chamada_funcao'=>capturaDadosUsuario());


                    $primeiro_nome_usuario = $dados_user['primeiro_nome_usuario'];

                } 

                return $primeiro_nome_usuario;

            } else {
                echo 'false';
            }
}



function capturaLinkFotoUsuario($connect, $id_user){
    
            $foto_usuario_link = '';
            //$sql = "SELECT * FROM tab_clientes";
            $sql_link_foto = "SELECT * FROM tab_usuarios WHERE id_user = {$id_user}";
            /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

            $resultado_link_foto = mysqli_query($connect, $sql_link_foto);



            if(mysqli_num_rows($resultado_link_foto) > 0){

                while($dados_link_foto = mysqli_fetch_array($resultado_link_foto)){


                   // $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'nome_cli'=>$dados['nome_cli'], 'cpf_cli'=>$dados['cpf_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'id_orgao'=>$dados['id_orgao'], 'parce_contrato'=>$dados['parce_contrato'], 'situa_contrato'=>$dados['situa_contrato'], 'id_bccompra_contrato'=>$dados['id_bccompra_contrato']);

                    //$json_dados_hist[] = array ('id_hist'=>$dados_hist['id_hist'], 'id_contrato'=>$dados_hist['id_contrato'], 'id_user'=>$dados_hist['id_user'], 'postagem_hist'=>$dados_hist['postagem_hist'], 'postagem_status'=>$dados_hist['postagem_status'], 'data_ult_modi'=>$dados_hist['data_ult_modi'], 'data_inclusao'=>$dados_hist['data_inclusao'], 'teste_chamada_funcao'=>capturaDadosUsuario());


                    $foto_usuario_link = $dados_link_foto['foto_usuario_link'];

                } 

                return $foto_usuario_link;

            } else {
                echo 'false';
            }
}




             
?>







































