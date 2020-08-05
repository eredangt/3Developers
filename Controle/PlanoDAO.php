<?php
	// Persistence
	include_once('../Modelo/Plano.php');
	class PlanoDAO{

		public function __construct(){}

		public function addPlano($plano, $con){
            $sql = "INSERT INTO Plano(nome, numMeses, valor)
                    VALUES('".$plano->getNomePlano()."','".$plano->getNumMeses()."','".$plano->getValor()."');";

            echo $sql;
            $resultadoP = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($resultadoP == true){
                echo 'Plano cadastrado.';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($con);
            }
        }

        public function atualizarPlano($nomePlano, $qtdMeses, $valorPlano, $codigo, $con){
			$sql = "UPDATE Plano SET nome = '".$nomePlano."',
									 numMeses = '".$qtdMeses."',
									 valor = '".$valorPlano."'
					WHERE idPlano = '".$codigo."';
			";
			$resultadoP = mysqli_query($con,$sql) or die(mysqli_error($con));
			// VERIFICA SE TUDO DEU CERTO
			if ($resultadoP == true){
				echo 'Plano alterado com sucesso';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Plano alterado com sucesso!");
							window.location.replace("menu.php");
					</SCRIPT>';  */
			}else{
				echo '<script>alert("Problema ao alterar Plano no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
			}
		}

		public function excluirPlano($codigo, $con){
			//criar a string sql que exclui o usuario do banco de dados
			$sql = "DELETE FROM Plano WHERE idPlano=".$codigo.";";

			//executa o comando DELETE no banco de dados para o usuario que tem
			//aquele codigo especifico
			$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

			//avaliando o resultado
			if ($resultado == true){
				echo 'Excluído o Plano';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Plano excluído com sucesso");
								window.location.replace("listarpessoas.php");
						</SCRIPT>';*/
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con);
				echo '<a href="../Visualizacao/menu.php"> MENU </a>';
			}
		}

	}
?>
