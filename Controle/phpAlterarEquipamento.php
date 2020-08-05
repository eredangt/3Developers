<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Equipamento.php');
	include_once('EquipamentoDAO.php');
	$codigo='';
	session_start();
	
	
	$codigo = $_POST['hddCodigo'];
	if($_SESSION['cargo'] == 'instrutor'){
		
		$nomeEquip = $_POST['txtEquipe']; // nome plano
		$qtdEquip = $_POST['txtQuant']; // qtd meses
		$marca = $_POST['txtMarca']; // valor
		$ano = $_POST['txtData']; // valor
		
		// Nos arquivos que precisam de conectar com o BD
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();


		$equipamentoDAO = new EquipamentoDAO();
		$equipamentoDAO->atualizarEquipamento($nomeEquip, $qtdEquip, $marca, $ano, $codigo, $conexao);
	
	
	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}
	
?>

