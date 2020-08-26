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
# include_once('../../src/Modelo/Cliente.php');
use Developers\Acme\Modelo\Cliente;

    /*
		- ARQUIVO DA CLASSE TesteCliente:
        A classe TesteCliente testa o método construtor da classe Cliente a partir
        dos seus metodos gets.
    */
    
    class TesteCliente extends TestCase {
        
        public function teste__construct() {
            $idCliente = "10";
            $plano = "2";

            $obj = new Cliente($idCliente, $plano);

            $this->assertEquals($idCliente, $obj->getIdCliente(), "assert do idCliente");
            $this->assertEquals($plano, $obj->getPlano(), "assert do plano");
        }
    }
?>