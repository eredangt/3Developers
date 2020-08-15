<?php

    use PHPUnit\Framework\TestCase;
    # include_once('../../src/Modelo/Equipamento.php');
    use Developers\Acme\Modelo\Equipamento;

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