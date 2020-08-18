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
		- ARQUIVO DA CLASSE ClienteDAO:
		A classe ClienteDAO possui os métodos de adicionar Cliente, atualizar
		Cliente.
	*/
	namespace Developers\Acme\Controle;
    use Developers\Acme\Modelo\Cliente;
    use Developers\Acme\Modelo\Pessoa;
	include_once('../Modelo/Cliente.php');
	include_once('../Modelo/Pessoa.php');
	class ClienteDAO{

		public function __construct(){}

		public function addCliente($cliente, $conexao, $pegaCPF){
			$sql = "SELECT idPessoa FROM PESSOA WHERE CPF = '".$pegaCPF."';";
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			$COD_Cliente = '';

			while($linha = mysqli_fetch_row($tabela)){
				$COD_Cliente = $linha[0];
			}

			$sql = "INSERT INTO Cliente(Pessoa_idPessoa,PLANO_idPlano)
					VALUES('".$COD_Cliente."','".$cliente->getPlano()."');";

			$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
			if($resultado == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Cliente cadastrado com sucesso!");
								window.location.replace("../Visualizacao/listarpessoas.php");
						</SCRIPT>';
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($conexao);
			}
		}

		public function atualizarCliente($conexao, $codigo, $plano) {
			$sql = "UPDATE Cliente SET 	PLANO_idPlano = '".$plano."'WHERE Pessoa_idPessoa = '".$codigo."';";

			$resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			// VERIFICA SE TUDO DEU CERTO
			if ($resultado == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Cliente alterado com sucesso!");
							window.location.replace("../Visualizacao/listarpessoas.php");
					</SCRIPT>';
			}else{
				echo '<script>alert("Problema ao alterar CLIENTE no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
			}
		}
	}
?>
