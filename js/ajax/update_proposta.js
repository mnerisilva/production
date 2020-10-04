(function(){
    
    $(document).on('click', '#btn-update-proposta', function(e){
        
        $('form#form_update_proposta').on('submit', function (e) {
        
        id_contrato = $(this).attr('data-id_contrato');
        
        console.log('entrou aqui');

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'update_proposta.php',
            data: $('form#form_update_proposta').serialize(),
            success: function (data) {
                $('.painel-cadastro-proposta').addClass('esconde-elemento');
                $('.painel-lista-propostas').removeClass('esconde-elemento');
                console.log('Retorno do Php update_proposta: '+data);
            }
          });

        });
    })
    
    
})();










