<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "ciaw_secom_comca_rm2";  
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    //$conn_rm2 = mysqli_connect($servidor, $usuario, $senha, $dbname);//conexão sobrando...
	
	mysqli_set_charset($conn,"utf8");
	
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }
?>