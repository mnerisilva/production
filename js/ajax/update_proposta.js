(function(){
    
    $(document).on('click', '#btn-update-proposta', function(){
        
       $('.painel-cadastro-proposta').addClass('esconde-elemento');
       $('.painel-lista-propostas').removeClass('esconde-elemento');
 
        
    
 
        //$('form#form_update_proposta').on('submit', function (e) {
        
        var id_contrato = $(this).attr('data-id_contrato');
        
        console.log('entrou aqui: ' + id_contrato);

          //e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'update_proposta.php',
            data: $('form#form_update_proposta').serialize(),
            success: function (data) {
                console.log('Retorno do Php update_proposta: '+data);
            }
          });
            
            

          $.ajax({
            type: 'post',
            url: 'atualiza_linha_proposta_editada.php',
            data: {id_contrato: id_contrato},
            success: function (data) {
                console.log(data);
                var linha = $('#td_'+id_contrato);
                linha.css('opacity','0');
            }
          });           
            
   })            
            

        //});
    
    
})();










