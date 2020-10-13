(function(){
    
    $(document).on('click', '#btn-update-proposta', function(){
        
       $('.painel-cadastro-proposta').addClass('esconde-elemento');
       $('.painel-lista-propostas').removeClass('esconde-elemento');
 
        
    
 
        //$('form#form_update_proposta').on('submit', function (e) {
        
        var id_contrato = $(this).attr('data-id_proposta');
        var linha = $('#td_'+id_contrato);
        
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
            
            

          setTimeout(function(){
                  $.ajax({
                    type: 'post',
                    url: 'atualiza_linha_proposta_editada.php',
                    data: {id_proposta: id_contrato},
                    success: function (data2) {
                        var objeto_data = JSON.parse(data2);
                        console.log('json retornado com a linha afetada: ' + objeto_data);
                        //inha.css('opacity','.5');
                        var cor =  objeto_data.cor_situacao;
                        linha.find('.td-ade').text(objeto_data.ade_contrato);
                        linha.find('.td-parce').text(objeto_data.parce_contrato);
                        linha.find('.td-situa').html('<i class="fa fa-certificate" style="background: '+ objeto_data.cor_situacao +'; color: '+ objeto_data.cor_situacao +'"></i> ' + objeto_data.descricao_situacao.toLowerCase());
                        linha.find('.td-motivo-situa').text(objeto_data.motivo_descricao_situacao);
                        linha.find('.td-orgao').text(objeto_data.nome_orgao);
                        linha.find('.td-bccompra').text(objeto_data.bccompra_nome);
                        setTimeout(function(){
                            linha.removeClass('selected');
                        },500)
                        //linha.css('opacity','1');
                    }
                  });               
          }, 1000);
                  
            
   })            
            

        //});
    
    
})();










