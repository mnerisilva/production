 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 


      
      if (isset($_POST['id_proposta'])) {  
           $id_proposta = $_POST['id_proposta'];  
       






 }










                        $sql = "SELECT DISTINCT id_contrato, ade_contrato, parce_contrato, id_bccompra_contrato, situa_contrato, id_orgao FROM tab_propostas WHERE id_contrato = {$id_proposta}";
                                                      
          
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
                                                    
                                                        echo $dados['ade_contrato'] . ' - ' . $dados['parce_contrato'] . ' - ' . $dados['id_bccompra_contrato'] . ' - ' . $dados['situa_contrato'] . ' - ' . $dados['id_orgao'];
                                                      
                                                        } 
                                                        
                                                      } 
                                                     














 ?> 