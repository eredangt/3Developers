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
		- ARQUIVO DA CLASSE Treino:
		A classe Treino armazena atributos para possibilitar a recuperação
		e inserção de treinos na tabela Treino do banco de dados.
	*/
	
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
