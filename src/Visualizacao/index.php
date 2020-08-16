<!DOCTYPE html>
<html lang="zxx">

<head>

	<?php
        
        use Developers\Acme\Persistencia\ConexaoBD;
        use Developers\Acme\Controle\PessoaDAO;
        use Developers\Acme\Controle\PlanoDAO;
        
		$pagina = 'inicio';
        session_start();
        
		include_once('../Persistencia/ConexaoBD.php');
        include_once('../Controle/PessoaDAO.php');
        include_once('../Controle/PlanoDAO.php');
        
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();
        $pessoaDAO = new PessoaDAO();
        $planoDAO = new PlanoDAO();
    ?>

    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Início</title>

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

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="../img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Molde seu corpo</span>
                                <h1>Seja <strong>forte</strong> treinando muito</h1>
                                <?php
									$pessoaDAO->implementaBotao();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="../img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Molde seu corpo</span>
                                <h1>Seja <strong>forte</strong> treinando muito</h1>
                                <?php
									$pessoaDAO->implementaBotao();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Por que nos escolher?</span>
                        <h2>ULTRAPASSE SEUS LIMITES</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>Equipamento moderno</h4>
                        <p>Possuímos equipamentos de ponta para atender nossos clientes.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>Acompanhamento nutricional</h4>
                        <p>Nossos planos incluem um plano de alimentação para auxiliar você a alcançar seus objetivos.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>Plano de treino</h4>
                        <p>Treinos sob medida para você, agende uma avaliação diagnóstica que cuidaremos disso.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-014-heart-beat"></span>
                        <h4>Único para você</h4>
                        <p>Nossa combinação de serviços proporciona aos nossos clientes ótimos resultados.
                            Confira nossos planos.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Nossas aulas</span>
                        <h2>O QUE NÓS PODEMOS LHE OFERECER</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="../img/classes/class-4.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>FORÇA</span>
                            <h5>Levantamento de peso</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="../img/classes/class-7.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>CARDIO</span>
                            <h5>Spinning</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="../img/classes/class-3.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>FORÇA</span>
                            <h5>Kettlebell</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="../img/classes/class-6.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>CARDIO</span>
                            <h4>Esteira</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="../img/classes/class-5.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>TREINO</span>
                            <h4>Boxe</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="../img/banner-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <h2>Contrate agora os nossos serviços para obter mais ofertas</h2>
                        <div class="bt-tips">Onde saúde, beleza e a boa condição física se encontram.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Nossos planos</span>
                        <h2>Escolha o plano que mais se encaixe com aquilo que você precisa</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
					<?php
						$planoDAO->imprimePlanos($conexao);
					?>
                <!--<div class="col-lg-4 col-md-8">

                    <div class="ps-item">
                        <h3>Mensal</h3>
                        <div class="pi-price">
                            <span>1x</span>
                            <h2>R$ 100,00</h2>
                        </div>
                        <ul>
                            <li>Utilização do espaço para treino.</li>
                            <li>Acesso a todas as aulas.</li>
                            <li>Personal trainer.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Semestral</h3>
                        <div class="pi-price">
                            <span>6x</span>
                            <h2>R$ 90,00</h2>
                        </div>
                        <ul>
                            <li>Utilização do espaço para treino.</li>
                            <li>Acesso a todas as aulas.</li>
                            <li>Personal trainer.</li>
                            <li>Duas avaliações físicas.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Anual</h3>
                        <div class="pi-price">
                            <span>12x</span>
                            <h2>R$ 80,00</h2>
                        </div>
                        <ul>
                            <li>Utilização do espaço para treino.</li>
                            <li>Acesso a todas as aulas.</li>
                            <li>Personal trainer.</li>
                            <li>Quatro avaliações físicas.</li>
                            <li>Nutricionista a cada 3 meses.</li>
                            <li>Kit Gym Life.</li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Gallery Section Begin -->
    <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="../img/gallery/gallery-1.jpg">
                <a href="../img/gallery/gallery-1.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="../img/gallery/gallery-2.jpg">
                <a href="../img/gallery/gallery-2.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="../img/gallery/gallery-3.jpg">
                <a href="../img/gallery/gallery-3.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="../img/gallery/gallery-4.jpg">
                <a href="../img/gallery/gallery-4.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="../img/gallery/gallery-5.jpg">
                <a href="../img/gallery/gallery-5.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="../img/gallery/gallery-6.jpg">
                <a href="../img/gallery/gallery-6.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div>
    <!-- Gallery Section End -->

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
