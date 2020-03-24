<!DOCTYPE html>
<html>
  <head>
    <title>Rayer Maps - Mapa</title>
    <meta charset="utf-8">
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

    <link rel="icon" href="images/faviconCMA.ico">

  </head>

  <body data-spy="scroll" data-target=".fixed-top">

    <div class="spinner-wrapper">
      <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
      </div>
    </div>

    <div id="header" class="navtop"></div>

    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top " style="top: 20px;">
    <!-- <a class="navbar-brand logo-image" href="index.html"><img src="images/logo-transparente.png"
            alt="alternative" height="auto" width="180"></a> -->
            <a class="navbar-brand logo-image" href="index.html" style="color: #000 !important; text-decoration: none;">Rayer Maps</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cma-navbars"
          aria-controls="cma-navbars" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-awesome fas fa-bars"></span>
          <span class="navbar-toggler-awesome fas fa-times"></span>
      </button>
      <div class="collapse navbar-collapse" id="cma-navbars">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link page-scroll" href="index.html">Inicio </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link page-scroll" href="cad-coleta.html">Cadastrar local de coleta </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link page-scroll" href="maps.html">Mapa <span class="sr-only">(current)</span></a>
              </li>
          </ul>
        </div>
    </nav>

    <div id="map"></div>



    <div class="copyright">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <p class="p-small">© Copyright Rayer Maps 2019 Todos os direitos reservados</p>
              </div>
          </div>
      </div>
    </div>

    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -15.8102797, lng: -47.8921486},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjchTw42oDieCVSdDFoKWw6Ua69xAf9AQ&callback=initMap"
    async defer></script>
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
  </body>
</html>