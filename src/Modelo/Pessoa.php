<?php
/*
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
*/

namespace Developers\Acme\Modelo;

	/*
		- ARQUIVO DA CLASSE Pessoa:
		A classe Pessoa armazena atributos para possibilitar a recuperação
		e inserção de pessoas na tabela Pessoa do banco de dados.
	*/
	
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
