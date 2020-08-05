<?php
	// Persistence
	include_once('../Modelo/Treino.php');
	class TreinoDAO{

		public function __construct(){}

		public function addTreino($treino, $con){
			/*$COD_Func = '';
			$COD_Equipamento = '';

			$valorCapturado = $treino->getTreinoIdFuncionario();
			$sql = "SELECT * FROM Pessoa WHERE Tipo_cargo = 'I' AND idPessoa = '".$valorCapturado."';";
			$tabela = mysqli_query($con,$sql) or die(mysqli_error($con));

			while($linha = mysqli_fetch_row($tabela)){
				$COD_Func = $linha[0];
			}


			echo $sql;
			echo ' . ';
			echo 'oi' . $valorCapturado;*/

            $sql = "INSERT INTO Treino(Cliente_Pessoa_idPessoa, Funcionario_Pessoa_idPessoa, Equipamento_idEquipamento, Tipo_treino, serie, repeticoes, peso)
                    VALUES('".$treino->getTreinoIdPessoa()."','".$treino->getTreinoIdFuncionario()."','".$treino->getTreinoIdEquipamento()."',
                    '".$treino->getTipo()."','".$treino->getSerie()."','".$treino->getRepeticoes()."','".$treino->getPeso()."');";

            echo $sql . '<br>';
            $resultadoT = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($resultadoT == true){
                echo 'Treino cadastrado.';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($con);
            }
        }

        public function atualizarTreino($idPessoaA, $idFuncionarioA, $idEquipamentoA, $tipoA, $serieA, $repeticoesA, $pesoA, $codigo, $con){
			$sql = "UPDATE Treino SET Cliente_Pessoa_idPessoa = '".$idPessoaA."',
									  Funcionario_Pessoa_idPessoa = '".$idFuncionarioA."',
									  Equipamento_idEquipamento = '".$idEquipamentoA."',
									  Tipo_treino = '".$tipoA."',
									  serie = '".$serieA."',
									  repeticoes = '".$repeticoesA."',
									  peso = '".$pesoA."'
					WHERE idTreino = '".$codigo."';
			";
			$resultadoT = mysqli_query($con,$sql) or die(mysqli_error($con));
			// VERIFICA SE TUDO DEU CERTO
			if ($resultadoT == true){
				echo 'Treino alterado com sucesso';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Treino alterado com sucesso!");
							window.location.replace("menu.php");
					</SCRIPT>';  */
			}else{
				echo '<script>alert("Problema ao alterar Treino no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
			}
		}

		public function excluirTreino($codigo, $con){
			//criar a string sql que exclui o usuario do banco de dados
			$sql = "DELETE FROM Treino WHERE idTreino=".$codigo.";";

			//executa o comando DELETE no banco de dados para o usuario que tem
			//aquele codigo especifico
			$resultadoT = mysqli_query($con, $sql) or die(mysqli_error($con));

			//avaliando o resultado
			if ($resultadoT == true){
				echo 'Excluído Treino';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Treino excluído com sucesso");
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
