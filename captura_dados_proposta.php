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
                                                    
                                                        
                                                        $json_dados = array ('id_contrato'=>$dados['id_contrato'], 'id_cli'=>$dados['id_cli'], 'ade_contrato'=>$dados['ade_contrato'], 'id_orgao'=>$dados['id_orgao'], 'bn_contrato'=>$dados['bn_contrato'], 'parce_contrato'=>$dados['parce_contrato'], 'opera_contrato'=>$dados['opera_contrato'], 'promo_contrato'=>$dados['promo_contrato'], 'vend_contrato'=>$dados['vend_contrato'], 'situa_contrato'=>$dados['situa_contrato'], 'id_bccompra_contrato'=>$dados['id_bccompra_contrato'], 'parceini_contrato'=>$dados['parceini_contrato'], 'parcefinal_contrato'=>$dados['parcefinal_contrato'], 'ml_contrato'=>$dados['ml_contrato'], 'observa_tab_contrato'=>$dados['observa_tab_contrato']);
                                                        
                                                        echo json_encode($json_dados);
                                                        
                                                      
                                                        } 
                                                        
                                                      } 
                                                     














 ?> 