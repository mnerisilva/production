<?php

   
    session_start();
    include_once 'php_action/db_connect.php';
    if($_SESSION['login'] != true){
        header('Location: login.php');
        die();
    }

    

?>




<?php
// Conexão
    //include_once 'php_action/db_connect.php';
// Header
    include_once 'includes/header.php';
// Menu lateral
    include_once 'includes/side_menu.php';
// Menu superior
    include_once 'includes/top_menu.php';
?>

<script>
        window.usuario_logado = "<?php echo $_SESSION['id_user']; ?>"
</script>

        <!-- page content -->
        <div class="right_col" role="main">
 












<!-- início Painel propostas -->

<div class="x_panel painel-lista-propostas">
								<div class="x_title">
									<h2>Propostas<small>Lista suspensa</small> <a href="" data-toggle="modal" data-target="#addProposta" id="btn-addProposta"><i class="fa fa-plus-circle fa-2x"></i></a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content" style="display: block;">

									<!-- start form for validation -->           
                                      <!-- tabela -->
                                      <div class="table-responsive">
                                      <table class="table table-striped jambo_table lista-propostas table-condensed">
                                        <thead>
                                          <tr class="headings">
                                            <th>
                                              <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Prop </th>
                                            <th class="column-title">Cliente </th>
                                            <th class="column-title">Cpf </th>
                                            <th class="column-title">Ade </th>
                                            <th class="column-title">Parcela </th>
                                            <th class="column-title">Situação </th>
                                            <th class="column-title">Motivo </th>
                                            <th class="column-title">Histórico</th>
                                            <th class="column-title">Orgão </th>
                                            <th class="column-title">Bco </th>
                                            <th class="column-title">Anexos </th>
                                            <th class="column-title"></th>
                                            <th class="column-title"> </th>
                                            <th class="column-title"> </th>
                                            <th class="column-title no-link last"><span class="nobr">&nbsp;</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>





                                                    <?php
                                                    //$sql = "SELECT * FROM tab_clientes";
                                                    $sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado = mysqli_query($connect, $sql);



                                                    if(mysqli_num_rows($resultado) > 0):

                                                    while($dados = mysqli_fetch_array($resultado)):
                                                    ?>

                                                        <?php echo '<tr class="even pointer" id="td_'. $dados['id_contrato'] . '">'; ?>
                                                                    <td class="a-center cheque ">
                                                                      <input type="checkbox" class="flat" name="ativar_linha">
                                                                    </td>
                                                        <?php echo '<td class="color-'. $dados['situa_contrato'] . ' cod-cliente" style="padding-right: 40px !important">'; ?>
                                                        <?php echo $dados['id_contrato'].'</td>'; ?>
                                                        <td class="td-nome"><?php echo $dados['nome_cli']; ?></td>
                                                        <td class="td-cpf"><?php echo $dados['cpf_cli']; ?></td>
                                                        <td class="td-ade"><?php echo $dados['ade_contrato']; ?></td>
                                                        <td class="td-parce"><span class="span-parce"><?php echo number_format($dados['parce_contrato'],2,",","."); ?></span></td>
                                                        <td class="td-situa">
                                                            <?php                                
                                                               // busca descrição da situação na tabela situação
                                                                $id_situacao = $dados['situa_contrato'];
                                                                $sql3 = "SELECT id_situacao, descricao_situacao, motivo_descricao_situacao, cor_situacao FROM tab_situacao WHERE ".$id_situacao." = id_situacao";
                                                                $resultado3 = mysqli_query($connect, $sql3);
                                                                $texto_id_situa = '';
                                                                $texto_motivo_situa = '';
                                                                    while($dados3 = mysqli_fetch_array($resultado3)):
                                                                        $texto_id_situa     = $dados3['descricao_situacao'];
                                                                        $texto_motivo_situa = $dados3['motivo_descricao_situacao'];
                                                                        $cor_situacao       = $dados3['cor_situacao'];
                                                                    endwhile;  

                                                            ?>
                                                            <?php //echo '<i class="fa fa-grip-horizontal"></i><span class="span-situa-1">&nbsp;</span>';?>
                                                            <?php echo '<i class="fa fa-certificate" style="background: '.$cor_situacao .'; color: '.$cor_situacao .'"></i> ' . strtolower($texto_id_situa); ?></td>
                                                        <td class="td-motivo-situa"><?php echo $texto_motivo_situa; ?></td>
                                                        <td class="icone-textarea-obs btn-historico" data-toggle="modal" data-target="#crudHistorico" data-id_proposta="<?php echo $dados['id_contrato']; ?>"><?php echo '<i class="fa fa-keyboard-o"></i>'; ?></td>
                                                        <td class="td-orgao">
                                                            <?php                                
                                                               // busca nome do orgao
                                                                $sql4 = "SELECT id_orgao, nome_orgao FROM tab_orgao WHERE ".$dados['id_orgao']." = id_orgao";
                                                                $resultado4 = mysqli_query($connect, $sql4);
                                                                    while($dados4 = mysqli_fetch_array($resultado4)):
                                                                        echo $dados4['nome_orgao'];
                                                                    endwhile;  

                                                            ?></td>
                                                        <td class="td-bccompra">
                                                            <?php                                
                                                               // busca nome do orgao
                                                                $sql5 = "SELECT id_bccompra_contrato, nome_bccompra FROM tab_bccompra WHERE ".$dados['id_bccompra_contrato']." = id_bccompra_contrato";
                                                                $resultado5 = mysqli_query($connect, $sql5);
                                                                $texto_id_situa = '';
                                                                $texto_motivo_situa = '';
                                                                    while($dados5 = mysqli_fetch_array($resultado5)):
                                                                        echo $dados5['nome_bccompra'];
                                                                    endwhile;  

                                                            ?></td>
                                                        <td class="td-anexos">
                                                            <?php 
                                                                // lista tabela de anexos para montar os ícones na respectiva coluna
                                                                $id_contrato = $dados['id_contrato'];
                                                                //$sql2 = "SELECT id_contrato, file_name_anexo, path_anexo FROM tab_anexos WHERE ".$id_contrato." = id_contrato";
                                                                $sql2 = "SELECT A.id_contrato, A.id_tipo_arquivo, A.file_name_anexo, A.path_anexo, T.id_tipo_arquivo, T.extensao_tipo_arquivo, T.icone_anexo FROM tab_anexos AS A INNER JOIN tab_tipo_arquivo_anexo AS T ON ".$id_contrato." = A.id_contrato WHERE A.id_tipo_arquivo = T.id_tipo_arquivo";
                                                                $resultado2 = mysqli_query($connect, $sql2);
                                                                $tem_anexo = false; // variável flag definida para determinas a exibição ou não do ícone "clips de papel" na coluna/linha, da proposta do contexto... "true" = com anexo, 'false' = sem anexo
                                                                    while($dados2 = mysqli_fetch_array($resultado2)):
                                                                        if($dados2['file_name_anexo'] <> '') {
                                                                            $tem_anexo = true;
                                                                            $array_file_name = explode('.', $dados2['file_name_anexo']);
                                                                            $file_name = $array_file_name[0];
                                                                            $extensao_file = $array_file_name[1];
                                                                            $tipo_icone_anexo = $array_file_name[1];
                                                                            if($extensao_file == 'jpg' || $extensao_file == 'jpeg'){$tipo_icone_anexo = 'image';}
                                                                            //echo $dados2['file_name_anexo'];                                            
                                                                            //echo '<a class="color-icon-'.$extensao_file.' anexo" download href="'.$dados2["path_anexo"].'/'.$file_name.'.'.$extensao_file.'" id="'.$file_name.'" title="'.$file_name.'.'.$extensao_file.'"><i class="far fa-file-'.$tipo_icone_anexo.'"></i></a>';                                           
                                                                            echo '<a class="color-icon-'.$extensao_file.' anexo" download href="'.$dados2["path_anexo"].'/'.$file_name.'.'.$extensao_file.'" id="'.str_replace("", " ", $file_name).'" title="'.$file_name.'.'.$extensao_file.'">'.$dados2['icone_anexo'].'</a>';                                           
                                                                        }
                                                                    endwhile;                                     
                                                            ?>
                                                        </td>



                                                        <td class="a-right a-right icone-clip-anexo"><?php echo '<i class="fa fa-paperclip clip-anexo " data-toggle="modal" data-target="#modalAnexos" data-id="'.$dados['id_contrato'].'"></i>'; ?></td>




                                            <?php echo '<td class="a-right a-right btn-editar-proposta"  data-toggle="modal" data-target="#editProposta" data-id_proposta="'.$dados['id_contrato'].'" data-nome_cli="'.$dados['nome_cli'].'" data-cpf_cli="'.$dados['cpf_cli'].'" ><i class="fa fa-edit"></i></td>'; ?>
                                            <td class="a-right a-right "><i class="fa fa-trash-o"></i></td>
                                            <!--<td class=" last"><a href="#">View</a>-->
                                            <td class=" last"><a href="#"><i class="fa fa-eye"></i></a>
                                            </td>
                                          </tr>
                                                   <?php 
                                                    endwhile;
                                                    else: ?>

                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                   <?php 
                                                    endif;
                                                   ?>
                                        </tbody>
                                      </table>
                                    </div>
                                     <!-- tabela -->
									<!-- end form for validations -->

								</div>
							</div>
