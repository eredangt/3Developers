<?php
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

		public function executaSQL($sql)
		{
			$this->abreConexao();
			$resultado = mysqli_query($this->conexao, $sql);
			return $resultado;
		}
	}
?>
