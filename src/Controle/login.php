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
	- ARQUIVO DO CONTROLE login.php:
	O arquivo login.php incializa a sessão, recebe os campos do formulário de entrada,
	faz um SELECT comparando se os valores capturados são iguais ao do banco e então
	cria a SESSÃO. Caso os dados não são iguais ao do Banco de Dados, um alerta é
	enviado.
*/
	namespace Developers\Acme\Controle;
    use Developers\Acme\Persistencia\phpConexaoBD;
	session_start();
	// Faz a ligação com o arquivo de banco de dados
	require('../Persistencia/phpConexaoBD.php');
	//include_once('../Persistencia/ConexaoBD.php');

	$login = $_POST['txtLogin'];
	$senha = $_POST['txtSenha'];

	//Ao conectar no banco de dados, faz o SELECT buscando pelo nome do usuário.
	$sql="SELECT * FROM Pessoa WHERE E_MAIL='".$login."';";

	$tabela = mysqli_query($conexao, $sql)or die(mysqli_error($conexao));

	$login_bd = '';
	$senha_bd = '';

	while ($linha = mysqli_fetch_row($tabela)){
		$codigo = $linha[0];
		$login_bd = $linha[4];
		$senha_bd = $linha[6];
		$nome_bd = $linha[2];
		$cargo_bd = $linha[7];
	}

	if($cargo_bd == 'C'){
		$cargo = 'aluno';
	}else{
		$cargo = 'instrutor';
	}

	if ($login==$login_bd && $senha==$senha_bd){
		$_SESSION['login'] = $nome_bd;
		$_SESSION['cargo'] = $cargo;
		$_SESSION['codigo'] = $codigo;
		header('location:../Visualizacao/menu.php');
	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Login ou senha incorretos.\nTente novamente!");
                            window.location.replace("../Visualizacao/entrar.php");
			  </SCRIPT>';

	}
?>
