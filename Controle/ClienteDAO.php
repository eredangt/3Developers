<?php
	// Persistence
	include_once('../Modelo/Cliente.php');
	include_once('../Modelo/Pessoa.php');
	class ClienteDAO{

		public function __construct(){}

		public function addCliente($cliente, $con, $pegaCPF){

			$sql = "SELECT idPessoa FROM PESSOA WHERE CPF ='".$pegaCPF."';";
			$tabela = mysqli_query($con,$sql) or die(mysqli_error($con));

			$COD_Cliente='';

			while($linha = mysqli_fetch_row($tabela)){
				$COD_Cliente= $linha[0];
			}

			$sql = "INSERT INTO Cliente(Pessoa_idPessoa,PLANO_idPlano)
					VALUES('".$COD_Cliente."','".$cliente->getPlano()."');";

			echo $sql;
			$resultadoC = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultadoC == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Cliente cadastrado com sucesso!");
								window.location.replace("../Visualizacao/listarpessoas.php");
						</SCRIPT>';
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($con);
			}
		}

		public function atualizarCliente($plano, $codigo, $con){
			$sql = "UPDATE Cliente SET 	PLANO_idPlano = '".$plano."'
					WHERE Pessoa_idPessoa = '".$codigo."';
			";

			$resultadoC = mysqli_query($con,$sql) or die(mysqli_error($con));
			// VERIFICA SE TUDO DEU CERTO
			if ($resultadoC == true){
				//echo 'Cliente alterado com sucesso';
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Cliente alterado com sucesso!");
							window.location.replace("../Visualizacao/menu.php");
					</SCRIPT>';
			}else{
				echo '<script>alert("Problema ao alterar CLIENTE no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
			}
		}



	}
?>