<!-- fim Painel propostas -->


<!--<div class="x_panel painel-cadastro-proposta">
								<div class="x_title">
									<h2>Proposta <small>Cadastro</small></h2>
                                    <h2 class="title-proposta"></h2>
                                    <h2 class="title-cpf" style="margin-left: 10px;"></h2>
                                    <h2 class="title-cli" style="margin-left: 10px; font-weight: 600; color: #2A3F54;"></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">



								</div>
							</div>-->











<div class="x_panel painel-lista-clientes esconde-elemento">
								<div class="x_title">
									<h2>Clientes<small>Lista</small> <a href="" data-toggle="modal" data-target="#addCliente" id="btn-addCliente"><i class="fa fa-plus-circle fa-2x"></i></a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content" style="display: block;">

									<!-- start form for validation -->           
                                      <!-- tabela -->
                                      <div class="table-responsive">
                                      <table class="table table-striped jambo_table lista-clientes table-condensed">
                                        <thead>
                                          <tr class="headings">
                                            <th>
                                              <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Cod </th>
                                            <th class="column-title">Nome </th>
                                            <th class="column-title">Cpf </th>
                                            <th class="column-title">Identidade </th>
                                            <th class="column-title">Cep </th>
                                            <th class="column-title">Endereco </th>
                                            <th class="column-title">Número </th>
                                            <th class="column-title">Complemento</th>
                                            <th class="column-title">bairro </th>
                                            <th class="column-title">Cidade </th>
                                            <th class="column-title">Uf </th>
                                            <th class="column-title">Data Nasc. </th>
                                            <th class="column-title"></th>
                                            <th class="column-title"></th>
                                            <th class="column-title no-link last"><span class="nobr">&nbsp;</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>5</a>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>





                                                    <?php
                                                    $sql_clientes = "SELECT * FROM tab_clientes";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";*/
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_clientes = mysqli_query($connect, $sql_clientes);



                                                    if(mysqli_num_rows($resultado_clientes) > 0):

                                                    while($dados_cliente = mysqli_fetch_array($resultado_clientes)):
                                                    ?>

                                                        <?php echo '<tr class="even pointer" id="tr-cli_'. $dados_cliente['id_cli'] . '">'; ?>
                                                                    <td class="a-center cheque ">
                                                                      <input type="checkbox" class="flat" name="ativar_linha">
                                                                    </td>
                                                        <?php echo '<td class="td-id_cli" style="padding-right: 40px !important">'; ?>
                                                        <?php echo $dados_cliente['id_cli'].'</td>'; ?>
                                                        <td class="td-nome_cli"><?php echo $dados_cliente['nome_cli']; ?></td>
                                                        <td class="td-cpf_cli"><?php echo $dados_cliente['cpf_cli']; ?></td>
                                                        <td class="td-identidade_cli"><?php echo $dados_cliente['identidade_cli']; ?></td>
                                                        <td class="td-cep_cli"><?php echo $dados_cliente['cep_cli']; ?></td>
                                                        <td class="td-endereco_cli"><?php echo $dados_cliente['endereco_cli']; ?></td>
                                                        <td class="td-numero_cli"><?php echo $dados_cliente['numero_cli']; ?></td>
                                                        <td class="ted-comple_cli"><?php echo $dados_cliente['comple_cli']; ?></td>
                                                        <td class="td-bairro_cli"><?php echo $dados_cliente['bairro_cli']; ?></td>
                                                        <td class="td-cidade_cli"><?php echo $dados_cliente['cidade_cli']; ?></td>
                                                        <td class="td-uf_cli"><?php echo $dados_cliente['uf_cli']; ?></td>
                                                        <td class="td-datanasc_cli"><?php echo $dados_cliente['datanasc_cli']; ?></td>
                                                        <?php echo '<td class="a-right a-right btn-editar-cliente" data-toggle="modal" data-target="#editCliente" data-id_cli="'.$dados_cliente['id_cli'].'" data-nome_cli="'.$dados_cliente['nome_cli'].'" data-cpf_cli="'.$dados_cliente['cpf_cli'].'" ><i class="fa fa-edit"></i></td>'; ?>
                                                <td class="a-right a-right "><i class="fa fa-trash-o"></i></td>
                                                <!--<td class=" last"><a href="#">View</a>-->
                                                <td class=" last"><a href="#"><i class="fa fa-eye"></i></a></td>        
                                                                    </tr>
                                                   <?php 
                                                    endwhile;
                                                    else: ?>

                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                   <?php 
                                                    endif;
                                                   ?>
                                        </tbody>
                                      </table>
                                    </div>
                                     <!-- tabela -->
									<!-- end form for validations -->

								</div>
							</div>





















