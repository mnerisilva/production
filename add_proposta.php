<?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 

      //echo json_encode($_POST);
      //die();

      $id_cli = $_POST['add_id_cli'];
      $ade_contrato = $_POST['add_ade'];
      $id_orgao = $_POST['add_orgao']; 
      $bn_contrato = $_POST['add_bn']; 
      $matribn_contrato = '';
      $parce_contrato = $_POST['add_parce']; 
      $opera_contrato = $_POST['add_opera']; 
      $promo_contrato = $_POST['add_promo']; 
      $vend_contrato = $_POST['add_vend']; 
      $situa_contrato = $_POST['add_situa']; 
      $id_bccompra_contrato = $_POST['add_bccompra'];  
      $parceini_contrato = $_POST['add_parceini'];  
      $parcefinal_contrato = $_POST['add_parcefinal'];  
      $ml_contrato = $_POST['add_ml'];  
      $historico = $_POST['add_historico']; 

      $format_parce         = formataValorMonetarioParaOBanco($parce_contrato);
      $format_parceini      = formataValorMonetarioParaOBanco($parceini_contrato);
      $format_parcefinal    = formataValorMonetarioParaOBanco($parcefinal_contrato);
      $format_ml            = formataValorMonetarioParaOBanco($ml_contrato);


    $sql = "INSERT INTO tab_propostas (id_contrato, id_cli, ade_contrato, id_orgao, bn_contrato, matribn_contrato, parce_contrato, opera_contrato, promo_contrato, vend_contrato, situa_contrato, id_bccompra_contrato, parceini_contrato, parcefinal_contrato, ml_contrato, observa_tab_contrato)
    VALUES ('', '{$id_cli}', '{$ade_contrato}', '{$id_orgao}', '{$bn_contrato}', '{$matribn_contrato}', '{$format_parce}', '{$opera_contrato}', '{$promo_contrato}', '{$vend_contrato}', '{$situa_contrato}', '{$id_bccompra_contrato}', '{$format_parceini}', '{$format_parcefinal}', '{$format_ml}', '{$historico}')";

    



                                                      



    if (mysqli_query($connect, $sql)) {
        $ultimo_id = (string) $connect->insert_id;
        $json_dados = array ('id_contrato'=>$ultimo_id, 'id_cli'=>$id_cli, 'ade_contrato'=>$ade_contrato, 'id_orgao'=>$id_orgao, 'bn_contrato'=>$bn_contrato, 'matribn_contrato'=>$matribn_contrato , 'parce_contrato'=>$parce_contrato, 'opera_contrato'=>$opera_contrato, 'promo_contrato'=>$promo_contrato, 'vend_contrato'=>$vend_contrato, 'situa_contrato'=>$situa_contrato, 'id_bccompra_contrato'=>$id_bccompra_contrato, 'parceini_contrato'=>$parceini_contrato, 'parcefinal_contrato'=>$parcefinal_contrato, 'ml_contrato'=>$ml_contrato, 'observa_tab_contrato'=>$historico);
         echo json_encode($json_dados);
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    mysqli_close($connect);
























function formataValorMonetarioParaOBanco($valor){
    // Valor recebido do formulário, campo valor solicitado (exemplo: 2.000,00)
    // Removo da variável o "."
    $valor = str_replace('.', '', $valor);
    // Substituo a "," pelo "." pois é esse formato que o campo do seu banco de dados vai aceitar
    $valor = str_replace(',', '.', $valor);    
    return $valor;
}



 ?>