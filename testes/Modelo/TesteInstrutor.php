<?php

    use PHPUnit\Framework\TestCase;
    # include_once('../../src/Modelo/Instrutor.php');
    use Developers\Acme\Modelo\Instrutor;

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