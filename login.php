<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700?v=0.6" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="css/third/bootstrap.css" rel="stylesheet">
    <link href="css/third/fontawesome-all.css" rel="stylesheet">
    <link href="css/third/swiper.css" rel="stylesheet">
    <link rel="stylesheet" href="css/third/owl.carousel.min.css">
    <link rel="stylesheet" href="css/third/owl.theme.default.min.css">
    <link href="css/third/magnific-popup.css" rel="stylesheet">
    <link href="css/ours/styles.css" rel="stylesheet">

    <link rel="icon" href="">
    
    <title>Rayer Maps - Login</title>
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
        <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top" style="top: 20px; padding: 15px;">
            <span class="navbar-brand logo-image" href="login.html" 
            style="color: #000 !important; text-decoration: none; margin-left: auto; margin-right: auto; font-size: 2.25rem !important;">Rayer Maps</span>
        </nav>

        <div class="login-page">
            <div class="form">
            <form class="register-form" id="login-form" role="form" action="php/login.php" method="post">
                <input type="text" placeholder="Nome completo"/>
                <input type="password" placeholder="Senha"/>
                <input type="text" placeholder="E-mail"/>
                <button>Registrar</button>
                <p class="message">Já registrado? <a href="#">Entrar</a></p>
            </form>
            <form class="login-form">
                <input type="text" placeholder="E-mail"/>
                <input type="password" placeholder="Senha"/>
                <button id="btn-login">login</button>
                <p class="message">Não é registrado? <a href="#">Criar uma conta</a></p>
            </form>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="p-small">© Copyright Rayer Maps 2019 Todos os direitos reservados</p>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/third/jquery.min.js"></script>
        <script src="js/third/popper.min.js"></script>
        <script src="js/third/bootstrap.min.js"></script>
        <script src="js/third/jquery.easing.min.js"></script>
        <script src="js/third/swiper.min.js"></script>
        <script src="js/third/jquery.magnific-popup.js"></script>
        <script src="js/third/morphext.min.js"></script>
        <script src="js/third/validator.min.js"></script>
        <script src="js/third/owl.carousel.min.js"></script>
        <script src="js/ours/general.js"></script>
    </div>
</body>
</html>