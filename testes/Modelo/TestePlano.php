<?php

    use PHPUnit\Framework\TestCase;
    # include_once('../../src/Modelo/Plano.php');
    use Developers\Acme\Modelo\Plano;

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