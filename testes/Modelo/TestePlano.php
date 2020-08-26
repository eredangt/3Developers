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
# include_once('../../src/Modelo/Plano.php');
use Developers\Acme\Modelo\Plano;

    /*
		- ARQUIVO DA CLASSE TestePlano:
        A classe TestePlano testa o método construtor da Plano Pessoa a partir
        dos seus metodos gets.
    */
    
    class TestePlano extends TestCase {
        
        public function teste__construct() {
            $nome = "Tope";
            $numMeses = "6";
            $valor = "79,99";

            $obj = new Plano($nome, $numMeses, $valor);

            $this->assertEquals($nome, $obj->getNomePlano(), "assert do nome");
            $this->assertEquals($numMeses, $obj->getNumMeses(), "assert do numMeses");
            $this->assertEquals($valor, $obj->getValor(), "assert do valor");
        }
    }
?>