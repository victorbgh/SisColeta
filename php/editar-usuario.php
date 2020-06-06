<?php
    session_start();
    require_once("conexao.php");

    // if(isset($_SESSION['loggedIN'])){
    //     header('Location: ../index.php');
    //     exit();
    // }

    $id = $conn->real_escape_string($_POST['id']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = base64_encode($conn->real_escape_string($_POST['senha']));
    $senhaRepetida = base64_encode($conn->real_escape_string($_POST['senhaRepetida']));

    if($senha != $senhaRepetida){
        exit("ERRO");
    }else{
        
        $result_usuario = "UPDATE `usuarios` SET `nome`='$nome', `email`='$email', `senha`='$senha' WHERE id=$id";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        
        if(mysqli_affected_rows($conn) != 0){
            $_SESSION['loggedIN'] = '1';
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $nome;
            exit('success');   
        }else{

            exit("erro");  
        }
    }
    
?>