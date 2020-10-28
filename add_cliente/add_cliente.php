<?php  
      // create database connectivity  
      require_once('../php_action/db_connect.php'); 

      //echo json_encode($_POST);
      //die();

      //$id_cli = $_POST['add_id_cli'];
      //$add_id_cli         = $_POST['add_id_cli'];
      $add_nome_cli         = $_POST['add_cli_nome'];
      $add_cpf_cli          = $_POST['add_cli_cpf'];
      $add_identidade_cli   = $_POST['add_cli_identidade']; 
      $add_cep_cli          = $_POST['add_cli_cep']; 
      $add_endereco_cli     = $_POST['add_cli_endereco']; 
      $add_numero_cli       = $_POST['add_cli_numero']; 
      $add_comple_cli       = $_POST['add_cli_comple']; 
      $add_bairro_cli       = $_POST['add_cli_bairro'];  
      $add_cidade_cli       = $_POST['add_cli_cidade'];  
      $add_uf_cli           = $_POST['add_cli_uf'];  
      $add_datanasc_cli     = $_POST['add_cli_datanasc'];


    $sql_cli = "INSERT INTO tab_clientes (nome_cli, cpf_cli, identidade_cli, cep_cli, endereco_cli, numero_cli, comple_cli, bairro_cli, cidade_cli, uf_cli, datanasc_cli)
    VALUES ('{$add_nome_cli}', '{$add_cpf_cli}', '{$add_identidade_cli}', '{$add_cep_cli}', '{$add_endereco_cli}', '{$add_numero_cli}', '{$add_comple_cli}', '{$add_bairro_cli}', '{$add_cidade_cli}', '{$add_uf_cli}', '{$add_datanasc_cli}')";

    



                                                      



    if (mysqli_query($connect, $sql_cli)) {
        $ultimo_id_cli = (string) $connect->insert_id;
        $json_dados_cli = array ('id_cli'=>$ultimo_id_cli, 'add_nome_cli'=>$add_nome_cli, 'add_cpf_cli'=>$add_cpf_cli, 'add_identidade_cli'=>$add_identidade_cli, 'add_cep_cli'=>$add_cep_cli, 'add_endereco_cli'=>$add_endereco_cli , 'add_numero_cli'=>$add_numero_cli, 'add_comple_cli'=>$add_comple_cli, 'add_bairro_cli'=>$add_bairro_cli, 'add_cidade_cli'=>$add_cidade_cli, 'add_uf_cli'=>$add_uf_cli, 'add_datanasc_cli'=>$add_datanasc_cli);
         echo json_encode($json_dados_cli);
    } else {
      echo "Error: " . $sql_cli . "<br>" . mysqli_error($connect);
    }

    mysqli_close($connect);









 ?>