<!--
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
-->
<?php
/*
    - ARQUIVO DO CONTROLE phpExcluirTreino.php:
    O arquivo phpExcluirTreino.php é responsável por informar o código
	do treino que será excluido.
	Verifica se o cargo da sessão é de um instrutor.
*/
	namespace Developers\Acme\Controle;
    use Developers\Acme\Persistencia\ConexaoBD;
    use Developers\Acme\Modelo\Treino;
    use Developers\Acme\Controle\TreinoDAO;

	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Treino.php');
	include_once('TreinoDAO.php');

	session_start();

	if ($_SESSION['cargo'] == 'instrutor'){
		$codigo = $_GET['codigo'];
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();

		$treinoDAO = new TreinoDAO();
		$treinoDAO->excluirTreino($conexao, $codigo);

	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}

?>
