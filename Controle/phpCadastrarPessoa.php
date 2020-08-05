<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Pessoa.php');
	include_once('PessoaDAO.php');
	include_once('../Modelo/Cliente.php');
	include_once('ClienteDAO.php');
	include_once('../Modelo/Instrutor.php');
	include_once('InstrutorDAO.php');

	//require('phpConexaoBD.php');
	session_start();
	if($_SESSION['cargo'] == 'instrutor'){

		// Variaveis de consulta
		$resultadoC = '';
		$resultadoI = '';

		$cargo = $_POST['selecao']; // Cargo: C ou I
		$COD_Cliente = '';
		$COD_Instrutor = '';
		$imagemI = '';

		if($cargo == 'C'){

			$cpfC = $_POST['txtCPFPessoaC']; // CPF
			$nomeC = $_POST['txtNomeC']; // Nome
			$telefoneC = $_POST['txtTelC']; // Telefone
			$emailC = $_POST['txtEmailC']; // Email
			$dataNascC = $_POST['txtDataC']; // Data de Nascimento
			$senhaC = $_POST['senhaPessoaC']; // Senha
			$planoC = $_POST['selecaoPlanoC']; // Plano adquirido

			// Nos arquivos que precisam de conectar com o BD
			$conexao = new ConexaoBD();
			$conexao = $conexao->abreConexao();

			$p = new Pessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo); // PARA CLIENTE

			$pessoaDAO = new PessoaDAO();
			$pessoaDAO->addPessoa($p, $conexao);

			$c = new Cliente($planoC);
			$c1 = new ClienteDAO();
			$c1->addCliente($c,$conexao, $p->getCPF());

		}
		if($cargo == 'I'){

			$cpfI = $_POST['txtCPFPessoaI']; // CPF
			$nomeI = $_POST['txtNomeI']; // Nome
			$telefoneI = $_POST['txtTelI']; // Telefone
			$emailI = $_POST['txtEmailI']; // Email
			$dataNascI = $_POST['txtDataI']; // Data de Nascimento
			$senhaI = $_POST['senhaPessoaI']; // Senha
			$salarioI = $_POST['txtSalarioI']; // Salario
			$cargaHI = $_POST['txtHorariaI']; // Carga Horaria
			$imagemI = $_FILES['image']; // Imagem Instrutor

			// Nos arquivos que precisam de conectar com o BD
			$conexao = new ConexaoBD();
			$conexao = $conexao->abreConexao();

			$p = new Pessoa($cpfI, $nomeI, $telefoneI, $emailI, $dataNascI, $senhaI, $cargo); // INSTRUTOR

			$pessoaDAO = new PessoaDAO();
			$pessoaDAO->addPessoa($p, $conexao);

			$uploaddir = '../imgInstrutores/';
			$uploadfile = $uploaddir . basename($imagemI['name']);
			if (move_uploaded_file($imagemI['tmp_name'], $uploadfile)){
				echo "Imagem v&aacute;lido e enviado com sucesso.\n";
			}else{
				echo "Possível ataque de upload de arquivo!\n";
				echo 'Aqui está mais informações de debug:';
				print_r($_FILES);
			}

			$i = new Instrutor($salarioI, $cargaHI, $uploadfile);
			$i1 = new InstrutorDAO();
			$i1->addInstrutor($i,$conexao, $p->getCPF());
		}


	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("../Visualizacao/menu.php");
			  </SCRIPT>';
	}
?>
