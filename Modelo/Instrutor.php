<?php
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
