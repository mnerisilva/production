<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-cadastrar-cliente'])):
	$nome_cli = clear($_POST['nome']);
	$cpf_cli = clear($_POST['cpf']);
	$identidade_cli = clear($_POST['identidade']);
	$cep_cli = clear($_POST['cep']);
	$endereco_cli = clear($_POST['endereco']);
	$numero_cli = clear($_POST['numero']);
	$comple_cli = clear($_POST['comple']);
	$bairro_cli = clear($_POST['bairro']);
	$cidade_cli = clear($_POST['cidade']);
	$uf_cli = clear($_POST['uf']);
	$datanasc_cli = '12/05/1946';
	$datacad_cli = '14/09/2020';
    
	//$datenasc_cli = clear($_POST['datenasc']);
    //echo '<pre>' . var_dump($_POST) . '</pre>';
    //die();

	$sql = "INSERT INTO tab_clientes (nome_cli, cpf_cli, identidade_cli, cep_cli, endereco_cli, numero_cli, comple_cli, bairro_cli, cidade_cli, uf_cli, datanasc_cli, datacad_cli) VALUES ('$nome_cli', '$cpf_cli', '$identidade_cli', '$cep_cli', '$endereco_cli', '$numero_cli', '$comple_cli', '$bairro_cli', '$cidade_cli', '$uf_cli', '$datanasc_cli', '$datacad_cli')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;
endif;


if(isset($_POST['btn-cadastrar-proposta'])):
	$id_cli = clear($_POST['cli']);
	$id_orgao = clear($_POST['orgao']);
	$bn_contrato = clear($_POST['bn']);
	$parce_contrato = clear($_POST['parce']);
	$promo_contrato = clear($_POST['promo']);
	$vend_contrato = clear($_POST['vendr']);
	$situa_contrato = clear($_POST['situa']);
	$ade_contrato = clear($_POST['ade']);
	$bccompra_contrato = clear($_POST['bccompra']);
	$parceini_contrato = clear($_POST['parceini']);
	$parcefinal_contrato = clear($_POST['parcefinal']);
	$ml_contrato = 'ml';
    
	//$datenasc_cli = clear($_POST['datenasc']);
    //echo '<pre>' . var_dump($_POST) . '</pre>';
    //die();

	$sql = "INSERT INTO tab_propostas (id_cli, id_orgao, bn_contrato, parce_contrato, promo_contrato, vend_contrato, situa_contrato, ade_contrato, bccompra_contrato, parceini_contrato, parcefinal_contrato, ml_contrato) VALUES ('$id_cli', '$id_orgao', '$bn_contrato', '$parce_contrato', '$promo_contrato', '$vend_contrato', '$situa_contrato', '$ade_contrato', '$bccompra_contrato', '$parceini_contrato', '$parcefinal_contrato', '$ml_contrato')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;
endif;