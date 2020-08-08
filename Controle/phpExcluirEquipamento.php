<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Equipamento.php');
	include_once('EquipamentoDAO.php');
	session_start();

	if ($_SESSION['cargo'] == 'instrutor'){
		$codigo = $_GET['codigo'];
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();

		$equipamentoDAO = new EquipamentoDAO();
		$equipamentoDAO->excluirEquipamento($conexao, $codigo);

	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}

?>
