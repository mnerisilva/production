<?php
// Header
include_once 'includes/header.php';
?>

<!--<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Novo Cliente </h3>
		<form action="php_action/create.php" method="POST">
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="cpf" id="cpf">
				<label for="cpf">Cpf</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="identidade" id="identidade">
				<label for="identidade">Identidade</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="cep" id="cep">
				<label for="cep">Cep</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="endereco" id="idenenderecotidade">
				<label for="endereco">Endereço</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="numero" id="numero">
				<label for="numero">Número</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="complemento" id="complemento">
				<label for="complemento">Complemento</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="cidade" id="cidade">
				<label for="cidade">Cidade</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="uf" id="uf">
				<label for="uf">UF</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="datenasc" id="datenasc">
				<label for="datenasc">Data Nasc.</label>
			</div>

			<button type="submit" name="btn-cadastrar-cliente" class="btn"> Cadastrar </button>
			<a href="index.php" class="btn green"> Lista de clientes </a>
		</form>
		
	</div>
</div>-->


<section class="container">
    <div class="row">
        <div class="col-me-12 col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold">Cadastro de Cliente <i class="fa fa-id-card-o" style="color: #909090"></i></h3>
            </div>
                <hr>
            <div class="card-body">
                <form action="php_action/create.php" method="POST">
                    <div class="row">                        
                      <div class="form-group col-md-3">
                        <label class="" for="nome">Nome:</label>
                        <input type="text" name="nome" class="form-control" id="nome">
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="cpf">Cpf:</label>
                        <input type="text" name="cpf" class="form-control" id="cpf">
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="identidade">Identidade:</label>
                        <input type="text" name="identidade" class="form-control" id="identidade">
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="cep">Cep:</label>
                        <input type="text" name="cep" class="form-control" id="cep">
                      </div>
                    </div>
                    <div class="row"> 
                      <div class="form-group col-md-3">
                        <label class="" for="endereco">Endereço:</label>
                        <input type="text" name="endereco" class="form-control" id="endereco">
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="numero">Número:</label>
                        <input type="text" name="numero" class="form-control" id="numero">
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="complemento">Complemento:</label>
                        <input type="text" name="complemento" class="form-control" id="complemento">
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="cidade">Cidade:</label>
                        <input type="text" name="cidade" class="form-control" id="cidade">
                      </div>
                    </div>
                    <div class="row"> 
                      <div class="form-group col-md-3">
                        <label class="" for="uf">UF:</label>
                        <input type="text" name="uf" class="form-control" id="uf">
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="datanasc">Data Nasc:</label>
                        <input type="text" name="datanasc" class="form-control" id="datanasc">
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="datacad">Data cadastro:</label>
                        <input type="text" name="datacad" class="form-control" id="datacad">
                      </div>
                    </div>
                    

                    

                    <!--<div class="row">
                      <div class="form-group col-md-4">
                        <label class="" for="operacao">Operação:</label>
                          <select class="form-control" name="operacao" id="operacao">
                            <option value="">...</option>
                            <option value="1">Potabilidade</option>
                            <option value="2">Porta + Refi</option>
                            <option value="3">Contrato Novo</option>
                            <option value="4">Refinanciamento</option>
                          </select>
                      </div>
                        

                        
                        
                      <div class="form-group col-md-4">
                        <label class="" for="promotora">promotora:</label>
                          <select class="form-control" name="promotora" id="promotora">
                            <option value="">...</option>
                            <option value="1">LEWE</option>
                            <option value="2">FONTES</option>
                            <option value="3">GFT</option>
                          </select>
                      </div>                        
                      <div class="form-group col-md-4">
                        <label class="" for="vendedor">Vendedor:</label>
                          <select class="form-control" name="vendedor" id="vendedor">
                            <option value="">...</option>
                            <option value="1">Manoel</option>
                            <option value="2">Thauan</option>
                          </select>
                      </div>
                    </div>-->





                    <hr />

                    <div class="row">
                      <div class="col-md-12">
                        <button type="submit" name="btn-cadastrar-cliente" class="btn btn-success">Cadastrar</button>
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
