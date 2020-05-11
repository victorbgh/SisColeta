<?php
    session_start();
    require_once("conexao.php");

    if(isset($_SESSION['loggedIN'])){
        header('Location: ../index.php');
        exit();
    }

    if (isset($_POST['login'])){

        $nome = $conn->real_escape_string($_POST['nome']);
        $email = $conn->real_escape_string($_POST['email']);
        $senha = md5($conn->real_escape_string($_POST['senha']));
        $senhaRepetida = md5($conn->real_escape_string($_POST['senhaRepetida']));

        if($senha != $senhaRepetida){
            exit("ERRO");
        }else{
            
            $result_usuario = "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome','$email', '$senha')";
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
    }
?>