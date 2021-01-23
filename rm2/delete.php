<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != TRUE) {
	header("location: /comcasec/index.php");
	exit();
}
if (isset($_SESSION['usuarioNiveisAcessoId']) && ($_SESSION['usuarioNiveisAcessoId']==2)){
	header("location: index3.php");
	exit();
}

// Include config file
include_once("conexao_rm2.php");


// Inicialização das variáveis
$id_aluno = 0;
$nome_completo = $nome_de_guerra =  $nip = $cpf = "";

//-----------------
// Verifica o id passa via GET  e carrega os campos na tela para edição

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && !empty(trim($_GET["id"])) ) {

    // Prepare a select statement
    $sql = "SELECT id_aluno, nip, nome_completo, nome_de_guerra, cpf FROM aluno WHERE id_aluno = ?";
	
    if ($stmt = mysqli_prepare($conn, $sql)) {
		
		// Set parameters
        $id_aluno = trim($_GET["id"]);
		
		// Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $id_aluno);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
                
                // Retrieve individual field value
				$nip = $row['nip'];
				$nome_completo = $row['nome_completo'];
				$nome_de_guerra = $row['nome_de_guerra'];
				$cpf = $row['cpf'];
				
				
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Algo deu errado. Tente novamente mais tarde";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);
	
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){   // Processamento dos dados do formulário quando feito o submit
    
	$id_aluno = trim($_POST["id_aluno"]);
	
    $sql = "DELETE FROM aluno WHERE id_aluno=?";
        
	echo $sql;
	
	if($stmt = mysqli_prepare($conn, $sql)){
		// Bind variables to the prepared statement as parameters
		mysqli_stmt_bind_param($stmt, "s", $id_aluno);

		// Attempt to execute the prepared statement
		if(mysqli_stmt_execute($stmt)){
			// Records created successfully. Redirect to landing page
			header("location: index2.php");
			exit();
		} else{
			echo "Oops! Algo deu errado. Tente novamente mais tarde. " .  mysqli_stmt_error($stmt);
		}
	}
	 
    // Close statement
    mysqli_stmt_close($stmt);
    
    
    // Close connection
    mysqli_close($conn);
} else {
	echo oi;
    // Sem parametro
    header("location: error.php");
    exit();
}

 
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Aluno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Excluir Aluno</h2>
                    </div>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<input type="hidden" name="id_aluno" value="<?php echo $id_aluno; ?>">
                        
						<div class="form-group">
                            <label>Nome Completo</label>
                            <input type="text" name="nome_completo" class="form-control" readonly  value="<?php echo $nome_completo; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nome de Guerra</label>
                            <input type="text" name="nome_de_guerra" class="form-control" readonly  value="<?php echo $nome_de_guerra; ?>">
                        </div>
                        
						<div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" readonly value="<?php echo $nip; ?>">
                        </div>
						<div class="form-group">
                            <label>CPF</label>
                            <input type="text" name="cpf" class="form-control" readonly value="<?php echo $cpf; ?>">
                        </div>
						<p>O registro do aluno acima será excluído e a operação não poderá ser desfeito. Deseja confirmar a exclusão?</p>
                        <input type="submit" class="btn btn-primary" value="Sim">
                        <a href="index2.php" class="btn btn-default">Cancelar</a>
						<br />
						<br />
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>