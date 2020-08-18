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
    - ARQUIVO DO CONTROLE phpAlterarEquipamento.php:
	O arquivo phpAlterarEquipamento.php armazena as informações  modificadas via
	formulário, através de variáveis. É então criado um objeto de Conexao, para
	conectar o Banco de Dados.
	Logo, é criado um objeto equipamentoDAO para chamar o método
	atualizarEquipamento, passando os dados modificados como parâmetro e o
	código do equipamento selecionado. Caso alguma pessoa que não é instrutor, tente
	acessar a página, a mesma será redirecionada para o menu.
*/
	namespace Developers\Acme\Controle;
    use Developers\Acme\Persistencia\ConexaoBD;
    use Developers\Acme\Modelo\Equipamento;
	use Developers\Acme\Controle\EquipamentoDAO;

	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Equipamento.php');
	include_once('EquipamentoDAO.php');
	$codigo='';
	session_start();


	$codigo = $_POST['hddCodigo'];
	if($_SESSION['cargo'] == 'instrutor'){

		$nomeEquip = $_POST['txtEquipe']; // nome plano
		$qtdEquip = $_POST['txtQuant']; // qtd meses
		$marca = $_POST['txtMarca']; // valor
		$ano = $_POST['txtData']; // valor

		// Nos arquivos que precisam de conectar com o BD
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();


		$equipamentoDAO = new EquipamentoDAO();
		$equipamentoDAO->atualizarEquipamento($conexao, $codigo, $nomeEquip, $qtdEquip, $marca, $ano);


	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}

?>
