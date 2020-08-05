<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php
		$pagina = 'menu';
		session_start();
		include_once('../Persistencia/ConexaoBD.php');
		include_once('../Modelo/Pessoa.php');
		include_once('../Controle/PessoaDAO.php');
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();
		$pessoaDAO = new PessoaDAO();
		$pessoaDAO->implementaRestricaoLogar();
	?>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Menu Principal</title>

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
			<a href="../Controle/logout.php">Log Out</a>
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
							<a href="../Controle/logout.php">Log Out</a>
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
                        <h2>MENU</h2>
                        <div class="bt-option">
                            <a href="./index.php">Início</a>
                            <span>Menu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                    <?php
						$mensagem = '';
						if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'aluno'){
							$mensagem = '
									<div class="col-lg-12">
										<div class="section-title contact-title">
											<span>Bem-Vindo(a) aluno(a), '.$_SESSION['login'].'!</span>
											<h2>Encontre, aqui, tudo que precisa!</h2>
										</div>
								    <!-- Class Timetable Section Begin -->
											<div class="container">
												<div class="row">
													<div class="col-lg-12">
														<div class="table-controls">
															<ul>
																<li class="active" data-tsfilter="all">TREINOS</li>
																<li data-tsfilter="a">TREINO A</li>
																<li data-tsfilter="b">TREINO B</li>
																<li data-tsfilter="c">TREINO C</li>
															</ul>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12">
														<div class="class-timetable">
															<table>
																<thead>
																	<tr>
																		<th>Observa&ccedil;&oacute;es</th>
																		<th>Segunda-Feira</th>
																		<th>Ter&ccedil;a-Feira</th>
																		<th>Quarta-Feira</th>
																		<th>Quinta-Feira</th>
																		<th>Sexta-Feira</th>
																		<th>S&aacute;bado</th>
																		<th>Domingo</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="class-time"></td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="a">
																			<h5>WEIGHT LOOSE</h5>
																			<span>RLefew D. Loee</span>
																		</td>
																		<td class="hover-bg ts-meta" data-tsmeta="b">
																			<h5>Cardio</h5>
																			<span>RLefew D. Loee</span>
																		</td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="c">
																			<h5>Yoga</h5>
																			<span>Keaf Shen</span>
																		</td>
																		<td class="hover-bg ts-meta" data-tsmeta="a">
																			<h5>Fitness</h5>
																			<span>Kimberly Stone</span>
																		</td>
																		<td class="dark-bg blank-td"></td>
																		<td class="hover-bg ts-meta" data-tsmeta="c">
																			<h5>Boxing</h5>
																			<span>Rachel Adam</span>
																		</td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="a">
																			<h5>Body Building</h5>
																			<span>Robert Cage</span>
																		</td>
																	</tr>
																	<tr>
																		<td class="class-time"></td>
																		<td class="blank-td"></td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="b">
																			<h5>Fitness</h5>
																			<span>Kimberly Stone</span>
																		</td>
																		<td class="hover-bg ts-meta" data-tsmeta="c">
																			<h5>WEIGHT LOOSE</h5>
																			<span>RLefew D. Loee</span>
																		</td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="a">
																			<h5>Cardio</h5>
																			<span>RLefew D. Loee</span>
																		</td>
																		<td class="hover-bg ts-meta" data-tsmeta="b">
																			<h5>Body Building</h5>
																			<span>Robert Cage</span>
																		</td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="c">
																			<h5>Karate</h5>
																			<span>Donald Grey</span>
																		</td>
																		<td class="blank-td"></td>
																	</tr>
																	<tr>
																		<td class="class-time"></td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="a">
																			<h5>Boxing</h5>
																			<span>Rachel Adam</span>
																		</td>
																		<td class="hover-bg ts-meta" data-tsmeta="b">
																			<h5>Karate</h5>
																			<span>Donald Grey</span>
																		</td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="c">
																			<h5>Body Building</h5>
																			<span>Robert Cage</span>
																		</td>
																		<td class="blank-td"></td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="b">
																			<h5>Yoga</h5>
																			<span>Keaf Shen</span>
																		</td>
																		<td class="hover-bg ts-meta" data-tsmeta="c">
																			<h5>Cardio</h5>
																			<span>RLefew D. Loee</span>
																		</td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="a">
																			<h5>Fitness</h5>
																			<span>Kimberly Stone</span>
																		</td>
																	</tr>
																	<tr>
																		<td class="class-time"></td>
																		<td class="hover-bg ts-meta" data-tsmeta="a">
																			<h5>Cardio</h5>
																			<span>RLefew D. Loee</span>
																		</td>
																		<td class="dark-bg blank-td"></td>
																		<td class="hover-bg ts-meta" data-tsmeta="c">
																			<h5>Boxing</h5>
																			<span>Rachel Adam</span>
																		</td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="a">
																			<h5>Yoga</h5>
																			<span>Keaf Shen</span>
																		</td>
																		<td class="hover-bg ts-meta" data-tsmeta="b">
																			<h5>Karate</h5>
																			<span>Donald Grey</span>
																		</td>
																		<td class="dark-bg hover-bg ts-meta" data-tsmeta="c">
																			<h5>Boxing</h5>
																			<span>Rachel Adam</span>
																		</td>
																		<td class="hover-bg ts-meta" data-tsmeta="a">
																			<h5>WEIGHT LOOSE</h5>
																			<span>RLefew D. Loee</span>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										<!-- Class Timetable Section End -->
							';

						}else{
							$mensagem = '
										<div class="col-lg-6">
											<div class="section-title contact-title">
												<span>Bem-Vindo(a) instrutor(a), '.$_SESSION['login'].'!</span>
												<h2>Encontre, aqui, tudo que precisa!</h2>
											</div>
											<div class="contact-widget">
													<div class="cw-text">
														<a href="cadastrartreino.php"><i class="fa fa-calendar"></i>
														<p>Cadastrar Treino</p></a>
													</div>
													<div class="cw-text">
														<a href="cadastrarpessoa.php"><i class="fa fa-user-plus"></i>
														<p>Cadastrar Pessoa</p></a>
													</div>
													<div class="cw-text">
														<a href="cadastrarequipamento.php"><i class="fa fa-cogs"></i>
														<p>Cadastrar Equipamento</p></a>
													</div>
													<div class="cw-text">
														<a href="cadastrarplano.php"><i class="fa fa-tag"></i></i>
														<p>Cadastrar Plano</p></a>
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="contact-widget">
													<br><br><br><br>
													<div class="cw-text">
														<a href="listartreinos.php"><i class="fa fa-calendar"></i>
														<p>Listar Treinos</p></a>
													</div>
													<div class="cw-text">
														<a href="listarpessoas.php"><i class="fa fa-user-plus"></i>
														<p>Listar Pessoas</p></a>
													</div>
													<div class="cw-text">
														<a href="listarequipamentos.php"><i class="fa fa-cogs"></i>
														<p>Listar Equipamentos</p></a>
													</div>
													<div class="cw-text">
														<a href="listarplanos.php"><i class="fa fa-tag"></i></i>
														<p>Listar Planos</p></a>
													</div>
												</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							';
						}
						echo $mensagem;
                    ?>

            </div>
        </div>
    </section>
    <!-- Contact Section End -->

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
