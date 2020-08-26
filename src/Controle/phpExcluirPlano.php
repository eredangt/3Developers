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
use Developers\Acme\Modelo\Plano;
use Developers\Acme\Controle\PlanoDAO;

	/*
		- ARQUIVO DO CONTROLE phpExcluirPlano.php:
		O arquivo phpExcluirPlano.php é responsável por informar o código
		do plano que será excluido.
		Verifica se o cargo da sessão é de um instrutor.
	*/

	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Plano.php');
	include_once('PlanoDAO.php');

	session_start();

	if ($_SESSION['cargo'] == 'instrutor'){
		$codigo = $_GET['codigo'];
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();

		$planoDAO = new PlanoDAO();
		$planoDAO->excluirPlano($conexao, $codigo);

	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}
?>
