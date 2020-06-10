<?php
    session_start();
    require_once("conexao.php");

    if(isset($_SESSION['loggedIN'])){
        header('Location: ../index.php');
        exit();
    }

    if (isset($_POST['login'])){

        $email = $conn->real_escape_string($_POST['email']);
        $senha = base64_encode($conn->real_escape_string($_POST['senha']));

        $data = $conn->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");

        if($data->num_rows > 0){
            $_SESSION['loggedIN'] = '1';
            $_SESSION['email'] = $email;
            
            while($row = $data->fetch_assoc()) {
                $_SESSION['id'] = $row["id"];
                $_SESSION['nome'] = $row["nome"];
                $_SESSION['admin'] = $row["admin"];
            }

            exit('success');
        } else
            exit('Login e/ou senha incorreto(s)!');
    }
?>