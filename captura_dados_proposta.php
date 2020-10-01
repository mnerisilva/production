 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 


      
      if (isset($_POST['id_proposta'])) {  
           $id_proposta = $_POST['id_proposta'];  
       






 }










                        $sql = "SELECT * FROM tab_propostas WHERE id_contrato = {$id_proposta}";
                                                      
          
                                                      $resultado = mysqli_query($connect, $sql);

                                                      $output = "";  

                                                      //var_dump($_POST);
                                                      //die();

                                                      //if ($query->num_rows > 0) {
                                                      if(mysqli_num_rows($resultado) > 0){
                                                      //while ($row = $query->fetch_assoc()) {
                                                      while($dados = mysqli_fetch_array($resultado)){
                                                    
                                                        
                                                        //echo json_encode($dados);
                                                        //var_dump($dados);
                                                        //die();
                                                    
                                                        
                                                        $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'id_cli'=>$dados['id_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'id_orgao'=>$dados['id_orgao']);
                                                        //$encode[] = $dados;
                                                        echo json_encode($json_dados);
                                                          //. ';' . $dados['parce_contrato'] . ';' . $dados['id_bccompra_contrato'] . ';' . $dados['situa_contrato'] . ';' . $dados['id_orgao'];
                                                        
                                                      
                                                        } 
                                                        
                                                      } 
                                                     














 ?> 