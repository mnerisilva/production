 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 

      /*var_dump($_POST); 
      die();*/
      
      if (isset($_POST['id_contrato'])) {  
           $id_contrato = $_POST['id_contrato'];  
      }  
      // fetch data from student table..
      $sql = "SELECT id_contrato, id_anexo, path_anexo, file_name_anexo FROM tab_anexos WHERE id_contrato = {$id_contrato}";

      $resultado = mysqli_query($connect, $sql);

      $output = "";  

      //var_dump($_POST);
      //die();

      //if ($query->num_rows > 0) {
      if(mysqli_num_rows($resultado) > 0){
      //while ($row = $query->fetch_assoc()) {
      while($dados = mysqli_fetch_array($resultado)){
      //echo 'nome do arquivo com a extensão vindo do $_POST: ' . $dados['file_name_anexo'];
      //echo '<br>path vindo do $_POST: ' . $dados['path_anexo'];
      //echo '<br>';
      //die();
      $explode = explode(".", $dados['file_name_anexo']);
      $nome = $explode[0];
      $extensao = $explode[1];
      $nome_do_arquivo_a_deletar = $nome.'.'.$extensao;
      //echo 'nome: ' . $nome;
      //echo '<br>extensao: ' . $extensao;
      //echo '<br>$nome_do_arquivo_a_deletar: ' . $nome_do_arquivo_a_deletar;
      $file_name_anexo = $dados['file_name_anexo'];
          
          
      $output .= "
                        <tr class='td-lista-anexos'>
                            <td>".$dados['id_contrato']."</td>
                            <td><a href='".$dados['path_anexo']."/".$dados['file_name_anexo']."' target='_BLANK'>".$dados['file_name_anexo']."</a></td>
                            <td><i class='fa fa-trash' data-id_contrato=".$dados['id_contrato']." data-id_anexo=".$dados['id_anexo']." data-path_anexo=".$dados['path_anexo']." data-file_name_anexo='".$file_name_anexo."'></i></td>                            
                        </tr>";
        }  
      }  
      echo $output; 
 ?> 