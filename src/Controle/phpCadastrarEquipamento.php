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
	- ARQUIVO DO CONTROLE phpCadastrarEquipamento.php:
	O arquivo phpCadastrarEquipamento.php armazena as informações passadas via
	formulário, através de variáveis. É então criado um objeto de Conexao, para
	conectar o Banco de Dados, e também, é criado um objeto Equipamento.
	Ao criar o objeto Equipamento, é passado como parâmetro os dados coletados.
	Por fim, cria se um objeto EquipamentoDAO para chamar o método addEquipamento.
	Caso alguma pessoa que não é instrutor, tente acessar a página, a mesma será
	redirecionada para o menu.
*/
	namespace Developers\Acme\Controle;
    use Developers\Acme\Persistencia\ConexaoBD;
    use Developers\Acme\Modelo\Equipamento;
    use Developers\Acme\Controle\EquipamentoDAO;

	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Equipamento.php');
	include_once('EquipamentoDAO.php');

	session_start();
	if($_SESSION['cargo'] == 'instrutor'){

		$nomeEquip = $_POST['txtEquipe']; // nome plano
		$qtdEquip = $_POST['txtQuant']; // qtd meses
		$marca = $_POST['txtMarca']; // valor
		$ano = $_POST['txtData']; // valor

		// Nos arquivos que precisam de conectar com o BD
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();

		$equipamento = new Equipamento($nomeEquip, $qtdEquip, $marca, $ano); // PLANO

		$equipamentoDAO = new EquipamentoDAO();
		$equipamentoDAO->addEquipamento($equipamento, $conexao);


	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}

?>
