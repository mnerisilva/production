 <?php
        session_start();
        // create database connectivity  
        require_once('../php_action/db_connect.php');




        
        

      if (isset($_POST['hidden_id_proposta_hist']) && $_POST['hidden_id_proposta_hist'] != '') { 
           $id_proposta_post = $_POST['hidden_id_proposta_hist'];
           $id_usuario_logado = $_POST['hidden_id_usuario_logado'];
           $add_post_hist = $_POST['add_post_hist'];
           $add_post_status = 1;
           $data_ult_modi = '2020-11-10';
          
    //var_dump($_POST);
    //echo '<br />'.$id_proposta;
   //die();
          




            $sql = "INSERT INTO tab_proposta_historico (id_hist, id_contrato, id_user, postagem_hist, postagem_status, data_ult_modi)
            VALUES ('', '{$id_proposta_post}', '{$id_usuario_logado}', '{$add_post_hist}', '{$add_post_status}', '{$data_ult_modi}')";





            if (mysqli_query($connect, $sql)) {
            } else {
                echo "deu certo";
              echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }

            mysqli_close($connect);          
                                                    
                                                    

                                                                                                            
          
        }     
          
 



             
?>







































