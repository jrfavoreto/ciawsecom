<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != TRUE) {
    header("location: index2.php");
    exit();
}
$noget = trim($_GET["id"]);
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty($noget)) {
    // Include config file
    include_once("conexao.php");

    // Prepare a select statement
    $sql = "SELECT * FROM aluno WHERE id_aluno = ?";
	$sql2 = "SELECT nome_quadro FROM quadro WHERE id_quadro = ?";
	$sql3 = "SELECT nome_companhia FROM companhia WHERE id_companhia = ?";
	$sql4 = "SELECT nome_pelotao FROM pelotao WHERE id_pelotao = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
		$stmt2 = mysqli_prepare($conn, $sql2);
		$stmt3 = mysqli_prepare($conn, $sql3);
		$stmt4 = mysqli_prepare($conn, $sql4);
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

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
				$turma = $row['turma'];
				$id_quadro = $row['fk_quadro'];
				$id_pelotao = $row['fk_pelotao'];
				$id_companhia = $row['fk_companhia'];
				$funcol = $row['funcol'];
				$data_de_apresentacao = $row['data_de_apresentacao'];
				$nacionalidade = $row['nacionalidade'];
				$naturalidade = $row['naturalidade'];
				$cidade_nascimento = $row['cidade_nascimento'];
				$data_nascimento = $row['data_nascimento'];
				$cor = $row['cor'];
				$sexo = $row['sexo'];
				$estado_civil = $row['estado_civil'];
				$nome_pai = $row['nome_pai'];
				$nome_mae = $row['nome_mae'];
				$cpf = $row['cpf'];
				$identidade = $row['identidade'];
				$identidade_data_emissao = $row['identidade_data_emissao'];
				$identidade_orgao = $row['identidade_orgao'];
				$identidade_uf = $row['identidade_uf'];
				$bdf = $row['bdf'];
				$cronico = $row['cronico'];
				$alojamento = $row['alojamento'];
				$armario = $row['armario'];
				$pos_graduacao = $row['pos_graduacao'];
				$mestrado = $row['mestrado'];
				$doutorado = $row['doutorado'];
				$vinculo_marinha = $row['vinculo_marinha'];
				$quadro_forca_anterior = $row['quadro_forca_anterior'];
				$om_origem = $row['om_origem'];
				$servidor_publico = $row['servidor_publico'];
				$residencia_medica = $row['residencia_medica'];	


				mysqli_stmt_bind_param($stmt2, "i", $id_quadro);
				mysqli_stmt_execute($stmt2);
				$result2 = mysqli_stmt_get_result($stmt2);
				$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
				
				mysqli_stmt_bind_param($stmt3, "i", $id_companhia);
				mysqli_stmt_execute($stmt3);
				$result3 = mysqli_stmt_get_result($stmt3);
				$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
				
				mysqli_stmt_bind_param($stmt4, "i", $id_pelotao);
				mysqli_stmt_execute($stmt4);
				$result4 = mysqli_stmt_get_result($stmt4);
				$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
				
				
				$nome_quadro = $row2['nome_quadro'];
				$nome_pelotao = $row4['nome_pelotao'];
				$nome_companhia = $row3['nome_companhia'];
				
				
				
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
} else {
	echo oi;
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Visualizar Registros - Secretaria do COMCA CIAW - Criado pelo GM (T) Gabriel Gonçalves CFO 2020</title>
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
                            <h1>Visualizar Registros</h1>
                        </div>
                        <div class="form-group">
                            <label>NIP</label>                            
                            <p class="form-control-static"><?php echo $row['nip']; ?></p>
                        </div>
                        <div class="form-group">
                            <label>Nome de Guerra</label>
                            <p class="form-control-static"><?php echo utf8_encode($row['nome_de_guerra']); ?></p>
                        </div>
						<div class="form-group">
                            <label>Turma</label>
                            <p class="form-control-static"><?php echo $row['turma']; ?></p>
                        </div>
						<div class="form-group">
                            <label>Quadro</label>
                            <p class="form-control-static"><?php echo utf8_encode($row2['nome_quadro']); ?></p>
                        </div>
						<div class="form-group">
                            <label>Pelotão</label>
                            <p class="form-control-static"><?php echo utf8_encode($row4['nome_pelotao']); ?></p>
                        </div>
						<div class="form-group">
                            <label>Companhia</label>
                            <p class="form-control-static"><?php echo utf8_encode($row3['nome_companhia']) ?></p>
                        </div>
						<div class="form-group">
                            <label>Funcol</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["funcol"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Data de Apresentação</label>
                            <p class="form-control-static"><?php echo $row["data_de_apresentacao"]; ?></p>
                        </div>
						<div class="form-group">
                            <label>Nacionalidade</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["nacionalidade"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Naturalidade</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["naturalidade"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Cidade de Nascimento</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["cidade_nascimento"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Data de Nascimento</label>
                            <p class="form-control-static"><?php echo $row["data_nascimento"]; ?></p>
                        </div>
						<div class="form-group">
                            <label>Cor</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["cor"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Sexo</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["sexo"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Estado Civil</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["estado_civil"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Nome do Pai</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["nome_pai"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Nome da Mãe</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["nome_mae"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>CPF</label>
                            <p class="form-control-static"><?php echo $row["cpf"]; ?></p>
                        </div>
						<div class="form-group">
                            <label>Identidade</label>
                            <p class="form-control-static"><?php echo $row["identidade"]; ?></p>
                        </div>
						<div class="form-group">
                            <label>Data de Emissão da Identidade</label>
                            <p class="form-control-static"><?php echo $row["identidade_data_emissao"]; ?></p>
                        </div>
						<div class="form-group">
                            <label>Órgão Emissor da Identidade</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["identidade_orgao"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>UF da Identidade</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["identidade_uf"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>BDF</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["bdf"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Crônico</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["cronico"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Alojamento</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["alojamento"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Armário</label>
                            <p class="form-control-static"><?php echo $row["armario"]; ?></p>
                        </div>
						<div class="form-group">
                            <label>Pós-Graduação</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["pos_graduacao"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Mestrado</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["mestrado"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Doutorado</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["doutorado"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Vínculo Anterior com a Marinha</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["vinculo_marinha"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Quadro e Força Anterior</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["quadro_forca_anterior"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>OM de Origem</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["om_origem"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Servidor Público</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["servidor_publico"]); ?></p>
                        </div>
						<div class="form-group">
                            <label>Residência Médica</label>
                            <p class="form-control-static"><?php echo utf8_encode($row["residencia_medica"]); ?></p>
                        </div>
                        <p><a href="index2.php" class="btn btn-primary">Voltar</a></p>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>