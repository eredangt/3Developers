<?php
	// Modelo
	class Equipamento{
		private $nome;
		private $quantidade;
		private $marca;
		private $ano;
		
		public function __construct($umNome, $umaQuantidade, $umaMarca, $umAno){
			$this->nome = $umNome;
			$this->quantidade= $umaQuantidade;
			$this->marca = $umaMarca;
			$this->ano = $umAno;
		}
		
		public function getNomeEquipamento(){
			return $this->nome;
		}
		
		public function getQuantidade(){
			return $this->quantidade;
		}
		
		public function getMarca(){
			return $this->marca;
		}
		
		public function getAno(){
			return $this->ano;
		}
		
		
	}
?>
