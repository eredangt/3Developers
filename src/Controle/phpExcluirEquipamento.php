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
use Developers\Acme\Modelo\Equipamento;
use Developers\Acme\Controle\EquipamentoDAO;

	/*
		- ARQUIVO DO CONTROLE phpExcluirEquipamento.php:
		O arquivo phpExcluirEquipamento.php é responsável por informar o código
		do equipamento que será excluído.
		Verifica se o cargo da sessão é de um instrutor.
	*/

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
