<?php
// Header
include_once 'includes/header.php';
?>


<section class="container">
    <div class="row">
        <div class="col-me-12 col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold ">Cadastro de Proposta <i class="fa fa-id-card-o" style="color: #909090"></i></h3>
            </div>
                <hr>
            <div class="card-body">
                <form action="php_action/create.php" method="POST">
                    <div class="row">
                      <div class="form-group col-md-5">
                        <label class="" for="cli">Cliente:</label>
                          <select class="form-control" name="cli" id="cli">
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="" for="orgao">Órgão:</label>
                          <select class="form-control" name="orgao" id="orgao">
                          </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label class="" for="bn">No. Benefício (bn):</label>
                          <select class="form-control" name="bn" id="bn">
                          </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label class="" for="parce">Parcela:</label>
                        <input type="text" name="parce" class="form-control" id="parce" placeholder="Digite o valor">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label class="" for="opera">Operação:</label>
                          <select class="form-control" name="opera" id="opera">
                          </select>
                      </div>                        
                      <div class="form-group col-md-4">
                        <label class="" for="promo">promotora:</label>
                          <select class="form-control" name="promo" id="promo">
                          </select>
                      </div>                        
                      <div class="form-group col-md-4">
                        <label class="" for="vend">Vendedor:</label>
                          <select class="form-control" name="vend" id="vend">
                          </select>
                      </div>
                    </div>
                    <div class="row">                        
                      <div class="form-group col-md-6">
                        <label class="" for="situa">Situação:</label>
                          <select class="form-control" name="situa" id="situa">
                          </select>
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="ade">ade:</label>
                        <input type="text" name="ade" class="form-control" id="ade">
                      </div>
                      <div class="form-group col-md-3">
                        <label class="" for="bccompra">Bco comprado:</label>
                          <select class="form-control" name="bccompra" id="bccompra">
                          </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label class="" for="parceini">Parcela inicial:</label>
                        <input type="text" name="parceini" class="form-control" id="parceini" placeholder="Digite o valor">
                      </div>
                      <div class="form-group col-md-4">
                        <label class="" for="parcefinal">Parcela final:</label>
                        <input type="text" name="parcefinal" class="form-control" id="parcefinal" placeholder="Digite o valor">
                      </div>
                      <div class="form-group col-md-4">
                        <label class="" for="ml">ml:</label>
                        <input type="text" name="ml" class="form-control" id="ml" placeholder="Digite o valor">
                      </div>
                    </div>

                    <hr />

                    <div class="row">
                      <div class="col-md-12">
                        <button type="submit" name="btn-cadastrar-proposta" class="btn btn-success">Cadastrar</button>
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                      </div>
                    </div>
                </form>                                
            </div>
          </div>
        </div>
    </div>
</section>
<?php
// Footer
include_once 'includes/footer.php';
?>
