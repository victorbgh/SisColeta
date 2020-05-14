<?php
    require_once('php/conexao.php');
    session_start();
    if(!isset($_SESSION['loggedIN'])){
        header("Location: login.php");
        exit();
    }
 
    $sql = "SELECT id, nome, endereco, tipo, lat, lng, cep FROM lugares_coleta";
    $result = $conn->query($sql);
    $arr_users = [];
    if ($result->num_rows > 0) {
        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
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
                        <a class="nav-link page-scroll" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="cad-coleta.php">Cadastrar local de coleta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="maps.php">Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll current-page" href="locais.php">Buscar Locais <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a style="color: #000 !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <?php echo $_SESSION['nome'] ?> </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="conta.php"><i class="fa fa-cog"></i> Conta</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalLong" href="" onclick="confirmeSair()"><i class="fa fa-sign-out-alt"></i> Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="masked">
            <div class="container box-shadow">
                <div class="heading" style="padding: 20px;">
                        <h1>Locais de Coleta</h1>
                        <div class="divider"><span></span></div>
                <table id="usetTable" class="display">
                    <thead>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Tipo</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>CEP</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        <?php if(!empty($arr_users)) { ?>
                            <?php foreach($arr_users as $user) { ?>
                                <tr>
                                    <td><?php echo $user['nome']; ?></td>
                                    <td><?php echo $user['endereco']; ?></td>
                                    <td><?php echo $user['tipo']; ?></td>
                                    <td><?php echo $user['lat']; ?></td>
                                    <td><?php echo $user['lng']; ?></td>
                                    <td><?php echo $user['cep']; ?></td>
                                    <td>
                                    <button class="btn btn-outline-success btn-sm marginbutton" title="Editar Local">
                                    <a class="fa fa-pencil-alt" onclick="editarLocal(<?php echo $user['id']; ?>)"></a></button>
                                    <button class="btn btn-danger btn-sm marginbutton" title="Excluir Local">
                                    <a class="fa fa-times" onclick="excluirLocal(<?php echo $user['id']; ?>)"></a></button>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>


        <div class="copyright">
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
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
        <script src="js/ours/general.js"></script>
        <script src="js/ours/login.js"></script>
        <script src="js/ours/coleta.js"></script>
        <script src="js/ours/locais.js"></script>
    </div>
</body>

</html>