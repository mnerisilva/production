(function(){

    
           // monta a janela e lista os anexos da proposta clicada - quando clica no botão ".clip-anexo" no index.php  
           $(document).on("click",".clip-anexo",function(){ 
               console.log('clicou no .edit-btn');
                var id = $(this).data('id');
                var id_contrato = $(this).data('id_contrato');
                $.ajax({  
                     url :"fetch.php",  
                     type:"POST",  
                     cache:false,  
                     data:{editId:id},  
                     success:function(data){  
                          $("#editForm").html(data);
                          //$(document).find('#upload_form').find('#hidden_folder_name').attr('values','uploads/'+id_contrato);
                         $('#hidden_folder_name').val('uploads/'+id+'/').trigger('change');
                         $('#id_contrato_anexo').val(id).trigger('change');
                         //$('#btn_upload_anexo').val('hhhhh').trigger('change');
                         $('#btn_upload_anexo').attr('data-id_contrato_anexo', id);
                         console.log($('#hidden_folder_name').attr('value')); 
                     },  
                });  
           });    
    
    
})();