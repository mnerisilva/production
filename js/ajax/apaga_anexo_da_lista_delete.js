(function(){

                // atualiza lista de anexos da janela #modalAnexos, div id #editForm, após o upload do arquivo.
             function lista_anexos2(id_contrato){
                    console.log('entrei na funcao lista_anexos2');
                    $.ajax({  
                         url :"list_anexos2.php",  
                         type:"POST", 
                         data:{id_contrato:id_contrato},  
                         cache:false, 
                         success:function(data){  
                              //$("#editForm").find('table').find('tbody').html(data);
                             console.log('data: '+data);
                             $('#'+id_contrato).find('.td-anexos').html('');
                             $('#'+id_contrato).find('.td-anexos').append(data);
                         },  
                    });

             }
    
    
          
           // Apaga anexo da lista quando clica ícone fa-trash  
           $(document).on("click",".fa-trash",function(){ 
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
                          console.log('file_name_anexo_sem_extensao: '+ file_name_anexo_sem_extensao.replace(/\s/g, ''));
                          //$('#'+file_name_anexo_sem_extensao.replace(/\s/g, '')).find('i').remove();
                         
                         lista_anexos2(id_contrato);
                     },  
                });  
           }); 
    
})()