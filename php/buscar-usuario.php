<?php
    require_once('conexao.php');
    session_start();
    if(!isset($_SESSION['loggedIN'])){
        header("Location: login.php");
        exit();
    }

    $id = $conn->real_escape_string($_POST['id']);
 
    // $data = $conn->query("SELECT id, nome, email, senha FROM usuarios WHERE id='$id'");
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $result = $conn->query($sql);
    $arr_users = [];

    if ($result->num_rows > 0) {
        // $result['senha'] = base64_decode($result['senha']);
        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
    }
    echo json_encode($arr_users);
    

?>