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
# include_once('../../src/Modelo/Instrutor.php');
use Developers\Acme\Modelo\Instrutor;

    /*
		- ARQUIVO DA CLASSE TesteInstrutor:
        A classe TesteInstrutor testa o método construtor da classe Instrutor a partir
        dos seus metodos gets.
    */
    
    class TesteInstrutor extends TestCase {
        
        public function teste__construct() {
            $idInstrutor = "6";
            $salario = "1800.00";
            $cargaHoraria = "8";
            $imagemInstrutor = "../imgInstrutores/Admin.jpg";

            $obj = new Instrutor($idInstrutor, $salario, $cargaHoraria, $imagemInstrutor);

            $this->assertEquals($idInstrutor, $obj->getIdInstrutor(), "assert do idInstrutor");
            $this->assertEquals($salario, $obj->getSalario(), "assert do salario");
            $this->assertEquals($cargaHoraria, $obj->getCH(), "assert da cargaHoraria");
            $this->assertEquals($imagemInstrutor, $obj->getImagem(), "assert da imagemInstrutor");
        }
    }
?>