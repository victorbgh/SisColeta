<?php
    session_start();
    if(!isset($_SESSION['loggedIN'])){
        header("Location: login.php");
        exit();
    }
?>

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
                  <a class="nav-link page-scroll" href="cad-coleta.php">Cadastrar local de coleta </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link page-scroll" href="maps.php">Mapa <span class="sr-only">(current)</span></a>
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
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          downloadUrl('php/marcadores.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}

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
    <script src="js/ours/login.js"></script>
  </body>
</html>