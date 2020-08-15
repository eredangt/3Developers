<?php

	namespace Developers\Acme\Modelo;
	include_once ('Pessoa.php');
	class Cliente extends Pessoa {
		private $idCliente;
		private $plano;

		public function __construct($umPlano){
			//parent::__construct($cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo);
			//$this->idCliente = $umaIdC;
			$this->plano = $umPlano;
		}

		public function getIdCliente(){
			return $this->idCliente;
		}

		public function getPlano(){
			return $this->plano;
		}

	}

?>
