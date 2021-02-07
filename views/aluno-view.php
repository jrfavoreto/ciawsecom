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
include_once("funcoes_apoio.php");

?>

<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header clearfix">
					<h2 class="pull-left">Informações dos Alunos &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</h2>
					<br/>
					<a href="/comcasec/cursos.php" class="btn btn-info pull-left">Voltar</a>
					<button id="btnRemover" class="btn btn-warning pull-left">Remover</button>
					<button id="btnNovo" class="btn btn-success pull-left">Novo</button>
					<button id="btnEditar" class="btn btn-dark pull-left">Editar</button>
					<button id="btnVisualizar" class="btn btn-secondary pull-left">Visualizar</button>
				</div>
			</div>
		</div>        
	</div>
</div>
<br />

<div class="container-grid">
	<table id='gridAlunos' class='display compact nowrap'>
		<thead>
			<tr>
				<th>Id</th>
				<th>NIP</th>
				<th>Nome Completo</th>
				<th>Nome de Guerra</th>
				<th>Turma</th>
				<th>Quadro</th>
				<th>Pelotão</th>
				<th>Companhia</th>
				<th>Funcol</th>
				<th>Data de Apresentação</th>
				<th>Nacionalidade</th>
				<th>Naturalidade</th>
				<th>Cidade Nascimento</th>
				<th>Data de Nascimento</th>
				<th>Cor</th>
				<th>Sexo</th>
				<th>Estado Civil</th>
				<th>Nome do Pai</th>
				<th>Nome da Mãe</th>
				<th>CPF</th>
				<th>Identidade</th>
				<th>Data de Emissão da Identidade</th>
				<th>Expedidor da Identidade</th>
				<th>UF da Identidade</th>
				<th>BDF</th>
				<th>Crônico</th>
				<th>Alojamento</th>
				<th>Armário</th>
				<th>Especialidade</th>
				<th>Mestrado</th>
				<th>Doutorado</th>
				<th>Vínculo Anterior com a Marinha</th>
				<th>Quadro e Força Anterior</th>
				<th>OM de Origem</th>
				<th>Servidor Público</th>
				<th>Residência Médica</th>
				<th>Endereço</th>
				<th>Tel. em caso de Emergência</th>
				<th>Telefone Celular</th>
				<th>E-mail</th>
			</tr>
		</thead>
		<tbody>	
			
 <?php
						
                        
$sql = "SELECT a.*, q.nome_quadro, q.sigla_quadro, p.nome_pelotao, c.nome_companhia 
			FROM aluno a 
		INNER JOIN quadro q ON q.id_quadro = a.fk_quadro 
		INNER JOIN pelotao p ON p.id_pelotao = a.fk_pelotao 
		INNER JOIN companhia c ON c.id_companhia = a.fk_companhia";
$quadro2 = 1;
$pelotao2 = 1;
$turma = 1;
$companhia = 1;
$endereco = 1;
$numero = 0;

if ($result = mysqli_query($conn, $sql)) {
	if (mysqli_num_rows($result) > 0) {
		
		while ($row = mysqli_fetch_array($result)) {
				
				echo "<tr>";
				echo "<td>" . $row['id_aluno'] . "</td>"; $numero+=1;
				echo "<td>" . $row['nip'] . "</td>";
				echo "<td>" . $row['nome_completo'] . "</td>";
				echo "<td>" . $row['nome_de_guerra'] . "</td>";
				echo "<td>" . $row['turma'] . "</td>";
				echo "<td>" . $row['nome_quadro'] . "</span></td>";
				echo "<td>" . $row['nome_pelotao'] . "</td>";
				echo "<td>" . $row['nome_companhia'] . "</td>";
				echo "<td>" . $row['funcol'] . "</td>";
				echo "<td>" . ObterDataDoMySql($row['data_de_apresentacao']) . "</td>";
				echo "<td>" . $row['nacionalidade'] . "</td>";
				echo "<td>" . $row['naturalidade'] . "</td>";
				echo "<td>" . $row['cidade_nascimento'] . "</td>";
				echo "<td>" . ObterDataDoMySql($row['data_nascimento']) . "</td>";
				echo "<td>" . $row['cor'] . "</td>";
				echo "<td>" . $row['sexo'] . "</td>";
				echo "<td>" . $row['estado_civil'] . "</td>";
				echo "<td>" . $row['nome_pai'] . "</td>";
				echo "<td>" . $row['nome_mae'] . "</td>";
				echo "<td>" . $row['cpf'] . "</td>";
				echo "<td>" . $row['identidade'] . "</td>";
				echo "<td>" . ObterDataDoMySql($row['identidade_data_emissao']) . "</td>";
				echo "<td>" . $row['identidade_orgao'] . "</td>";
				echo "<td>" . $row['identidade_uf'] . "</td>";
				echo "<td>" . $row['bdf'] . "</td>";
				echo "<td>" . $row['cronico'] . "</td>";
				echo "<td>" . $row['alojamento'] . "</td>";
				echo "<td>" . $row['armario'] . "</td>";
				echo "<td>" . $row['pos_graduacao'] . "</td>";
				echo "<td>" . $row['mestrado'] . "</td>";
				echo "<td>" . $row['doutorado'] . "</td>";
				echo "<td>" . $row['vinculo_marinha'] . "</td>";
				echo "<td>" . $row['quadro_forca_anterior'] . "</td>";
				echo "<td>" . $row['om_origem'] . "</td>";
				echo "<td>" . $row['servidor_publico'] . "</td>";
				echo "<td>" . $row['residencia_medica'] . "</td>";
				if (isset($row5['endereco_uf'])){
									echo "<td>" . $row5['endereco_uf'] . "</td>";
								}else{
									echo "<td>";
								}
				//echo "<td>" . $row5['endereco_uf'] . "</td>";
				echo "<td>" . $row['telefone_residencial'] . "</td>";
				echo "<td>" . $row['telefone_celular'] . "</td>";
				echo "<td>" . $row['e_mail'] . "</td>";
				echo "</tr>";
				
		} //fim while
		
		// Free result set
		mysqli_free_result($result);

	}else {
			echo "<p class='lead'><em>Nenhum registro foi encontrado.</em></p>";
		}
} else {
	echo "ERROR: Não foi possível executar $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

			</tbody>
		</table>
	</div>
<script>
$(document).ready(function(){
   var grid = $('#gridAlunos').DataTable({
		'scrollX': true,
		select: true,
		responsive: true,
		colReorder: true,
   });

   $('#gridAlunos').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            grid.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#btnVisualizar').click( function () {
        var data = grid.row('.selected').data();
		if(data){
			var id = data[0];
			var link = "./views/read2.php?id="+ id;
			exibirPagina(link);
		}
    });

	$('#btnEditar').click( function () {
        var data = grid.row('.selected').data();
		if(data){
			var id = data[0];
			var link = "./views/update.php?id="+ id;
			exibirPagina(link);
		}
    });

	$('#btnRemover').click( function () {
        var data = grid.row('.selected').data();
		if(data){
			var id = data[0];
			var link = "./views/delete.php?id="+ id;
			exibirPagina(link);
		}
    });

	$('#btnNovo').click( function () {
		var link = "./views/create.php"
		exibirPagina(link);
    });

});
</script>

