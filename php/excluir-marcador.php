<?php
    require_once('conexao.php');
    session_start();
    // if(!isset($_SESSION['loggedIN'])){
    //     header("Location: login.php");
    //     exit();
    // }

    $id = $conn->real_escape_string($_POST['id']);
 
    // $data = $conn->query("SELECT id, nome, email, senha FROM usuarios WHERE id='$id'");
    // $sql = "DELETE FROM `lugares_coleta` WHERE id ='$id'"
    $sql = "DELETE FROM `lugares_coleta` WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
    

?>