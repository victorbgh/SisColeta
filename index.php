<?php
    session_start();
    if(!isset($_SESSION['loggedIN'])){
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SisColeta - Página inicial</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700?v=0.6" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="css/third/bootstrap.css" rel="stylesheet">
    <link href="css/third/fontawesome-all.css" rel="stylesheet">
    <link href="css/third/swiper.css" rel="stylesheet">
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/third/owl.carousel.min.css">
    <link rel="stylesheet" href="css/third/owl.theme.default.min.css">
    <link href="css/third/magnific-popup.css" rel="stylesheet">
    <link href="css/ours/styles.css" rel="stylesheet">

    <link rel="icon" href="images/faviconCMA.ico">
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <div class="top">

        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div id="header" class="navtop"></div>

        <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
            <a class="navbar-brand logo-image" href="index.php" style="color: #000 !important; text-decoration: none;">Sis<span style="color:green;">Coleta</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cma-navbars"
                aria-controls="cma-navbars" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="cma-navbars">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll current-page" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="cad-coleta.php">Cadastrar local de coleta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="maps.php">Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="locais.php">Buscar Locais</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a style="color: #000 !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <?php echo $_SESSION['nome'] ?> </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onclick=selecionarConta(<?php echo $_SESSION['id'] ?>) ><i class="fa fa-cog"></i> Conta</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalLong" href="" onclick="confirmeSair()"><i class="fa fa-sign-out-alt"></i> Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="masked">
            <div class="container box-shadow">
                <div class="heading" style="padding: 20px;">
                    <h1 style="text-transform: capitalize;">Sis<span style="color:green;">Coleta</span></h1>
                    <div class="divider"><span></span></div>
                    <p>Bem vindo ao <b style="color:#000">Sis</b><span style="color:green;">Coleta</span>, o objetivo do sistema é centralizar todos os pontos de coleta, descarte e postos de coleta de lixo reciclavel.</p>
                    <p>Os tipos de ponto de coleta no sistema são:</p>
                    <br>
                    <p><b>- Lixo eletrônico</b></p>
                    <br>
                    <p>Locais que recebem todo o tipo de residuos eletrônicos como fones de ouvido quebrados, celulares velhos, partes de carregadores que 
                    não funcionam mais, pilhas, e muitos outros. </p>
                    <br>
                    <p><b>- Lixo hospitalar</b></p>
                    <br>
                    <p>Locais em que recebem o descarte de chapas 
                    de raio-x, ultrassom ou tomografia.</p>
                    <br>
                    <p><b>- Lixo reciclavel&nbsp;</b></p>
                    <br>
                    <p>Residuos destinados para reciclagem como papel, pet, alumínio, vidro, metal.</p>
                    <br>
                    <p><b>- PEV (Ponto de Entrega Voluntária)</b></p>
                    <br>
                    <p>São os locais que recebem embalagens longa vida (entre outros materiais) para serem enviados à reciclagem. é o primeiro passo do processo, 
                    onde o material doméstico (pouco volume) geralmente é entregue.</p>
                    <br>
                    <p><b>- LEV (Locais de Entrega Voluntária)</b></p>
                    <br>
                    <p> Locais de Entrega Voluntária de Resíduos Recicláveis. São contêineres, sacos ou outros dispositivos instalados em espaços públicos
                     ou privados monitorados, para recebimento de recicláveis.</p>
                    <br>
                    <p><b>- Comércios</b></p>
                    <br>
                    <p>Locais que compram material longa vida (e outros materiais recicláveis) para beneficiamento e envio aos recicladores. 
                    Eles adquirem o material, geralmente em grande quantidade, principalmente das cooperativas. </p>
                    <br>
                    <p><b>- Cooperativas</b></p>
                    <br>
                    <p>Iniciativas sociais que trabalham com a coleta e triagem do material reciclável (inclusive embalagem longa vida) para beneficiamento e 
                    envio aos recicladores.</p>
                    <br>
                    <br>
                    <p>No mapa, você tera a opção de mostrar todos pontos cadastrados por todos os usuários com sua distância e tempo, além de ter a possibilidade listar os pontos
                    filtrando pelo o que deseja.</p>
                    <br>
                    <p>Este protótipo foi desenvolvido para o trabalho de conclusão de curso da faculdade UPIS - UNIÃO PIONEIRA DE INTEGRAÇÃO SOCIAL pelo curso de sistemas de informação</p>
                </div>
            </div>
        </div>


        <div class="copyright footer-style" style="position: unset !important; margin-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="p-small">© Copyright SisColeta 2020 Todos os direitos reservados</p>
                    </div>
                </div>
            </div>
        </div>

        

        <script src="js/third/jquery.min.js"></script>
        <script src="js/third/jquery.mask.min.js"></script>
        <script src="js/third/popper.min.js"></script>
        <script src="js/third/bootstrap.min.js"></script>
        <script src="js/third/jquery.easing.min.js"></script>
        <script src="js/third/swiper.min.js"></script>
        <script src="js/third/jquery.magnific-popup.js"></script>
        <script src="js/third/morphext.min.js"></script>
        <script src="js/third/validator.min.js"></script>
        <script src="js/third/owl.carousel.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="js/ours/general.js"></script>
        <script src="js/ours/login.js"></script>
        <script src="js/ours/coleta.js"></script>
    </div>
</body>

</html>