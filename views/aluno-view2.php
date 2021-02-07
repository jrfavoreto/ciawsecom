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
		</tbody>
	</table>
</div>
<script>
$(document).ready(function(){
   var grid = $('#gridAlunos').DataTable({
		scrollX: true,
		select: true,
		responsive: true,
		colReorder: true,
		searching: true,
		processing: true,
        serverSide: true,
		ajax: {
			url: '/comcasec/views/aluno-query.php',
			type: 'POST'
    	}
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

