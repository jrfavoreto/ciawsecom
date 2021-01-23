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
include_once("conexao_cfo.php");
 
// Define variables and initialize with empty values
$nome = $login = $senha = $niveis_acesso = "";
$nome_err = $login_err = $senha_err = $niveis_acesso_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_nome = trim($_POST["nome"]);
    if(empty($input_nome)){
        $nome_err = "Digite o nome do item";
    } elseif(!filter_var($input_nome)){
        $nome_err = "Por favor, coloque um nome válido";
    } else{
        $nome = $input_nome;
    }
    
    // 
    $input_login = trim($_POST["login"]);
    if(empty($input_login)){
        $login_err = "Digite a quantidade existente";     
    }  elseif(!filter_var($input_login)){
        $login_err = "Por favor digite um valor login válido";
	}	else{
        $login = $input_login;
    }
    
    // 
    $input_senha = trim($_POST["senha"]);
    if(empty($input_senha)){
        $senha_err = "Digite a quantidade mínima";     
    } elseif(!filter_var($input_senha)){
        $senha_err = "Por favor digite uma senha válida";
    } else{
        $senha = $input_senha;
		$senha = md5($senha);
    }
   
    // 
    $input_niveis_acesso = trim($_POST["niveis_acesso"]);
    if(empty($input_niveis_acesso)){
        $niveis_acesso_id = "Digite nível de acesso";
    } elseif(!ctype_digit($input_niveis_acesso)){
        $niveis_acesso_err = "Por favor, digite um nível de acesso válido";
    } else{
        $niveis_acesso = $input_niveis_acesso;
    }

    // Check input errors before inserting in database
    if(empty($nome_err) && empty($login_err) && empty($senha_err) && empty($niveis_acesso_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO usuarios (nome, login, senha, niveis_acesso) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_nome, $param_login, $param_senha, $param_niveis_acesso);
            
            // Set parameters
			$param_nome = $nome;
            $param_login = $login;
            $param_senha = $senha;
            $param_niveis_acesso = $niveis_acesso;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index2.php");
                exit();
            } else{
                echo "Oops! Algo deu errado. Tente novamente mais tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Create Record - Estoque CTIM - Criado pelo GM (T) Gabriel Gonçalves CFO 2020</title>
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
                        <h2>Criar Usuário</h2>
                    </div>
                    <p>Por favor, preencha os campos abaixo para adicionar um novo usuário à base de dados</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						<div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
							<label for="nome">Nome</label>
							<input type="text" class="form-control form-control-lg rounded-0" name="nome" id="Nome_Completo" placeholder="Nome" required="" autofocus>
							<span class="help-block"><?php echo $nome_err;?></span>
						</div>
                        <div class="form-group <?php echo (!empty($login_err)) ? 'has-error' : ''; ?>">
							<label for="login">Login</label>
							<input type="text" class="form-control form-control-lg rounded-0" name="login" id="usarname" placeholder="Login" required="" autofocus>
							<span class="help-block"><?php echo $login_err;?></span>
						</div>
						<div class="form-group <?php echo (!empty($senha_err)) ? 'has-error' : ''; ?>">
							<label for="senha">Senha</label>
							<input type="password" class="form-control form-control-lg rounded-0" name="senha" id="password" placeholder="Senha" required="">
							<span class="help-block"><?php echo $senha_err;?></span>
						</div>
						<div class="form-group <?php echo (!empty($niveis_acesso_err)) ? 'has-error' : ''; ?>">
                            <label for="niveis_acesso">Nível de Acesso</label>
                            <input type="text"  class="form-control form-control-lg rounded-0" name="niveis_acesso" id="nivel_acesso" placeholder="Nível de Acesso" required="">
                            <span class="help-block"><?php echo $niveis_acesso_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Criar Usuário">
                        <a href="index2.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>