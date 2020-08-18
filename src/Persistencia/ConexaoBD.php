<!--
---------------------------------------------------------------------------------
Trabalho Prático - Engenharia de Software - GCC188 - 2020/01
------------------------ Grupo 1 : 3Developers - GymLife ------------------------
    Integrantes:
        Caio de Oliveira (10A - 201820267),
        Ismael Martins Silva (10A - 201820281),
        Layse Cristina Silva Garcia (10A - 201811177).
	Data de Entrega: 25/08/2020.
	*Alterações(autor/data):
		-
		-
---------------------------------------------------------------------------------
-->
<?php
	/*
		ARQUIVO DE PERSISTÊNCIA ConexaoBD.php
		Arquivo que cria a classe ConexaoBD utilizando variáveis para armazenar
		o nome do host, o usuário que acessa o Banco de Dados, a senha do Banco
		de Dados, o nome do Banco e inicializa a conexao como nula.
		Quando utiliza o PHP com o Banco de Dados, utiliza-se o método
		abreConexao() para gerar a Conexão.
	*/
	namespace Developers\Acme\Persistencia;
	// Persistence
	class ConexaoBD{
		private $host = "localhost";
		private $usuario = "root";
		private $senha = "";
		private $banco = "academia";
		private $conexao = null;

		public function __construct(){}

		public function abreConexao(){
			if($this->conexao == null){
				$this->conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);
			}
			if(!$this->conexao){
				die("Conexão falhou. O erro foi: " . $conexao->connect_error);
			}
			return $this->conexao;
		}
	}
?>
