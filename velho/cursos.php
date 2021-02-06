<?php
//Inicialização 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="GM (T) Gabriel Gonçalves CFO 2020 - Imagem do IRAM cedida pelo CT (AA) Marcio">
        <title>Login - SECOM do COMCA CIAW - Criado pelo GM (T) Gabriel Gonçalves CFO 2020</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 text-center mb-0">
                        <img src="ciaw3.png">
                    </div>
					<center>
					<div class="mb-5">
					<?php 
				echo '<div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Secretaria do COMCA</div>';
					?>
					</div>
					</center>
                    
           				 <div class="container-fluid">
             				   <div class="row">
             				       <div class="col-md-12 text-center">
                    				    <div class="page-header clearfix">
                     				       <h2 class="center">Escolha o Curso</h2>
												  <a href="/comcasec/cfo/index2.php" class="btn btn-success ">CFO</a>
												  <a href="/comcasec/rm2/index2.php" class="btn btn-warning ">RM2</a>
                    						      <a href="/comcasec/rm3/index2.php" class="btn btn-danger ">RM3</a>
										</div>
									</div>
								</div>
						</div>
                </div>
            </div>
        </div>
    </body>
</html>	