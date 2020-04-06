<?php
    $servidor = "y06qcehxdtkegbeb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $usuario = "i3n87jtanlh2jrzm";
    $senha = "fsw5gbc10hry2fxf";
    $dbname = "rayer-maps-jawsdb";    
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }      
?> 
