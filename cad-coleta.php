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

    <title>Rayer Maps - Cadastrar local de coleta</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700?v=0.6" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="css/third/bootstrap.css" rel="stylesheet">
    <link href="css/third/fontawesome-all.css" rel="stylesheet">
    <link href="css/third/swiper.css" rel="stylesheet">
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
            <!-- <a class="navbar-brand logo-image" href="index.php"><img src="images/logo-transparente.png"
                    alt="alternative" height="auto" width="180"></a> -->
                    <a class="navbar-brand logo-image" href="index.php" style="color: #000 !important; text-decoration: none;">Rayer Maps</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cma-navbars"
                aria-controls="cma-navbars" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="cma-navbars">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php">Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="cad-coleta.php">Cadastrar local de coleta <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="maps.php">Mapa</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a style="color: #000 !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> Victor</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Conta</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalLong" href="" onclick="confirmeSair()"><i class="fa fa-sign-out-alt"></i> Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="masked">
            <div class="container box-shadow">
                <div class="heading">
                    <h1>Cadastrar ponto de coleta</h1>
                    <div class="divider"><span></span></div>

                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="contact-block">
                          <form id="contactForm">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Nome do local" required data-error="Por favor, digite o nome do local">
                                  <div class="help-block with-errors"></div>
                                </div>                                 
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" placeholder="Endereço" id="endereco" class="form-control" name="endereco" required data-error="Por favor, digite o endereço">
                                  <div class="help-block with-errors"></div>
                                </div> 
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required data-error="Por favor, digite o CEP">
                                  <div class="help-block with-errors"></div>
                                </div>                                 
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <select name="select" class="form-control">
                                        <option value="valor1" selected>Selecione o tipo de lixo que o local recolhe</option> 
                                        <option value="valor2">Lixo eletrônico</option>
                                        <option value="valor3">lixo hospitalar</option>
                                    </select>
                                  <div class="help-block with-errors"></div>
                                </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <input type="number" placeholder="Latitude" id="lat" class="form-control" name="lat" required data-error="Por favor, digite a latitude">
                                  <div class="help-block with-errors"></div>
                                </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <input type="number" placeholder="Longitude" id="lng" class="form-control" name="lng" required data-error="Por favor, digite a longitude">
                                  <div class="help-block with-errors"></div>
                                </div> 
                              </div>
                              <div class="col-md-12">
                                <div class="submit-button text-center">
                                  <button class="btn btn-success" id="submit" type="submit">Cadastrar</button>
                                  <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                  <div class="clearfix"></div> 
                                </div>
                              </div>
                            </div>            
                          </form>
                        </div>
                    </div>
                </div>
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
        <script src="js/ours/login.js"></script>
    </div>
</body>

</html>