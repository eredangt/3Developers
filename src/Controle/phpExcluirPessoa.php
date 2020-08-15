<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Pessoa.php');
	include_once('PessoaDAO.php');
	include_once('../Modelo/Cliente.php');
	include_once('ClienteDAO.php');
	include_once('../Modelo/Instrutor.php');
	include_once('InstrutorDAO.php');
	session_start();

	if ($_SESSION['cargo'] == 'instrutor'){
		$codigo = $_GET['codigo'];
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();

		$pessoaDAO = new PessoaDAO();
		$pessoaDAO->excluirPessoa($conexao, $codigo);

	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}

?>
