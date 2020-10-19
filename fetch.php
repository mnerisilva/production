 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 


      
      if (isset($_POST['editId'])) {  
           $editId = $_POST['editId'];  
      }  
      // fetch data from student table..
      $sql = "SELECT id_contrato, id_anexo, path_anexo, file_name_anexo FROM tab_anexos WHERE id_contrato = {$editId}";

      $resultado = mysqli_query($connect, $sql);

      $output = "";  

      //var_dump($_POST);
      //die();

      //if ($query->num_rows > 0) {
      if(mysqli_num_rows($resultado) > 0){
      //while ($row = $query->fetch_assoc()) {
      while($dados = mysqli_fetch_array($resultado)){
      $output .= "
                        <tr class='td-lista-anexos'>
                            <td>".$dados['id_contrato']."</td>
                            <td><a href='".$dados['path_anexo']."/".$dados['file_name_anexo']."' target='_BLANK'>".$dados['file_name_anexo']."</a></td>
                            <td><i class='fa fa-trash' data-id_contrato=".$dados['id_contrato']." data-id_anexo=".$dados['id_anexo']." data-path_anexo=".$dados['path_anexo']." data-file_name_anexo='".$dados['file_name_anexo']."'></i></td>                            
                        </tr>";
        }  
      }  
      echo "  
            <div class='modal-body'>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Contrato</th>
                            <th>Arquivo</th>
                            <th></i></th>
                    </thead>
                    <tbody>".$output."
                    </tbody>
                </table>
            </div>"; 
 ?> 