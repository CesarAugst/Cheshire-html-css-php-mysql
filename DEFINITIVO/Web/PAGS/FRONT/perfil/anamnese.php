<!DOCTYPE html>
<?php
include("../../BACK/conexao.php");
include("../../BACK/bancoUsuario.php");
include("../../BACK/bancoAnamnese.php");
session_start();
if ($_SESSION['log'] != 'ativo') {
    session_destroy();
    header("location: pagLogin.php");
}
?>

<html lang="pt-BR" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Perfil - saúde</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="../../../csspg/linearicons.css">
    <link rel="stylesheet" href="../../../csspg/font-awesome.min.css">
    <link rel="stylesheet" href="../../../csspg/bootstrap.css">
    <link rel="stylesheet" href="../../../csspg/magnific-popup.css">
    <link rel="stylesheet" href="../../../csspg/jquery-ui.css">
    <link rel="stylesheet" href="../../../csspg/nice-select.css">
    <link rel="stylesheet" href="../../../csspg/animate.min.css">
    <link rel="stylesheet" href="../../../csspg/owl.carousel.css">
    <link rel="stylesheet" href="../../../csspg/jquery-ui.css">
    <link rel="stylesheet" href="../../../csspg/main.css">
    <link rel="stylesheet" type="text/css" href="../meuCss/estiloso.css">
</head>

<body>
    <!-- Cabeçalho -->
    <header id="header">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-4 header-top-left">
                        <a href="tel:+9530123654896"><span class="lnr lnr-phone-handset"></span> <span class="text"><span class="text">+55 11 4148-2099</span></span></a>
                        <a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text"><span class="text">faleconosco@etecdecotia.com.br</span></span></a>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right">
                        <?php
                        echo "Olá, <b>" . $_SESSION['nome'] . " </b>";
                        ?>
                        <a href="../../BACK/logout.php" class="primary-btn text-uppercase ml-5">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="pagInicio.php"><img src="../../../img/cheshire1.png" width="130px" height="100px" alt="" title="" /></a>
                    <img src="../../../img/cps50a.png" height="90px" width="200px">
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-has-children"><a href="">Transtornos</a>
                            <ul>
                                <li><a href="../pagTranstornoEmocional.php">Emocionais</a></li>
                                <li><a href="../pagTranstornoAlimentar.php">Alimentares</a></li>
                            </ul>
                        </li>
                        <li><a href="../pagDefasagem.php">Defasagem</a></li>
                        <li><a href="../pagDesmotivação.php">Desmotivação</a></li>
                        <li><a href="../pagProblemasFamiliares">Problemas familiares</a></li>
                        <li><a href="../pagContato.php">Contato</a></li>
                        <li><a href="index.php">Perfil</a></li>
                        <li class="menu-has-children"><a href="">Mensagens</a>
                            <ul>
                                <li><a href="../pagCaixaMsg.php">Mensagens recebidas</a></li>
                                <li><a href="../pagEnviar.php">Enviar mensagem</a></li>
                                <li><a href="../pagMsgLida.php">Mensagens lidas</a></li>
                                <li><a href="../pagCaixaMsgEnv.php">Mensagens enviadas</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- Fim do cabeçalho -->

    <!-- Banner Area -->
    <section class=" relative mensagem-banner " id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content blog-header-content col-lg-12">
                    <h1 class="text-white">
                        Perfil do usuário
                    </h1>

                </div>
            </div>
        </div>
    </section>
    <div class="container mb-5">
        <div class="row align-items-top">
            <div class="col-sm-2 border-right"><br>
                <nav class="nav flex-column">
                    <a class="nav-link text-light bg-secondary border rounded" href="index.php">Perfil</a>
                    <a class="nav-link text-dark bg-success border rounded" href="anamnese.php">Mais informações</a>
                    <a class="nav-link text-light bg-secondary border rounded" href="familia.php">Familia</a>
                    <a class="nav-link text-light bg-secondary border rounded" href="saude.php">Saúde</a>
                    <a class="nav-link text-light bg-secondary border rounded" href="desenvolvimento.php">Desenvolvimento</a>
                    <a class="nav-link text-light bg-secondary border rounded" href="escolarizacao.php">Escolarização</a>
                </nav>
            </div>
            <div class="col-8"><br>
                <h5 class="bg-light border rounded nav-link">
                    Nome completo: <?= nome($conexao,$_SESSION['rm'])['nome'] ?> <?= snome($conexao,$_SESSION['rm'])['sobrenome'] ?><br>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Data de Nascimento: <?= date('d/m/Y',strtotime(nascimento($conexao,$_SESSION['rm'])['dt_nascimento'])) ?><br>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Celular: (<?= celular($conexao,$_SESSION['rm'])['ddd']?>)<?=celular($conexao,$_SESSION['rm'])['numero']?><br>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    email: <?= email($conexao,$_SESSION['rm'])['endereco'] ?><br>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    CPF: <?= cpf($conexao,$_SESSION['rm'])['cpf']?><br>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Sexo: <?php sexo($conexao,$_SESSION['rm'])['sexo'] == 'm'? $s= "Masculino": $s="Feminino";echo $s?><br>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Naturalidade: <?= naturalidade($conexao,$_SESSION['rm'])['naturalidade'] ?><br>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    CEP: <?= cep($conexao,$_SESSION['rm'])['cep'] ?>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Logradouro: <?= logradouro($conexao,$_SESSION['rm'])['lograduro'] ?>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Número: <?= numero($conexao,$_SESSION['rm'])['numero'] ?>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Bairro: <?= bairro($conexao,$_SESSION['rm'])['bairro'] ?>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Cidade: <?= cidade($conexao,$_SESSION['rm'])['cidade'] ?>
                </h5>
                <h5 class="bg-light border rounded nav-link">
                    Estado: <?= estado($conexao,$_SESSION['rm'])['estado'] ?>
                </h5>
            </div>
        </div>

    </div>
    <footer class="footer-area section-gap	">
        <div class="container">
            <div class="text-center">
                <img class="d-block" src="../../../img/logo_cps2.png">
            </div>
            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> Etec de Cotia <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.cps.sp.gov.br" target="_blank">Centro Paula Souza</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="https://www.facebook.com/etecdecotia"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/etecdecotia"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->


    <script src="../../../js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="../../../js/jquery-ui.js"></script>
    <script src="../../../js/easing.min.js"></script>
    <script src="../../../js/hoverIntent.js"></script>
    <script src="../../../js/superfish.min.js"></script>
    <script src="../../../js/jquery.ajaxchimp.min.js"></script>
    <script src="../../../js/jquery.magnific-popup.min.js"></script>
    <script src="../../../js/jquery.tabs.min.js"></script>
    <script src="../../../js/jquery.nice-select.min.js"></script>
    <script src="../../../js/owl.carousel.min.js"></script>
    <script src="../../../js/mail-script.js"></script>
    <script src="../../../js/main.js"></script>
</body>

</html>