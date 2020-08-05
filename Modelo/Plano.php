<?php
	// Modelo
	class Plano{
		private $nome;
		private $numMeses;
		private $valor;
		
		public function __construct($umNome, $uNumMeses, $umValor){
			$this->nome = $umNome;
			$this->numMeses= $uNumMeses;
			$this->valor = $umValor;
		}
		
		public function getNomePlano(){
			return $this->nome;
		}
		
		public function getNumMeses(){
			return $this->numMeses;
		}
		
		public function getValor(){
			return $this->valor;
		}
		
	}
?>
