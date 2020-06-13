<?php
    session_start();
    require_once("conexao.php");

    // if(isset($_SESSION['loggedIN'])){
    //     header('Location: ../index.php');
    //     exit();
    // }
    $id = $conn->real_escape_string($_POST['id']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $endereco = $conn->real_escape_string($_POST['endereco']);
    $cep = floatval ($conn->real_escape_string($_POST['cep']));
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $lat = floatval ($conn->real_escape_string($_POST['lat']));
    $lng = floatval ($conn->real_escape_string($_POST['lng']));
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $cidade = $conn->real_escape_string($_POST['cidade']);
        
    $result_usuario = "UPDATE `lugares_coleta` SET `nome`='$nome', `endereco`='$endereco', `cep`='$cep', `tipo`='$tipo', `lat`='$lat', `lng`='$lng', `telefone`='$telefone', `cidade`='$cidade' WHERE id=$id";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    
    if(mysqli_affected_rows($conn) != 0){
        exit('success');   
    }else{
        exit("erro");  
    }
    
    
?>