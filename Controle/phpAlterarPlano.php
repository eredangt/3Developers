<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Plano.php');
	include_once('PlanoDAO.php');
	$codigo='';
	session_start();


	$codigo = $_POST['hddCodigo'];
	//echo $codigo;
	if($_SESSION['cargo'] == 'instrutor'){

		$nomePlano = $_POST['txtPlano']; // nome plano
		$qtdMeses = $_POST['txtMeses']; // qtd meses
		$valor = $_POST['txtValor']; // valor

		// Nos arquivos que precisam de conectar com o BD
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();


		$planoDAO = new PlanoDAO();
		$planoDAO->atualizarPlano($conexao, $codigo, $nomePlano, $qtdMeses, $valor);


	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}

?>
