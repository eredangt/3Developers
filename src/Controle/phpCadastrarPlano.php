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
		- ARQUIVO DO CONTROLE phpCadastrarPlano.php:
		O arquivo phpCadastrarPlano.php armazena as informações passadas via
		formulário, através de variáveis. É então criado um objeto de Conexao, para
		conectar o Banco de Dados, e também, é criado um objeto Plano.
		Ao criar o objeto Plano, é passado como parâmetro os dados coletados.
		Por fim, cria se um objeto PlanoDAO para chamar o método addPlano.
		Caso alguma pessoa que não é instrutor, tente acessar a página, a mesma será
		redirecionada para o menu.
	*/

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
