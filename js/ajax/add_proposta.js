(function(){
    
    function montaLinhaVoltaAdd(id_contrato){
                  console.log('id_contrato entro do montaLinhaVoltaAdd: '+id_contrato);
                  $.ajax({
                    type: 'post',
                    url: 'atualiza_linha_proposta_editada.php',
                    data: {id_proposta: id_contrato},
                    success: function (data2) {
                        var objeto_data = JSON.parse(data2);
                        //console.log('json retornado com a linha afetada: ' + objeto_data);
                        console.log('json retornado com a linha afetada: ' + objeto_data);
                        console.log('json retornado com a linha afetada: ' + data2);
                        
                        var valor = objeto_data.parce_contrato;
                        valor = parseInt(valor);
                        var situacao = objeto_data.descricao_situacao;
                        
                        
                        var nova_linha = '<tr class="even pointer" id="td_'+objeto_data.id_contrato+'"><td class="a-center "><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td><td class="color-1 cod-cliente" style="padding-right: 40px !important">                                                        '+objeto_data.id_contrato+'</td><td class="td-nome">'+objeto_data.nome_cli+'</td><td class="td-cpf">'+objeto_data.cpf_cli+'</td><td class="td-ade">'+objeto_data.ade_contrato+'</td><td class="td-parce"><span class="span-parce">'+valor.toLocaleString('pt-BR', { minimumFractionDigits: 2})+'</span></td><td class="td-situa"><i class="fa fa-certificate" style="background: '+objeto_data.cor_situacao+'; color: '+objeto_data.cor_situacao+'"></i> '+situacao.toLowerCase()+'</td><td class="td-motivo-situa">'+objeto_data.motivo_descricao_situacao+'</td><td class="icone-textarea-obs"><i class="fa fa-keyboard-o"></i></td><td class="td-orgao">'+objeto_data.nome_orgao+'</td><td class="td-bccompra">'+objeto_data.bccompra_nome+'</td><td class="td-anexos"></td><td class="a-right a-right icone-clip-anexo"><i class="fa fa-paperclip clip-anexo " data-toggle="modal" data-target="#modalAnexos" data-id="22"></i></td><td class="a-right a-right btn-editar-proposta" data-id_proposta="'+objeto_data.id_contrato+'" data-nome_cli="'+objeto_data.nome_cli+'" data-cpf_cli="'+objeto_data.cpf_cli+'"><i class="fa fa-edit"></i></td><td class="a-right a-right "><i class="fa fa-trash-o"></i></td><!--<td class=" last"><a href="#">View</a>--><td class=" last"><a href="#"><i class="fa fa-eye"></i></a></td></tr>';
                        
                        console.log('linha: ' + nova_linha);
                        
                        $('.lista-propostas tbody').append(nova_linha);
                        

                        setTimeout(function(){
                            //linha.removeClass('selected');
                        },500)
                        //linha.css('opacity','1');
                    }
                  });  
                        $('#form_add_proposta').each (function(){
                          this.reset();
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










