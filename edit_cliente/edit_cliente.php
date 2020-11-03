<?php  
      // create database connectivity  
      require_once('../php_action/db_connect.php'); 

      var_dump($_POST);
      die();

      // atualiza proposta  
      $id_cli = $_POST['id_edit_cli'];
      $nome_cli = $_POST['nome_edit_cli'];
      $cpf_cli = $_POST['cpf_edit_cli']; 
      $identidade_cli = $_POST['identidade_edit_cli']; 
      $cep_cli = $_POST['cep_edit_cli']; 
      $endereco_cli = $_POST['endereco_edit_cli']; 
      $numero_cli = $_POST['numero_edit_cli']; 
      $comple_cli = $_POST['comple_edit_cli'];
      $bairro_cli = $_POST['bairro_edit_cli'];
      $cidade_cli = $_POST['cidade_edit_cli'];
      $uf_cli = $_POST['uf_edit_cli'];
      $datanasc_cli = $_POST['datanasc_edit_cli'];


      $query = "UPDATE tab_clientes SET nome_cli='{$nome_cli}', cpf_cli='{$cpf_cli}', identidade_cli='{$identidade_cli}',cep_cli='{$cep_cli}', endereco_cli='{$endereco_cli}',numero_cli='{$numero_cli}',comple_cli='{$comple_cli}',bairro_cli='{$bairro_cli}', cidade_cli='{$cidade_cli}',uf_cli='{$uf_cli}',datanasc_cli='{$datanasc_cli}'"; 

        if (mysqli_query($connect, $query)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($connect);
        }
 ?>