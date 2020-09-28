 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 


      
      if (isset($_POST['idAnexo'])) {  
           $idAnexo = $_POST['idAnexo'];
           $idContrato = $_POST['idContrato'];
           $pathAnexo = $_POST['pathAnexo'];
           $fileNameAnexo = $_POST['fileNameAnexo'];
           $path_e_fileNameAnexo = $pathAnexo . $fileNameAnexo;
      }


      //echo '<pre>'.var_dump($_POST).'</pre>';
      //echo '$caminho_e_nome_do_arquivo: ' . $caminho_e_nome_do_arquivo;
      //echo '<br>$fileNameAnexo: ' . $fileNameAnexo;
      //echo '<br>$pathAnexo: ' . $pathAnexo;
      //echo '<br>$path_e_fileNameAnexo: ' . $path_e_fileNameAnexo;
      //die();


        // sql to delete a record
        $sql = "DELETE FROM tab_anexos WHERE id_anexo = {$idAnexo}";

        if (mysqli_query($connect, $sql)) {
            unlink($path_e_fileNameAnexo);
        } else {
          echo "Error deleting record: " . mysqli_error($connect);
        }




      /////////////////////////////////// fetch data from student table..
      $sql2 = "SELECT id_contrato, id_anexo, path_anexo, file_name_anexo FROM tab_anexos WHERE id_contrato = {$idContrato}";

      $resultado2 = mysqli_query($connect, $sql2);

      $output = "";  


      //if ($query->num_rows > 0) {
      if(mysqli_num_rows($resultado2) > 0){
      //while ($row = $query->fetch_assoc()) {
      while($dados2 = mysqli_fetch_array($resultado2)){
      //$nome_do_arquivo_a_deletar = $dados['file_name_anexo'];
          
      $output .= "
                        <tr>
                            <td>".$dados2['id_contrato']."</td>
                            <td><a href='".$dados2['path_anexo']."/".$dados2['file_name_anexo']."' target='_BLANK'>".$dados2['file_name_anexo']."</a></td>
                            <td><i class='fa fa-trash' data-id_contrato=".$dados2['id_contrato']." data-id_anexo=".$dados2['id_anexo']." data-path_anexo=".$dados2['path_anexo']." data-file_name_anexo='".$dados2['file_name_anexo']."'></i></td>                            
                        </tr>";
        }  
      }  
      echo "  
            <div class='modal-body'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Contrato</th>
                            <th>Arquivo</th>
                            <th><i class='fas fa-plus-circle'></i></th>
                    </thead>
                    <tbody>".$output."
                    </tbody>
                </table>
            </div>"; 




 ?>