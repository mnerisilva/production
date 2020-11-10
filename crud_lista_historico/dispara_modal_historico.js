(function(){
    
    console.log('usuario logado: '+window.usuario_logado);
    $(document).on('click', '.btn-historico', function(e){
        e.preventDefault();
        $('#crudHistorico .table-historico tbody').html('');
        var id_proposta = $(this).attr('data-id_proposta');
        console.log('clicou no botão do histórico... proposta: ' + id_proposta);
        //$('#crudHistorico .modal-body').html('histórico da proposta: ' + id_proposta);
        

          $.ajax({
            type: 'post',
            url: 'crud_lista_historico/select_do_historico.php',
            data: {id_proposta: id_proposta},
            success: function (data) {
                if(data === ''){
                    console.log('o parâmetro data retornou vazio: ' + typeof data);
                   }
                console.log('Retorno do Php update_proposta: '+data);                
                var objeto_data_hist = JSON.parse(data);
                console.log('tipo de dados: '+ typeof objeto_data_hist);
                console.log('dados: '+ objeto_data_hist[0]);
                var linha = '';
                for (let key in objeto_data_hist) {
                    linha = objeto_data_hist[key];
                    $('#crudHistorico .table-historico tbody').append('<tr><th scope="row">'+linha.id_hist+'</th><td>'+linha.data_ult_modi+'</td><td class="post">'+linha.postagem_hist+'</td><td><a href=""><i class="fa fa-edit"></i></a> <a href=""><i class="fa fa-trash"></i></a></td><td class="img-user"><img class="img-responsive" src="'+linha.foto_usuario_link+'" title="'+linha.primeiro_nome_usuario+'"/></td></tr>')
                  console.log(key, objeto_data_hist[key]);
                }                
            }
          });        
        
    });
    
})();