<div class="x_panel painel-lista-situacao esconde-elemento">
								<div class="x_title">
									<h2>Situação<small>Lista</small> <a href="" data-toggle="modal" data-target="#addCliente" id="btn-addCliente"><i class="fa fa-plus-circle fa-2x"></i></a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content" style="display: block;">

									<!-- start form for validation -->           
                                      <!-- tabela -->
                                      <div class="table-responsive">
                                      <table class="table table-striped jambo_table lista-situacao table-condensed">
                                        <thead>
                                          <tr class="headings">
                                            <th>
                                              <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Cod </th>
                                            <th class="column-title">Descricao </th>
                                            <th class="column-title">Motivo </th>
                                            <th class="column-title">Status </th>
                                            <th class="column-title">Cor</th>
                                            <th class="column-title"></th>
                                            <th class="column-title"></th>
                                            <th class="column-title no-link last"><span class="nobr">&nbsp;</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>5</a>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>





                                                    <?php
                                                    $sql_situacao = "SELECT * FROM tab_situacao";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";*/
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_situacao = mysqli_query($connect, $sql_situacao);



                                                    if(mysqli_num_rows($resultado_situacao) > 0):

                                                    while($dados_situacao = mysqli_fetch_array($resultado_situacao)):
                                                    ?>

                                                        <?php echo '<tr class="even pointer" id="td_situa_'. $dados_situacao['id_situacao'] . '">'; ?>
                                                                    <td class="a-center cheque ">
                                                                      <input type="checkbox" class="flat" name="ativar_linha">
                                                                    </td>
                                                        <?php echo '<td class="td-id_situa" style="padding-right: 40px !important">'; ?>
                                                        <?php echo $dados_situacao['id_situacao'].'</td>'; ?>
                                                        <td class="td-descri"><?php echo $dados_situacao['descricao_situacao']; ?></td>
                                                        <td class="td-motivo"><?php echo $dados_situacao['motivo_descricao_situacao']; ?></td>
                                                        <td class="td-status"><?php echo $dados_situacao['ativada_situacao']; ?></td>
                                                        <td class="td-cor"><?php echo $dados_situacao['cor_situacao']; ?></td>
                                                        <?php echo '<td class="a-right a-right btn-editar-situacao" data-id_situacao="'.$dados_situacao['id_situacao'].'" data-descricao_situacao="'.$dados_situacao['descricao_situacao'].'" ><i class="fa fa-edit"></i></td>'; ?>
                                                <td class="a-right a-right "><i class="fa fa-trash-o"></i></td>
                                                <!--<td class=" last"><a href="#">View</a>-->
                                                <td class=" last"><a href="#"><i class="fa fa-eye"></i></a></td>        
                                                                    </tr>
                                                   <?php 
                                                    endwhile;
                                                    else: ?>

                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                   <?php 
                                                    endif;
                                                   ?>
                                        </tbody>
                                      </table>
                                    </div>
                                     <!-- tabela -->
									<!-- end form for validations -->

								</div>
							</div>









<div class="x_panel painel-lista-operacao esconde-elemento">
								<div class="x_title">
									<h2>Operação<small>Lista</small> <a href="" data-toggle="modal" data-target="#addCliente" id="btn-addCliente"><i class="fa fa-plus-circle fa-2x"></i></a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content" style="display: block;">

									<!-- start form for validation -->           
                                      <!-- tabela -->
                                      <div class="table-responsive">
                                      <table class="table table-striped jambo_table lista-situacao table-condensed">
                                        <thead>
                                          <tr class="headings">
                                            <th>
                                              <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Cod </th>
                                            <th class="column-title">Nome</th>
                                            <th class="column-title"></th>
                                            <th class="column-title"></th>
                                            <th class="column-title no-link last"><span class="nobr">&nbsp;</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>5</a>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>





                                                    <?php
                                                    $sql_operacao = "SELECT * FROM tab_operacao";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";*/
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_operacao = mysqli_query($connect, $sql_operacao);



                                                    if(mysqli_num_rows($resultado_operacao) > 0):

                                                    while($dados_operacao = mysqli_fetch_array($resultado_operacao)):
                                                    ?>

                                                        <?php echo '<tr class="even pointer" id="td_opera_'. $dados_operacao['id_operacao'] . '">'; ?>
                                                                    <td class="a-center cheque ">
                                                                      <input type="checkbox" class="flat" name="ativar_linha">
                                                                    </td>
                                                        <?php echo '<td class="td-id_opera" style="padding-right: 40px !important">'; ?>
                                                        <?php echo $dados_operacao['id_operacao'].'</td>'; ?>
                                                        <td class="td-nome_opera"><?php echo $dados_operacao['nome_operacao']; ?></td>
                                                        <?php echo '<td class="a-right a-right btn-editar-operacao" data-id_operacao="'.$dados_operacao['id_operacao'].'" data-nome_operacao="'.$dados_operacao['nome_operacao'].'" ><i class="fa fa-edit"></i></td>'; ?>
                                                <td class="a-right a-right "><i class="fa fa-trash-o"></i></td>
                                                <!--<td class=" last"><a href="#">View</a>-->
                                                <td class=" last"><a href="#"><i class="fa fa-eye"></i></a></td>        
                                                                    </tr>
                                                   <?php 
                                                    endwhile;
                                                    else: ?>

                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                   <?php 
                                                    endif;
                                                   ?>
                                        </tbody>
                                      </table>
                                    </div>
                                     <!-- tabela -->
									<!-- end form for validations -->

								</div>
							</div>










<div class="x_panel painel-lista-vendedor esconde-elemento">
								<div class="x_title">
									<h2>Vendedor<small>Lista</small> <a href="" data-toggle="modal" data-target="#addCliente" id="btn-addCliente"><i class="fa fa-plus-circle fa-2x"></i></a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content" style="display: block;">

									<!-- start form for validation -->           
                                      <!-- tabela -->
                                      <div class="table-responsive">
                                      <table class="table table-striped jambo_table lista-situacao table-condensed">
                                        <thead>
                                          <tr class="headings">
                                            <th>
                                              <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Cod </th>
                                            <th class="column-title">Nome</th>
                                            <th class="column-title"></th>
                                            <th class="column-title"></th>
                                            <th class="column-title no-link last"><span class="nobr">&nbsp;</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>5</a>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>





                                                    <?php
                                                    $sql_vendedor = "SELECT * FROM tab_vendedor";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";*/
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_vendedor = mysqli_query($connect, $sql_vendedor);



                                                    if(mysqli_num_rows($resultado_vendedor) > 0):

                                                    while($dados_vendedor = mysqli_fetch_array($resultado_vendedor)):
                                                    ?>

                                                        <?php echo '<tr class="even pointer" id="td_vend_'. $dados_vendedor['id_vendedor'] . '">'; ?>
                                                                    <td class="a-center cheque ">
                                                                      <input type="checkbox" class="flat" name="ativar_linha">
                                                                    </td>
                                                        <?php echo '<td class="td-id_vend" style="padding-right: 40px !important">'; ?>
                                                        <?php echo $dados_vendedor['id_vendedor'].'</td>'; ?>
                                                        <td class="td-nome_vend"><?php echo $dados_vendedor['nome_vendedor']; ?></td>
                                                        <?php echo '<td class="a-right a-right btn-editar-vendedor" data-id_vendedor="'.$dados_vendedor['id_vendedor'].'" data-nome_vendedor="'.$dados_vendedor['nome_vendedor'].'" ><i class="fa fa-edit"></i></td>'; ?>
                                                <td class="a-right a-right "><i class="fa fa-trash-o"></i></td>
                                                <!--<td class=" last"><a href="#">View</a>-->
                                                <td class=" last"><a href="#"><i class="fa fa-eye"></i></a></td>        
                                                                    </tr>
                                                   <?php 
                                                    endwhile;
                                                    else: ?>

                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                   <?php 
                                                    endif;
                                                   ?>
                                        </tbody>
                                      </table>
                                    </div>
                                     <!-- tabela -->
									<!-- end form for validations -->

								</div>
							</div>











