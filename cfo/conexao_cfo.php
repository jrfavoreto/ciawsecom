<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "ciaw_secom_comca_cfo";    
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    $conn_cfo = mysqli_connect($servidor, $usuario, $senha, $dbname);

    
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }
?>