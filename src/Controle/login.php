<?php

	namespace Developers\Acme\Controle;
    use Developers\Acme\Persistencia\phpConexaoBD;
	session_start();
	// Faz a ligação com o arquivo de banco de dados
	require('../Persistencia/phpConexaoBD.php');
	//include_once('../Persistencia/ConexaoBD.php'); //usar esse arrumar aqui

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
                            alert("Algo deu errado. Tente novamente.");
                            window.location.replace("../Visualizacao/entrar.php");
			  </SCRIPT>';

	}
	/*
	if ($login == 'm' && $senha == 'm'){
		$_SESSION['login'] = 'Voc&ecirc; est&aacute logado no sistema!';
		$_SESSION['cargo'] = 'instrutor'; // TESTES (instrutor e aluno) Essa variavel é responsável por determinar a ocupação da pessoa na academia
		echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Você está logado!!");
                            window.location.replace("menu.php");
              </SCRIPT>';
	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Login ou senha incorretos. Tente novamente.");
                            window.location.replace("entrar.php");
			  </SCRIPT>';*/
		/*
		$_SESSION['erro'] = 'Usu&aacute;rio ou senha incorreto!';
		header('location: entrar.php');
		*/
	/*
	 *  echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Para entrar nesta p&acute;gina, logue primeiro!");
                            window.location.replace("contact.html");
                 </SCRIPT>';
	 * */
?>