<div class="x_panel painel-lista-promotora esconde-elemento">
								<div class="x_title">
									<h2>Promotora<small>Lista</small> <a href="" data-toggle="modal" data-target="#addCliente" id="btn-addCliente"><i class="fa fa-plus-circle fa-2x"></i></a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content" style="display: block;">

									<!-- start form for validation -->           
                                      <!-- tabela -->
                                      <div class="table-responsive">
                                      <table class="table table-striped jambo_table lista-situacao table-condensed">
                                        <thead>
                                          <tr class="headings">
                                            <th>
                                              <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Cod </th>
                                            <th class="column-title">Nome</th>
                                            <th class="column-title"></th>
                                            <th class="column-title"></th>
                                            <th class="column-title no-link last"><span class="nobr">&nbsp;</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>5</a>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>





                                                    <?php
                                                    $sql_promotora = "SELECT * FROM tab_promotora";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";*/
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_promotora = mysqli_query($connect, $sql_promotora);



                                                    if(mysqli_num_rows($resultado_promotora) > 0):

                                                    while($dados_promotora = mysqli_fetch_array($resultado_promotora)):
                                                    ?>

                                                        <?php echo '<tr class="even pointer" id="td_promo_'. $dados_promotora['id_promotora'] . '">'; ?>
                                                                    <td class="a-center cheque ">
                                                                      <input type="checkbox" class="flat" name="ativar_linha">
                                                                    </td>
                                                        <?php echo '<td class="td-id_promo" style="padding-right: 40px !important">'; ?>
                                                        <?php echo $dados_promotora['id_promotora'].'</td>'; ?>
                                                        <td class="td-nome_vend"><?php echo $dados_promotora['nome_promotora']; ?></td>
                                                        <?php echo '<td class="a-right a-right btn-editar-promotora" data-id_promotora="'.$dados_promotora['id_promotora'].'" data-nome_promotora="'.$dados_promotora['nome_promotora'].'" ><i class="fa fa-edit"></i></td>'; ?>
                                                <td class="a-right a-right "><i class="fa fa-trash-o"></i></td>
                                                <!--<td class=" last"><a href="#">View</a>-->
                                                <td class=" last"><a href="#"><i class="fa fa-eye"></i></a></td>        
                                                                    </tr>
                                                   <?php 
                                                    endwhile;
                                                    else: ?>

                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                   <?php 
                                                    endif;
                                                   ?>
                                        </tbody>
                                      </table>
                                    </div>
                                     <!-- tabela -->
									<!-- end form for validations -->

								</div>
							</div>









<div class="x_panel painel-lista-bccomprador esconde-elemento">
								<div class="x_title">
									<h2>Banco Comprador<small>Lista</small> <a href="" data-toggle="modal" data-target="#addCliente" id="btn-addCliente"><i class="fa fa-plus-circle fa-2x"></i></a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content" style="display: block;">

									<!-- start form for validation -->           
                                      <!-- tabela -->
                                      <div class="table-responsive">
                                      <table class="table table-striped jambo_table lista-situacao table-condensed">
                                        <thead>
                                          <tr class="headings">
                                            <th>
                                              <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Cod </th>
                                            <th class="column-title">Nome</th>
                                            <th class="column-title"></th>
                                            <th class="column-title"></th>
                                            <th class="column-title no-link last"><span class="nobr">&nbsp;</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>5</a>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>





                                                    <?php
                                                    $sql_bccomprador = "SELECT * FROM tab_bccompra";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";*/
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_bccomprador = mysqli_query($connect, $sql_bccomprador);



                                                    if(mysqli_num_rows($resultado_bccomprador) > 0):

                                                    while($dados_bccomprador = mysqli_fetch_array($resultado_bccomprador)):
                                                    ?>

                                                        <?php echo '<tr class="even pointer" id="td_bccompra_'. $dados_bccomprador['id_bccompra_contrato'] . '">'; ?>
                                                                    <td class="a-center cheque ">
                                                                      <input type="checkbox" class="flat" name="ativar_linha">
                                                                    </td>
                                                        <?php echo '<td class="td-id_bccompra" style="padding-right: 40px !important">'; ?>
                                                        <?php echo $dados_bccomprador['id_bccompra_contrato'].'</td>'; ?>
                                                        <td class="td-nome_vend"><?php echo $dados_bccomprador['nome_bccompra']; ?></td>
                                                        <?php echo '<td class="a-right a-right btn-editar-bccomprador" data-id_bccomprador="'.$dados_promotora['id_bccompra_contrato'].'" data-nome_bccompra="'.$dados_promotora['nome_bccompra'].'" ><i class="fa fa-edit"></i></td>'; ?>
                                                <td class="a-right a-right "><i class="fa fa-trash-o"></i></td>
                                                <!--<td class=" last"><a href="#">View</a>-->
                                                <td class=" last"><a href="#"><i class="fa fa-eye"></i></a></td>        
                                                                    </tr>
                                                   <?php 
                                                    endwhile;
                                                    else: ?>

                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                   <?php 
                                                    endif;
                                                   ?>
                                        </tbody>
                                      </table>
                                    </div>
                                     <!-- tabela -->
									<!-- end form for validations -->

								</div>
							</div>











