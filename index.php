<?php
/**
 * Criado por: GM (T) Gabriel Gonçalves  - CFO 2020
 * Alterado por: GM (T) Jucelino Favoreto Jr - SMV 2020
 * */
    
 //Inicialização 
session_start();
header("Content-type: text/html; charset=utf-8"); 
include_once("config-app.php");
include_once("check-session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cad Alunos - Secretaria do COMCA (CIAW)</title>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
 
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet" type="text/css">
  <!-- DataTables css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.css"/>
 
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
        <a href="#" class="list-group-item list-group-item-action bg-light">Cursos</a>
        <a onclick="exibirPagina('views/aluno-view.php')" href="javascript:void(0)" class="list-group-item list-group-item-action bg-light">Alunos</a>
        <a onclick="exibirPagina('views/aluno-view2.php')" href="javascript:void(0)" class="list-group-item list-group-item-action bg-light">Alunos 2</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Usuários</a>
        <a onclick="exibirPagina('content1.php')" href="javascript:void(0)" class="list-group-item list-group-item-action bg-light">Conteúdo 1</a>
        <a onclick="exibirPagina('content2.php')" href="javascript:void(0)" class="list-group-item list-group-item-action bg-light">Conteúdo 2</a>
        
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

<footer class="container">	
  <div class="text-center">		
    <p>&copy;2021 - CIAW</p>		
  </div>
</footer>

 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/jquery/jquery.maskedinput.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables JS library -->
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>
 

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

<?php 
    if(isset($_GET["page"]) && $_GET["page"] != "") {
      $pagina = $_GET["page"];
      unset($_GET["page"]);
      echo "<script> exibirPagina('". $pagina ."'); </script>";
    } ?>
</body>

</html>
