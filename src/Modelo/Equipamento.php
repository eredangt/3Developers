<!--
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
-->
<?php
/*
	- ARQUIVO DA CLASSE Equipamento:
	A classe Equipamento armazena atributos para possibilitar a recuperação
	e inserção de equipamentos na tabela Equipamento do banco de dados.
*/
	namespace Developers\Acme\Modelo;
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
