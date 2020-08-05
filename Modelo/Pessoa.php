<?php
	// Modelo
	class Pessoa{
		private $cpf;
		private $nome;
		private $telefone;
		private $email;
		private $dataNascimento;
		private $senha;
		private $cargo;
		
		public function __construct($umCpf,	$umNome, $umTelefone, $umEmail, $umaDataNascimento, $umaSenha, $umCargo){
			$this->cpf = $umCpf;
			$this->nome = $umNome;
			$this->telefone = $umTelefone;
			$this->email = $umEmail;
			$this->dataNascimento = $umaDataNascimento;
			$this->senha = $umaSenha;
			$this->cargo = $umCargo;
		}

		public function getCPF(){
			return $this->cpf;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getTelefone(){
			return $this->telefone;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function getDataNascimento(){
			return $this->dataNascimento;
		}
		
		public function getSenha(){
			return $this->senha;
		}
		
		public function getCargo(){
			return $this->cargo;
		}
	}
?>
