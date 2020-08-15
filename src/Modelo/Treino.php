<?php

	namespace Developers\Acme\Modelo;
	// Modelo
	class Treino{
		private $idPessoa;
		private $idFuncionario;
		private $idEquipamento;
		private $tipo;
		private $serie;
		private $repeticoes;
		private $peso;
		
		public function __construct($umIdPessoa, $umIdFuncionario, $umIdEquipamento, $umTipo, $umaSerie, $umasRepeticoes, $umPeso){
			$this->idPessoa = $umIdPessoa;
			$this->idFuncionario= $umIdFuncionario;
			$this->idEquipamento = $umIdEquipamento;
			$this->tipo = $umTipo;
			$this->serie = $umaSerie;
			$this->repeticoes = $umasRepeticoes;
			$this->peso = $umPeso;
		}
		
		public function getTreinoIdPessoa(){
			return $this->idPessoa;
		}
		
		public function getTreinoIdFuncionario(){
			return $this->idFuncionario;
		}
		
		public function getTreinoIdEquipamento(){
			return $this->idEquipamento;
		}
		
		public function getTipo(){
			return $this->tipo;
		}
		
		public function getSerie(){
			return $this->serie;
		}
		
		public function getRepeticoes(){
			return $this->repeticoes;
		}
		
		public function getPeso(){
			return $this->peso;
		}
		
	}
?>
