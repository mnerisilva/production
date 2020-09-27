 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 

      //var_dump($_POST);
      //die();
      
      if (isset($_POST['action'])) {  
           $action = $_POST['action'];
          
          
          
          
            
            //////////////////////////////////////////////////////////////////////////////////////////     
            // select para popular campo cliente do formulário de cadastro de proposta
            if($action == 'proposta_cli'){ 
              $sql = "SELECT id_cli, cpf_cli, nome_cli FROM tab_clientes ORDER BY nome_cli";

              $resultado = mysqli_query($connect, $sql);

              $output = "";  

              //var_dump($_POST);
              //die();

              //if ($query->num_rows > 0) {
              if(mysqli_num_rows($resultado) > 0){
              //while ($row = $query->fetch_assoc()) {
              while($dados = mysqli_fetch_array($resultado)){
                    $output .= "<option value=".$dados['id_cli']."><div><span>".$dados['cpf_cli']."</span>&nbsp;&nbsp;&equiv;&nbsp;&nbsp;<span><i class='fas fa-grip-horizontal'></i>".$dados['nome_cli']."</span></div></option>";
                }  
              }  
              echo "<option value=''>...</option>".$output;                 
            }
            //////////////////////////////////////////////////////////////////////////////////////////
          
          
          
            
            //////////////////////////////////////////////////////////////////////////////////////////
            // select para popular campo órgáo do formulário de cadastro de proposta
            if($action == 'proposta_orgao'){ 
              $sql = "SELECT id_orgao, nome_orgao FROM tab_orgao ORDER BY nome_orgao";

              $resultado = mysqli_query($connect, $sql);

              $output = "";  

              //var_dump($_POST);
              //var_dump(mysqli_num_rows($resultado2));
              //die();

              //if ($query->num_rows > 0) {
              if(mysqli_num_rows($resultado) > 0){
              //while ($row = $query->fetch_assoc()) {
              //die();
              while($dados = mysqli_fetch_array($resultado)){
                    echo 'entrou no looping do while';
                    $output .= "<option value=".$dados['id_orgao'].">".$dados['nome_orgao']."</option>";
                }  
              } else {
                  echo 'não entrou em mais uma etapa';
              } 
              echo "<option value=''>...</option>".$output;                 
            }          
            /////////////////////////////////////////////////////////////////////////////////////////////////
          
          
                    
            
            //////////////////////////////////////////////////////////////////////////////////////////
            // select para popular campo bn do formulário de cadastro de proposta
            if($action == 'proposta_bn'){ 
              $sql = "SELECT id_bn, cod_bn FROM tab_bn ORDER BY cod_bn";

              $resultado = mysqli_query($connect, $sql);

              $output = "";  

              //var_dump($_POST);
              //var_dump(mysqli_num_rows($resultado2));
              //die();

              //if ($query->num_rows > 0) {
              if(mysqli_num_rows($resultado) > 0){
              //while ($row = $query->fetch_assoc()) {
              //die();
              while($dados = mysqli_fetch_array($resultado)){
                    echo 'entrou no looping do while';
                    $output .= "<option value=".$dados['id_bn'].">".$dados['cod_bn']."</option>";
                }  
              } else {
                  echo 'não entrou em mais uma etapa';
              } 
              echo "<option value=''>...</option>".$output;                 
            }          
            /////////////////////////////////////////////////////////////////////////////////////////////////

          
          
                    
            
            //////////////////////////////////////////////////////////////////////////////////////////
            // select para popular campo operacao do formulário de cadastro de proposta
            if($action == 'proposta_opera'){ 
              $sql = "SELECT id_operacao, nome_operacao FROM tab_operacao ORDER BY nome_operacao";

              $resultado = mysqli_query($connect, $sql);

              $output = "";  

              //var_dump($_POST);
              //var_dump(mysqli_num_rows($resultado2));
              //die();

              //if ($query->num_rows > 0) {
              if(mysqli_num_rows($resultado) > 0){
              //while ($row = $query->fetch_assoc()) {
              //die();
              while($dados = mysqli_fetch_array($resultado)){
                    echo 'entrou no looping do while';
                    $output .= "<option value=".$dados['id_operacao'].">".$dados['nome_operacao']."</option>";
                }  
              } else {
                  echo 'não entrou em mais uma etapa';
              } 
              echo "<option value=''>...</option>".$output;                 
            }          
            /////////////////////////////////////////////////////////////////////////////////////////////////          
          
          

          
          
                    
            
            //////////////////////////////////////////////////////////////////////////////////////////
            // select para popular campo promotora do formulário de cadastro de proposta
            if($action == 'proposta_promo'){ 
              $sql = "SELECT id_promotora, nome_promotora FROM tab_promotora ORDER BY nome_promotora";

              $resultado = mysqli_query($connect, $sql);

              $output = "";  

              //var_dump($_POST);
              //var_dump(mysqli_num_rows($resultado2));
              //die();

              //if ($query->num_rows > 0) {
              if(mysqli_num_rows($resultado) > 0){
              //while ($row = $query->fetch_assoc()) {
              //die();
              while($dados = mysqli_fetch_array($resultado)){
                    echo 'entrou no looping do while';
                    $output .= "<option value=".$dados['id_promotora'].">".$dados['nome_promotora']."</option>";
                }  
              } else {
                  echo 'não entrou em mais uma etapa';
              } 
              echo "<option value=''>...</option>".$output;                 
            }          
            ///////////////////////////////////////////////////////////////////////////////////////////////// 
          
             
                    
            
            //////////////////////////////////////////////////////////////////////////////////////////
            // select para popular campo vendedor do formulário de cadastro de proposta
            if($action == 'proposta_vend'){ 
              $sql = "SELECT id_vendedor, nome_vendedor FROM tab_vendedor ORDER BY nome_vendedor";

              $resultado = mysqli_query($connect, $sql);

              $output = "";  

              //var_dump($_POST);
              //var_dump(mysqli_num_rows($resultado2));
              //die();

              //if ($query->num_rows > 0) {
              if(mysqli_num_rows($resultado) > 0){
              //while ($row = $query->fetch_assoc()) {
              //die();
              while($dados = mysqli_fetch_array($resultado)){
                    echo 'entrou no looping do while';
                    $output .= "<option value=".$dados['id_vendedor'].">".$dados['nome_vendedor']."</option>";
                }  
              } else {
                  echo 'não entrou em mais uma etapa';
              } 
              echo "<option value=''>...</option>".$output;                 
            }          
            ///////////////////////////////////////////////////////////////////////////////////////////////// 
          
          
                    
          
          
            
            //////////////////////////////////////////////////////////////////////////////////////////
            // select para popular campo vendedor do formulário de cadastro de proposta
            if($action == 'proposta_situa'){ 
              $sql = "SELECT id_situacao, descricao_situacao, motivo_descricao_situacao FROM tab_situacao ORDER BY descricao_situacao";

              $resultado = mysqli_query($connect, $sql);

              $output = "";  

              //var_dump($_POST);
              //var_dump(mysqli_num_rows($resultado2));
              //die();

              //if ($query->num_rows > 0) {
              if(mysqli_num_rows($resultado) > 0){
              //while ($row = $query->fetch_assoc()) {
              //die();
              while($dados = mysqli_fetch_array($resultado)){
                    echo 'entrou no looping do while';
                    $output .= "<option value=".$dados['id_situacao'].">".$dados['descricao_situacao']." - ".$dados['motivo_descricao_situacao']."</option>";
                }  
              } else {
                  echo 'não entrou em mais uma etapa';
              } 
              echo "<option value=''>...</option>".$output;                 
            }          
            ///////////////////////////////////////////////////////////////////////////////////////////////// 
          
          
                    
          
          
            
            //////////////////////////////////////////////////////////////////////////////////////////
            // select para popular campo vendedor do formulário de cadastro de proposta
            if($action == 'proposta_bccompra'){ 
              $sql = "SELECT id_bccompra_contrato, nome_bccompra FROM tab_bccompra ORDER BY nome_bccompra";

              $resultado = mysqli_query($connect, $sql);

              $output = "";  

              //var_dump($_POST);
              //var_dump(mysqli_num_rows($resultado2));
              //die();

              //if ($query->num_rows > 0) {
              if(mysqli_num_rows($resultado) > 0){
              //while ($row = $query->fetch_assoc()) {
              //die();
              while($dados = mysqli_fetch_array($resultado)){
                    echo 'entrou no looping do while';
                    $output .= "<option value=".$dados['id_bccompra_contrato'].">".$dados['nome_bccompra']."</option>";
                }  
              } else {
                  echo 'não entrou em mais uma etapa';
              } 
              echo "<option value=''>...</option>".$output;                 
            }          
            ///////////////////////////////////////////////////////////////////////////////////////////////// 
          
          
      } 
 
 ?> 