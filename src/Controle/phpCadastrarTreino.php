<?php

	namespace Developers\Acme\Controle;
    use Developers\Acme\Persistencia\ConexaoBD;
    use Developers\Acme\Modelo\Treino;
    use Developers\Acme\Controle\TreinoDAO;
	
    include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Treino.php');
	include_once('TreinoDAO.php');

	session_start();
	if($_SESSION['cargo'] == 'instrutor'){

		$tipoTreino = $_POST['selecao']; // tipo do treino [A, B, C]
		$idCliente = $_POST['idCliente']; // id do cliente
        $idFunc = $_POST['idFunc']; // id do funcionário
        $idEquipamento = $_POST['idEquipamento'];
        $series = $_POST['txtSerie']; // número de séries
		$repeticoes = $_POST['txtRep']; // número de repetições
		$peso = $_POST['txtPeso']; // peso ideal para esse treino

		// Nos arquivos que precisam de conectar com o BD
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();

		$treino = new Treino($idCliente, $idFunc, $idEquipamento, $tipoTreino, $series, $repeticoes, $peso); // TREINO
        $treinoDAO = new TreinoDAO();
		$treinoDAO->addTreino($treino, $conexao);


	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}

?>
