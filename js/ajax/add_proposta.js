(function(){
    
    function montaLinhaVoltaAdd(id_contrato){
                  console.log('id_contrato entro do montaLinhaVoltaAdd: '+id_contrato);
                  $.ajax({
                    type: 'post',
                    url: 'atualiza_linha_proposta_editada.php',
                    data: {id_proposta: id_contrato},
                    success: function (data2) {
                        //var objeto_data = JSON.parse(data2);
                        //console.log('json retornado com a linha afetada: ' + objeto_data);
                        console.log('json retornado com a linha afetada: ' + data2);
                        //inha.css('opacity','.5');
                        //var cor =  objeto_data.cor_situacao;
                        //linha.find('.td-ade').text(objeto_data.ade_contrato);
                        //linha.find('.td-parce').text(objeto_data.parce_contrato);
                        //linha.find('.td-situa').html('<i class="fa fa-certificate" style="background: '+ objeto_data.cor_situacao +'; color: '+ objeto_data.cor_situacao +'"></i> ' + objeto_data.descricao_situacao.toLowerCase());
                        //linha.find('.td-motivo-situa').text(objeto_data.motivo_descricao_situacao);
                        //linha.find('.td-orgao').text(objeto_data.nome_orgao);
                        //linha.find('.td-bccompra').text(objeto_data.bccompra_nome);
                        setTimeout(function(){
                            //linha.removeClass('selected');
                        },500)
                        //linha.css('opacity','1');
                    }
                  });  
    }
    
    
    
    
    $(document).on('click', '#btn-add-proposta', function(){
        
       //$('.painel-cadastro-proposta').addClass('esconde-elemento');
       //$('.painel-lista-propostas').removeClass('esconde-elemento');
 
        
    
 
        //$('form#form_update_proposta').on('submit', function (e) {
        
        //var id_contrato = $(this).attr('data-id_proposta');
       // var linha = $('#td_'+id_contrato);
       var linha = $('#td_0');
        
        console.log('entrou aqui add_proposta.js');

          //e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'add_proposta.php',
            data: $('form#form_add_proposta').serialize(),
            success: function (data) {
                var objeto_data = JSON.parse(data);
                console.log('Tipo: '+typeof objeto_data);
                console.log('Retorno do Php add_proposta: '+objeto_data);
                console.log('id_contrato vindo do add_proposta.php: : '+objeto_data.id_contrato);
                montaLinhaVoltaAdd(objeto_data.id_contrato);
            }
          });
   })            
            

        //});
    
    
})();










