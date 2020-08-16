<?php

	namespace Developers\Acme\Controle;
    use Developers\Acme\Persistencia\ConexaoBD;
    use Developers\Acme\Modelo\Plano;
    use Developers\Acme\Controle\PlanoDAO;
	
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Plano.php');
	include_once('PlanoDAO.php');
	
	session_start();
	if($_SESSION['cargo'] == 'instrutor'){
		
		$nomePlano = $_POST['txtPlano']; // nome plano
		$qtdMeses = $_POST['txtMeses']; // qtd meses
		$valor = $_POST['txtValor']; // valor
		
		// Nos arquivos que precisam de conectar com o BD
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();

		$plano = new Plano($nomePlano, $qtdMeses, $valor); // PLANO

		$planoDAO = new PlanoDAO();
		$planoDAO->addPlano($plano, $conexao);
	
	
	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}
	
?>
