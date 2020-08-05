<?php
	// Persistence
	include_once('../Modelo/Equipamento.php');
	class EquipamentoDAO{

		public function __construct(){}
		
		public function addEquipamento($equipamento, $con){
            $sql = "INSERT INTO Equipamento(nome, quantidade, marca, ano)
                    VALUES('".$equipamento->getNomeEquipamento()."','".$equipamento->getQuantidade()."','".$equipamento->getMarca()."','".$equipamento->getAno()."');";
            
            echo $sql;
            $resultadoE = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($resultadoE == true){
                echo 'Equipamento cadastrado.';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($con);
            }
        }
        
        public function atualizarEquipamento($nomeEquipamento, $qtdEquipamento, $marcaEquipamento, $anoEquipamento, $codigo, $con){
			$sql = "UPDATE Equipamento SET nome = '".$nomeEquipamento."',
									 quantidade = '".$qtdEquipamento."',
									 marca = '".$marcaEquipamento."',
									 ano = '".$anoEquipamento."'
					WHERE idEquipamento = '".$codigo."';
			";
			$resultadoE = mysqli_query($con,$sql) or die(mysqli_error($con));
			// VERIFICA SE TUDO DEU CERTO
			if ($resultadoE == true){
				echo 'Equipamento alterado com sucesso';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Equipamento alterado com sucesso!");
							window.location.replace("menu.php");
					</SCRIPT>';  */     
			}else{
				echo '<script>alert("Problema ao alterar Equipamento no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con).'<br>';
				echo '<a href="menu.php"> VOLTAR </a>';
			}
		}
		
		public function excluirEquipamento($codigo, $con){
			//criar a string sql que exclui o usuario do banco de dados
			$sql = "DELETE FROM Equipamento WHERE idEquipamento=".$codigo.";";

			//executa o comando DELETE no banco de dados para o usuario que tem
			//aquele codigo especifico
			$resultadoE = mysqli_query($con, $sql) or die(mysqli_error($con));

			//avaliando o resultado
			if ($resultadoE == true){
				echo 'Excluído o Equipamento';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Equipamento excluído com sucesso");
								window.location.replace("listarpessoas.php");
						</SCRIPT>';*/
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con);
				echo '<a href="menu.php"> MENU </a>';
			}
		}
        
	}
?>
