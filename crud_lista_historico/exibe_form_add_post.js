(function(){
    $(document).on('click', '#crudHistorico #btn-addHistorico', function(e){
        e.preventDefault();
        console.log('cliquei no add-post');
        $('#crudHistorico .add-post').addClass('exibe-form-addPost');
    });
})();