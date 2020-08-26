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
use Developers\Acme\Modelo\Pessoa;

	/*
		- ARQUIVO DA CLASSE Cliente:
		A classe Cliente armazena atributos para possibilitar a recuperação
		e inserção de clientes na tabela Cliente do banco de dados.
	*/

	include_once('Pessoa.php');
	class Cliente extends Pessoa {
		private $idCliente;
		private $plano;

		public function __construct($idCliente, $umPlano){
			$this->idCliente = $idCliente;
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
