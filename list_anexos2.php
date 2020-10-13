 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 

      /*var_dump($_POST); 
      die();*/
      
      if (isset($_POST['id_contrato'])) {  
           $id_contrato = $_POST['id_contrato'];  
      }  
      // fetch data from student table..
      $sql = "SELECT id_contrato, id_anexo, path_anexo, file_name_anexo, id_tipo_arquivo FROM tab_anexos WHERE id_contrato = {$id_contrato}";

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
      $id_tipo_arquivo = $dados['id_tipo_arquivo'];
          
      //$output .= "<a class='color-icon-'".$extensao_file."' anexo' download href='".$dados2["path_anexo"]."/".$file_name.'.'.$extensao_file.'" id="'.$file_name.'" title="'.$file_name.'.'.$extensao_file.'">'.$dados2['icone_anexo'].'</a>";
      
      
      //$output .= "<a class='color-icon-".$extensao." anexo' href='".$dados['path_anexo']."/".$dados['file_name_anexo']."' target='_BLANK' title='".$file_name_anexo."'><i class='fa fa-file-o'></i></a>";
      $output .= "<a class='color-icon-".$extensao." anexo' href='".$dados['path_anexo']."/".$dados['file_name_anexo']."' target='_BLANK' title='".$file_name_anexo."'>".icone_anexo($connect, $id_tipo_arquivo)."</a>";
      
      
        }  
      }  
      echo $output; 


















function icone_anexo($connect, $id_tipo_arquivo){
    
    
    
    
    
    
      $sql2 = "SELECT * FROM tab_tipo_arquivo_anexo WHERE id_tipo_arquivo = {$id_tipo_arquivo}";

      $resultado2 = mysqli_query($connect, $sql2);

      //var_dump($_POST);
      //die();

      //if ($query->num_rows > 0) {
      if(mysqli_num_rows($resultado2) > 0){
      //while ($row = $query->fetch_assoc()) {
      while($dados2 = mysqli_fetch_array($resultado2)){
      
          
        return $dados2['icone_anexo'];
      
      
        }  
      }     
    
    
}





 ?> 