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
		- ARQUIVO DA CLASSE Plano:
		A classe Plano armazena atributos para possibilitar a recuperação
		e inserção de planos na tabela Plano do banco de dados.
	*/
	
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
