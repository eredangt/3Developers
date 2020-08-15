<?php
	include_once('../Persistencia/ConexaoBD.php');
	class PessoaDAO{

		public function __construct(){}

		public function pegaImagem($conexao, $codigo){
			$sql = "SELECT imagem FROM Instrutor WHERE Pessoa_idPessoa = '".$codigo."';";
			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
			$img = '';
			while ($linha = mysqli_fetch_row($tabela)) {
				$img = $linha[0];
			}
			echo $img;
		}

		public function pegaCH($conexao, $codigo){
			$sql = "SELECT carga_horaria FROM Instrutor WHERE Pessoa_idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$ch = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$ch = $linha[0];
			}
			echo $ch;
		}

		public function pegaSalario($conexao, $codigo){
			$sql = "SELECT salario FROM Instrutor WHERE Pessoa_idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$salario = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$salario = $linha[0];
			}
			echo $salario;
		}

		public function pegaCargo($conexao, $codigo){
			$sql = "SELECT Tipo_cargo FROM Pessoa WHERE idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$cargo = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$cargo = $linha[0];
			}
			return $cargo;
		}

		public function pegaSenha($conexao, $codigo){
			$sql = "SELECT senha FROM Pessoa WHERE idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$senha = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$senha = $linha[0];
			}
			echo $senha;
		}

		public function pegaEmail($conexao, $codigo){
			$sql = "SELECT E_MAIL FROM Pessoa WHERE idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$email = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$email = $linha[0];
			}
			echo $email;
		}

		public function pegaDataNasc($conexao, $codigo){
			$sql = "SELECT Data_nascimento FROM Pessoa WHERE idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$data = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$data = $linha[0];
			}
			echo $data;
		}

		public function pegaNumTelefone($conexao, $codigo){
			$sql = "SELECT Telefone FROM Pessoa WHERE idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$tel = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$tel = $linha[0];
			}
			echo $tel;
		}

		public function pegaNome($conexao, $codigo){
			$sql = "SELECT Nome FROM Pessoa WHERE idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$nome = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$nome = $linha[0];
			}
			echo $nome;
		}

		public function pegaCPF($conexao, $codigo){
			$sql = "SELECT CPF FROM Pessoa WHERE idPessoa = '".$codigo."';";

			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			$cpf = '';

			while ($linha = mysqli_fetch_row($tabela)) {
				$cpf = $linha[0];
			}
			echo $cpf;
		}

		public function instrutorFoto($conexao, $codigo){
			$img = '';
			$nome = '';
			$cargo = '';

			$sql = 'SELECT P.nome, I.imagem, P.Tipo_cargo FROM Pessoa as P, Instrutor as I WHERE I.Pessoa_idPessoa = P.idPessoa AND P.idPessoa = '.$codigo.';';
			$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			while ($linha = mysqli_fetch_row($tabela)) {
				$nome = $linha[0];
				$img = $linha[1];
				$cargo = $linha[2];
			}
			if($cargo == 'I'){
				echo '<span id="spanSpecial">FOTO DO(A) INSTRUTOR(A) '.$nome.'</span>
					<div class="ci-pic">
						<img src="'.$img.'"></img>
					</div>
					<small class="smallCadastro">ARQUIVO: '.$img.'</small>';
			}

		}

		public function selecionarPlano($conexao, $codigo) {
			$sqlA = 'SELECT Plano_idPlano FROM Cliente WHERE Pessoa_idPessoa="'.$codigo.'";';

			$tabelaA = mysqli_query($conexao,$sqlA) or die(mysqli_error($conexao));

			while($linhaA = mysqli_fetch_row($tabelaA)){
				$meuPlano = $linhaA[0];
			}

			$sqlP = 'SELECT * FROM Plano';

			$tabelaP = mysqli_query($conexao,$sqlP) or die(mysqli_error($conexao));

			while($linhaP = mysqli_fetch_row($tabelaP)){
					if(isset($meuPlano) && $meuPlano == $linhaP[0]){
						//echo "<option value='".$linhaP[0]."' ".$selected.">".$linhaP[1]."</option>";
						echo '<option value='.$linhaP[0].' selected >'.$linhaP[1].'</option>';
					}else{
						echo '<option value='.$linhaP[0].' >'.$linhaP[1].'</option>';
					}
				}
		}

		public function listarPessoas($conexao){
			$sql = 'SELECT * FROM Pessoa ORDER BY Nome ASC';

			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			$mensagem = "'Tem certeza que deseja excluir esta Pessoa?'";
			while($linha = mysqli_fetch_row($tabela)){
				if($linha[7]=='C'){
					$cargo = 'Cliente';
				}else{
					$cargo = 'Instrutor';
				}

				echo '<tr>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[2]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.$cargo.'</h5></td>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[1]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[3]).'</h5></td>
						<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[4]).'</h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[5]).'</h5></td>
						<td class="hover-dp ts-meta"><h5><center><a href="alterarpessoa.php?codigo='.$linha[0].'"><b>&#9997;</b></a></h5></td>
						<td class="dark-bg hover-dp ts-meta"><h5><center><a href="../Controle/phpExcluirPessoa.php?codigo='.$linha[0].'" onclick="return confirm('.$mensagem.')"><b>&#10006;</b></a></h5></td>
					</tr>';
			}
		}

		public function implementaRestricao(){

			if(!isset($_SESSION['login'])){
				echo '<SCRIPT type="text/javascript"> //not showing me this
	                            alert("Logue para acessar esta página!");
	                            window.location.replace("../Visualizacao/entrar.php");
	                 </SCRIPT>';
			}
			if(($_SESSION['cargo'] == 'aluno')){
				echo '<SCRIPT type="text/javascript"> //not showing me this
	                            alert("Você não tem permissão para entrar aqui.");
	                            window.location.replace("../Visualizacao/menu.php");
				  </SCRIPT>';
			}
		}

		public function implementaRestricaoLogar(){
			if(!isset($_SESSION['login'])){
				echo '<SCRIPT type="text/javascript"> //not showing me this
	                            alert("Logue para acessar esta página!");
	                            window.location.replace("../Visualizacao/entrar.php");
	                 </SCRIPT>';
			}

		}

		public function implementaRestricaoDeslogar(){
			if(isset($_SESSION['login'])){
				echo '<SCRIPT type="text/javascript"> //not showing me this
	                            alert("Deslogue para acessar esta página!");
	                            window.location.replace("../Visualizacao/menu.php");
	                 </SCRIPT>';
			}
		}


		public function implementaLogOut(){
			if(isset($_SESSION['login'])){
				echo '<a href="../Controle/logout.php">Log Out</a>';
			}
		}

		public function implementaRodape(){
			if (!isset($_SESSION['login'])) {
				echo '<li><a href="../Visualizacao/entrar.php">Login</a></li>';
			}
			else {
				echo '<li><a href="../Visualizacao/menu.php">Menu</a></li>';
			}
		}

		public function implementaBotao(){
			if (!isset($_SESSION['login'])) {
				echo '<a href="../Visualizacao/entrar.php" class="primary-btn">Login</a>';
			}
			else {
				echo '<a href="../Visualizacao/menu.php" class="primary-btn">Acesse o Menu</a>';
			}
		}

		public function implementaMenu($pagina){
			if ($pagina == 'inicio') {
				echo '<li class="active"><a href="../Visualizacao/index.php">Início</a></li>';
			}
			else {
				echo '<li><a href="../Visualizacao/index.php">Início</a></li>';
			}
			if ($pagina == 'sobre') {
				echo '<li class="active"><a href="../Visualizacao/about-us.php">Sobre nós</a></li>';
			}
			else {
				echo '<li><a href="../Visualizacao/about-us.php">Sobre nós</a></li>';
			}
			if ($pagina == 'aulas') {
				echo '<li class="active"><a href="../Visualizacao/aulas.php">Aulas</a></li>';
			}
			else {
				echo '<li><a href="../Visualizacao/aulas.php">Aulas</a></li>';
			}
			if ($pagina == 'modalidades') {
				echo '<li class="active"><a href="../Visualizacao/modalidades.php">Modalidades</a></li>';
			}
			else {
				echo '<li><a href="../Visualizacao/modalidades.php">Modalidades</a></li>';
			}
			if ($pagina == 'equipe') {
				echo '<li class="active"><a href="../Visualizacao/team.php">Nossa equipe</a></li>';
			}
			else {
				echo '<li><a href="../Visualizacao/team.php">Nossa equipe</a></li>';
			}
			if ($pagina == 'imc') {
				echo '<li class="active"><a href="../Visualizacao/imc.php">IMC</a></li>';
			}
			else {
				echo '<li><a href="../Visualizacao/imc.php">IMC</a></li>';
			}
			if (!(isset($_SESSION['login'])) && $pagina == 'login') {
				echo '<li class="active"><a href="../Visualizacao/entrar.php">Login</a></li>';
			}
			else if (!(isset($_SESSION['login'])) && $pagina != 'login') {
				echo '<li><a href="../Visualizacao/entrar.php">Login</a></li>';
			}
			else if (isset($_SESSION['login']) && $pagina == 'menu') {
				echo '<li class="active"><a href="../Visualizacao/menu.php">Menu</a></li>';
			}
			else if (isset($_SESSION['login']) && $pagina != 'menu') {
				echo '<li><a href="../Visualizacao/menu.php">Menu</a></li>';
			}
			if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'instrutor') {
				if ($pagina == 'cadastrar'){
					echo '<li class="active"><a href="../Visualizacao/cadastrar.php">Cadastrar</a>';
				}
				else {
					echo '<li><a href="../Visualizacao/cadastrar.php">Cadastrar</a>';
				}
				echo '<ul class="dropdown">
						<li><a href="../Visualizacao/cadastrarpessoa.php">Pessoa</a></li>
						<li><a href="../Visualizacao/cadastrartreino.php">Treino</a></li>
						<li><a href="../Visualizacao/cadastrarequipamento.php">Equipamento</a></li>
						<li><a href="../Visualizacao/cadastrarplano.php">Plano</a></li>
						</ul>
					</li>';
				if($pagina == 'listar'){
					echo '<li class="active"><a href="../Visualizacao/listar.php">Listar</a>';
				}
				else {
					echo '<li><a href="../Visualizacao/listar.php">Listar</a>';
				}
				echo '<ul class="dropdown">
						<li><a href="../Visualizacao/listarpessoas.php">Pessoas</a></li>
							<li><a href="../Visualizacao/listartreinos.php">Treinos</a></li>
							<li><a href="../Visualizacao/listarequipamentos.php">Equipamentos</a></li>
							<li><a href="../Visualizacao/listarplanos.php">Planos</a></li>
						</ul>
					</li>';
			}
		}

		public function minhaEquipe($conexao){
			$sql = "SELECT P.nome, I.imagem FROM Pessoa as P, Instrutor as I
							WHERE P.idPessoa = I.Pessoa_idPessoa ORDER BY P.nome ASC";

					$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

					while ($linha = mysqli_fetch_row($tabela)) {
						echo '<div class="col-lg-4 col-sm-6">
									<div class="ts-item set-bg" data-setbg="' . $linha[1] .'">
									<div class="ts_text">
											<h4>'.$linha[0].'</h4>
											<span>Treinador</span>
										</div>
									</div>
								</div>';
					}
		}

		public function addPessoa($pessoa, $conexao){
			$sql = "INSERT INTO Pessoa(CPF,Nome,Telefone,E_MAIL, Data_nascimento, senha, Tipo_cargo)
			  VALUES('".$pessoa->getCPF()."','".$pessoa->getNome()."','".$pessoa->getTelefone()."','".$pessoa->getEmail()."','".$pessoa->getDataNascimento()."',
			  '".$pessoa->getSenha()."','".$pessoa->getCargo()."');";

			$resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			if($resultado == false){
				echo 'Algo ocorreu: ' . mysqli_error($conexao);
			}
		}

		public function atualizarPessoa($conexao, $codigo, $cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo){
			$sql = "UPDATE Pessoa SET 	CPF = '".$cpf."',
										Nome = '".$nome."',
										Telefone = '".$telefone."',
										E_MAIL = '".$email."',
										Data_nascimento = '".$dataNasc."',
										Senha = '".$senha."',
										Tipo_cargo = '".$cargo."'
					WHERE idPessoa = '".$codigo."';
			";
			$resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			if($resultado == false){
				echo 'Algo ocorreu: ' . mysqli_error($conexao);
			}
		}

		public function excluirPessoa($conexao, $codigo){
			//criar a string sql que exclui o usuario do banco de dados
			$sql = "DELETE FROM Pessoa WHERE idPessoa=".$codigo.";";

			//executa o comando DELETE no banco de dados para o usuario que tem
			//aquele codigo especifico
			$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

			//avaliando o resultado
			if ($resultado == true){
				//echo 'Excluída a Pessoa';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Pessoa excluída com sucesso!");
								window.location.replace("../Visualizacao/listarpessoas.php");
						</SCRIPT>';
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao);
				echo '<a href="../Visualizacao/menu.php"> MENU </a>';
			}
		}


	public function implementaFuncionalidadesUsuario($conexao){
		$mensagem = '';
		//if(isset($_SESSION['cargo'])){
			if((isset($_SESSION['login'])) && ($_SESSION['cargo'] == 'aluno')){
				$mensagem = '
						<div class="col-lg-12">
							<div class="section-title contact-title">
								<span>Bem-Vindo(a) aluno(a), '.$_SESSION['login'].'!</span>
								<h2>Encontre, aqui, tudo que precisa!</h2>
							</div>
						<!-- Class Timetable Section Begin -->
								<div class="container">
									<div class="row">
										<div class="col-lg-12">
											<div class="table-controls">
												<ul>
													<li class="active" data-tsfilter="all">TREINOS</li>
													<li data-tsfilter="a">TREINO A</li>
													<li data-tsfilter="b">TREINO B</li>
													<li data-tsfilter="c">TREINO C</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="row">
									  <div class="col-lg-12">
										<div class="box">
                							<div class="box-linha">
												<div class="box-celula">
													<div class="class-timetable">
														<table>
															<thead>
																<tr>
																	<th>Instrutor</th>
																	<th colspan="2">Treino A</th>
																</tr>
															</thead>
															<tbody>';
																$sql = "SELECT T.Cliente_Pessoa_idPessoa, T.Funcionario_Pessoa_idPessoa, P.idPessoa, P.nome, T.Equipamento_idEquipamento, E.idEquipamento,
																E.nome, T.Tipo_treino, T.Serie, T.Repeticoes, T.Peso FROM Treino AS T, Equipamento E, Pessoa AS P WHERE T.Equipamento_idEquipamento = E.idEquipamento AND
																T.Funcionario_Pessoa_idPessoa = P.idPessoa AND	T.Cliente_Pessoa_idPessoa = ".$_SESSION['codigo']." ORDER BY CASE WHEN T.Tipo_treino = 'A' THEN 'B' ELSE 'C' END";

																$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

																while ($linha = mysqli_fetch_row($tabela)) {
																	if($linha[7] == 'A'){
																		$mensagem.= '<tr>
																						<td class="class-time">'.$linha[3].'</td>
																						<td colspan = "2"class="dark-bg hover-bg ts-meta" data-tsmeta="a">
																							<h5>'.$linha[6].'</h5>
																							<span>S&eacute;rie: <b>'.$linha[8].'</b> <br> Repeti&ccedil;&otilde;es: <b>'.$linha[9].'</b> <br> Peso: <b>'.$linha[10].'Kg</b></span>
																						</td>
																					</tr>';
																	}
																}
																$mensagem.='
															</tbody>
														</table>
													</div>
												</div>
												<div class="box-celula">
													<div class="class-timetable">
														<table>
															<thead>
																<tr>
																	<th>Instrutor</th>
																	<th colspan="2">Treino B</th>
																</tr>
															</thead>
															<tbody>';
																//<tr>
																$sql = "SELECT T.Cliente_Pessoa_idPessoa, T.Funcionario_Pessoa_idPessoa, P.idPessoa, P.nome, T.Equipamento_idEquipamento, E.idEquipamento,
																E.nome, T.Tipo_treino, T.Serie, T.Repeticoes, T.Peso FROM Treino AS T, Equipamento E, Pessoa AS P WHERE T.Equipamento_idEquipamento = E.idEquipamento AND
																T.Funcionario_Pessoa_idPessoa = P.idPessoa AND	T.Cliente_Pessoa_idPessoa = ".$_SESSION['codigo']." ORDER BY CASE WHEN T.Tipo_treino = 'A' THEN 'B' ELSE 'C' END";

																$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

																while ($linha = mysqli_fetch_row($tabela)) {
																	if($linha[7] == 'B'){
																		$mensagem.= '<tr>
																						<td class="class-time">'.$linha[3].'</td>
																						<td colspan = "2"class="dark-bg hover-bg ts-meta" data-tsmeta="b">
																							<h5>'.$linha[6].'</h5>
																							<span>S&eacute;rie: <b>'.$linha[8].'</b> <br> Repeti&ccedil;&otilde;es: <b>'.$linha[9].'</b> <br> Peso: <b>'.$linha[10].'Kg</b></span>
																						</td>
																					</tr>';
																	}
																}
																$mensagem.='
															</tbody>
														</table>
													</div>
												</div>
												<div class="box-celula">
													<div class="class-timetable">
														<table>
															<thead>
																<tr>
																	<th>Instrutor</th>
																	<th colspan="2">Treino C</th>
																</tr>
															</thead>
															<tbody>';
																$sql = "SELECT T.Cliente_Pessoa_idPessoa, T.Funcionario_Pessoa_idPessoa, P.idPessoa, P.nome, T.Equipamento_idEquipamento, E.idEquipamento,
																E.nome, T.Tipo_treino, T.Serie, T.Repeticoes, T.Peso FROM Treino AS T, Equipamento E, Pessoa AS P WHERE T.Equipamento_idEquipamento = E.idEquipamento AND
																T.Funcionario_Pessoa_idPessoa = P.idPessoa AND	T.Cliente_Pessoa_idPessoa = ".$_SESSION['codigo']." ORDER BY CASE WHEN T.Tipo_treino = 'A' THEN 'B' ELSE 'C' END";

																$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

																while ($linha = mysqli_fetch_row($tabela)) {
																	if($linha[7] == 'C'){
																		$mensagem.= '<tr>
																						<td class="class-time">'.$linha[3].'</td>
																						<td colspan = "2"class="dark-bg hover-bg ts-meta" data-tsmeta="c">
																							<h5>'.$linha[6].'</h5>
																							<span>S&eacute;rie: <b>'.$linha[8].'</b> <br> Repeti&ccedil;&otilde;es: <b>'.$linha[9].'</b> <br> Peso: <b>'.$linha[10].'Kg</b></span>
																						</td>
																					</tr>';
																	}

																}
																$mensagem.='
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
							<!-- Class Timetable Section End -->
				';
			}else{
				$mensagem = '
							<div class="col-lg-6">
								<div class="section-title contact-title">
									<span>Bem-Vindo(a) instrutor(a), '.$_SESSION['login'].'!</span>
									<h2>Encontre, aqui, tudo que precisa!</h2>
								</div>
								<div class="contact-widget">
										<div class="cw-text">
											<a href="../Visualizacao/cadastrartreino.php"><i class="fa fa-calendar"></i>
											<p>Cadastrar Treino</p></a>
										</div>
										<div class="cw-text">
											<a href="../Visualizacao/cadastrarpessoa.php"><i class="fa fa-user-plus"></i>
											<p>Cadastrar Pessoa</p></a>
										</div>
										<div class="cw-text">
											<a href="../Visualizacao/cadastrarequipamento.php"><i class="fa fa-cogs"></i>
											<p>Cadastrar Equipamento</p></a>
										</div>
										<div class="cw-text">
											<a href="../Visualizacao/cadastrarplano.php"><i class="fa fa-tag"></i></i>
											<p>Cadastrar Plano</p></a>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="contact-widget">
										<br><br><br><br>
										<div class="cw-text">
											<a href="../Visualizacao/listartreinos.php"><i class="fa fa-calendar"></i>
											<p>Listar Treinos</p></a>
										</div>
										<div class="cw-text">
											<a href="../Visualizacao/listarpessoas.php"><i class="fa fa-user-plus"></i>
											<p>Listar Pessoas</p></a>
										</div>
										<div class="cw-text">
											<a href="../Visualizacao/listarequipamentos.php"><i class="fa fa-cogs"></i>
											<p>Listar Equipamentos</p></a>
										</div>
										<div class="cw-text">
											<a href="../Visualizacao/listarplanos.php"><i class="fa fa-tag"></i></i>
											<p>Listar Planos</p></a>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				';

			}
			echo $mensagem;
		//}
	}}
?>
