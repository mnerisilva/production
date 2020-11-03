 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 


        //var_dump($_POST);
        //die();

      
      if (isset($_POST['id_edit_cli'])) {  
           $id_edit_cli = $_POST['id_edit_cli'];  
       






   










                                                      $sql_edit_cliente = "SELECT * FROM tab_clientes WHERE id_cli = {$id_edit_cli} LIMIT 1";
                                                      
          
                                                      $resultado_edit_cliente = mysqli_query($connect, $sql_edit_cliente);

                                                      //var_dump($_POST);
                                                      //die();

                                                      //if ($query->num_rows > 0) {
                                                      if(mysqli_num_rows($resultado_edit_cliente) > 0){
                                                      //while ($row = $query->fetch_assoc()) {
                                                          while($dados_edit_cliente = mysqli_fetch_array($resultado_edit_cliente)){


                                                            //echo json_encode($dados);
                                                           //var_dump($dados_edit_cliente);
                                                            //die();


                                                            $json_dados_cli = array ('id_edit_cli'=>$dados_edit_cliente['id_cli'], 'nome_edit_cli'=>$dados_edit_cliente['nome_cli'], 'cpf_edit_cli'=>$dados_edit_cliente['cpf_cli'], 'identidade_edit_cli'=>$dados_edit_cliente['identidade_cli'], 'cep_edit_cli'=>$dados_edit_cliente['cep_cli'], 'endereco_edit_cli'=>$dados_edit_cliente['endereco_cli'], 'numero_edit_cli'=>$dados_edit_cliente['numero_cli'], 'comple_edit_cli'=>$dados_edit_cliente['comple_cli'], 'bairro_edit_cli'=>$dados_edit_cliente['bairro_cli'], 'cidade_edit_cli'=>$dados_edit_cliente['cidade_cli'], 'uf_edit_cli'=>$dados_edit_cliente['uf_cli'], 'datanasc_edit_cli'=>$dados_edit_cliente['datanasc_cli']);


                                                            } 
                                                          
                                                          

                                                        
                                                      } 
                                                     


                                                            echo json_encode($json_dados_cli);




 } else {
     echo 'sem resultados';
 }







 ?> 