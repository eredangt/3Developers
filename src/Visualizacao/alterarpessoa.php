<!--
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
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php
        use Developers\Acme\Persistencia\ConexaoBD;
        use Developers\Acme\Modelo\Pessoa;
        use Developers\Acme\Controle\PessoaDAO;
		$pagina = 'listar';
        session_start();

		include_once('../Persistencia/ConexaoBD.php');
		include_once('../Modelo/Pessoa.php');
        include_once('../Controle/PessoaDAO.php');

		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();
		$pessoaDAO = new PessoaDAO();
		$pessoaDAO->implementaRestricao();
		$codigo = $_GET['codigo'];
	?>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Alterar Pessoa</title>

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
							<?php  $pessoaDAO->implementaLogOut();?>
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
                        <h2>ALTERAR PESSOA</h2>
                        <div class="bt-option">
                            <a href="./index.php">Início</a>
                            <a href="./listarpessoas.php">Listar Pessoas</a>
                            <span>Alterar Pessoa</span>
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
						<span>Alterar Pessoa</span>
						<h2>Altere seus clientes e funcionários!</h2>
            <div class="row">
				<div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="../img/clients-4.jpg" alt="">
                        </div>
                    </div>
					<div>
						<?php $pessoaDAO->instrutorFoto($conexao,$codigo); ?>
					</div>
                </div>

                <div class="col-lg-6">
                    <div class="leave-comment">
		                    <span id="spanSpecial">Tipo de Cadastro</span>
							<?php $cargo = $pessoaDAO->pegaCargo($conexao,$codigo);?>

							<select name="selecao" id="selectCadastro" class="meuSelect" disabled>
									<option value="C" <?php if($cargo == 'C'){ echo 'selected';}?>> Cliente</option>
									<option value="I" <?php if($cargo == 'I'){ echo 'selected';}?>> Instrutor</option>';
						 	</select>


							<form action="../Controle/phpAlterarPessoa.php" method="POST" name="frmLogin" enctype="multipart/form-data" autocomplete="off">
								<div class="Cliente_Selecionado" id="ClienteSel" style="display:none">
									<input type="hidden" name="hddCodigo" value="<?php echo $codigo; ?>">

									<input type="hidden" name="selecao" value="C">

									<span id="spanSpecial">CPF do Cliente</span>
									<input type="text" name="txtCPFPessoaC" pattern="[0-9]{11}" title="Insira CPF utilizando apenas números" value="<?php echo $pessoaDAO->pegaCPF($conexao,$codigo); ?>"
									placeholder="Digite o número do CPF do Cliente" required>

									<span id="spanSpecial">Nome do Cliente</span>
									<input type="text" name="txtNomeC" value="<?php echo $pessoaDAO->pegaNome($conexao,$codigo); ?>"
									placeholder="Digite o nome do Cliente a ser cadastrado" required>

									<span id="spanSpecial">Número de Telefone</span>
									<input type="text" name="txtTelC" value="<?php echo $pessoaDAO->pegaNumTelefone($conexao,$codigo); ?>"
									title="O formato correto: +99 (99) 99999-9999 ou +99 (99) 9999-9999"
									placeholder = "+99 (99) 99999-9999" pattern="(\+)[0-9]{2} (\()[0-9]{2}(\)) [0-9]{4,5}-[0-9]{4}" required>

									<span id="spanSpecial">Data de Nascimento</span>
									<input type="date" name="txtDataC" value="<?php echo $pessoaDAO->pegaDataNasc($conexao,$codigo); ?>" required>

									<span id="spanSpecial">Endereço Eletrônico</span><br>
									<small class="smallCadastro">O E-mail deverá também ser utilizado como login.</small>
									<input type="email" name="txtEmailC" value="<?php echo $pessoaDAO->pegaEmail($conexao,$codigo); ?>"
									placeholder="Digite um e-mail válido para contato" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>

									<span id="spanSpecial">Senha do Cliente</span>
									<input type="password" name="senhaPessoaC" value="<?php echo $pessoaDAO->pegaSenha($conexao,$codigo); ?>"
									title="A senha deve conter pelo menos 6 caracteres, podendo ser letras minúsculas, maiúsculas, números e símbolos(. _ @ + -)"
									placeholder="Digite a senha do Cliente a ser cadastrado" pattern="[a-zA-Z0-9._@+-]{6,}$" required>

									<span id="spanSpecial">Plano a ser contratado pelo Cliente</span>
									<select name="selecaoPlanoC" id="selecaoPlano" class="meuSelect" required>
										<?php
											$pessoaDAO->selecionarPlano($conexao, $codigo);
										?>
									</select>

									<button type="submit" id="botaoAlterar">ALTERAR</button>
								</div>
                            </form>
							<!-- para caixa de dialogo em form onsubmit="return confirm('Você tem certeza que quer alterar?');" -->
                            <form action="../Controle/phpAlterarPessoa.php" method="POST" name="frmLogin1" enctype="multipart/form-data" autocomplete="off">
								<div class="Instrutor_Selecionado" id="InstrutorSel" style="display:none">
									<input type="hidden" name="hddCodigo" value="<?php echo $codigo; ?>">

									<input type="hidden" name="selecao" value="I">

									<span id="spanSpecial">CPF do Instrutor</span>
									<input type="text" name="txtCPFPessoaI" pattern="[0-9]{11}" title="Insira CPF utilizando apenas números" value="<?php echo $pessoaDAO->pegaCPF($conexao,$codigo); ?>"
									placeholder="Digite o número do CPF do Instrutor" required>

									<span id="spanSpecial">Nome do Instrutor</span>
									<input type="text" name="txtNomeI" value="<?php echo $pessoaDAO->pegaNome($conexao,$codigo); ?>"
									placeholder="Digite o nome do Instrutor a ser cadastrado" required>

									<span id="spanSpecial">Número de Telefone</span>
									<input type="text" name="txtTelI" value="<?php echo $pessoaDAO->pegaNumTelefone($conexao,$codigo); ?>"
									placeholder = "+99 (99) 99999-9999" title="O formato correto: +99 (99) 99999-9999 ou +99 (99) 9999-9999"
									pattern="(\+)[0-9]{2} (\()[0-9]{2}(\)) [0-9]{4,5}-[0-9]{4}" required>

									<span id="spanSpecial">Data de Nascimento</span>
									<input type="date" name="txtDataI" value="<?php echo $pessoaDAO->pegaDataNasc($conexao,$codigo); ?>" required>

									<span id="spanSpecial">Endereço Eletrônico</span><br>
									<small class="smallCadastro">O E-mail deverá também ser utilizado como login.</small>
									<input type="email" name="txtEmailI" value="<?php echo $pessoaDAO->pegaEmail($conexao,$codigo); ?>"
									placeholder="Digite um e-mail válido para contato" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>

									<span id="spanSpecial">Senha do Instrutor</span>
									<input type="password" name="senhaPessoaI" value="<?php echo $pessoaDAO->pegaSenha($conexao,$codigo); ?>"
									title="A senha deve conter pelo menos 6 caracteres, podendo ser letras minúsculas, maiúsculas, números e símbolos(. _ @ + -)"
									placeholder="Digite a senha do Instrutor a ser cadastrado" pattern="[a-zA-Z0-9._@+-]{6,}$" required>

									<span id="spanSpecial">Salário do Instrutor</span>
									<input type="number" name="txtSalarioI" value="<?php echo $pessoaDAO->pegaSalario($conexao,$codigo); ?>"
									placeholder="Digite o valor do salário do Instrutor a ser cadastrado" required>

									<span id="spanSpecial">Carga Horária do Instrutor</span><br>
									<small class="smallCadastro">A Carga Horária deverá ser um valor inteiro representando as horas.</small>
									<input type="number" name="txtHorariaI" value="<?php echo $pessoaDAO->pegaCH($conexao,$codigo); ?>" required>

									<span id="spanSpecial">Imagem Instrutor</span>
									<input type="file" name="image" value="<?php echo $pessoaDAO->pegaImagem($conexao,$codigo); ?>"/>

									<button type="submit"´ id="botaoAlterar">ALTERAR</button>
								</div>
                            </form>
                            <br>

                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#selectCadastro').ready(function() {
                                        if($('#selectCadastro').val() == 'C') {
                                            $("#ClienteSel").show("slow");
                                            $("#InstrutorSel").hide("slow");
                                        }
                                        if($('#selectCadastro').val() == 'I') {
                                            $("#ClienteSel").hide("slow");
                                            $("#InstrutorSel").show("slow");
                                        }
                                    });
                                    $('#selectCadastro').change(function() {
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
