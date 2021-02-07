<?php

//session_start();
//Verificação do usuário logado.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != TRUE) {
	header("location: login.php");
	exit();
}
?>