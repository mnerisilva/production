(function(){
    $(document).on('click', '#crudHistorico #btn-add-crud-hist', function(e){
        e.preventDefault();
        var id_proposta_post = $(this).attr('data-id_proposta');
        var id_usuario_logado = $(this).attr('data-id_usuario_logado');
        console.log('cliquei no SUBMIT add-post: '+id_proposta_post);


          $.ajax({
            type: 'post',
            url: 'crud_lista_historico/add_post_no_historico.php',
            data: $('form#form_add_crud_hist').serialize(),
            success: function (data) {
                if(data === ''){
                    console.log('o parâmetro data retornou vazio: ' + typeof data);
                   }
                console.log('Retorno do Php add post no historco: '+data);                
                /*var objeto_data_hist = JSON.parse(data);
                console.log('tipo de dados: '+ typeof objeto_data_hist);
                console.log('dados: '+ objeto_data_hist[0]);
                var linha = '';
                for (let key in objeto_data_hist) {
                    linha = objeto_data_hist[key];
                    $('#crudHistorico .table-historico tbody').append('<tr><th scope="row">'+linha.id_hist+'</th><td>'+linha.data_ult_modi+'</td><td class="post">'+linha.postagem_hist+'</td><td><a href=""><i class="fa fa-edit"></i></a> <a href=""><i class="fa fa-trash"></i></a></td><td class="img-user"><img class="img-responsive" src="'+linha.foto_usuario_link+'" title="'+linha.primeiro_nome_usuario+'"/></td></tr>')
                  console.log(key, objeto_data_hist[key]);
                }*/                
            }
          });         
        
    });    
})();