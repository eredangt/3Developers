<?php

    use PHPUnit\Framework\TestCase;
    # include_once('../../src/Modelo/Cliente.php');
    use Developers\Acme\Modelo\Cliente;

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