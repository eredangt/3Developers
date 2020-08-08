<?php
	// Persistence
	include_once('../Modelo/Plano.php');
	class PlanoDAO{

		public function __construct(){}

		public function imprimePlanos($conexao){
			$sql = 'SELECT * FROM Plano ORDER BY numMeses';
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha = mysqli_fetch_row($tabela)){
				echo '<div class="col-lg-4 col-md-8">
							<div class="ps-item">
							<h3>'.htmlentities($linha[1]).'</h3>
							<div class="pi-price">
								<span>'.htmlentities($linha[2]).'x</span>
								<h2>R$ '.htmlentities($linha[3]).'</h2>
							</div>';
					if($linha[2] >= 1 and $linha[2] <= 5){
						echo '<ul>
								<li>Utilização do espaço para treino.</li>
								<li>Acesso a todas as aulas.</li>
								<li>Personal trainer.</li>
							</ul>
						</div>
						</div>';

					}else if($linha[2] >= 6 and $linha[2] <= 10){
						echo '<ul>
								<li>Utilização do espaço para treino.</li>
								<li>Acesso a todas as aulas.</li>
								<li>Personal trainer.</li>
								<li>Duas avaliações físicas.</li>
							</ul>
							</div>
                        </div>';
					}else if($linha[2] >= 11){
							echo '<ul>
									<li>Utilização do espaço para treino.</li>
									<li>Acesso a todas as aulas.</li>
									<li>Personal trainer.</li>
									<li>Quatro avaliações físicas.</li>
									<li>Nutricionista a cada 3 meses.</li>
									<li>Kit Gym Life.</li>
								</ul>
							</div>
						</div>';
					}
			}
		}

		public function listarPlanos($conexao){
			$sql = 'SELECT * FROM Plano';
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha = mysqli_fetch_row($tabela)){
				if($linha[0]%2 == 0){
					echo '<tr>
							<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[1]).'</h5></td>
							<td class="dark-bg hover-dp ts-meta"><h5>'.$linha[2].'</h5></td>
							<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[3]).'</h5></td>
							<td class="dark-bg hover-dp ts-meta"><h5><center><a href="alterarplano.php?codigo='.$linha[0].'"><b>&#9997;</b></a></h5></td>
							<td class="hover-dp ts-meta"><h5><center><a href="phpExcluirPlano.php?codigo='.$linha[0].'"><b>&#10006;</b></a></h5></td>
						</tr>';
				}else{
						echo '<tr>
							<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[1]).'</h5></td>
							<td class="hover-dp ts-meta" ><h5>'.$linha[2].'</h5></td>
							<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[3]).'</h5></td>
							<td class="hover-dp ts-meta"><h5><center><a href="alterarplano.php?codigo='.$linha[0].'"><b>&#9997;</b></a></h5></td>
							<td class="dark-bg hover-dp ts-meta"><h5><center><a href="../Controle/phpExcluirPlano.php?codigo='.$linha[0].'"><b>&#10006;</b></a></h5></td>
						</tr>';

				}
			}
		}

		public function pegaNomePlano($codigo, $conexao){
			$sql = "SELECT nome FROM Plano WHERE idPlano = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$meuNome = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$meuNome = $linha[0];
			}
			echo $meuNome;
		}

		public function pegaNumMeses($codigo, $conexao){
			$sql = "SELECT numMeses FROM Plano WHERE idPlano = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$numMeses = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$numMeses = $linha[0];
			}
			echo $numMeses;
		}

		public function pegaValor($codigo, $conexao){
			$sql = "SELECT valor FROM Plano WHERE idPlano = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$valorPlano = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$valorPlano = $linha[0];
			}
			echo $valorPlano;
		}

		public function addPlano($plano, $con){
            $sql = "INSERT INTO Plano(nome, numMeses, valor)
                    VALUES('".$plano->getNomePlano()."','".$plano->getNumMeses()."','".$plano->getValor()."');";

            $resultado = mysqli_query($con,$sql) or die(mysqli_error($con));

            if($resultado == true){
                //echo 'Plano cadastrado.';
                echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Plano cadastrado com sucesso!");
							window.location.replace("../Visualizacao/listarplanos.php");
					</SCRIPT>';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($con);
            }
        }

        public function atualizarPlano($nomePlano, $qtdMeses, $valorPlano, $codigo, $con){
			$sql = "UPDATE Plano SET nome = '".$nomePlano."', numMeses = '".$qtdMeses."',
					valor = '".$valorPlano."' WHERE idPlano = '".$codigo."';";
					
			$resultado = mysqli_query($con,$sql) or die(mysqli_error($con));

			// VERIFICA SE TUDO DEU CERTO
			if ($resultado == true){
				//echo 'Plano alterado com sucesso';
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Plano alterado com sucesso!");
							window.location.replace("../Visualizacao/listarplanos.php");
					</SCRIPT>';
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
				//echo 'Excluído o Plano';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Plano excluído com sucesso");
								window.location.replace("../Visualizacao/listarplanos.php");
						</SCRIPT>';
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con);
				echo '<a href="../Visualizacao/menu.php"> MENU </a>';
			}
		}

	}
?>
