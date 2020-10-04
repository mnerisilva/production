<?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 

      //var_dump($_POST);
      //die();

      // atualiza proposta  
      $id_contrato = $_POST['id_proposta_update']; 
      $ade_contrato = $_POST['ade']; 
      $id_orgao = $_POST['orgao']; 
      $bn_contrato = $_POST['bn']; 
      $matribn_contrato = $_POST['matribn']; 
      $parce_contrato = $_POST['parce']; 
      $opera_contrato = $_POST['opera']; 
      $promo_contrato = $_POST['promo']; 
      $vend_contrato = $_POST['vend']; 
      $situa_contrato = $_POST['situa']; 
      $id_bccompra_contrato = $_POST['bccompra'];  
      $parceini_contrato = $_POST['parceini'];  
      $parcefinal_contrato = $_POST['parcefinal'];  
      $ml_contrato = $_POST['ml'];  
      $observa_tab_contrato = $_POST['observa_tab_contrato'];  


      $query = "UPDATE tab_propostas SET ade_contrato='{$ade_contrato}',id_orgao='{$id_orgao}', bn_contrato='{$bn_contrato}',matribn_contrato='{$matribn_contrato}', parce_contrato='{$parce_contrato}',opera_contrato='{$opera_contrato}',promo_contrato='{$promo_contrato}',vend_contrato='{$vend_contrato}', situa_contrato='{$situa_contrato}',id_bccompra_contrato='{$id_bccompra_contrato}',parceini_contrato='{$parceini_contrato}',parcefinal_contrato='{$parcefinal_contrato}',ml_contrato='{$ml_contrato}',observa_tab_contrato='{$observa_tab_contrato}' WHERE id_contrato='{$id_contrato}'"; 

        if (mysqli_query($connect, $query)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($connect);
        }
 ?>