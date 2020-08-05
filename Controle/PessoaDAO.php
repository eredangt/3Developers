<?php
	include_once('../Persistencia/ConexaoBD.php');
	// Persistence
	class PessoaDAO{

		public function __construct(){}

		public function teste($pessoa){
			echo $pessoa->getNome();
		}

		public function selecionarPlano($conexao) {
			$sqlP = 'SELECT * FROM plano';
			$tabelaP = mysqli_query($conexao,$sqlP) or die(mysqli_error($conexao));

			$selecionado = '';
			while($linhaP=mysqli_fetch_row($tabelaP)){
				if($planoCliente == $linhaP[0]){
					$selecionado = 'selected';
				}
				echo '<option value="'.htmlentities($linhaP[0]).'" '.$selecionado.'>'.htmlentities($linhaP[1]).'</option>';
			}

		}


		public function listarPessoas($conexao){
			$sql = 'SELECT * FROM Pessoa ORDER BY Nome ASC';
			$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

			while($linha=mysqli_fetch_row($tabela)){
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
						<td class="dark-bg hover-dp ts-meta"><h5><center><a href="phpExcluirPessoa.php?codigo='.$linha[0].'"><b>&#10006;</b></a></h5></td>
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


		/*public function implementaRestricaoLogar(){
			if(!isset($_SESSION['login'])){
				echo '<SCRIPT type="text/javascript"> //not showing me this
	                            alert("Logue para acessar esta página!");
	                            window.location.replace("../Visualizacao/entrar.php");
	                 </SCRIPT>';
			}

		}*/

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
				/*
				echo "<script type='text/javascript'>alert('".
							"Erro: implementaMenu".
					"');</script>";
				*/
				echo '<li><a href="../Visualizacao/entrar.php">Login</a></li>';
			}
			else {
				echo '<li><a href="../Visualizacao/menu.php">Menu</a></li>';
			}
		}

		public function implementaBotao(){
			if (!isset($_SESSION['login'])) {
				/*
				echo "<script type='text/javascript'>alert('".
							"Erro: implementaMenu".
					"');</script>";
				*/
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
			if (!isset($SESSION['login']) and $pagina == 'login') {
				echo '<li class="active"><a href="../Visualizacao/entrar.php">Login</a></li>';
			}
			else if (!isset($SESSION['login']) and $pagina != 'login') {
				echo '<li><a href="../Visualizacao/entrar.php">Login</a></li>';
			}
			else if (isset($SESSION['login']) and $pagina == 'menu') {
				echo '<li class="active"><a href="../Visualizacao/menu.php">Menu</a></li>';
			}
			else if (isset($SESSION['login']) and $pagina != 'menu') {
				echo '<li><a href="../Visualizacao/menu.php">Menu</a></li>';
			}
			if(isset($_SESSION['cargo']) == 'instrutor') {
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

		public function addPessoa($pessoa, $con){
			$sql = "INSERT INTO Pessoa(CPF,Nome,Telefone,E_MAIL, Data_nascimento, senha, Tipo_cargo)
			  VALUES('".$pessoa->getCPF()."','".$pessoa->getNome()."','".$pessoa->getTelefone()."','".$pessoa->getEmail()."','".$pessoa->getDataNascimento()."','".$pessoa->getSenha()."','".$pessoa->getCargo()."');";
			echo $sql;
			$resultadoP = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultadoP == true){
				//echo 'Cadastrada pessoa.';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Pessoa cadastrada com sucesso!");
								window.location.replace("../Visualizacao/listarpessoas.php");
						</SCRIPT>';*/
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($con);
			}
		}

		public function atualizarPessoa($cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo, $codigo, $con){
			$sql = "UPDATE Pessoa SET 	CPF = '".$cpf."',
										Nome = '".$nome."',
										Telefone = '".$telefone."',
										E_MAIL = '".$email."',
										Data_nascimento = '".$dataNasc."',
										Senha = '".$senha."',
										Tipo_cargo = '".$cargo."'
					WHERE idPessoa = '".$codigo."';
			";
			$resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultado == true){
				//echo 'Alterada a pessoa.';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Pessoa alterada com sucesso!");
								window.location.replace("../Visualizacao/listarpessoas.php");
						</SCRIPT>';*/
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($con);
			}
		}

		public function excluirPessoa($codigo, $con){
			//criar a string sql que exclui o usuario do banco de dados
			$sql = "DELETE FROM Pessoa WHERE idPessoa=".$codigo.";";

			//executa o comando DELETE no banco de dados para o usuario que tem
			//aquele codigo especifico
			$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

			//avaliando o resultado
			if ($resultado == true){
				//echo 'Excluída a Pessoa';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Pessoa excluída com sucesso!");
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
