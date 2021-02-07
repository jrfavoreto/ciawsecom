<?php
   require('../db/config-db-rm2.php');

   //Criar a conexao
   $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
	
	mysqli_set_charset($conn,"utf8");
	
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }
?>
