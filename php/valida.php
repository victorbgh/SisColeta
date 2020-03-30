<?php
    session_start();
    require_once("conexao.php");

    if(isset($_SESSION['loggedIN'])){
        header('Location: ../index.php');
        exit();
    }

    if (isset($_POST['login'])){

        $email = $conn->real_escape_string($_POST['email']);
        $senha = md5($conn->real_escape_string($_POST['senha']));

        $data = $conn->query("SELECT id FROM usuarios WHERE email='$email' AND senha='$senha'");
        if($data->num_rows > 0){
            $_SESSION['loggedIN'] = '1';
            $_SESSION['email'] = $email;
            exit('success');
        } else
            exit('Login e/ou senha incorreto(s)!');
    }
?>