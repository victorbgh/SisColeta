<?php
    session_start();
    require_once("conexao.php");

    if(isset($_SESSION['loggedIN'])){
        header('Location: ../index.php');
        exit();
    }



    $sql = "SELECT id, first_name, last_name, age FROM users";
    $result = $conn->query($sql);
    $arr_users = [];
    if ($result->num_rows > 0) {
        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
    }
    