<?php
	include_once('../Modelo/Treino.php');
	class TreinoDAO{

		public function __construct(){}

		public function addTreino($treino, $conexao){

            $sql = "INSERT INTO Treino(Cliente_Pessoa_idPessoa, Funcionario_Pessoa_idPessoa, Equipamento_idEquipamento, Tipo_treino, serie, repeticoes, peso)
                    VALUES('".$treino->getTreinoIdPessoa()."','".$treino->getTreinoIdFuncionario()."','".$treino->getTreinoIdEquipamento()."',
                    '".$treino->getTipo()."','".$treino->getSerie()."','".$treino->getRepeticoes()."','".$treino->getPeso()."');";

            $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
            if($resultado == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Treino cadastrado com sucesso");
								window.location.replace("../Visualizacao/listartreinos.php");
						</SCRIPT>';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($conexao);
            }
        }

        public function atualizarTreino($conexao, $codigo, $idPessoaA, $idFuncionarioA, $idEquipamentoA, $tipoA, $serieA, $repeticoesA, $pesoA){
			$sql = "UPDATE Treino SET Cliente_Pessoa_idPessoa = '".$idPessoaA."',
									  Funcionario_Pessoa_idPessoa = '".$idFuncionarioA."',
									  Equipamento_idEquipamento = '".$idEquipamentoA."',
									  Tipo_treino = '".$tipoA."', serie = '".$serieA."',
									  repeticoes = '".$repeticoesA."', peso = '".$pesoA."'
					WHERE idTreino = '".$codigo."';";

			$resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			// VERIFICA SE TUDO DEU CERTO
			if ($resultado == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Treino alterado com sucesso");
								window.location.replace("../Visualizacao/listartreinos.php");
						</SCRIPT>';
			}else{
				echo '<script>alert("Problema ao alterar Treino no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
			}
		}

		public function selecionarPessoa($conexao, $codigo, $tabelaBD) {
			$sql = "SELECT '.$tabelaBD.'_Pessoa_idPessoa FROM Treino WHERE idTreino='.$codigo.';";

			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha = mysqli_fetch_row($tabela)){
				$meuIdPessoa = $linha[0];
			}

			$sql = "SELECT A.Pessoa_idPessoa, P.nome, P.CPF FROM ".$tabelaBD." AS A, Pessoa AS P WHERE A.Pessoa_idPessoa=P.idPessoa";

			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha = mysqli_fetch_row($tabela)){
				if ($meuIdPessoa == $linha[0]){
					echo '<option value="'.htmlentities($linha[0]).' selected >'.htmlentities($linha[2]).' - '.htmlentities($linha[1]).'</option>';
				}
				echo '<option value="'.htmlentities($linha[0]).'">'.htmlentities($linha[2]).' - '.htmlentities($linha[1]).'</option>';
			}
		}

		// PEGA VALOR SETADO NO BD PRO SELECT
		public function pegaIdPessoa($conexao, $codigo, $tabelaBD){
			if($tabelaBD == 'Instrutor'){
				$sql = "SELECT Funcionario_Pessoa_idPessoa FROM Treino WHERE idTreino=".$codigo."";
			}else{
				$sql = "SELECT Cliente_Pessoa_idPessoa FROM Treino WHERE idTreino=".$codigo."";
			}

			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha = mysqli_fetch_row($tabela)){
				$meuId = $linha[0];
			}

			$sql = "SELECT C.Pessoa_idPessoa, P.nome, P.CPF, P.idPessoa FROM ".$tabelaBD." as C, Pessoa as P WHERE
			C.Pessoa_idPessoa=P.idPessoa";

			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			while($linha = mysqli_fetch_row($tabela)){
					if($meuId == $linha[0]){
						echo '<option value='.$linha[0].' selected >'.$linha[2].' - '.$linha[1].'ID: '.$linha[0].'</option>';
					}else{
						echo '<option value='.$linha[0].' >'.$linha[2].' - '.$linha[1].'ID: '.$linha[0].'</option>';
					}
				}

		}

		public function selecionarIdPessoa($conexao, $tabelaBD){
			$sql = "SELECT C.Pessoa_idPessoa, P.nome, P.CPF, P.idPessoa FROM ".$tabelaBD." as C, Pessoa as P WHERE
			C.Pessoa_idPessoa=P.idPessoa";

			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha = mysqli_fetch_row($tabela)){
				echo '<option value='.$linha[0].' >'.$linha[2].' - '.$linha[1].'</option>';
			}
		}

		public function selecionarIdEquipamento($conexao) {
			$sql = "SELECT idEquipamento, Nome FROM Equipamento";

			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha=mysqli_fetch_row($tabela)){
				echo '<option value="'.htmlentities($linha[0]).'">'.htmlentities($linha[0]).' - '.htmlentities($linha[1]).'</option>';
			}
		}

		//rever
		public function selecionarEquipamento($conexao, $codigo) {

			$sql = "SELECT Equipamento_idEquipamento FROM Treino WHERE idTreino=".$codigo.";";
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha=mysqli_fetch_row($tabela)){
				$meuIdEquipamento = $linha[0];
			}

			$sql = "SELECT idEquipamento, Nome FROM Equipamento";

			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha=mysqli_fetch_row($tabela)){
				if ($meuIdEquipamento == $linha[0]){
					echo '<option value="'.htmlentities($linha[0]).' selected >'.htmlentities($linha[0]).' - '.htmlentities($linha[1]).'</option>';
				}
				echo '<option value="'.htmlentities($linha[0]).'">'.htmlentities($linha[0]).' - '.htmlentities($linha[1]).'</option>';
			}
		}



		public function excluirTreino($conexao, $codigo){
			//criar a string sql que exclui o usuario do banco de dados
			$sql = "DELETE FROM Treino WHERE idTreino=".$codigo.";";

			//executa o comando DELETE no banco de dados para o usuario que tem
			//aquele codigo especifico
			$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			//avaliando o resultado
			if ($resultado == true){
				//echo 'Excluído Treino';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Treino excluído com sucesso");
								window.location.replace("../Visualizacao/listartreinos.php");
						</SCRIPT>';
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao);
				echo '<a href="../Visualizacao/menu.php"> MENU </a>';
			}
		}

		public function nomeInstrutor($conexao, $codFunc){
			$sql = "SELECT Pessoa_idPessoa, nome FROM Instrutor";
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			$nomeFunc='';
			while($linha = mysqli_fetch_row($tabela)){
				if($linha[0] == $codFunc){
					$nomeFunc = $linha[1];
				}
			}
			return $nomeFunc;
		}

		public function listarTreinos($conexao){
			/*
			CREATE VIEW instrutorXtreino AS
SELECT T.Funcionario_Pessoa_idPessoa, P.nome FROM Pessoa as P, Treino as T WHERE T.Funcionario_Pessoa_idPessoa=P.idPessoa GROUP BY P.idPessoa;
			*/

			$sql = 'SELECT T.Cliente_Pessoa_idPessoa, P.idPessoa, P.nome, T.Funcionario_Pessoa_idPessoa, T.Tipo_treino, T.Serie, T.Repeticoes,
			T.Peso, T.idTreino FROM Treino as T, Pessoa as P WHERE T.Cliente_Pessoa_idPessoa=P.idPessoa';
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			$mensagem = "'Tem certeza que deseja excluir este Treino?'";
			while($linha = mysqli_fetch_row($tabela)){
				$resultado = $this->nomeInstrutor($conexao, $linha[3]);
				echo '<tr>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[2]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($resultado).'</h5></td>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[4]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[5]).'</h5></td>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[6]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[7]).'</h5></td>
						<td class="hover-dp ts-meta"><h5><center><a href="../Visualizacao/alterartreino.php?codigo='.$linha[8].'"><b>&#9997;</b></a></h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5><center><a href="../Controle/phpExcluirTreino.php?codigo='.$linha[8].'" onclick="return confirm('.$mensagem.')" ><b>&#10006;</b></a></h5></td>
					</tr>';
			}
		}

		public function pegaTipo($conexao, $codigo){
			$sql = "SELECT Tipo_treino FROM Treino WHERE idTreino = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$tipo = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$tipo = $linha[0];
			}
			return $tipo;
		}

		public function pegaSeries($conexao, $codigo) {
			$sql = "SELECT Serie FROM Treino WHERE idTreino=".$codigo.";";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$serie = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$serie = $linha[0];
			}

			echo $serie;
		}

		public function pegaRepeticoes($conexao, $codigo) {
			$sql = "SELECT Repeticoes FROM Treino WHERE idTreino=".$codigo.";";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$repeticoes = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$repeticoes = $linha[0];
			}

			echo $repeticoes;
		}

		public function pegaPeso($conexao, $codigo) {
			$sql = "SELECT Peso FROM Treino WHERE idTreino=".$codigo.";";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$peso = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$peso = $linha[0];
			}

			echo $peso;
		}

	}
?>
