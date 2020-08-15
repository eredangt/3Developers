<?php

    use PHPUnit\Framework\TestCase;
    # include_once('../../src/Modelo/Pessoa.php');
    use Developers\Acme\Modelo\Pessoa;

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