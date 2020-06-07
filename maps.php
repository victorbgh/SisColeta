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
    <title>SisColeta - Mapa</title>
    <meta charset="utf-8">
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

    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top ">
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
              <li class="nav-item">
                  <a class="nav-link page-scroll" href="cad-coleta.php">Cadastrar local de coleta </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link page-scroll current-page" href="maps.php">Mapa <span class="sr-only">(current)</span></a>
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
                      <a class="dropdown-item" href="#" onclick=selecionarConta(<?php echo $_SESSION['id'] ?>)><i class="fa fa-cog"></i> Conta</a>
                      <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalLong" href="" onclick="confirmeSair()"><i class="fa fa-sign-out-alt"></i> Sair</a>
                  </div>
              </li>
          </ul>
        </div>
    </nav>

    <div id="map"></div>



    <div class="copyright footer-style">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <p class="p-small">© Copyright SisColeta 2020 Todos os direitos reservados</p>
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
        },
        PEV: {
          label: 'PEV'
        },
        LEV: {
          label: 'LEV',
        },
        Cooperativas: {
          label: 'COP'
        },
        Comércios: {
          label: 'CME'
        },
        lixoreciclável: {
          label: 'LR'
        },
        Lixoeletrônico: {
          label: 'LE'
        },
        lixohospitalar: {
          label: 'LH'
        }
        


      };

      var pos_ini;
      var map, infoWindow, markerA, markerB, drag_pos;
      var posicaoUsuario;
      // var inicio = new google.maps.LatLng(-15.81443, -47.88816130000001);
      // var fim = new google.maps.LatLng(-15.814179, -47.903618);

      var directionsRenderer1, directionsRenderer2;
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer;
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -15.814432199999997, lng: -47.888157299999996},
          zoom: 13
        });
        infoWindow = new google.maps.InfoWindow;
        directionsRenderer1 = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true
        });
        directionsRenderer2 = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true,
            polylineOptions: {
                strokeColor: "green"
            }
        });
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            pos_ini = pos;
            // infoWindow.setPosition(pos);
            var image = 'http://i.stack.imgur.com/orZ4x.png';
            var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    icon: image
                });
                directionsRenderer.setMap(map);
            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = 'Voce está aqui!'
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));
            marker.addListener('click', function() {

              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      


      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

        downloadUrl('php/marcadores.php', function(data) {
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName('marker');
          Array.prototype.forEach.call(markers, function(markerElem) {
            // console.log(markerElem);
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var cep = markerElem.getAttribute('cep');
            var cidade = markerElem.getAttribute('cidade');
            var telefone = markerElem.getAttribute('telefone');

            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('div');
            strong.textContent = name
            strong.setAttribute('class', 'title-maps');
            infowincontent.appendChild(strong);
            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            infowincontent.appendChild(document.createElement('br'));

            var tipo = document.createElement('text');
            tipo.textContent = type;
            infowincontent.appendChild(tipo);
            infowincontent.appendChild(document.createElement('br'));

            var city = document.createElement('text');
            city.textContent = cidade;
            infowincontent.appendChild(city);
            infowincontent.appendChild(document.createElement('br'));

            var tel = document.createElement('text');
            tel.textContent = telefone;
            infowincontent.appendChild(tel);
            infowincontent.appendChild(document.createElement('br'));

            var caixaPostal = document.createElement('text');
            caixaPostal.textContent = MascaraCep(cep);
            infowincontent.appendChild(caixaPostal);
            infowincontent.appendChild(document.createElement('br'));
            var distancia = document.createElement('text');
            distancia.setAttribute('id', 'distanciaPonto');;
            infowincontent.appendChild(distancia);
            infowincontent.appendChild(document.createElement('br'));
            var tempoPonto = document.createElement('text');
            tempoPonto.setAttribute('id', 'tempoPonto');
            infowincontent.appendChild(tempoPonto);
            infowincontent.appendChild(document.createElement('br'));
            
            var typeSemEspaco = type.replace(/\s/g, '');
            var icon = customLabel[typeSemEspaco] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              label: icon.label
            });
            marker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });
            google.maps.event.addListener(marker, 'click', function(evt) {
                  var drag_pos1 = {
                      lat: evt.latLng.lat(),
                      lng: evt.latLng.lng()
                  };

                  directionsService.route({
                          origin: pos_ini,
                          destination: drag_pos1,
                          travelMode: 'DRIVING',
                          provideRouteAlternatives: true
                      },
                      function(response, status) {
                          if (status === 'OK') {

                              for (var i = 0, len = response.routes.length; i < len; i++) {
                                  if (i === 0) {
                                      directionsRenderer1.setDirections(response);
                                      directionsRenderer1.setRouteIndex(i);

                                  } else {

                                      directionsRenderer2.setDirections(response);
                                      directionsRenderer2.setRouteIndex(i);
                                  }
                              }
                              console.log(response);
                          } else {
                              window.alert('Directions request failed due to ' + status);
                          }
                      });

                      function CalculaDistancia(origem, destino) {
                          var service = new google.maps.DistanceMatrixService();
                          service.getDistanceMatrix(
                        {
                            origins: [origem],
                            destinations: [destino],
                            travelMode: google.maps.TravelMode.DRIVING
                        }, callback);
                      }
                      function callback(response, status) {
                          if (status == google.maps.DistanceMatrixStatus.OK) {
                            $('#distanciaPonto').append(response.rows[0].elements[0].distance.text);
                            $('#tempoPonto').append(response.rows[0].elements[0].duration.text);
                          }
                      }
                      var i = CalculaDistancia(pos_ini, drag_pos1);
              });
          });
        });

      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }

        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsRenderer.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
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