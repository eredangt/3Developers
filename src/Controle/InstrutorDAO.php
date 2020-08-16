<?php

	namespace Developers\Acme\Controle;
    use Developers\Acme\Modelo\Instrutor;
    use Developers\Acme\Modelo\Pessoa;
	// Persistence
	include_once('../Modelo/Instrutor.php');
	include_once('../Modelo/Pessoa.php');
	class InstrutorDAO{

		public function __construct(){}

        public function addInstrutor($instrutor, $conexao, $pegaCPF){
            $sql = "SELECT idPessoa FROM PESSOA WHERE CPF = '".$pegaCPF."';";
            $tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

            while($linha = mysqli_fetch_row($tabela)){
                $COD_Instrutor = $linha[0];
            }
            $sql = "INSERT INTO Instrutor(Pessoa_idPessoa, salario, Carga_horaria, imagem)
                    VALUES('".$COD_Instrutor."','".$instrutor->getSalario()."',
					'".$instrutor->getCH()."','".$instrutor->getImagem()."');";

            $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
            if($resultado == true){
                echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Instrutor inserido com sucesso!");
								window.location.replace("../Visualizacao/listarpessoas.php");
						</SCRIPT>';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($conexao);
            }
        }

        public function atualizarInstrutor($conexao, $codigo, $salario, $cH, $imagem){

			$sql = "UPDATE Instrutor SET	salario = '".$salario."',
											Carga_horaria = '".$cH."',
											imagem = '".$imagem."'
					WHERE Pessoa_idPessoa = '".$codigo."';
			";
			$resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			// VERIFICA SE TUDO DEU CERTO
			if ($resultado == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Instrutor alterado com sucesso!");
							window.location.replace("../Visualizacao/listarpessoas.php");
					</SCRIPT>';
			}else{
				echo '<script>alert("Problema ao alterar INSTRUTOR no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
			}
		}

	}
?>
