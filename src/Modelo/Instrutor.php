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
	- ARQUIVO DA CLASSE Instrutor:
	A classe Instrutor armazena atributos para possibilitar a recuperação
	e inserção de instrutores na tabela Instrutor do banco de dados.
*/
    namespace Developers\Acme\Modelo;
    use Developers\Acme\Modelo\Pessoa;

	include_once ('Pessoa.php');
    class Instrutor extends Pessoa {
        private $idInstrutor;
        private $salario;
        private $cargaHoraria;
        private $imagemInstrutor;

        public function __construct($umSalario, $umaCH, $umaImagem){
            //parent::__construct($cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo);
            //$this->idInstrutor = $umaId;
            $this->salario = $umSalario;
            $this->cargaHoraria = $umaCH;
            $this->imagemInstrutor = $umaImagem;
        }

        public function getIdInstrutor(){
            return $this->idInstrutor;
        }

        public function getSalario(){
            return $this->salario;
        }

        public function getCH(){
            return $this->cargaHoraria;
        }

        public function getImagem(){
            return $this->imagemInstrutor;
        }

    }
?>
