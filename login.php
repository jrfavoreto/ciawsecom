<?php
//Inicialização 
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="">
        <title>Login - Cad Alunos - Secretaria do COMCA (CIAW)</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <style type="text/css">
            #logo-ciaw{
                height: 100px;
            }
            
        </style>
    </head>
    <body>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 text-center mb-0">
                        <img id="logo-ciaw" src="img/ciaw.png">
                    </div>
					<center>
					<div class="mb-5">
					<?php 
					echo nl2br ("Centro de Instrução Almirante Wandenkolk \n");
					echo nl2br ("Comando do Corpo de Alunos \n");
					echo "Secretaria do COMCA";
					?>
					</div>
					</center>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <!-- form card login -->
                            <div class="card rounded-0" id="login-form">
                                <div class="card-header">
                                    <h3 class="mb-0">User Login</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form" role="form" autocomplete="off" action="valida-login.php" id="formLogin" novalidate="" method="POST">
                                        <div class="form-group">
                                            <label for="uname1">Login</label>
                                            <input type="text" class="form-control form-control-lg rounded-0" name="login" id="uname1" placeholder="Login" required="" autofocus>

                                        </div>
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="password" class="form-control form-control-lg rounded-0" name="senha" id="pwd1" placeholder="Senha" required="">

                                        </div>
                                        <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                                    </form>
                                    <p>
                                        <?php
                                        //Recuperando o valor da variável global, os erros de login.
                                        if (isset($_SESSION['loginErro'])) {
                                            echo $_SESSION['loginErro'];
                                            unset($_SESSION['loginErro']);
                                        }
                                        ?>
                                    </p>
                                    <p>
                                        <?php
                                        //Recuperando o valor da variável global, deslogado com sucesso.
                                        if (isset($_SESSION['logindeslogado'])) {
                                            echo $_SESSION['logindeslogado'];
                                            unset($_SESSION['logindeslogado']);
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>	