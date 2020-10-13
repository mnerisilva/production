(function(){
    
                // atualiza lista de anexos da janela #modalAnexos, div id #editForm, após o upload do arquivo.
             function lista_anexos2upload(id_contrato){
                    console.log('entrei na funcao lista_anexos2upload');
                    $.ajax({  
                         url :"list_anexos2.php",  
                         type:"POST", 
                         data:{id_contrato:id_contrato},  
                         cache:false, 
                         success:function(data){  
                              //$("#editForm").find('table').find('tbody').html(data);
                             console.log('data: '+data);
                             $('#td_'+id_contrato).find('.td-anexos').html('');
                             $('#td_'+id_contrato).find('.td-anexos').append(data);
                         },  
                    });

             }
    
    
            // atualiza lista de anexos da janela #modalAnexos, div id #editForm, após o upload do arquivo.
             function lista_anexos(id_contrato){
                    $.ajax({  
                         url :"list_anexos.php",  
                         type:"POST", 
                         data:{id_contrato:id_contrato},  
                         cache:false, 
                         success:function(data){  
                              $("#editForm").find('table').find('tbody').html(data);
                         },  
                    });

             }
    
    
            // upload de arquivo, após escolha e click no botão do mesmo nome (upload) da janela que lista os anexos, da proposta em questão - modalAnexos - div id editForm
            // em seguida a função "lista_anexos(id_contrato_anexo)" atualiza a listagem da janela - div id editForm
             $(document).on('submit', '#upload_form', function(e){
                e.preventDefault();
                  $("#btn_upload_anexo").prop("disabled", true);
                  $.ajax({
                   url:"upload.php",
                   method:"POST",
                   enctype: 'multipart/form-data',
                   data: new FormData(this),
                   contentType: false,
                   cache: false,
                   processData:false,
                   success: function(data) { 
                       console.log(data);
                       // depois de subir o arquivo, limpa o valor: 'val' do input que continha o nome do arquivo
                       $(e.target).find('#input_upload_file').val('');
                       //var id_contrato_anexo = $('#btn_upload_anexo').val();
                       var id_contrato_anexo = $('#btn_upload_anexo').attr('data-id_contrato_anexo');
                       $("#btn_upload_anexo").prop("disabled", false);
                       lista_anexos(id_contrato_anexo);
                       lista_anexos2upload(id_contrato_anexo);
                        //load_folder_list();
                        //alert(data);
                       }
                  });
             }); 
    
})();