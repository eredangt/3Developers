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

namespace Developers\Acme\Controle;

    /*
        - ARQUIVO DO CONTROLE logout.php:
        O arquivo logout.php incializa a sessão e já a destrói, encaminhando a Pessoa
        para a Página Inicial(index.php).
    */
    
	session_start();
	session_destroy();
	echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Volte sempre!");
                            window.location.replace("../Visualizacao/index.php");
              </SCRIPT>';
?>
