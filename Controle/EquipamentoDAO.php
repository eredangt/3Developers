<?php
	// Persistence
	include_once('../Modelo/Equipamento.php');
	class EquipamentoDAO{

		public function __construct(){}
		
		public function pegaNomeEquip($codigo, $conexao){
			$sql = "SELECT nome FROM Equipamento WHERE idEquipamento = '".$codigo."';";
			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
			$meuNomeEquip = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$meuNomeEquip = $linha[0];
			}
			echo $meuNomeEquip;
		}
		
		public function pegaQtdEquip($codigo, $conexao){
			$sql = "SELECT quantidade FROM Equipamento WHERE idEquipamento = '".$codigo."';";
			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
			$qtd = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$qtd = $linha[0];
			}
			echo $qtd;
		}
		
		public function pegaMarca($codigo, $conexao){
			$sql = "SELECT marca FROM Equipamento WHERE idEquipamento = '".$codigo."';";
			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
			$marca = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$marca = $linha[0];
			}
			echo $marca;
		}
		
		public function pegaAno($codigo, $conexao){
			$sql = "SELECT ano FROM Equipamento WHERE idEquipamento = '".$codigo."';";
			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
			$ano = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$ano = $linha[0];
			}
			echo $ano;
		}
		
		public function listarEquipamentos($conexao){
			$sql = 'SELECT * FROM Equipamento ORDER BY Nome ASC';
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha=mysqli_fetch_row($tabela)){

				echo '<tr>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[1]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[0]).'</h5></td>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[2]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[3]).'</h5></td>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[4]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5><center><a href="../Visualizacao/alterarequipamento.php?codigo='.$linha[0].'"><b>&#9997;</b></a></h5></td>
						<td class="hover-dp ts-meta"><h5><center><a href="../Controle/phpExcluirEquipamento.php?codigo='.$linha[0].'"><b>&#10006;</b></a></h5></td>
					</tr>';
			}
		}
		
		public function addEquipamento($equipamento, $con){
            $sql = "INSERT INTO Equipamento(nome, quantidade, marca, ano)
                    VALUES('".$equipamento->getNomeEquipamento()."','".$equipamento->getQuantidade()."','".$equipamento->getMarca()."','".$equipamento->getAno()."');";
            
            echo $sql;
            $resultadoE = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($resultadoE == true){
                echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Equipamento cadastrado com sucesso!");
							window.location.replace("../Visualizacao/menu.php");
					</SCRIPT>'; 
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
				//echo 'Equipamento alterado com sucesso';
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Equipamento alterado com sucesso!");
							window.location.replace("../Visualizacao/menu.php");
					</SCRIPT>'; 
			}else{
				echo '<script>alert("Problema ao alterar Equipamento no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
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
				//echo 'Excluído o Equipamento';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Equipamento excluído com sucesso");
								window.location.replace("../Visualizacao/listarpessoas.php");
						</SCRIPT>';
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con);
				echo '<a href="../Visualizacao/menu.php"> MENU </a>';
			}
		}
        
	}
?>
