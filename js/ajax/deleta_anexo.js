(function(){

          
          
           // Delete record to mysqli from php using jquery ajax  
           $(document).on("click","body .fa-trash",function(){ 
               console.log('entrou nesta função');
                var id_anexo = $(this).data('id_anexo');
                var id_contrato = $(this).data('id_contrato');
                var path_anexo = $(this).data('path_anexo');
                var file_name_anexo = $(this).data('file_name_anexo');
                $.ajax({  
                     url :"delete.php",  
                     type:"POST",  
                     cache:false,  
                     data:{idAnexo:id_anexo, idContrato:id_contrato, pathAnexo:path_anexo, fileNameAnexo:file_name_anexo},  
                     success:function(data){
                          $("#editForm").html(data);
                          var split_file_name_anexo = file_name_anexo.split('.');
                          var file_name_anexo_sem_extensao = split_file_name_anexo[0];
                          console.log('file_name_anexo: '+ file_name_anexo);
                          console.log('.split'+file_name_anexo.split('.', file_name_anexo));
                          console.log('file_name_anexo_sem_extensao: '+ file_name_anexo_sem_extensao);
                          $('#'+file_name_anexo_sem_extensao).find('i').remove();
                     },  
                });  
           });
    
    
})();