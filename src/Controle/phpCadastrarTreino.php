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
use Developers\Acme\Modelo\Treino;
use Developers\Acme\Controle\TreinoDAO;

	/*
		- ARQUIVO DO CONTROLE phpCadastrarTreino.php:
		O arquivo phpCadastrarTreino.php armazena as informações passadas via
		formulário, através de variáveis. É então criado um objeto de Conexao, para
		conectar o Banco de Dados, e também, é criado um objeto Treino.
		Ao criar o objeto Treino, é passado como parâmetro os dados coletados.
		Por fim, cria se um objetoTreinoDAO para chamar o método addTreino.
		Caso alguma pessoa que não é instrutor, tente acessar a página, a mesma será
		redirecionada para o menu.
	*/

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
