<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != TRUE) {
    header("location: /comcasec/index.php");
    exit();
}

// Include config file
include_once("conexao_rm2.php");
include_once("alunodao_class.php");
	
$aluno = NULL;
$noget = trim($_GET["id"]);
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty($noget)) {

	$param_id = trim($_GET["id"]);
	$alunoDao = new AlunoDao($conn);
	$aluno = $alunoDao->ObterPorId($_GET["id"]);
	
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
                            <p class="form-control-static"><?php echo $aluno->nip; ?></p>
                        </div>
                        <div class="form-group">
                            <label>Nome de Guerra</label>
                            <p class="form-control-static"><?php echo $aluno->nome_de_guerra; ?></p>
                        </div>
						<div class="form-group">
                            <label>Turma</label>
                            <p class="form-control-static"><?php echo $aluno->turma; ?></p>
                        </div>
						<div class="form-group">
                            <label>Quadro</label>
                            <p class="form-control-static"><?php echo $aluno->nome_quadro; ?></p>
                        </div>
						<div class="form-group">
                            <label>Pelotão</label>
                            <p class="form-control-static"><?php echo $aluno->nome_pelotao; ?></p>
                        </div>
						<div class="form-group">
                            <label>Companhia</label>
                            <p class="form-control-static"><?php echo $aluno->nome_companhia; ?></p>
                        </div>
						<div class="form-group">
                            <label>Funcol</label>
                            <p class="form-control-static"><?php echo $aluno->funcol; ?></p>
                        </div>
						<div class="form-group">
                            <label>Data de Apresentação</label>
                            <p class="form-control-static"><?php echo $aluno->data_de_apresentacao; ?></p>
                        </div>
						<div class="form-group">
                            <label>Nacionalidade</label>
                            <p class="form-control-static"><?php echo $aluno->nacionalidade; ?></p>
                        </div>
						<div class="form-group">
                            <label>Naturalidade</label>
                            <p class="form-control-static"><?php echo $aluno->naturalidade; ?></p>
                        </div>
						<div class="form-group">
                            <label>Cidade de Nascimento</label>
                            <p class="form-control-static"><?php echo $aluno->cidade_nascimento; ?></p>
                        </div>
						<div class="form-group">
                            <label>Data de Nascimento</label>
                            <p class="form-control-static"><?php echo  $aluno->data_nascimento; ?></p>
                        </div>
						<div class="form-group">
                            <label>Cor</label>
                            <p class="form-control-static"><?php echo $aluno->cor; ?></p>
                        </div>
						<div class="form-group">
                            <label>Sexo</label>
                            <p class="form-control-static"><?php echo $aluno->sexo; ?></p>
                        </div>
						<div class="form-group">
                            <label>Estado Civil</label>
                            <p class="form-control-static"><?php echo $aluno->estado_civil; ?></p>
                        </div>
						<div class="form-group">
                            <label>Nome do Pai</label>
                            <p class="form-control-static"><?php echo $aluno->nome_pai; ?></p>
                        </div>
						<div class="form-group">
                            <label>Nome da Mãe</label>
                            <p class="form-control-static"><?php echo $aluno->nome_mae; ?></p>
                        </div>
						<div class="form-group">
                            <label>CPF</label>
                            <p class="form-control-static"><?php echo $aluno->cpf; ?></p>
                        </div>
						<div class="form-group">
                            <label>Identidade</label>
                            <p class="form-control-static"><?php echo $aluno->identidade; ?></p>
                        </div>
						<div class="form-group">
                            <label>Data de Emissão da Identidade</label>
                            <p class="form-control-static"><?php echo $aluno->identidade_data_emissao; ?></p>
                        </div>
						<div class="form-group">
                            <label>Órgão Emissor da Identidade</label>
                            <p class="form-control-static"><?php echo $aluno->identidade_orgao; ?></p>
                        </div>
						<div class="form-group">
                            <label>UF da Identidade</label>
                            <p class="form-control-static"><?php echo $aluno->identidade_uf; ?></p>
                        </div>
						<div class="form-group">
                            <label>BDF</label>
                            <p class="form-control-static"><?php echo $aluno->bdf; ?></p>
                        </div>
						<div class="form-group">
                            <label>Crônico</label>
                            <p class="form-control-static"><?php echo $aluno->cronico; ?></p>
                        </div>
						<div class="form-group">
                            <label>Alojamento</label>
                            <p class="form-control-static"><?php echo $aluno->alojamento; ?></p>
                        </div>
						<div class="form-group">
                            <label>Armário</label>
                            <p class="form-control-static"><?php echo $aluno->armario; ?></p>
                        </div>
						<div class="form-group">
                            <label>Especialidade</label>
                            <p class="form-control-static"><?php echo $aluno->pos_graduacao; ?></p>
                        </div>
						<div class="form-group">
                            <label>Mestrado</label>
                            <p class="form-control-static"><?php echo $aluno->mestrado; ?></p>
                        </div>
						<div class="form-group">
                            <label>Doutorado</label>
                            <p class="form-control-static"><?php echo $aluno->doutorado; ?></p>
                        </div>
						<div class="form-group">
                            <label>Vínculo Anterior com a Marinha</label>
                            <p class="form-control-static"><?php echo $aluno->vinculo_marinha; ?></p>
                        </div>
						<div class="form-group">
                            <label>Quadro e Força Anterior</label>
                            <p class="form-control-static"><?php echo $aluno->quadro_forca_anterior; ?></p>
                        </div>
						<div class="form-group">
                            <label>OM de Origem</label>
                            <p class="form-control-static"><?php echo $aluno->om_origem; ?></p>
                        </div>
						<div class="form-group">
                            <label>Servidor Público</label>
                            <p class="form-control-static"><?php echo $aluno->servidor_publico; ?></p>
                        </div>
						<div class="form-group">
                            <label>Residência Médica</label>
                            <p class="form-control-static"><?php echo $aluno->residencia_medica; ?></p>
                        </div>
                        <p><a href="index2.php" class="btn btn-primary">Voltar</a></p>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>