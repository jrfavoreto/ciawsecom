<?php
/**
 * Criado por: GM (T) Gabriel Gonçalves  - CFO 2020
 * Alterado por: GM (T) Jucelino Favoreto Jr - SMV 2020
 * */
    
 //Inicialização 
header("Content-type: text/html; charset=utf-8"); 
session_start();
//Verificação do usuário logado.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != TRUE) {
	header("location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cad Alunos - Secretaria do COMCA (CIAW)</title>

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
 
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- DataTables css -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"/>
   <!-- DataTables JS library -->
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  
</head>

<body>

<div class="titulo-banner row text-center">
            <img src="img/ciaw.png" alt="CIAW - Secretaria do COMCA">
            <span>Cad Alunos - Secretaria do COMCA</span>
      </div>
  <div class="d-flex" id="wrapper">
  
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Cad Alunos</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a onclick="exibirPagina('content1.php')" href="javascript:void(0)" class="list-group-item list-group-item-action bg-light">Conteúdo 1</a>
        <a onclick="exibirPagina('content2.php')" href="javascript:void(0)" class="list-group-item list-group-item-action bg-light">Conteúdo 2</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Usuários</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Turmas</a>
        <a onclick="exibirPagina('views/aluno-view.php')" href="javascript:void(0)" class="list-group-item list-group-item-action bg-light">Alunos</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sessão : [<?php echo $_SESSION['usuarioNome'] ?>]
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Permissões</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <main id="main" class="container-fluid">
      </main>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    function exibirPagina(pagina) {
        $("#main").load(pagina);
    }
    
  </script>

</body>

</html>
