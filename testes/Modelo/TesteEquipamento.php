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

use PHPUnit\Framework\TestCase;
# include_once('../../src/Modelo/Equipamento.php');
use Developers\Acme\Modelo\Equipamento;

    /*
		- ARQUIVO DA CLASSE TesteEquipamento:
        A classe TesteEquipamento testa o método construtor da classe Equipamento a partir
        dos seus metodos gets.
    */
    
    class TesteEquipamento extends TestCase {
        
        public function teste__construct() {
            $nome = "Bicicleta";
            $quantidade = "2";
            $marca = "Magerrima";
            $ano = "2005";

            $obj = new Equipamento($nome, $quantidade, $marca, $ano);

            $this->assertEquals($nome, $obj->getNomeEquipamento(), "assert do nome");
            $this->assertEquals($quantidade, $obj->getQuantidade(), "assert da quantidade");
            $this->assertEquals($marca, $obj->getMarca(), "assert da marca");
            $this->assertEquals($ano, $obj->getAno(), "assert do ano");
        }
    }
?>