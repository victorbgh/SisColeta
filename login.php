<?php
    session_start();
    if(isset($_SESSION['loggedIN'])){
        header('Location: ../index.php');
        exit();
    }
?>
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
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/third/owl.carousel.min.css">
    <link rel="stylesheet" href="css/third/owl.theme.default.min.css">
    <link href="css/third/magnific-popup.css" rel="stylesheet">
    <link href="css/ours/styles.css" rel="stylesheet">

    <link rel="icon" href="">
    
    <title>SisColeta - Login</title>
</head>
<body data-spy="scroll" data-target=".fixed-top">
    <div class="top" style="min-height: 95%;">

        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div id="header" class="navtop"></div>
        <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top topo" style="padding: 15px;">
            <span class="navbar-brand logo-image" href="login.html" 
            style="color: #000 !important; text-decoration: none; margin-left: auto; margin-right: auto; font-size: 2.25rem !important;">Sis<span style="color:green">Coleta</span></span>
        </nav>

        <div class="login-page">
            <div class="form">

                <form class="register-form" id="register-form">
                    <input type="text" name="cadNome" id="cadNome" placeholder="Nome completo"/>
                    <input type="text" name="cadEmail" id="cadEmail" placeholder="E-mail"/>
                    <input type="password" name="senha1" id="senha1"  placeholder="Senha"/>
                    <input type="password" name="senha2" id="senha2" placeholder="Repita a senha"/>
                    <button type="button" id="btn-register" onclick="registrar()">Registrar</button>
                    <p class="message">Já registrado? <a href="#" id="entrarLogin">Entrar</a></p>
                </form>

                <form class="login-form" id="login-form">
                    <input type="text" name="email" id="email" placeholder="E-mail"/>
                    <input type="password" name="senha" id="senha" placeholder="Senha"/>
                    <button type="button" id="login" onclick="logar()">login</button>
                    <p class="message">Não é registrado? <a href="#">Criar uma conta</a></p>
                </form>
                <p id="msgErroFront" class="text-center text-danger"></p>
                <!-- ARRUMAR -->
                <p class="text-center text-danger">
                    <?php
                        if(isset($_SESSION['loginErro'])){
                            echo $_SESSION['loginErro'];
                            unset($_SESSION['loginErro']);
                        }
                    ?>
                </p>
            </div>
        </div>
        <br>
        </div>
        <div class="copyright footer-style">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="p-small">© Copyright SisColeta 2019 Todos os direitos reservados</p>
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

</body>
</html>