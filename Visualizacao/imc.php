<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php
        $pagina = 'imc';
		session_start();
        include_once('../Persistencia/ConexaoBD.php');
        include_once('../Modelo/Pessoa.php');
        include_once('../Controle/PessoaDAO.php');
        $conexao = new ConexaoBD();
        $conexao = $conexao->abreConexao();
        $pessoaDAO = new PessoaDAO();
    ?>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | IMC</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

	<!-- Js Plugins -->
	<script src="../js/jquery-1.12.4.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.barfiller.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <?php
				   $pessoaDAO->implementaMenu($pagina);
			   ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <?php
				$pessoaDAO->implementaLogOut();
            ?>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="../img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <?php
            				   $pessoaDAO->implementaMenu($pagina);
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
                            <?php
                				$pessoaDAO->implementaLogOut();
                            ?>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>CALCULADORA DE IMC</h2>
                        <div class="bt-option">
                            <a href="./index.php">Início</a>
                            <span>IMC</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- BMI Calculator Section Begin -->
    <section class="bmi-calculator-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title chart-title">
                        <span>Veja como anda seu corpo</span>
                        <h2>TABELA DE RELAÇÃO DO IMC</h2>
                    </div>
                    <div class="chart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>IMC</th>
                                    <th>SITUAÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="point">Inferior a 18.5</td>
                                    <td>Abaixo do peso</td>
                                </tr>
                                <tr>
                                    <td class="point">18.5 - 24.9</td>
                                    <td>Saudável</td>
                                </tr>
                                <tr>
                                    <td class="point">25.0 - 29.9</td>
                                    <td>Acima do Peso</td>
                                </tr>
                                <tr>
                                    <td class="point">30.0 - 39.9</td>
                                    <td>Obeso</td>
                                </tr>
                                <tr>
                                    <td class="point">40.0 e acima</td>
                                    <td>Obesidade Grave</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title chart-calculate-title">
                        <span>Veja como anda seu corpo</span>
                        <h2>CALCULE SEU IMC</h2>
                    </div>
                    <div class="chart-calculate-form">
                        <p>Digite sua altura e seu peso e depois clique no botão "Calcular" logo abaixo.
                        Será dado o valor correspondente ao seu Índice de Massa Corporal, após isso verifique sua situação de acordo com a tabela de IMC ao lado.</p>
                        <form action="">
                            <script language='JavaScript'>
                                function SomenteNumero(e){
                                    var tecla = (window.event)?event.keyCode:e.which;
                                    if(tecla > 47 && tecla < 58) return true;
                                    else{
    	                                if (tecla == 8 || tecla == 0) return true;
	                                    else return false;
                                    }
                                }
                            </script>

                            <div class="row">
                                <div class="col-sm-6">
                                    <small id="calculadoraIMC">Digite sua altura sem vírgula. <br> (Ex.: 1,80 seria 180)</small>
                                    <input type="text" id="altura" placeholder="Altura / cm" maxlength="3" onkeypress='return SomenteNumero(event)'>
                                </div>
                                <div class="col-sm-6">
                                    <small id="calculadoraIMC">Digite seu peso como um valor inteiro. <br> (Ex.: 65,3 seria 65)</small>
                                    <input type="text" id="peso" placeholder="Peso / kg" maxlength="3" onkeypress='return SomenteNumero(event)'>
                                </div>
                                <script>
                                    function calcula_IMC(a, b){
                                        Peso_Calc =  parseFloat(document.getElementById(a).value);
                                        Altura_Calc = parseFloat(document.getElementById(b).value);

                                        Altura_Calc = Altura_Calc/100;

                                        IMC = (Peso_Calc/(Altura_Calc * Altura_Calc));

                                        /* Verifica se o valor do IMC é válido, ou seja, se é um número e se é finito*/
                                        /* Isso está sendo feito para prevenir resultados de divisão por zero ou utilização de strings */
                                        if (typeof IMC === "number" && isFinite(IMC)){
                                            mostra = document.getElementById("Resultado").value = parseFloat(IMC).toFixed(2);
                                            mostra.innerHTML = IMC;

                                            return IMC;
                                        }
                                        else{
                                            mostra = document.getElementById("Resultado").value = "Por favor, utilize valores válidos.";
                                            mostra.innerHTML = "Por favor, utilize valores válidos.";

                                            return "Por favor, utilize valores válidos.";
                                        }
                                    }
                                </script>
                                <div class="col-lg-6">
                                    <button type="button" onclick="calcula_IMC('peso', 'altura')">Calcular</button>
                                </div>
                                <div class="col-sm-6">
                                    <input readonly="1" type="text" id="Resultado" placeholder="Resultado">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BMI Calculator Section End -->

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-map-marker"></i>
                        <p>333 Middle Winchendon Rd, Rindge,<br/> NH 03461</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <li>125-711-811</li>
                            <li>125-668-886</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>Support.gymcenter@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="../img/logo.png" alt=""></a>
                        </div>
                        <p>Com você para uma vida mais saudável, feliz e de bem consigo mesmo.
                            Venha nos fazer um visita.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Links úteis</h4>
                        <ul>
                            <li><a href="./about-us.php">Sobre nós</a></li>
                            <li><a href="./aulas.php">Aulas</a></li>
                            <li><a href="./modalidades.php">Modalidades</a></li>
                            <?php
								$pessoaDAO->implementaRodape();
				            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

	<!-- Js Plugins -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/masonry.pkgd.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
