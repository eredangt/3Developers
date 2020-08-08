<?php
	// Persistence
	include_once('../Modelo/Treino.php');
	class TreinoDAO{

		public function __construct(){}

		public function addTreino($treino, $con){

            $sql = "INSERT INTO Treino(Cliente_Pessoa_idPessoa, Funcionario_Pessoa_idPessoa, Equipamento_idEquipamento, Tipo_treino, serie, repeticoes, peso)
                    VALUES('".$treino->getTreinoIdPessoa()."','".$treino->getTreinoIdFuncionario()."','".$treino->getTreinoIdEquipamento()."',
                    '".$treino->getTipo()."','".$treino->getSerie()."','".$treino->getRepeticoes()."','".$treino->getPeso()."');";

            echo $sql . '<br>';
            $resultadoT = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($resultadoT == true){
                //echo 'Treino cadastrado.';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Treino cadastrado com sucesso");
								window.location.replace("../Visualizacao/listartreinos.php");
						</SCRIPT>';
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
				//echo 'Treino alterado com sucesso';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Treino alterado com sucesso");
								window.location.replace("../Visualizacao/listartreinos.php");
						</SCRIPT>';
			}else{
				echo '<script>alert("Problema ao alterar Treino no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
			}
		}

		public function selecionarPessoa($codigo, $conexao, $tabela) {
			$sqlP = "SELECT A.Pessoa_idPessoa, P.nome, P.CPF FROM ".$tabela." AS A, Pessoa AS P WHERE A.Pessoa_idPessoa=P.idPessoa";

			$sqlT = "SELECT '.$tabela.'_Pessoa_idPessoa FROM Treino WHERE idTreino='.$codigo.';";

			$tabelaP = mysqli_query($conexao,$sqlP) or die(mysqli_error($conexao));

			$tabelaT = mysqli_query($conexao,$sqlT) or die(mysqli_error($conexao));

			while($linhaT=mysqli_fetch_row($tabelaT)){
				$meuIdPessoa = $linhaT[0];
			}

			while($linhaP=mysqli_fetch_row($tabelaP)){
				if ($meuIdPessoa == $linhaP[0]){
					echo '<option value="'.htmlentities($linhaP[0]).' selected >'.htmlentities($linhaP[2]).' - '.htmlentities($linhaP[1]).'</option>';
				}
				echo '<option value="'.htmlentities($linhaP[0]).'">'.htmlentities($linhaP[2]).' - '.htmlentities($linhaP[1]).'</option>';
			}
		}

		// PEGA VALOR SETADO NO BD PRO SELECT
		public function pegaIdPessoa($codigo, $conexao, $tabela){
			if($tabela == 'Instrutor'){
				$sqlE = "SELECT Funcionario_Pessoa_idPessoa FROM Treino WHERE idTreino=".$codigo."";
			}else{
				$sqlE = "SELECT Cliente_Pessoa_idPessoa FROM Treino WHERE idTreino=".$codigo."";
			}

			// Pego o id cliente do treino passado
			//$sqlE = "SELECT ".$tabela."_Pessoa_idPessoa FROM Treino WHERE idTreino='".$codigo."';";
			$tabelaP = mysqli_query($conexao,$sqlE) or die(mysqli_error($conexao));

			while($linhaS=mysqli_fetch_row($tabelaP)){
				$meuId = $linhaS[0];
			}

			$sqlZ = "SELECT C.Pessoa_idPessoa, P.nome, P.CPF, P.idPessoa FROM ".$tabela." as C, Pessoa as P WHERE
			C.Pessoa_idPessoa=P.idPessoa";

			$tabelaZ = mysqli_query($conexao,$sqlZ) or die(mysqli_error($conexao));
			while($linhaZ=mysqli_fetch_row($tabelaZ)){
					if(isset($meuId) && $meuId == $linhaZ[0]){
						echo '<option value='.$linhaZ[0].' selected >'.$linhaZ[2].' - '.$linhaZ[1].'ID: '.$linhaZ[0].'</option>';
					}else{
						echo '<option value='.$linhaZ[0].' >'.$linhaZ[2].' - '.$linhaZ[1].'ID: '.$linhaZ[0].'</option>';
					}
				}

		}

		public function selecionarIdPessoa($conexao, $tabela){
			$sqlZ = "SELECT C.Pessoa_idPessoa, P.nome, P.CPF, P.idPessoa FROM ".$tabela." as C, Pessoa as P WHERE
			C.Pessoa_idPessoa=P.idPessoa";

			$tabelaZ = mysqli_query($conexao,$sqlZ) or die(mysqli_error($conexao));
			while($linhaZ=mysqli_fetch_row($tabelaZ)){
				echo '<option value='.$linhaZ[0].' >'.$linhaZ[2].' - '.$linhaZ[1].'</option>';
			}
		}

		public function selecionarIdEquipamento($conexao) {
			$sqlE = "SELECT idEquipamento, Nome FROM Equipamento";

			$tabelaE = mysqli_query($conexao,$sqlE) or die(mysqli_error($conexao));

			while($linhaE=mysqli_fetch_row($tabelaE)){
				echo '<option value="'.htmlentities($linhaE[0]).'">'.htmlentities($linhaE[0]).' - '.htmlentities($linhaE[1]).'</option>';
			}
		}

		//rever
		public function selecionarEquipamento($conexao, $codigo) {

			$sqlS = "SELECT Equipamento_idEquipamento FROM Treino WHERE idTreino=".$codigo.";";
			$tabelaS = mysqli_query($conexao,$sqlS) or die(mysqli_error($conexao));

			while($linhaS=mysqli_fetch_row($tabelaS)){
				$meuIdEquipamento = $linhaS[0];
			}

			$sqlE = "SELECT idEquipamento, Nome FROM Equipamento";
			$tabelaE = mysqli_query($conexao,$sqlE) or die(mysqli_error($conexao));

			while($linhaE=mysqli_fetch_row($tabelaE)){
				if ($meuIdEquipamento == $linhaE[0]){
					echo '<option value="'.htmlentities($linhaE[0]).' selected >'.htmlentities($linhaE[0]).' - '.htmlentities($linhaE[1]).'</option>';
				}
				echo '<option value="'.htmlentities($linhaE[0]).'">'.htmlentities($linhaE[0]).' - '.htmlentities($linhaE[1]).'</option>';
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
				//echo 'Excluído Treino';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Treino excluído com sucesso");
								window.location.replace("../Visualizacao/listartreinos.php");
						</SCRIPT>';
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con);
				echo '<a href="../Visualizacao/menu.php"> MENU </a>';
			}
		}

		public function listarTreinos($conexao){
			//, T.Funcionario_Pessoa_idPessoa=P.idPessoa'


			$sql = 'SELECT T.Cliente_Pessoa_idPessoa, P.idPessoa, P.nome, T.Funcionario_Pessoa_idPessoa, T.Tipo_treino, T.Serie, T.Repeticoes,
			T.Peso, T.idTreino FROM Treino as T, Pessoa as P WHERE T.Cliente_Pessoa_idPessoa=P.idPessoa';
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha=mysqli_fetch_row($tabela)){

				echo '<tr>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[2]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[2]).'</h5></td>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[4]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[5]).'</h5></td>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[6]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[7]).'</h5></td>
						<td class="hover-dp ts-meta"><h5><center><a href="../Visualizacao/alterartreino.php?codigo='.$linha[8].'"><b>&#9997;</b></a></h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5><center><a href="phpExcluirTreino.php?codigo='.$linha[8].'"><b>&#10006;</b></a></h5></td>
					</tr>';
			}
		}

		public function pegaTipo($codigo, $conexao){
			$sql = "SELECT Tipo_treino FROM Treino WHERE idTreino = '".$codigo."';";
			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
			$tipo = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$tipo = $linha[0];
			}
			return $tipo;
		}

		public function pegaSeries($codigo, $conexao) {
			$sqlS = "SELECT Serie FROM Treino WHERE idTreino=".$codigo.";";

			$tabela = mysqli_query($conexao, $sqlS) or die(mysqli_error($conexao));
			$serie = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$serie = $linha[0];
			}

			echo $serie;
		}

		public function pegaRepeticoes($codigo, $conexao) {
			$sqlR = "SELECT Repeticoes FROM Treino WHERE idTreino=".$codigo.";";

			$tabela = mysqli_query($conexao, $sqlR) or die(mysqli_error($conexao));
			$rep = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$rep = $linha[0];
			}

			echo $rep;
		}

		public function pegaPeso($codigo, $conexao) {
			$sqlP = "SELECT Peso FROM Treino WHERE idTreino=".$codigo.";";

			$tabela = mysqli_query($conexao, $sqlP) or die(mysqli_error($conexao));
			$peso = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$peso = $linha[0];
			}

			echo $peso;
		}

	}
?>