<div class="x_panel painel-lista-beneficio esconde-elemento">
								<div class="x_title">
									<h2>Benefício<small>Lista</small> <a href="" data-toggle="modal" data-target="#addCliente" id="btn-addCliente"><i class="fa fa-plus-circle fa-2x"></i></a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content" style="display: block;">

									<!-- start form for validation -->           
                                      <!-- tabela -->
                                      <div class="table-responsive">
                                      <table class="table table-striped jambo_table lista-situacao table-condensed">
                                        <thead>
                                          <tr class="headings">
                                            <th>
                                              <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Id</th>
                                            <th class="column-title">Código do benefício</th>
                                            <th class="column-title">Nome benefício</th>
                                            <th class="column-title"></th>
                                            <th class="column-title"></th>
                                            <th class="column-title no-link last"><span class="nobr">&nbsp;</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>5</a>
                                            </th>
                                          </tr>
                                        </thead>

                                        <tbody>





                                                    <?php
                                                    $sql_bn = "SELECT * FROM tab_bn";
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";*/
                                                    /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.id_bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/

                                                    $resultado_bn = mysqli_query($connect, $sql_bn);



                                                    if(mysqli_num_rows($resultado_bn) > 0):

                                                    while($dados_bn = mysqli_fetch_array($resultado_bn)):
                                                    ?>

                                                        <?php echo '<tr class="even pointer" id="td_bn_'. $dados_bn['id_bn'] . '">'; ?>
                                                                    <td class="a-center cheque ">
                                                                      <input type="checkbox" class="flat" name="ativar_linha">
                                                                    </td>
                                                        <?php echo '<td class="td-id_bn" style="padding-right: 40px !important">'; ?>
                                                        <?php echo $dados_bn['id_bn'].'</td>'; ?>
                                                        <td class="td-cod_bn"><?php echo $dados_bn['cod_bn']; ?></td>
                                                        <td class="td-nome_bn"><?php echo $dados_bn['nome_bn']; ?></td>
                                                        <?php echo '<td class="a-right a-right btn-editar-bn" data-id_bn="'.$dados_bn['id_bn'].'" data-nome_bn="'.$dados_bn['nome_bn'].'" ><i class="fa fa-edit"></i></td>'; ?>
                                                <td class="a-right a-right "><i class="fa fa-trash-o"></i></td>
                                                <!--<td class=" last"><a href="#">View</a>-->
                                                <td class=" last"><a href="#"><i class="fa fa-eye"></i></a></td>        
                                                                    </tr>
                                                   <?php 
                                                    endwhile;
                                                    else: ?>

                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                   <?php 
                                                    endif;
                                                   ?>
                                        </tbody>
                                      </table>
                                    </div>
                                     <!-- tabela -->
									<!-- end form for validations -->

								</div>
							</div>












          <!-- tabela -->
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">2500</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
        </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Network Activities <small>Graph title sub-title</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 ">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3  bg-white">
                  <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>Facebook Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Twitter Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>Conventional Media</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Bill boards</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <div class="row">


            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>App Versions</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>App Usage across versions</h4>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>0.1.5.2</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>123k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>0.1.5.3</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>53k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>0.1.5.4</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>23k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>0.1.5.5</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>3k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>0.1.5.6</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>1k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Device Usage</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Top 5</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                          <p class="">Device</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                          <p class="">Progress</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>IOS </p>
                            </td>
                            <td>30%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Android </p>
                            </td>
                            <td>10%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Blackberry </p>
                            </td>
                            <td>20%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Symbian </p>
                            </td>
                            <td>15%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Others </p>
                            </td>
                            <td>30%</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>


            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Quick Settings</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="quick-list">
                      <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                      </li>
                      <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                      </li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                      <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                      </li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                      <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                      </li>
                      <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                      </li>
                    </ul>

                    <div class="sidebar-widget">
                        <h4>Profile Completion</h4>
                        <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                        <div class="goal-wrapper">
                          <span id="gauge-text" class="gauge-value pull-left">0</span>
                          <span class="gauge-value pull-left">%</span>
                          <span id="goal-text" class="goal-value pull-right">100%</span>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <div class="row">
            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Activities <small>Sessions</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                          </h2>
                            <div class="byline">
                              <span>13 hours ago</span> by <a>Jane Smith</a>
                            </div>
                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                          </h2>
                            <div class="byline">
                              <span>13 hours ago</span> by <a>Jane Smith</a>
                            </div>
                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                          </h2>
                            <div class="byline">
                              <span>13 hours ago</span> by <a>Jane Smith</a>
                            </div>
                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                          </h2>
                            <div class="byline">
                              <span>13 hours ago</span> by <a>Jane Smith</a>
                            </div>
                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-8 col-sm-8 ">



              <div class="row">

                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Visitors location <small>geo-presentation</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="dashboard-widget-content">
                        <div class="col-md-4 hidden-small">
                          <h2 class="line_30">125.7k Views from 60 countries</h2>

                          <table class="countries_list">
                            <tbody>
                              <tr>
                                <td>United States</td>
                                <td class="fs15 fw700 text-right">33%</td>
                              </tr>
                              <tr>
                                <td>France</td>
                                <td class="fs15 fw700 text-right">27%</td>
                              </tr>
                              <tr>
                                <td>Germany</td>
                                <td class="fs15 fw700 text-right">16%</td>
                              </tr>
                              <tr>
                                <td>Spain</td>
                                <td class="fs15 fw700 text-right">11%</td>
                              </tr>
                              <tr>
                                <td>Britain</td>
                                <td class="fs15 fw700 text-right">10%</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="row">


                <!-- Start to do list -->
                <div class="col-md-6 col-sm-6 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>To Do List <small>Sample tasks</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div class="">
                        <ul class="to_do">
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Create email address for new intern</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Create email address for new intern</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End to do list -->
                
                <!-- start of weather widget -->
                <div class="col-md-6 col-sm-6 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Daily active users <small>Sessions</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="temperature"><b>Monday</b>, 07:30 AM
                            <span>F</span>
                            <span><b>C</b></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="weather-icon">
                            <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="weather-text">
                            <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="weather-text pull-right">
                          <h3 class="degrees">23</h3>
                        </div>
                      </div>

                      <div class="clearfix"></div>

                      <div class="row weather-days">
                        <div class="col-sm-2">
                          <div class="daily-weather">
                            <h2 class="day">Mon</h2>
                            <h3 class="degrees">25</h3>
                            <canvas id="clear-day" width="32" height="32"></canvas>
                            <h5>15 <i>km/h</i></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="daily-weather">
                            <h2 class="day">Tue</h2>
                            <h3 class="degrees">25</h3>
                            <canvas height="32" width="32" id="rain"></canvas>
                            <h5>12 <i>km/h</i></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="daily-weather">
                            <h2 class="day">Wed</h2>
                            <h3 class="degrees">27</h3>
                            <canvas height="32" width="32" id="snow"></canvas>
                            <h5>14 <i>km/h</i></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="daily-weather">
                            <h2 class="day">Thu</h2>
                            <h3 class="degrees">28</h3>
                            <canvas height="32" width="32" id="sleet"></canvas>
                            <h5>15 <i>km/h</i></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="daily-weather">
                            <h2 class="day">Fri</h2>
                            <h3 class="degrees">28</h3>
                            <canvas height="32" width="32" id="wind"></canvas>
                            <h5>11 <i>km/h</i></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="daily-weather">
                            <h2 class="day">Sat</h2>
                            <h3 class="degrees">26</h3>
                            <canvas height="32" width="32" id="cloudy"></canvas>
                            <h5>10 <i>km/h</i></h5>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->






       <!-- JANELA MODAL COM A LISTA DE ANEXOS DA PROPOSTA CLICADA - DIV ID #editForm -->    
       <div class="modal fade" id="modalAnexos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">  
            <div class="modal-dialog modal-xl" role="document">  
              <div class="modal-content">  
                  <div class="modal-header">  
                     <h2 class="modal-title" id="exampleModalLabel"><strong>Lista de anexos</strong></h2>  
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                      <span aria-hidden="true">×</span>  
                     </button>  
                  </div>
                  <div class="modal-body">                  
                      <div id="editForm">   
                      </div> 
                  </div> 
                <div class='modal-footer'> 
                        <form method="post" id="upload_form" enctype='multipart/form-data'>
                            <p style="width: 100%;">Selecione o arquivo <span class="message-file-exist"></span></p>
                         <p><input type="file" name="upload_file" class="input_upload_file" id="input_upload_file" /></p>
                         <br />
                         <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" value="upload" />
                         <input type="hidden" name="id_contrato_anexo" id="id_contrato_anexo" value="" />
                         <!--<p><input type="submit" name="upload_button" class="btn btn-success btn_upload_button" value="Upload" /></p>-->
                         <p><input type="submit" name="upload_button" class="btn btn-success btn_upload_button" id="btn_upload_anexo" data-id_contrato_anexo="" value="Enviar" /></p>
                        </form> 
                     <button type='button' class='btn btn-secondary' data-dismiss='modal' style="font-size: 2.1em;">Fechar</button>                
                </div>   
              </div> 
          </div>  
       </div> 


















       <!-- JANELA MODAL inseir propotas novas -->    
        <!-- Modal -->
