
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- jquery.inputmask -->
    <!--<script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>-->

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script src="js/jquery.mask.min.js"></script>
    <script src="js/ajax/monta_lista_anexo_fetch.js"></script>
    <script src="js/ajax/apaga_anexo_da_lista_delete.js"></script>
    <script src="js/ajax/upload_arquivo_escolhido_upload.js"></script>
    <script src="js/ajax/update_proposta.js"></script>
	
  </body>
</html>
<script type="text/javascript"> 
(function(){
    
    

function toBRL(n){
    const formatter = new Intl.NumberFormat([], {
        style: 'currency',
        currency: 'BRL'
    });
    return formatter.format(n);
}
    
    
    
    
      $('.painel-cadastro-proposta').addClass('esconde-elemento');
    
      $(document).on('click','.btn-editar-proposta', function(){
          $('.painel-cadastro-proposta').addClass('mostra');
          var id_proposta = $(this).attr('data-id_proposta');
          var nome_cli = $(this).attr('data-nome_cli');
          var cpf_cli = $(this).attr('data-cpf_cli');
          $('.painel-lista-propostas').addClass('esconde-elemento');
          //$('.painel-lista-propostas .collapse-link').click();
          //$('.lista-propostas thead').css('opacity', 0);
          var tr_selected = $(this).closest('tr');
          tr_selected.css('transition','all .8s');
          var id = tr_selected.attr('id');
          //var todas_as_linhas_do_tbody = $('.lista-propostas tbody');
          /*$('.lista-propostas tbody tr').each(function(index){
              if($(this).attr('id') != id){
                $(this).removeClass('selected').css('opacity', .4);  
                $(this).css('color', '#ccc');  
              }            
          });*/
          /*var tr_selected = $(this).closest('tr');
          tr_selected.addClass('selected');*/  
          
          $('.painel-cadastro-proposta').find('#btn-update-proposta').attr('data-id_proposta', id_proposta);
          
          
          $('.painel-cadastro-proposta').removeClass('esconde-elemento');
                $.ajax({  
                     url:"captura_dados_proposta.php",
                     dataType : "json",
                     type:"POST",  
                     cache:false,  
                     data:{id_proposta: id_proposta},  
                     success:function(data){
                         console.log('xxxx: '+data.id_contrato);
                         // transforma valores monetários em float
                         var parcela = data.parce_contrato * 1.0;
                         var parceini = data.parceini_contrato * 1.0;
                         var parcefinal = data.parcefinal_contrato * 1.0;
                         var ml = data.ml_contrato * 1.0;
                         
                         
                         //$('#fullname').closest('#demo-form').find('label').css('opacity', 0);
                         $('#nome_cli').css('opacity', 0);
                         $('#nome_cli').closest('div').find('label').css('opacity', 0);
                         
                         $('.painel-cadastro-proposta .x_title .title-proposta').text(id_proposta);
                         $('.painel-cadastro-proposta .x_title .title-cpf').text(cpf_cli+' | ');
                         $('.painel-cadastro-proposta .x_title .title-cli').text(nome_cli.toUpperCase());
                         console.log('json ', data);
                         $('#id_proposta_update').val(data.id_contrato);
                         $('#id_cli').val(data.id_cli);
                         $('#orgao').val(data.id_orgao);
                         $('#ade').val(data.ade_contrato);
                         $('#bn').val(data.bn_contrato);                         
                         console.log(toBRL(parcela));
                         //$('#parce').val(toBRL(parcela));
                         $('#parce').val(parcela);
                         $('#opera').val(data.opera_contrato);
                         $('#promo').val(data.promo_contrato);
                         $('#vend').val(data.vend_contrato);
                         $('#situa').val(data.situa_contrato);
                         $('#bccompra').val(data.id_bccompra_contrato);
                         //$('#parceini').val(toBRL(parceini));
                         $('#parceini').val(parceini);
                         //$('#parcefinal').val(toBRL(parcefinal));
                         $('#parcefinal').val(parcefinal);
                         //$('#ml').val(toBRL(ml));
                         $('#ml').val(ml);
                         $('#observa_tab_contrato').val(data.observa_tab_contrato);
                         
                     }  
                })           
      })
    
      $(document).ready(function(){ 
              console.log('teste');
              $('#cpf').mask('000.000.000-00', {reverse: true});
              $('#cep').mask('00000-000');
              $('#datanasc').mask('00/00/0000');
              $('#datacad').mask('00/00/0000');
              $('#parce').mask('#.##0,00', {reverse: true});
              $('#parceini').mask('#.##0,00', {reverse: true});
              $('#parcefinal').mask('#.##0,00', {reverse: true});
              $('#ml').mask('#.##0,00', {reverse: true});

          
          $('.item-menu-proposta-cadastro').on('click', function(){
              $('.painel-lista-propostas .collapse-link').click();
              //$('.painel-cadastro-proposta').show();
              $('.painel-cadastro-proposta').removeClass('esconde-elemento');
              console.log('clicou no cadastro de proposta do menu lateral');
          });

            //console.log('entrou na function javascript');
            //var id = $('input[name=orgao]').val();
            /*$.ajax({ // ajax
                type: "GET",
                url: "carrega_select.php?cli=cli",
                success: function(result) {*/
                    //result = JSON.parse(result);
                    //console.log(result);

                    /*if(result.success) {
                        for (var i = 0; i < result.produtos.length; i++) {
                            $('select').append('<option value="' + result.produtos[i].id + '">' + result.produtos[i].nome + "</option>");
                        }
                    } else {
                        $('p').text('nao encontrado');
                    }*/

                //}
            //});          
          
          
 
          

           // User record update to mysqli from php using jquery ajax  
           /*$(document).on("click","#editSubmit", function(){  
                var edit_id = $("#editId").val();  
                var name = $("#editName").val();  
                var email = $("#editEmail").val();  
                var password = $("#editPassword").val();  
                $.ajax({  
                     url:"update.php",  
                     type:"POST",  
                     cache:false,  
                     data:{edit_id:edit_id,name:name,email:email,password:password},  
                     success:function(data){  
                          if (data ==1) {  
                               alert("User record updated successfully");  
                               loadTableData();  
                          }else{  
                               alert("Some thing went wrong");       
                          }  
                     }  
                });  
           }); apagando por enquanto, durante a restruturação do js/ajax*/
            
         
          
                var action = '';
           
           // populando select cliente no formulário adicionar_proposta.php
                action = 'proposta_cli'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         //console.log('data ajax select clientes: '+data);
                         $('#cli').html(data);
                     }  
                })
          
           // populando select orgão no formulário adicionar_proposta.php
                action = 'proposta_orgao'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         console.log('data ajax select orgao: '+data);
                         $('#orgao').html(data);
                     }  
                })
                  
           // populando select bn no formulário adicionar_proposta.php
                action = 'proposta_bn'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         console.log('data ajax select bn: '+data);
                         $('#bn').html(data);
                     }  
                })
          

                  
           // populando select operacao no formulário adicionar_proposta.php
                action = 'proposta_opera'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         console.log('data ajax select operação: '+data);
                         $('#opera').html(data);
                     }  
                })  
          
                  
           // populando select promotora no formulário adicionar_proposta.php
                action = 'proposta_promo'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         console.log('data ajax select promotora: '+data);
                         $('#promo').html(data);
                     }  
                }) 
          
                  
           // populando select vendedor no formulário adicionar_proposta.php
                action = 'proposta_vend'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         console.log('data ajax select vendedor: '+data);
                         $('#vend').html(data);
                     }  
                }) 
          
                           
           // populando select situacao no formulário adicionar_proposta.php
                action = 'proposta_situa'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         console.log('data ajax select situacao: '+data);
                         $('#situa').html(data);
                     }  
                }) 
          
                                     
           // populando select situacao no formulário adicionar_proposta.php
                action = 'proposta_bccompra'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         console.log('data ajax select bccompra: '+data);
                         $('#bccompra').html(data);
                     }  
                }) 
          
          
      }); 
    
    
})();     
 </script>