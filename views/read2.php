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

<div class="form-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Visualizar Registros</h1>
                </div>
                
                <div class="form-group">
                    <label>NIP</label>                            
                    <input type="text" class="form-control" readonly  value="<?php echo  $aluno->nip; ?>">
                </div>
                <div class="form-group">
                    <label>Nome de Guerra</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->nome_de_guerra; ?>">
                </div>
                <div class="form-group">
                    <label>Turma</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->turma; ?>">
                </div>
                <div class="form-group">
                    <label>Quadro</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->nome_quadro; ?>">
                </div>
                <div class="form-group">
                    <label>Pelotão</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->nome_pelotao; ?>">
                </div>
                <div class="form-group">
                    <label>Companhia</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->nome_companhia; ?>">
                </div>
                <div class="form-group">
                    <label>Funcol</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->funcol; ?>">
                </div>
                <div class="form-group">
                    <label>Data de Apresentação</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->data_de_apresentacao; ?>">
                </div>
                <div class="form-group">
                    <label>Nacionalidade</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->nacionalidade; ?>">
                </div>
                <div class="form-group">
                    <label>Naturalidade</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->naturalidade; ?>">
                </div>
                <div class="form-group">
                    <label>Cidade de Nascimento</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->cidade_nascimento; ?>">
                </div>
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="text" class="form-control" readonly  value="<?php echo  $aluno->data_nascimento; ?>">
                </div>
                <div class="form-group">
                    <label>Cor</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->cor; ?>">
                </div>
                <div class="form-group">
                    <label>Sexo</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->sexo; ?>">
                </div>
                <div class="form-group">
                    <label>Estado Civil</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->estado_civil; ?>">
                </div>
                <div class="form-group">
                    <label>Nome do Pai</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->nome_pai; ?>">
                </div>
                <div class="form-group">
                    <label>Nome da Mãe</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->nome_mae; ?>">
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->cpf; ?>">
                </div>
                <div class="form-group">
                    <label>Identidade</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->identidade; ?>">
                </div>
                <div class="form-group">
                    <label>Data de Emissão da Identidade</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->identidade_data_emissao; ?>">
                </div>
                <div class="form-group">
                    <label>Órgão Emissor da Identidade</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->identidade_orgao; ?>">
                </div>
                <div class="form-group">
                    <label>UF da Identidade</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->identidade_uf; ?>">
                </div>
                <div class="form-group">
                    <label>BDF</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->bdf; ?>">
                </div>
                <div class="form-group">
                    <label>Crônico</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->cronico; ?>">
                </div>
                <div class="form-group">
                    <label>Alojamento</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->alojamento; ?>">
                </div>
                <div class="form-group">
                    <label>Armário</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->armario; ?>">
                </div>
                <div class="form-group">
                    <label>Especialidade</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->pos_graduacao; ?>">
                </div>
                <div class="form-group">
                    <label>Mestrado</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->mestrado; ?>">
                </div>
                <div class="form-group">
                    <label>Doutorado</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->doutorado; ?>">
                </div>
                <div class="form-group">
                    <label>Vínculo Anterior com a Marinha</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->vinculo_marinha; ?>">
                </div>
                <div class="form-group">
                    <label>Quadro e Força Anterior</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->quadro_forca_anterior; ?>">
                </div>
                <div class="form-group">
                    <label>OM de Origem</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->om_origem; ?>">
                </div>
                <div class="form-group">
                    <label>Servidor Público</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->servidor_publico; ?>">
                </div>
                <div class="form-group">
                    <label>Residência Médica</label>
                    <input type="text" class="form-control" readonly  value="<?php echo $aluno->residencia_medica; ?>">
                </div>
                <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
            </div>
        </div>        
    </div>
</div>
