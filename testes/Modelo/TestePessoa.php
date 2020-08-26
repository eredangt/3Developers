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
# include_once('../../src/Modelo/Pessoa.php');
use Developers\Acme\Modelo\Pessoa;

    /*
		- ARQUIVO DA CLASSE TestePessoa:
        A classe TestePessoa testa o método construtor da classe Pessoa a partir
        dos seus metodos gets.
    */
    
    class TestePessoa extends TestCase {
        
        public function teste__construct() {
            $cpf = "012345789";
            $nome = "João";
            $telefone = "00122223333";
            $email = "joao@email";
            $dataNascimento = "2000-01-01";
            $senha = "PeDeFeijao";
            $cargo = "I";

            $obj = new Pessoa($cpf, $nome, $telefone, $email, $dataNascimento, $senha, $cargo);

            $this->assertEquals($cpf, $obj->getCPF(), "assert do cpf");
            $this->assertEquals($nome, $obj->getNome(), "assert do nome");
            $this->assertEquals($telefone, $obj->getTelefone(), "assert do telefone");
            $this->assertEquals($email, $obj->getEmail(), "assert do email");
            $this->assertEquals($dataNascimento, $obj->getDataNascimento(), "assert da dataNascimento");
            $this->assertEquals($senha, $obj->getSenha(), "assert da senha");
            $this->assertEquals($cargo, $obj->getCargo(), "assert do cargo");
        }
    }
?>