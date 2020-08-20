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

namespace Developers\Acme\Persistencia;

	/*
		ARQUIVO DE PERSISTÊNCIA phpConexaoBD.php
		Arquivo que utiliza variáveis para armazenar o nome do host, o usuário que
		acessa o Banco de Dados, a senha do Banco de Dados, o nome do Banco.
	*/
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'academia';

	$conexao = mysqli_connect($host,$user,$password,$db);
?>
