<?php
	// Persistence
	include_once('../Modelo/Instrutor.php');
	include_once('../Modelo/Pessoa.php');
	class InstrutorDAO{

		public function __construct(){}

        public function addInstrutor($instrutor, $con, $pegaCPF){
            $sql = "SELECT idPessoa FROM PESSOA WHERE CPF = '".$pegaCPF."';";
            $tabela = mysqli_query($con,$sql) or die(mysqli_error($con));

            while($linha = mysqli_fetch_row($tabela)){
                $COD_Instrutor = $linha[0];
            }
            $sql = "INSERT INTO Instrutor(Pessoa_idPessoa, salario, Carga_horaria, imagem)
                    VALUES('".$COD_Instrutor."','".$instrutor->getSalario()."',
					'".$instrutor->getCH()."','".$instrutor->getImagem()."');";

            $resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($resultado == true){
                echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Instrutor inserido com sucesso!");
								window.location.replace("../Visualizacao/listarpessoas.php");
						</SCRIPT>';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($con);
            }
        }

        public function atualizarInstrutor($salario, $cH, $imagem, $codigo, $con){

			$sql = "UPDATE Instrutor SET	salario = '".$salario."',
											Carga_horaria = '".$cH."',
											imagem = '".$imagem."'
					WHERE Pessoa_idPessoa = '".$codigo."';
			";
			$resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
			// VERIFICA SE TUDO DEU CERTO
			if ($resultado == true){
				//echo 'Instrutor alterado com sucesso';
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Instrutor alterado com sucesso!");
							window.location.replace("../Visualizacao/menu.php");
					</SCRIPT>';
			}else{
				echo '<script>alert("Problema ao alterar INSTRUTOR no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con).'<br>';
				echo '<a href="../Visualizacao/menu.php"> VOLTAR </a>';
			}
		}

	}
?>
