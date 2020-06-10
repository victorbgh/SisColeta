<?php
    //Usar em ambiente de desenvolvimento, comentar o de teste
    // $servidor = "localhost";
    // $usuario = "root";
    // $senha = "";
    // $dbname = "sis-coleta";    

    //Usar quando for commitar, ambiente de teste, comentar o de desenvolvimento e usar estas configurações    
    $servidor = "y06qcehxdtkegbeb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $usuario = "i3n87jtanlh2jrzm";
    $senha = "fsw5gbc10hry2fxf";
    $dbname = "r0tjw4s3p2fujgyk";  



    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }      
?> 
