<?php
    session_start();
    require_once("conexao.php");

    // if(isset($_SESSION['loggedIN'])){
    //     header('Location: ../index.php');
    //     exit();
    // }

    if (isset($_POST['coleta'])){

        $nome = $conn->real_escape_string($_POST['nome']);
        $endereco = $conn->real_escape_string($_POST['endereco']);
        $cep = floatval ($conn->real_escape_string($_POST['cep']));
        $tipo = $conn->real_escape_string($_POST['tipo']);
        $lat = floatval ($conn->real_escape_string($_POST['lat']));
        $lng = floatval ($conn->real_escape_string($_POST['lng']));



        $result_coleta = "INSERT INTO lugares_coleta(nome, endereco, lat, lng, tipo, cep) VALUES ('$nome','$endereco', '$lat', '$lng', '$tipo', '$cep')";
        $resultado_coleta = mysqli_query($conn, $result_coleta);
        
        if(mysqli_affected_rows($conn) != 0){
            $_SESSION['cadColeta'] = '1';
            $_SESSION['email'] = $nome;
            exit('success');
        }else{

            exit("erro");  
        }
        
    }else{
        exit("erro no servidor");
    }
?>