<!-- Modal -->
<!-- Modal -->
        <div class="modal fade" id="addProposta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastra Proposta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-nova-proposta">
                    <form id="form_add_proposta" method="POST">
                                    <div class="row">
                                        <input type="hidden" name="add_matribn" id="add_matribn" value="">
                                        <input type="hidden" name="add_historico" id="add_historico" value="">
                                        <div class="col-md-4 col-sm-4">
                                            <label for="add_id_cli">Cliente * :</label>
                                              <select class="form-control" name="add_id_cli" id="add_id_cli">
                                                  <option value="">...</option>
                                              </select>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <label for="add_orgao">Órgão * :</label>
                                              <select class="form-control" name="add_orgao" id="add_orgao">
                                                  <option value="">...</option>
                                                  <option value="1">INSS</option>
                                                  <option value="2">SIAPE</option>
                                                  <option value="3">GOV SC</option>
                                              </select>
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <label for="add_bn">No. Benefício (bn) * :</label>
                                              <select class="form-control" name="add_bn" id="add_bn">
                                                  <option value="">...</option>
                                                  <option value="1">21</option>
                                                  <option value="2">32</option>
                                                  <option value="3">41</option>
                                                  <option value="4">42</option>
                                                  <option value="5">46</option>
                                                  <option value="6">92</option>
                                                  <option value="7">93</option>
                                              </select>
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <label for="add_parce">Parcela * :</label>
                                            <input type="text" id="add_parce" class="form-control" name="add_parce" data-parsley-trigger="change" required="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 col-sm-3">
                                            <label for="add_opera">Operação * :</label>
                                              <select class="form-control" name="add_opera" id="add_opera">
                                                  <option value="">...</option>
                                                  <option value="1">Portabilidade</option>
                                                  <option value="2">Porta + Refi</option>
                                                  <option value="3">Contrato novo</option>
                                                  <option value="4">Refinanciamento</option>
                                              </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label for="add_promo">promotora * :</label>
                                              <select class="form-control" name="add_promo" id="add_promo">
                                                  <option value="">...</option>
                                                  <option value="1">LEWE</option>
                                                  <option value="2">FONTES</option>
                                                  <option value="3">GFT</option>
                                              </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label for="add_vend">Vendedor * :</label>
                                              <select class="form-control" name="add_vend" id="add_vend">
                                                  <option value="">...</option>
                                                  <option value="1">Manoel</option>
                                                  <option value="2">Thauan</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="add_situa">Situação * :</label>
                                              <select class="form-control" name="add_situa" id="add_situa">
                                                  <option value="">...</option>
                                                  <option value="1">AGUARDANDO - digitação</option>
                                                  <option value="2">AGUARDANDO - sldo devedor</option>
                                                  <option value="3">AGUARDANDO - averbação</option>
                                                  <option value="4">AVERBADO</option>
                                                  <option value="5">AGUARDANDO - refinanciamento de portabilidade</option>
                                                  <option value="6">PAGO</option>
                                                  <option value="7">PENDENTE - anexar contrato</option>
                                                  <option value="8">PENDENTE - documento pendente</option>
                                                  <option value="9">CANCELADO - cliente retido</option>
                                                  <option value="10">CANCELADO - no. do contrato não cancelado</option>
                                                  <option value="11">CANCELADO - contrato com portabilidade</option>
                                                  <option value="12">CANCELADO - cliente solicitou o cancelamento</option>
                                                  <option value="13">CANCELADO - margem consignada excedida</option>
                                                  <option value="14">CANCELADO - cliente com restrição interna</option>
                                                  <option value="15">CANCELADO - cliente com margem negativa interna</option>
                                                  <option value="16">CANCELADO - CPF irregular na Receita Federal</option>
                                              </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label for="add_ade">ade * :</label>
                                            <input type="text" id="add_ade" class="form-control" name="add_ade" data-parsley-trigger="change">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label for="add_bccompra">Banco Comprador * :</label>
                                              <select class="form-control" name="add_bccompra" id="add_bccompra">
                                                  <option value="">...</option>
                                                  <option value="1">BANRISUL</option>
                                                  <option value="2">BRADESCO</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="add_parceini">Parcela Inicial * :</label>
                                            <input type="text" id="add_parceini" class="form-control" name="add_parceini" required="">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label for="add_parcefinal">Parcela Final * :</label>
                                            <input type="text" id="add_parcefinal" class="form-control" name="add_parcefinal" data-parsley-trigger="change" required="">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label for="add_ml">ML * :</label>
                                            <input type="text" id="add_ml" class="form-control" name="add_ml" required="">
                                        </div>
                                    </div>

                                   <div class="row mb-3">                                            
                                            <div class="col-md-12 col-sm-12 offset-md-0">
                                                  <label for="add_historico">Histórico:</label>
                                                  <textarea class="form-control" name="add_historico" rows="2" id="add_historico"></textarea>
                                            </div>                                           
                                    </div>

                                    <div class="row mb-3">
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 offset-md-0">
                                                <a href="" class="btn btn-success" type="button" data-dismiss="modal">Cancel</a>
                                                <button type="button" name="btn-submit-update-proposta" id="btn-add-proposta" class="btn btn-secondary" data-dismiss='modal' data-id_contrato="">Salvar</button>
                                            </div>
                                        </div>
                                    </div>										
                        </form>
				  </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>



        <div class="modal fade" id="editProposta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edita Proposta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-nova-proposta">									
                      <!-- start form for validation -->
									<form id="form_update_proposta" method="POST">
                                        <div class="row">
                                            <input type="hidden" name="id_proposta_update" id="id_proposta_update" value="">
                                            <input type="hidden" name="matribn" id="matribn" value="">
                                            <input type="hidden" name="observa_tab_contrato" id="observa_tab_contrato" value="">
                                            <div class="col-md-4 col-sm-4">
                                                <label for="nome_cli">Cliente * :</label>
                                                <input type="text" id="nome_cli" class="form-control" name="nome_cli">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label for="email">Órgão * :</label>
                                                  <select class="form-control" name="orgao" id="orgao">
                                                      <option value="">...</option>
                                                      <option value="1">INSS</option>
                                                      <option value="2">SIAPE</option>
                                                      <option value="3">GOV SC</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="fullname">No. Benefício (bn) * :</label>
                                                  <select class="form-control" name="bn" id="bn">
                                                      <option value="">...</option>
                                                      <option value="1">21</option>
                                                      <option value="2">32</option>
                                                      <option value="3">41</option>
                                                      <option value="4">42</option>
                                                      <option value="5">46</option>
                                                      <option value="6">92</option>
                                                      <option value="7">93</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="email">Parcela * :</label>
                                                <input type="text" id="parce" class="form-control" name="parce" data-parsley-trigger="change" required="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="fullname">Operação * :</label>
                                                  <select class="form-control" name="opera" id="opera">
                                                      <option value="">...</option>
                                                      <option value="1">Portabilidade</option>
                                                      <option value="2">Porta + Refi</option>
                                                      <option value="3">Contrato novo</option>
                                                      <option value="4">Refinanciamento</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="email">promotora * :</label>
                                                  <select class="form-control" name="promo" id="promo">
                                                      <option value="">...</option>
                                                      <option value="1">LEWE</option>
                                                      <option value="2">FONTES</option>
                                                      <option value="3">GFT</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="fullname">Vendedor * :</label>
                                                  <select class="form-control" name="vend" id="vend">
                                                      <option value="">...</option>
                                                      <option value="1">Manoel</option>
                                                      <option value="2">Thauan</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="situa">Situação * :</label>
                                                  <select class="form-control" name="situa" id="situa">
                                                      <option value="">...</option>
                                                      <option value="1">AGUARDANDO - digitação</option>
                                                      <option value="2">AGUARDANDO - sldo devedor</option>
                                                      <option value="3">AGUARDANDO - averbação</option>
                                                      <option value="4">AVERBADO</option>
                                                      <option value="5">AGUARDANDO - refinanciamento de portabilidade</option>
                                                      <option value="6">PAGO</option>
                                                      <option value="7">PENDENTE - anexar contrato</option>
                                                      <option value="8">PENDENTE - documento pendente</option>
                                                      <option value="9">CANCELADO - cliente retido</option>
                                                      <option value="10">CANCELADO - no. do contrato não cancelado</option>
                                                      <option value="11">CANCELADO - contrato com portabilidade</option>
                                                      <option value="12">CANCELADO - cliente solicitou o cancelamento</option>
                                                      <option value="13">CANCELADO - margem consignada excedida</option>
                                                      <option value="14">CANCELADO - cliente com restrição interna</option>
                                                      <option value="15">CANCELADO - cliente com margem negativa interna</option>
                                                      <option value="16">CANCELADO - CPF irregular na Receita Federal</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="email">ade * :</label>
                                                <input type="text" id="ade" class="form-control" name="ade" data-parsley-trigger="change">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="bccompra">Banco Comprador * :</label>
                                                  <select class="form-control" name="bccompra" id="bccompra">
                                                      <option value="">...</option>
                                                      <option value="1">BANRISUL</option>
                                                      <option value="2">BRADESCO</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="fullname">Parcela Inicial * :</label>
                                                <input type="text" id="parceini" class="form-control" name="parceini" required="">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="email">Parcela Final * :</label>
                                                <input type="text" id="parcefinal" class="form-control" name="parcefinal" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="fullname">ML * :</label>
                                                <input type="text" id="ml" class="form-control" name="ml" required="">
                                            </div>
                                        </div>
                                        
                                       <div class="row mb-3">                                            
                                                <div class="col-md-12 col-sm-12 offset-md-0">
                                                      <label for="comment">Histórico:</label>
                                                      <textarea class="form-control" name="historico" rows="2" id="historico"></textarea>
                                                </div>                                           
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="item form-group">
                                                <div class="col-md-12 col-sm-12 offset-md-0">
                                                    <a href="main.php" class="btn btn-success" type="button">Cancel</a>
                                                    <!--<button class="btn btn-primary" type="button">Cancel</button>-->
                                                    <!--<button class="btn btn-primary" type="reset">Reset</button>-->
                                                    <!--<button type="submit" class="btn btn-secondary">Submit</button>-->
                                                    <button type="button" name="btn-submit-update-proposta" id="btn-update-proposta" data-dismiss='modal' class="btn btn-secondary" >Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                         
                                        


									</p>
                                        </form>
									<!-- end form for validations -->
				  </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>



        <div class="modal fade" id="addCliente" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastra de Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-nova-proposta">
                        <form id="form_add_cliente" method="POST">
                                        <div class="row">
                                            <div class="col-md-7 col-sm-7">
                                                <label for="add_cli_nome">Nome * :</label>
                                                <input type="text" id="add_cli_nome" class="form-control" name="add_cli_nome" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="add_cli_cpf">Cpf * :</label>
                                                <input type="text" id="add_cli_cpf" class="form-control" name="add_cli_cpf" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="add_cli_identidade">Identidade * :</label>
                                                <input type="text" id="add_cli_identidade" class="form-control" name="add_cli_identidade" data-parsley-trigger="change" required="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-2 col-sm-2">
                                                <label for="add_cli_cep">Cep * :</label>
                                                <input type="text" id="add_cli_cep" class="form-control" name="add_cli_cep" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <label for="add_cli_endereco">Endereço * :</label>
                                                <input type="text" id="add_cli_endereco" class="form-control" name="add_cli_endereco" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="add_cli_numero">Número * :</label>
                                                <input type="text" id="add_cli_numero" class="form-control" name="add_cli_numero" data-parsley-trigger="change" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <label for="add_cli_comple">Complemento * :</label>
                                                <input type="text" id="add_cli_comple" class="form-control" name="add_cli_comple" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label for="add_cli_bairro">Bairro * :</label>
                                                <input type="text" id="add_cli_bairro" class="form-control" name="add_cli_bairro" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label for="add_cli_cidade">Cidade * :</label>
                                                <input type="text" id="add_cli_cidade" class="form-control" name="add_cli_cidade" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="add_cli_uf">Uf * :</label>
                                                <input type="text" id="add_cli_uf" class="form-control" name="add_cli_uf" data-parsley-trigger="change" required="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 col-sm-12">
                                                <div>
                                                    <label for="add_cli_datanasc">Data Nascimento * :</label>
                                                    <input type="text" id="add_cli_datanasc" class="form-control" name="add_cli_datanasc" required="" style="width: 16%;">
                                                </div>
                                            </div>
                                        </div>
                                        
                                      
                                        
                                        <div class="row mb-3">
                                            <div class="item form-group">
                                                <div class="col-md-12 col-sm-12 offset-md-0">
                                                    <a href="" class="btn btn-success" type="button" data-dismiss="modal">Cancel</a>
                                                    <button type="button" name="btn-submit-add-cliente" id="btn-add-cliente" class="btn btn-secondary" data-dismiss='modal' data-id_contrato="">Salvar</button>
                                                </div>
                                            </div>
                                        </div>										
                                </form>
				  </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>



        <div class="modal fade" id="editCliente" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edita Proposta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-nova-proposta">									
                      <!-- start form for validation -->
									<form id="form_edit_cliente" method="POST">
                                        <div class="row">
                                        <input type="hidden" name="id_edit_cli" id="id_edit_cli" value="">
                                            <div class="col-md-4 col-sm-4">
                                                <label for="nome_edit_cli">Nome * :</label>
                                                <input type="text" id="nome_edit_cli" class="form-control" name="nome_edit_cli">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label for="cpf_edit_cli">Cpf * :</label>
                                                <input type="text" id="cpf_edit_cli" class="form-control" name="cpf_edit_cli">
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="identidade_edit_cli">Identidade * :</label>
                                                <input type="text" id="identidade_edit_cli" class="form-control" name="identidade_edit_cli">
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="cep_edit_cli">Cep * :</label>
                                                <input type="text" id="cep_edit_cli" class="form-control" name="cep_edit_cli" data-parsley-trigger="change" required="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="endereco">Endereço * :</label>
                                                <input type="text" id="endereco_edit_cli" class="form-control" name="endereco_edit_cli" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="numero_edit_cli">Numero * :</label>
                                                <input type="text" id="numero_edit_cli" class="form-control" name="numero_edit_cli" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="comple_edit_cli">Complemento * :</label>
                                                <input type="text" id="comple_edit_cli" class="form-control" name="comple_edit_cli" data-parsley-trigger="change" required="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="bairro_edit_cli">Bairro * :</label>
                                                <input type="text" id="bairro_edit_cli" class="form-control" name="bairro_edit_cli" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="cidade_edit_cli">Cidade * :</label>
                                                <input type="text" id="cidade_edit_cli" class="form-control" name="cidade_edit_cli" data-parsley-trigger="change">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="uf_edit_cli">Uf * :</label>
                                                <input type="text" id="uf_edit_cli" class="form-control" name="uf_edit_cli" data-parsley-trigger="change">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="datanasc_edit_cli">data Nasc. * :</label>
                                                <input type="text" id="datanasc_edit_cli" class="form-control" name="datanasc_edit_cli" required="">
                                            </div>
                                        </div>
                                        
                                       <!--<div class="row mb-3">                                            
                                                <div class="col-md-12 col-sm-12 offset-md-0">
                                                      <label for="comment">Histórico:</label>
                                                      <textarea class="form-control" name="historico" rows="2" id="historico"></textarea>
                                                </div>                                           
                                        </div>-->
                                        
                                        <div class="row mb-3">
                                            <div class="item form-group">
                                                <div class="col-md-12 col-sm-12 offset-md-0">
                                                    <a href="main.php" class="btn btn-success" type="button">Cancel</a>
                                                    <!--<button class="btn btn-primary" type="button">Cancel</button>-->
                                                    <!--<button class="btn btn-primary" type="reset">Reset</button>-->
                                                    <!--<button type="submit" class="btn btn-secondary">Submit</button>-->
                                                    <button type="button" name="btn-submit-edit-cliente" id="btn-submit-edit-cliente" class="btn btn-secondary" data-dismiss='modal' >Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                         
                                        


									</p>
                                        </form>
									<!-- end form for validations -->
				  </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>







        <!--<div class="modal fade" id="addSituacao" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastra Proposta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-nova-proposta">
                        <form id="form_add_proposta" method="POST">
                                        <div class="row">
                                            <input type="hidden" name="add_matribn" id="add_matribn" value="">
                                            <input type="hidden" name="add_historico" id="add_historico" value="">
                                            <div class="col-md-4 col-sm-4">
                                                <label for="add_id_cli">Cliente * :</label>
                                                  <select class="form-control" name="add_id_cli" id="add_id_cli">
                                                      <option value="">...</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label for="add_orgao">Órgão * :</label>
                                                  <select class="form-control" name="add_orgao" id="add_orgao">
                                                      <option value="">...</option>
                                                      <option value="1">INSS</option>
                                                      <option value="2">SIAPE</option>
                                                      <option value="3">GOV SC</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="add_bn">No. Benefício (bn) * :</label>
                                                  <select class="form-control" name="add_bn" id="add_bn">
                                                      <option value="">...</option>
                                                      <option value="1">21</option>
                                                      <option value="2">32</option>
                                                      <option value="3">41</option>
                                                      <option value="4">42</option>
                                                      <option value="5">46</option>
                                                      <option value="6">92</option>
                                                      <option value="7">93</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <label for="add_parce">Parcela * :</label>
                                                <input type="text" id="add_parce" class="form-control" name="add_parce" data-parsley-trigger="change" required="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="add_opera">Operação * :</label>
                                                  <select class="form-control" name="add_opera" id="add_opera">
                                                      <option value="">...</option>
                                                      <option value="1">Portabilidade</option>
                                                      <option value="2">Porta + Refi</option>
                                                      <option value="3">Contrato novo</option>
                                                      <option value="4">Refinanciamento</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="add_promo">promotora * :</label>
                                                  <select class="form-control" name="add_promo" id="add_promo">
                                                      <option value="">...</option>
                                                      <option value="1">LEWE</option>
                                                      <option value="2">FONTES</option>
                                                      <option value="3">GFT</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="add_vend">Vendedor * :</label>
                                                  <select class="form-control" name="add_vend" id="add_vend">
                                                      <option value="">...</option>
                                                      <option value="1">Manoel</option>
                                                      <option value="2">Thauan</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="add_situa">Situação * :</label>
                                                  <select class="form-control" name="add_situa" id="add_situa">
                                                      <option value="">...</option>
                                                      <option value="1">AGUARDANDO - digitação</option>
                                                      <option value="2">AGUARDANDO - sldo devedor</option>
                                                      <option value="3">AGUARDANDO - averbação</option>
                                                      <option value="4">AVERBADO</option>
                                                      <option value="5">AGUARDANDO - refinanciamento de portabilidade</option>
                                                      <option value="6">PAGO</option>
                                                      <option value="7">PENDENTE - anexar contrato</option>
                                                      <option value="8">PENDENTE - documento pendente</option>
                                                      <option value="9">CANCELADO - cliente retido</option>
                                                      <option value="10">CANCELADO - no. do contrato não cancelado</option>
                                                      <option value="11">CANCELADO - contrato com portabilidade</option>
                                                      <option value="12">CANCELADO - cliente solicitou o cancelamento</option>
                                                      <option value="13">CANCELADO - margem consignada excedida</option>
                                                      <option value="14">CANCELADO - cliente com restrição interna</option>
                                                      <option value="15">CANCELADO - cliente com margem negativa interna</option>
                                                      <option value="16">CANCELADO - CPF irregular na Receita Federal</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="add_ade">ade * :</label>
                                                <input type="text" id="add_ade" class="form-control" name="add_ade" data-parsley-trigger="change">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="add_bccompra">Banco Comprador * :</label>
                                                  <select class="form-control" name="add_bccompra" id="add_bccompra">
                                                      <option value="">...</option>
                                                      <option value="1">BANRISUL</option>
                                                      <option value="2">BRADESCO</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="add_parceini">Parcela Inicial * :</label>
                                                <input type="text" id="add_parceini" class="form-control" name="add_parceini" required="">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="add_parcefinal">Parcela Final * :</label>
                                                <input type="text" id="add_parcefinal" class="form-control" name="add_parcefinal" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="add_ml">ML * :</label>
                                                <input type="text" id="add_ml" class="form-control" name="add_ml" required="">
                                            </div>
                                        </div>
                                        
                                       <div class="row mb-3">                                            
                                                <div class="col-md-12 col-sm-12 offset-md-0">
                                                      <label for="add_historico">Histórico:</label>
                                                      <textarea class="form-control" name="add_historico" rows="2" id="add_historico"></textarea>
                                                </div>                                           
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="item form-group">
                                                <div class="col-md-12 col-sm-12 offset-md-0">
                                                    <a href="" class="btn btn-success" type="button" data-dismiss="modal">Cancel</a>
                                                    <button type="button" name="btn-submit-update-proposta" id="btn-add-proposta" class="btn btn-secondary" data-dismiss='modal' data-id_contrato="">Salvar</button>
                                                </div>
                                            </div>
                                        </div>										
                                </form>
				  </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>-->






        <div class="modal fade" id="crudHistorico" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" style="margin: 0 !important; height: 100vh !important;">
            <div class="modal-content" style="width: 100vw !important; height: 90vh !important; border-radius: 0 !important;">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Histórico</h5>
                <h5><a href="" id="btn-addHistorico"><i class="fa fa-plus-circle fa-2x"></i></a></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="background: #fff;">
                              <div class="row add-post">
                                    <form id="form_add_crud_hist" method="POST" class="col-lg-12">

                                               <div class="row mb-3">                                            
                                                        <div class="col-md-12 col-sm-12 offset-md-0">                                                            
                                                        <input type="hidden" name="hidden_id_proposta_hist" id="hidden_id_proposta_hist" value="" />
                                                        <input type="hidden" name="hidden_id_usuario_logado" id="hidden_id_usuario_logado" value="" />
                                                              <label for="add_post_hist"><h4>Postagem:</h4></label>
                                                              <textarea class="form-control" name="add_post_hist" rows="2" id="add_post_hist" required></textarea>
                                                        </div>                                           
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="item form-group">
                                                        <div class="col-md-12 col-sm-12 offset-md-0">
                                                            <a href="" class="btn btn-success" type="button" data-dismiss="modal">Cancel</a>
                                                            <button type="button" name="btn-submit-add-hist" id="btn-add-crud-hist" class="btn btn-secondary" data-id_proposta="" data-id_usuario_logado>Salvar</button>
                                                        </div>
                                                    </div>
                                                </div>											
                                    </form>                                  
                              </div>
                                <!--<div class="form-group add-post">
                                    <div class="row">
									   <label class="control-label col-md-3 col-sm-3 ">Postagem:</label>
                                    </div>
                                    <div class="row">>
                                            <div class="col-lg-10 col-md-10 col-sm-10 ">
                                                <textarea class="resizable_textarea form-control" placeholder="This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out..." style="margin-top: 0px; margin-bottom: 0px; height: 85px; width: 100%;"></textarea>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 ">
                                                <button class="btn btn-success" id="btn-salvar-post-historico" data-id_proposta="">Salvar</button>
                                            </div>
                                    </div>
								</div>-->
                
                  <div class="post-list col-lg-12 col-md-12 col-sx-12"></div>
                <!--<table class="table table-historico table-striped jambo_table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Postagem</th>
                                <th>Ação</th>
                                <th>Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                  </table>-->                  
                  
                  
                  
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>




<?php
// Header
    include_once 'includes/footer.php';
?>

