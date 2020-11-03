(function(){
    
    function montaLinhaVoltaUpdate_cliente(id_cli){
                  $.ajax({
                    type: 'post',
                    url: 'edit_cliente/atualiza_linha_cliente_editada.php',
                    data: {id_cli: id_cli},
                    success: function (data2) {
                        var objeto_data = JSON.parse(data2);
                        //console.log('json retornado com a linha afetada: ' + objeto_data);
                        console.log('json retornado com a linha afetada: ' + data2);
                        console.log('tipo de dado: '+typeof objeto_data);
                        //inha.css('opacity','.5');
                        var cor =  objeto_data.cor_situacao;
                        $('.painel-lista-clientes tbody tr#tr-cli_'+id_cli).find('.td-id_cli').text(objeto_data.id_cli);
                        $('.painel-lista-clientes tbody tr#tr-cli_'+id_cli).find('.td-nome_cli').text(objeto_data.nome_cli);
                        $('.painel-lista-clientes tbody tr#tr-cli_'+id_cli).find('.td-cpf_cli').html(objeto_data.cpf_cli);
                        $('.painel-lista-clientes tbody tr#tr-cli_'+id_cli).find('.td-identidade_cli').html(objeto_data.identidade_cli);
                        $('.painel-lista-clientes tbody tr#tr-cli_'+id_cli).find('.td-cep_cli').html(objeto_data.cep_cli);
                        $('.painel-lista-clientes tbody tr#tr-cli_'+id_cli).find('.td-endereco_cli').html(objeto_data.endereco_cli);
                        setTimeout(function(){
                            //linha.removeClass('selected');
                        },500)
                        //linha.css('opacity','1');
                    }
                  });  
    }
    
    
    
    
    $(document).on('click', '#btn-submit-edit-cliente', function(){
        
        
       //$('.painel-cadastro-proposta').addClass('esconde-elemento');
       //$('.painel-lista-propostas').removeClass('esconde-elemento');
 
        
        console.log('vai salvar dados editados.');
 
        //$('form#form_update_proposta').on('submit', function (e) {
        
        var id_cli = $(this).attr('data-id_cli');
        //var linha = $('#td-cli_'+id_cli);
        
        console.log('entrou aqui: ' + id_cli);

          //e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'edit_cliente/edit_cliente.php',
            data: $('form#form_edit_cliente').serialize(),
            success: function (data) {
                console.log('Retorno do Php update_proposta: '+data);
                montaLinhaVoltaUpdate_cliente(id_cli);
            }
          });
   })            
            

        //});
    
    
})();










