<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php
        use Developers\Acme\Persistencia\ConexaoBD;
        use Developers\Acme\Modelo\Pessoa;
        use Developers\Acme\Controle\PessoaDAO;
		$pagina = 'cadastrar';
        session_start();
        
		include_once('../Persistencia/ConexaoBD.php');
		include_once('../Modelo/Pessoa.php');
        include_once('../Controle/PessoaDAO.php');
        
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();
		$pessoaDAO = new PessoaDAO();
		$pessoaDAO->implementaRestricao();
	?>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Cadastrar Pessoa</title>

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
                        <h2>CADASTRAR PESSOA</h2>
                        <div class="bt-option">
                            <a href="./index.php">Início</a>
                            <a href="./cadastrar.php">Cadastrar</a>
                            <span>Cadastrar Pessoa</span>
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
			<div class="section-title contact-title">
						<span>Cadastrar Pessoa</span>
						<h2>Cadastre seus clientes e funcionários!</h2>
					</div>
            <div class="row">
				<div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="../img/clients-4.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="leave-comment">
		                    <span id="spanSpecial">Tipo de Cadastro</span>
                            <select name="selecao" id="selectCadastro" class="meuSelect">
                                <option value="Nenhum" selected>Escolha o tipo de cadastro</option>
                                <option value="C">Cliente</option>
                                <option value="I">Instrutor</option>
                            </select>
							<form action="../Controle/phpCadastrarPessoa.php" method="POST" name="frmLogin" enctype="multipart/form-data" autocomplete="off">
	                            <div class="Cliente_Selecionado" id="ClienteSel" style="display:none">
									<input type="hidden" name="selecao" value="C">
									<span id="spanSpecial">CPF do Cliente</span>
	                                <input type="text" name="txtCPFPessoaC" placeholder="Digite o número do CPF do Cliente" required>
	                                <span id="spanSpecial">Nome do Cliente</span>
	                                <input type="text" name="txtNomeC" placeholder="Digite o nome do Cliente a ser cadastrado" required>
	                                <span id="spanSpecial">Número de Telefone</span>
	                                <input type="text" name="txtTelC" placeholder="Digite um número de telefone para contato" required>
	                                <span id="spanSpecial">Data de Nascimento</span>
	                                <input type="date" name="txtDataC" required>
	                                <span id="spanSpecial">Endereço Eletrônico</span>
	                                <br>
	                                <small class="smallCadastro">O E-mail deverá também ser utilizado como login.</small>
	                                <input type="email" name="txtEmailC" placeholder="Digite um e-mail válido para contato" required>
	                                <span id="spanSpecial">Senha do Cliente</span>
	                                <input type="password" name="senhaPessoaC" placeholder="Digite a senha do Cliente a ser cadastrado" required>
	                                <span id="spanSpecial">Plano a ser contratado pelo Cliente</span>
	                                <select name="selecaoPlanoC" id="selecaoPlano" class="meuSelect" required>
	                                    <option value="" selected>ESCOLHA UM PLANO</option>
	                                    <?php
											require('../Persistencia/phpConexaoBD.php');

											$sql='SELECT * FROM plano';
											$tabela=mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

											while($linha=mysqli_fetch_row($tabela)){
												echo '<option value="'.htmlentities($linha[0]).'">'.htmlentities($linha[1]).'</option>';
											}
	                                    ?>
	                                </select>
	                                <button type="submit" id="botaoCadastrar">Cadastrar</button>
	                            </div>
							</form>

							<form action="../Controle/phpCadastrarPessoa.php" method="POST" name="frmLogin2" enctype="multipart/form-data" autocomplete="off">
	                            <div class="Instrutor_Selecionado" id="InstrutorSel" style="display:none">
									<input type="hidden" name="selecao" value="I">
									<span id="spanSpecial">CPF do Instrutor</span>
	                                <input type="text" name="txtCPFPessoaI" placeholder="Digite o número do CPF do Instrutor" required>
	                                <span id="spanSpecial">Nome do Instrutor</span>
	                                <input type="text" name="txtNomeI" placeholder="Digite o nome do Instrutor a ser cadastrado" required>
	                                <span id="spanSpecial">Número de Telefone</span>
	                                <input type="text" name="txtTelI" placeholder="Digite um número de telefone para contato" required>
	                                <span id="spanSpecial">Data de Nascimento</span>
	                                <input type="date" name="txtDataI" required>
	                                <span id="spanSpecial">Endereço Eletrônico</span>
	                                <br>
	                                <small class="smallCadastro">O E-mail deverá também ser utilizado como login.</small>
	                                <input type="email" name="txtEmailI" placeholder="Digite um e-mail válido para contato" required>
	                                <span id="spanSpecial">Senha do Instrutor</span>
	                                <input type="password" name="senhaPessoaI" placeholder="Digite a senha do Instrutor a ser cadastrado" required>
	                                <span id="spanSpecial">Salário do Instrutor</span>
	                                <input type="number" name="txtSalarioI" placeholder="Digite o valor do salário do Instrutor a ser cadastrado" required>
	                                <span id="spanSpecial">Carga Horária do Instrutor</span>
	                                <br>
	                                <small class="smallCadastro">A Carga Horária deverá ser um valor inteiro representando as horas.</small>
	                                <input type="number" name="txtHorariaI" placeholder="Digite a carga horária do Instrutor a ser cadastrado" required>
	                                <span id="spanSpecial">Imagem Instrutor</span>
	                                <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" required/>
	                                <button type="submit"´ id="botaoCadastrar">Cadastrar</button>
	                            </div>
							</form>

                            <br>

                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#selectCadastro').change(function() {
                                        if($('#selectCadastro').val() == 'Nenhum') {
                                            $("#ClienteSel").hide("slow");
                                            $("#InstrutorSel").hide("slow");
                                        }
                                        if($('#selectCadastro').val() == 'C') {
                                            $("#ClienteSel").show("slow");
                                            $("#InstrutorSel").hide("slow");
                                        }
                                        if($('#selectCadastro').val() == 'I') {
                                            $("#ClienteSel").hide("slow");
                                            $("#InstrutorSel").show("slow");
                                        }
                                    });
                                });
                            </script>
                        </form>
                    </div>
                </div>
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
