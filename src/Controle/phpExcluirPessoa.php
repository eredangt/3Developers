<?php
/*
---------------------------------------------------------------------------------
Trabalho Prático - Engenharia de Software - GCC188 - 2020/01
------------------------ Grupo 1 : 3Developers - GymLife ------------------------
    Integrantes:
        Caio de Oliveira (10A - 201820267),
        Ismael Martins Silva (10A - 201820281),
        Layse Cristina Silva Garcia (10A - 201811177).
	Data de Entrega: 25/08/2020.
	*Alterações(autor/data):
		-
		-
---------------------------------------------------------------------------------
*/

namespace Developers\Acme\Controle;
use Developers\Acme\Persistencia\ConexaoBD;
use Developers\Acme\Modelo\Pessoa;
use Developers\Acme\Controle\PessoaDAO;
use Developers\Acme\Modelo\Cliente;
use Developers\Acme\Controle\ClienteDAO;
use Developers\Acme\Modelo\Instrutor;
use Developers\Acme\Controle\InstrutorDAO;

	/*
		- ARQUIVO DO CONTROLE phpExcluirPessoa.php:
		O arquivo phpExcluirPessoa.php é responsável por informar o código
		do pessoa que será excluido.
		Verifica se o cargo da sessão é de um instrutor.
	*/

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
