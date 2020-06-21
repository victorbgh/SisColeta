<?php
    session_start();
    if(!isset($_SESSION['loggedIN']) && isset($_SESSION['admin']) == 1){
        header("Location: login.php");
        exit();
    }
    $session_value=(isset($_SESSION['admin']))?$_SESSION['admin']:'';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SisColeta - Cadastrar local de coleta</title>

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
    <style>
      #cadMap {
        height: 20rem;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjchTw42oDieCVSdDFoKWw6Ua69xAf9AQ"></script>
    <script>

      var cadMap;
      function initialize() {
        var mapOptions = {
          zoom: 8,
          center: {lat: -15.814432199999997, lng: -47.888157299999996}
        };
        cadMap = new google.maps.Map(document.getElementById('cadMap'),
            mapOptions);

        var marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng(-34.397, 150.644)
          position: {lat: -15.814432199999997, lng: -47.888157299999996},
          cadMap: cadMap
        });

        google.maps.event.addListener(marker, 'click', function() {
          marker.setMap(null);
          infowindow.open(cadMap, marker);
        });

        google.maps.event.addListener(cadMap, 'click', function(event){
            marker.setMap(null);    
            marker = new google.maps.Marker({
                map:       cadMap,
                position:  event.latLng
            });     
        });

        google.maps.event.addListener(cadMap, 'click', function( event ){
          var lat = event.latLng.lat();
          var lng = event.latLng.lng();
          $('#lat').val(lat);
          $('#lng').val(lng);
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  <script type="text/javascript">
      var myvar = '<?php echo $session_value;?>';
      localStorage.setItem('admin', myvar);
  </script>
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
                    <a class="navbar-brand logo-image" href="index.php" style="color: #000 !important; text-decoration: none;">Sis<span style="color:green;">Coleta</span></a>
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
                    <li class="nav-item" id="cadColeta">
                        <a class="nav-link page-scroll current-page" href="cad-coleta.php">Cadastrar local de coleta <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="maps.php">Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="locais.php">Buscar Locais</a>
                    </li>
                    <li class="nav-item" id="cad-user">
                        <a class="nav-link page-scroll" href="cad-usuario.php">Cadastrar usuário</a>
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
                <div class="heading">
                    <h1>Cadastrar ponto de coleta</h1>
                    <div class="divider"><span></span></div>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="contact-block">
                          <form id="contactForm">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="nomeColeta" name="nomeLocal" placeholder="Nome do local" required data-error="Por favor, digite o nome do local">
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
                                  <input type="text" class="form-control" id="cidadeColeta" name="cidadeColeta" placeholder="Cidade" required data-error="Por favor, digite a cidade">
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
                                  <input type="text" class="form-control" id="telColeta" name="telColeta" placeholder="Telefone" required data-error="Por favor, digite o telefone">
                                  <div class="help-block with-errors"></div>
                                </div>                                 
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <select name="select" class="form-control" id="tipoLixo">
                                        <option value="valor1" selected>Selecione o tipo de lixo que o local recolhe</option> 
                                        <option value="Lixo eletrônico">Lixo eletrônico</option>
                                        <option value="lixo hospitalar">lixo hospitalar</option>
                                        <!-- <option value="lixo reciclável">lixo reciclavel</option> -->
                                        <option value="PEV">PEV - (Ponto de Entrega Voluntária)</option>
                                        <option value="LEV">LEV - (Locais de Entrega Voluntária)</option>
                                        <option value="Comércios">Comércios</option>
                                        <option value="Cooperativas">Cooperativas</option>
                                    </select>
                                  <div class="help-block with-errors"></div>
                                </div> 
                              <br>
                              </div>
                              <div class="col-md-12">
                                <h5>Defina a localização do ponto</h5>
                                <span style="font-weight: 600;">*Para definir a localização, basta clicar na região do mapa que deseja.</span>
                                <div class="divider"><span></span></div>
                              </div>
                              <div class="col-md-6">
                                <br>
                                <div class="form-group">
                                <label>latitude</label>
                                  <input type="text" placeholder="Latitude" id="lat" class="form-control latitude" name="lat" required data-error="Por favor, digite a latitude">
                                  <div class="help-block with-errors"></div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <br>
                                <div class="form-group">
                                  <label>Longitude</label>
                                  <input type="text" placeholder="Longitude" id="lng" class="form-control longitude" name="lng" required data-error="Por favor, digite a longitude">
                                  <div class="help-block with-errors"></div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div id="cadMap"></div>
                              </div>
                              <div class="col-md-12">
                              <br>
                                <div class="submit-button text-center">
                                  <button type="button" class="btn btn-success" onclick="registrarPonto()">Cadastrar</button>
                                  <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                  <div class="clearfix"></div> 
                                </div>
                              </div>
                            </div>            
                          </form>
                          <br>
                          <p id="msgErroFront" class="text-center text-danger"></p>
                          <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright footer-style" style="position: unset !important;">
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