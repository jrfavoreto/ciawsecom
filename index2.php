<!DOCTYPE html>

<?php
//InicializaÃ§Ã£o 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != TRUE) {
	header("location: index.php");
	exit();
}
if (isset($_SESSION['usuarioNiveisAcessoId']) && ($_SESSION['usuarioNiveisAcessoId']==2)){
	header("location: index3.php");
	exit();
}
// Include config file
include_once("conexao.php");
$width=4800;

if (isset($_POST['framework2'])) {
	$form=1;
	$width=800;
	foreach ($_POST['framework2'] as $selectedOption){
		$width+=100;
	}
}
?>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="GM (T) Gabriel GonÃ§alves CFO 2020">
        <title>Menu Principal - Secretaria do COMCA CIAW - Criado pelo GM (T) Gabriel GonÃ§alves CFO 2020</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
        <style type="text/css">
            .wrapper{
                width: <?php echo $width; ?>px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-top: 0;
            }
            table tr td:last-child a{
                margin-right: 15px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>




    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">InformaÃ§Ãµes dos Alunos &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</h2>
							<a href="/comcasec/cursos.php" class="btn btn-warning pull-left">Voltar</a>
							<a href="create.php" class="btn btn-success pull-left">Adicionar Alunos</a>
                            <a href="sair.php" class="btn btn-danger pull-left">Sair</a>
                        </div>
						
						<div class="pull-left" style="width:600px;">
						   <h2 align="pull-left">Pesquisa de Alunos do CFO 2020</h2>
						   <br /><br />
						   <form id="framework_form" action="index2.php" method="post" >
							 <select id="framework" name="framework[]" multiple class="form-control" value="1" <?php
							 if(isset($_POST['framework'])){
								 foreach ($_POST['framework'] as $selectedOption){
									 echo "checked='checked'";
								 }
							 } ?>>
							 <optgroup label="1ÂªCompanhia">
							  <option value="1">1Âº PelotÃ£o da 1Âª Companhia</option>
							  <option value="2">2Âº PelotÃ£o da 1Âª Companhia</option>
							  <option value="3">3Âº PelotÃ£o da 1Âª Companhia</option>
							</optgroup>
							<optgroup label="2ÂªCompanhia">
							  <option value="4">1Âº PelotÃ£o da 2Âª Companhia</option>
							  <option value="5">2Âº PelotÃ£o da 2Âª Companhia</option>
							  <option value="6">3Âº PelotÃ£o da 2Âª Companhia</option>
							</optgroup>
							<optgroup label="3ÂªCompanhia">
							  <option value="7">1Âº PelotÃ£o da 3Âª Companhia</option>
							  <option value="8">2Âº PelotÃ£o da 3Âª Companhia</option>
							  <option value="9">3Âº PelotÃ£o da 3Âª Companhia</option>
							</optgroup>
							<optgroup label="Quadro">
							  <option value="10">Quadro TÃ©cnico</option>
							  <option value="11">Quadro de MÃ©dicos</option>
							  <option value="12">Quadro de Apoio Ã  SaÃºde</option>
							  <option value="13">Quadro CirurgiÃµes-Dentistas</option>
							  <option value="14">Corpo de Engenheiros</option>
							  <option value="15">Quadro de CapelÃ£es Navais</option>
							  <option value="16">Quadro Auxiliar da Armada</option>
							  <option value="17">Quadro Auxiliar dos Fuzileiros Navais</option>
							  <option value="18">Quadro Complementar de Fuzileiros Navais</option>
							  <option value="19">Quadro Complementar de Intendentes da Marinha</option>
							  <option value="20">Quadro Complementar da Armada</option>
							</optgroup>
							<optgroup label="Turma">
							  <option value="21">CFO-01</option>
							  <option value="22">CFO-02</option>
							  <option value="23">CFO-03</option>
							  <option value="24">CFO-04</option>
							  <option value="25">CFO-05</option>
							  <option value="26">CFO-06</option>
							  <option value="27">CFO-07</option>
							  <option value="28">CFO-08</option>
							 </optgroup>
							 <optgroup label="Centro-Oeste">
							 <option value='DF'>DF</option>
							 <option value='GO'>GO</option>
							 <option value='MS'>MS</option>
							 <option value='MT'>MT</option>
							 </optgroup>
							 <optgroup label="Sudeste">
							 <option value='ES'>ES</option>
							 <option value='MG'>MG</option>
							 <option value='RJ'>RJ</option>
							 <option value='SP'>SP</option>
							 </optgroup>
							 <optgroup label="Sul">
							 <option value='PR'>PR</option>
							 <option value='RS'>RS</option>
							 <option value='SC'>SC</option>
							 </optgroup>
							 <optgroup label="Nordeste">
							 <option value='AL'>AL</option>
							 <option value='BA'>BA</option>
							 <option value='CE'>CE</option>
							 <option value='MA'>MA</option>
							 <option value='PB'>PB</option>
							 <option value='PE'>PE</option>
							 <option value='PI'>PI</option>
							 <option value='RN'>RN</option>
							 <option value='SE'>SE</option>
							 </optgroup>
							 <optgroup label="Norte">
							 <option value='AC'>AC</option>
							 <option value='AM'>AM</option>
							 <option value='AP'>AP</option>
							 <option value='PA'>PA</option>
							 <option value='RO'>RO</option>
							 <option value='RR'>RR</option>
							 <option value='TO'>TO</option>
							 </optgroup>
							 <optgroup label="Sexo">
							 <option value='M'>M</option>
							 <option value='F'>F</option>
							 </optgroup>
							 </select>

							 <select id="framework2" name="framework2[]" multiple class="form-control" >
							  <option value="100">AÃ§Ãµes</option>
							 <optgroup label="InformaÃ§Ãµes BÃ¡sicas">
							  <option value="nip">NIP</option>
							  <option value="nome_completo">Nome Completo</option>
							  <option value="nome_de_guerra">Nome de Guerra</option>
							  <option value="turma">Turma</option>
							  <option value="fk_quadro">Quadro</option>
							  <option value="fk_pelotao">PelotÃ£o</option>
							  <option value="fk_companhia">Companhia</option>
							  <option value="funcol">Funcol</option>
							  <option value="data_de_apresentacao">Data de ApresentaÃ§Ã£o</option>
							 </optgroup>
							 <optgroup label="Dados BibliogrÃ¡ficos">
						      <option value="nacionalidade">Nacionalidade</option>
							  <option value="naturalidade">Naturalidade</option>
							  <option value="cidade_nascimento">Cidade Nascimento</option>
							  <option value="data_nascimento">Data Nascimento</option>
							  <option value="cor">Cor</option>
							  <option value="sexo">Sexo</option>
							  <option value="estado_civil">Estado Civil</option>
							  <option value="nome_pai">Nome Pai</option>
							  <option value="nome_mae">Nome MÃ£e</option>
							  <option value="cpf">CPF</option>
							  <option value="identidade">Identidade</option>
							  <option value="identidade_data_emissao">Data EmissÃ£o Identidade</option>
							  <option value="identidade_orgao">OrgÃ£o Expedidor da Identidade</option>
							  <option value="identidade_uf">UF da Identidade</option>
							 </optgroup>
							 <optgroup label="Dados Complementares">
							  <option value="bdf">BDF</option>
							  <option value="cronico">CrÃ´nico</option>
							  <option value="alojamento">Alojamento</option>
							  <option value="armario">ArmÃ¡rio</option>
							 </optgroup>
							 <optgroup label="Dados Profissionais"> 
							  <option value="pos_graduacao">PÃ³s-GraduaÃ§Ã£o</option>
							  <option value="mestrado">Mestrado</option>
							  <option value="doutorado">Doutorado</option>
							  <option value="vinculo_marinha">VÃ­nculo Anterior com a Marinha</option>
							  <option value="quadro_forca_anterior">Quadro e ForÃ§a Anterior</option>
							  <option value="om_origem">OM Origem</option>
							  <option value="servidor_publico">Servidor PÃºblico</option>
							  <option value="residencia_medica">ResidÃªncia MÃ©dica</option>
							 </optgroup>
							 <optgroup label="Plano de Busca"> 
							  <option value="endereco">Endereco</option>
							  <option value="telefone_residencial">Telefone Residencial</option>
							  <option value="telefone_celular">Telefone Celular</option>
							  <option value="e_mail">E-mail</option>
							 </optgroup>
							 </select>

							 <input type="submit" class="btn btn-info" name="enviar" value="Pesquisar" />

						   </form>
						   <br /><br />
						</div>
						  
                        <?php
						
						$form=0;
						$pelotao=0;
						$quadro=0;
						$turma=0;
						$acoes=0;
						$info=0;
						$order = 'fk_companhia';
						$endereco = 0;
						$companhia = 0;
						$quadro2 = 0;
						$pelotao2 = 0;
						$numero=1;
						$f3cont=0;
						$f4cont=0;
						$sexomf=0;
						$naturalidadeuf=0;

//CONTAR QUANTOS TEM ANTES!!!!!!!

						if (isset($_POST['framework2'])) {
							$consulta='SELECT id_aluno, ';
							foreach ($_POST['framework2'] as $selectedOption){
								if($selectedOption!=100){
									$info++;
								}else{
									$acoes=1;
								}
							}
							$i=$info;
							foreach ($_POST['framework2'] as $selectedOption){
								if($i<2){
									break;
								}
								if($selectedOption!=100){
									$consulta.=$selectedOption;
									$consulta.=", ";
									$i--;
									if($selectedOption == 'endereco'){
										$endereco=1;
									}
									if($selectedOption == 'fk_companhia'){
										$companhia=1;
									}
									if($selectedOption == 'fk_quadro'){
										$quadro2=1;
									}
									if($selectedOption == 'fk_pelotao'){
										$pelotao2=1;
									}
								}
								
							}
							$consulta.=$selectedOption;
							if($selectedOption == 'endereco'){
								$endereco=1;
							}
							if($selectedOption == 'fk_companhia'){
								$companhia=1;
							}
							if($selectedOption == 'fk_quadro'){
								$quadro2=1;
							}
							if($selectedOption == 'fk_pelotao'){
								$pelotao2=1;
							}
							$consulta.=" FROM aluno";
						}
						
					    if (isset($_POST['framework'])) {
							$form=1;
							if ($info==0){
								$consulta='SELECT * FROM aluno';
							}
							foreach ($_POST['framework'] as $selectedOption){
								if (($selectedOption == "DF") OR ($selectedOption == "GO") OR ($selectedOption == "MS") OR ($selectedOption == "MT")  OR ($selectedOption == "ES")
								 OR ($selectedOption == "MG") OR ($selectedOption == "RJ") OR ($selectedOption == "SP") OR ($selectedOption == "PR") OR ($selectedOption == "RS")
								  OR ($selectedOption == "SC") OR ($selectedOption == "AL") OR ($selectedOption == "BA") OR ($selectedOption == "CE") OR ($selectedOption == "MA")
								   OR ($selectedOption == "PB") OR ($selectedOption == "PE") OR ($selectedOption == "PI") OR ($selectedOption == "RN") OR ($selectedOption == "SE")
								    OR ($selectedOption == "AC") OR ($selectedOption == "AM") OR ($selectedOption == "AP") OR ($selectedOption == "PA") OR ($selectedOption == "RO")
									 OR ($selectedOption == "RR") OR ($selectedOption == "TO")){
										 $naturalidadeuf++;
									 }else{
										 if (($selectedOption == "M")  OR ($selectedOption == "F")){
											 $sexomf++;
										 } else{
											$selectedOption = intval($selectedOption);
											if(((($selectedOption) < 10)) AND (($selectedOption) > 0) AND (is_int($selectedOption))){
												$pelotao+=1;
											}else{
												if (((($selectedOption) < 21)) AND (($selectedOption) > 0) AND (is_int($selectedOption))){
													$quadro+=1;
												}else{
													if (((($selectedOption) < 30)) AND (($selectedOption) > 0) AND (is_int($selectedOption))){
														$turma+=1;
													}
												}
											}
										 }
									}
							}
														
							if($pelotao>0){
								$consulta.=" WHERE fk_pelotao IN (";
								$i=$pelotao;
								foreach ($_POST['framework'] as $selectedOption){
									if($i<2){
										break;
									}
									$consulta.=$selectedOption;
									$consulta.=", ";
									$i--;
								}
								$consulta.=$selectedOption;
								$consulta.=")";
							}
							
							if($quadro>0){
								if ($pelotao > 0){
									$consulta.=" AND fk_quadro IN (";
								}else{
									$consulta.=" WHERE fk_quadro IN (";
								}
								$i = $pelotao+$quadro;
								foreach ($_POST['framework'] as $selectedOption){
									if($i>$quadro){
										$i--;
										continue;
									}
									if($i<2){
										break;
									}
									$option=$selectedOption-9;
									$consulta.=$option;
									$consulta.=", ";
									$i--;
								}
								$option=$selectedOption-9;
								$consulta.=$option;
								$consulta.=")";
							}
							
							if($turma>0){
								if (($pelotao+$quadro) > 0){
									$consulta.=" AND turma IN ('";
								}else{
									$consulta.=" WHERE turma IN ('";
								}
								$i = $pelotao+$quadro+$turma;
								foreach ($_POST['framework'] as $selectedOption){
									if($i>$turma){
										$i--;
										continue;
									}
									if($i<2){
										break;
									}
									$consulta.="CFO-0";
									$consulta.=$selectedOption[1];
									$consulta.="', '";
									$i--;
								}
								$consulta.="CFO-0";
								$consulta.=$selectedOption[1];
								$consulta.="')";
							}
							
							if ($naturalidadeuf > 0) {
								if (($pelotao+$quadro+$turma) > 0){
									$consulta.=" AND naturalidade IN ('";
								}else{
										$consulta.=" WHERE naturalidade IN ('";
								}
								$i = $pelotao+$quadro+$turma+$naturalidadeuf;
								foreach ($_POST['framework'] as $selectedOption){
									if($i>$naturalidadeuf){
										$i--;
										continue;
									}
									if($i<2){
										break;
									}
									$consulta.=$selectedOption;
									$consulta.="', '";
									$i--;
								}
								$consulta.=$selectedOption;
								$consulta.="')";
							}
							
							if ($sexomf > 0) {
								if (($pelotao+$quadro+$turma+$naturalidadeuf) > 0){
									$consulta.=" AND sexo IN ('";
								}else{
									$consulta.=" WHERE sexo IN ('";
								}
								$i = $pelotao+$quadro+$turma+$naturalidadeuf+$sexomf;
								foreach ($_POST['framework'] as $selectedOption){
									if($i>$sexomf){
										$i--;
										continue;
									}
									if($i<2){
										break;
									}
								$consulta.=$selectedOption;
								$consulta.="', '";
								$i--;
							}
							$consulta.=$selectedOption;
							$consulta.="')";
							}
						}
						
						
						
                        // Attempt select query execution
						
                        //$sql = "SELECT * FROM aluno ORDER BY fk_pelotao";
						if (isset($consulta) && isset($_POST['framework2'])){
							$sql = $consulta;
						}else{
							$sql = "select * from aluno";
							$quadro2 = 1;
							$pelotao2 = 1;
							$turma = 1;
							$companhia = 1;
							$endereco = 1;
						}
						
						
                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
								if (isset($consulta)){
									if(isset($_POST['framework2']) && ($info>0)){
										echo "<table class='table table-bordered table-striped'>";
										echo "<thead>";
										echo "<tr>";
										echo "<th>NÃºmero</th>";
										echo utf8_encode("<th>Ação</th>");
										foreach ($_POST['framework2'] as $selectedOption){
											switch	($selectedOption){
												//case "100":
												//	echo utf8_encode("<th>Ação</th>");
												//	break;
												case "nip":
													echo "<th>NIP</th>";
													break;
												case "nome_completo":
													echo "<th>Nome Completo</th>";
													break;
												case "nome_de_guerra":
													echo "<th>Nome de Guerra</th>";
													break;
												case "turma":
													echo "<th>Turma</th>";
													break;
												case "fk_quadro":	
													echo "<th>Quadro</th>";
													break;
												case "fk_pelotao":
													echo utf8_encode("<th>Pelotão</th>");
													break;
												case "fk_companhia":
													echo "<th>Companhia</th>";
													break;
												case "funcol":
													echo "<th>Funcol</th>";
													break;
												case "data_de_apresentacao":
													echo utf8_encode("<th>Data de Apresentão</th>");
													break;
												case "nacionalidade":
													echo "<th>Nacionalidade</th>";
													break;
												case "naturalidade":
													$cat = [
														['id' => 1, 'nome' => "Cat A"],
														['id' => 2, 'nome' => "Cat B"],
														['id' => 3, 'nome' => "Cat C"],
														['id' => 4, 'nome' => "Cat D"],
													];
													echo "<th>Naturalidade</th>";
													//ORDER BY Antiguidade!!!!!!!!!
													
													
													//foreach ($cat as $key => $value) {
													//	echo "<label><input type='checkbox' name='' value='{$value['id']}' > {$value['nome']}</label>";
													//}
													//echo "<option value="e_mail">E-mail</option>"
													break;
												case "cidade_nascimento":
													echo "<th>Cidade Nascimento</th>";
													break;
												case "data_nascimento":
													echo "<th>Data de Nascimento</th>";
													break;
												case "cor":
													echo "<th>Cor</th>";
													break;
												case "sexo":
													echo "<th>Sexo</th>";
													break;
												case "estado_civil":
													echo "<th>Estado Civil</th>";
													break;
												case "nome_pai":
													echo "<th>Nome do Pai</th>";
													break;
												case "nome_mae":
													echo utf8_encode("<th>Nome da Mãe</th>");
													break;
												case "cpf":
													echo "<th>CPF</th>";
													break;
												case "identidade":
													echo "<th>Identidade</th>";
													break;
												case "identidade_data_emissao":
													echo utf8_encode("<th>Data de Emissão da Identidade</th>");
													break;
												case "identidade_orgao":
													echo "<th>Expedidor da Identidade</th>";
													break;
												case "identidade_uf":
													echo "<th>UF da Identidade</th>";
													break;
												case "bdf":
													echo "<th>BDF</th>";
													break;
												case "cronico":
													echo utf8_encode("<th>Crônico</th>");
													break;
												case "alojamento":
													echo "<th>Alojamento</th>";
													break;
												case "armario":
													echo utf8_encode("<th>Armário</th>");
													break;
												case "pos_graduacao":
													echo utf8_encode("<th>Pós-Graduação</th>");
													break;
												case "mestrado":
													echo "<th>Mestrado</th>";
													break;
												case "doutorado":
													echo "<th>Doutorado</th>";
													break;
												case "vinculo_marinha":
													echo utf8_encode("<th>Ví­nculo Anterior com a Marinha</th>");
													break;
												case "quadro_forca_anterior":
													echo utf8_encode("<th>Quadro e Forças Anterior</th>");
													break;
												case "om_origem":
													echo "<th>OM de Origem</th>";
													break;
												case "servidor_publico":
													echo utf8_encode("<th>Servidor Público</th>");
													break;
												case "residencia_medica":
													echo utf8_encode("<th>Residência Médica</th>");
													break;
												case "endereco":
													echo utf8_encode("<th>Endereço</th>");
													break;
												case "telefone_residencial":
													echo "<th>Telefone Residencial</th>";
													break;
												case "telefone_celular":
													echo "<th>Telefone Celular</th>";
													break;
												case "e_mail":
													echo "<th>E-mail</th>";
													break;
											}
										}
										
									echo "</tr>";
									echo "</thead>";
									echo "<tbody>";
									}
								}else{
									echo "<table class='table table-bordered table-striped'>";
									echo "<thead>";
									echo "<tr>";
									echo utf8_encode("<th>Número</th>");
									echo utf8_encode("<th>Ação</th>");
									echo "<th>NIP</th>";
									echo "<th>Nome Completo</th>";
									echo "<th>Nome de Guerra</th>";
									echo "<th>Turma</th>";
									echo "<th>Quadro</th>";
									echo utf8_encode("<th>Pelotão</th>");
									echo "<th>Companhia</th>";
									echo "<th>Funcol</th>";
									echo utf8_encode("<th>Data de Apresentação</th>");
									echo "<th>Nacionalidade</th>";
									echo "<th>Naturalidade</th>";
									echo "<th>Cidade Nascimento</th>";
									echo "<th>Data de Nascimento</th>";
									echo "<th>Cor</th>";
									echo "<th>Sexo</th>";
									echo "<th>Estado Civil</th>";
									echo "<th>Nome do Pai</th>";
									echo utf8_encode("<th>Nome da Mãe</th>");
									echo "<th>CPF</th>";
									echo "<th>Identidade</th>";
									echo utf8_encode("<th>Data de Emissão da Identidade</th>");
									echo "<th>Expedidor da Identidade</th>";
									echo "<th>UF da Identidade</th>";
									echo "<th>BDF</th>";
									echo utf8_encode("<th>Crônico</th>");
									echo "<th>Alojamento</th>";
									echo utf8_encode("<th>Armário</th>");
									echo utf8_encode("<th>Pós-Graduação</th>");
									echo "<th>Mestrado</th>";
									echo "<th>Doutorado</th>";
									echo utf8_encode("<th>Ví­nculo Anterior com a Marinha</th>");
									echo utf8_encode("<th>Quadro e Força Anterior</th>");
									echo "<th>OM de Origem</th>";
									echo utf8_encode("<th>Servidor Público</th>");
									echo utf8_encode("<th>Residência Médica</th>");
									echo utf8_encode("<th>Endereço</th>");
									echo "<th>Telefone Residencial</th>";
									echo "<th>Telefone Celular</th>";
									echo "<th>E-mail</th>";
									echo "</tr>";
									echo "</thead>";
									echo "<tbody>";
								}
                                while ($row = mysqli_fetch_array($result)) {
									$sql2 = "SELECT * FROM quadro WHERE id_quadro=?";
									
									$sql3 = "SELECT * FROM companhia WHERE id_companhia=?";
									
									$sql4 = "SELECT * FROM pelotao WHERE id_pelotao=?";
									
									$sql5 = "SELECT * FROM endereco WHERE id_endereco=?";
								    if($stmt = mysqli_prepare($conn, $sql2)){
									// Bind variables to the prepared statement as parameters
										$stmt2 = mysqli_prepare($conn, $sql3);
										$stmt3 = mysqli_prepare($conn, $sql4);
										$stmt4 = mysqli_prepare($conn, $sql5);
										
										mysqli_stmt_bind_param($stmt, "i", $param_quadro);
										mysqli_stmt_bind_param($stmt2, "i", $param_companhia);
										mysqli_stmt_bind_param($stmt3, "i", $param_pelotao);
										mysqli_stmt_bind_param($stmt4, "i", $param_endereco);
										//mysqli_stmt_bind_param($stmt5, "i", $param_id_pelotao);
										
										// Set parameters
										//$param_quantidade = $item_Quantidade;
										if(isset($quadro2) && ($quadro2>0)){
											$param_quadro = $row["fk_quadro"];
											$result2 = mysqli_query($conn, $sql2);
											mysqli_stmt_execute($stmt);
											$result2 = mysqli_stmt_get_result($stmt);
											$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
										}
										if($companhia>0){
											$param_companhia = $row["fk_companhia"];
											$result3 = mysqli_query($conn, $sql3);
											mysqli_stmt_execute($stmt2);
											$result3 = mysqli_stmt_get_result($stmt2);
											$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
										}
										if(isset($pelotao2) && ($pelotao2>0)) {
											$param_pelotao = $row["fk_pelotao"];
											$result4 = mysqli_query($conn, $sql4);
											mysqli_stmt_execute($stmt3);
											$result4 = mysqli_stmt_get_result($stmt3);
											$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
										}
										if($endereco>0) {
											$param_endereco = $row["endereco"];
											$result5 = mysqli_query($conn, $sql5);
											mysqli_stmt_execute($stmt4);
											$result5 = mysqli_stmt_get_result($stmt4);
											$row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC);
										}
										// Attempt to execute the prepared statement
										//}
										if(isset($consulta)){
											if(isset($_POST['framework2']) && ($info>0)){
												echo "<tr>";
												echo "<td>" . $numero . "</td>"; $numero+=1;
												echo "<td>";
												echo "<a href='read2.php?id=" . $row['id_aluno'] . "' title='Visualizar Item' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
												echo "</td>";
												foreach ($_POST['framework2'] as $selectedOption){
													switch	($selectedOption){
														case "nip":
															echo "<td>" . $row['nip'] . "</td>";
															break;
														case "nome_completo":
															echo "<td>" . utf8_encode($row['nome_completo']) . "</td>";
															break;
														case "nome_de_guerra":
															echo "<td>" . utf8_encode($row['nome_de_guerra']) . "</td>";
															break;
														case "turma":
															echo "<td>" . $row['turma'] . "</td>";
															break;
														case "fk_quadro":	
															echo "<td>" . utf8_encode($row2['nome_quadro']) . "</span></td>";
															break;
														case "fk_pelotao":
															echo "<td>" . utf8_encode($row4['nome_pelotao']) . "</td>";
															break;
														case "fk_companhia":
															echo "<td>" . utf8_encode($row3['nome_companhia']) . "</td>";
															break;
														case "funcol":
															echo "<td>" . utf8_encode($row['funcol']) . "</td>";
															break;
														case "data_de_apresentacao":
															echo "<td>" . $row['data_de_apresentacao'] . "</td>";
															break;
														case "nacionalidade":
															echo "<td>" . utf8_encode($row['nacionalidade']) . "</td>";
															break;
														case "naturalidade":
															echo "<td>" . utf8_encode($row['naturalidade']) . "</td>";
															break;
														case "cidade_nascimento":
															echo "<td>" . utf8_encode($row['cidade_nascimento']) . "</td>";
															break;
														case "data_nascimento":
															echo "<td>" . $row['data_nascimento'] . "</td>";
															break;
														case "cor":
															echo "<td>" . utf8_encode($row['cor']) . "</td>";
															break;
														case "sexo":
															echo "<td>" . utf8_encode($row['sexo']) . "</td>";
															break;
														case "estado_civil":
															echo "<td>" . utf8_encode($row['estado_civil']) . "</td>";
															break;
														case "nome_pai":
															echo "<td>" . utf8_encode($row['nome_pai']) . "</td>";
															break;
														case "nome_mae":
															echo "<td>" . utf8_encode($row['nome_mae']) . "</td>";
															break;
														case "cpf":
															echo "<td>" . $row['cpf'] . "</td>";
															break;
														case "identidade":
															echo "<td>" . $row['identidade'] . "</td>";
															break;
														case "identidade_data_emissao":
															echo "<td>" . $row['identidade_data_emissao'] . "</td>";
															break;
														case "identidade_orgao":
															echo "<td>" . utf8_encode($row['identidade_orgao']) . "</td>";
															break;
														case "identidade_uf":
															echo "<td>" . utf8_encode($row['identidade_uf']) . "</td>";
															break;
														case "bdf":
															echo "<td>" . utf8_encode($row['bdf']) . "</td>";
															break;
														case "cronico":
															echo "<td>" . utf8_encode($row['cronico']) . "</td>";
															break;
														case "alojamento":
															echo "<td>" . utf8_encode($row['alojamento']) . "</td>";
															break;
														case "armario":
															echo "<td>" . utf8_encode($row['armario']) . "</td>";
															break;
														case "pos_graduacao":
															echo "<td>" . utf8_encode($row['pos_graduacao']) . "</td>";
															break;
														case "mestrado":
															echo "<td>" . utf8_encode($row['mestrado']) . "</td>";
															break;
														case "doutorado":
															echo "<td>" . utf8_encode($row['doutorado']) . "</td>";
															break;
														case "vinculo_marinha":
															echo "<td>" . utf8_encode($row['vinculo_marinha']) . "</td>";
															break;
														case "quadro_forca_anterior":
															echo "<td>" . utf8_encode($row['quadro_forca_anterior']) . "</td>";
															break;
														case "om_origem":
															echo "<td>" . utf8_encode($row['om_origem']) . "</td>";
															break;
														case "servidor_publico":
															echo "<td>" . utf8_encode($row['servidor_publico']) . "</td>";
															break;
														case "residencia_medica":
															echo "<td>" . utf8_encode($row['residencia_medica']) . "</td>";
															break;
														case "endereco":
															if (isset($row5['endereco_uf'])){
																echo "<td>" . $row5['endereco_uf'] . "</td>";
															}else{
																echo "<td>";
															}
															break;
														case "telefone_residencial":
															echo "<td>" . $row['telefone_residencial'] . "</td>";
															break;
														case "telefone_celular":
															echo "<td>" . $row['telefone_celular'] . "</td>";
															break;
														case "e_mail":
															echo "<td>" . $row['e_mail'] . "</td>";
															break;
													}
												}
											}
										}else{
											echo "<tr>";
											echo "<td>" . $numero . "</td>"; $numero+=1;
											echo "<td>";
											echo "<a href='read2.php?id=" . $row['id_aluno'] . "' title='Visualizar Item' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
											echo "</td>";
											echo "<td>" . $row['nip'] . "</td>";
											echo "<td>" . utf8_encode($row['nome_completo']) . "</td>";
											echo "<td>" . utf8_encode($row['nome_de_guerra']) . "</td>";
											echo "<td>" . $row['turma'] . "</td>";
											echo "<td>" . utf8_encode($row2['nome_quadro']) . "</span></td>";
											echo "<td>" . utf8_encode($row4['nome_pelotao']) . "</td>";
											echo "<td>" . utf8_encode($row3['nome_companhia']) . "</td>";
											echo "<td>" . utf8_encode($row['funcol']) . "</td>";
											echo "<td>" . $row['data_de_apresentacao'] . "</td>";
											echo "<td>" . utf8_encode($row['nacionalidade']) . "</td>";
											echo "<td>" . utf8_encode($row['naturalidade']) . "</td>";
											echo "<td>" . utf8_encode($row['cidade_nascimento']) . "</td>";
											echo "<td>" . $row['data_nascimento'] . "</td>";
											echo "<td>" . utf8_encode($row['cor']) . "</td>";
											echo "<td>" . utf8_encode($row['sexo']) . "</td>";
											echo "<td>" . utf8_encode($row['estado_civil']) . "</td>";
											echo "<td>" . utf8_encode($row['nome_pai']) . "</td>";
											echo "<td>" . utf8_encode($row['nome_mae']) . "</td>";
											echo "<td>" . $row['cpf'] . "</td>";
											echo "<td>" . $row['identidade'] . "</td>";
											echo "<td>" . $row['identidade_data_emissao'] . "</td>";
											echo "<td>" . utf8_encode($row['identidade_orgao']) . "</td>";
											echo "<td>" . utf8_encode($row['identidade_uf']) . "</td>";
											echo "<td>" . utf8_encode($row['bdf']) . "</td>";
											echo "<td>" . utf8_encode($row['cronico']) . "</td>";
											echo "<td>" . utf8_encode($row['alojamento']) . "</td>";
											echo "<td>" . utf8_encode($row['armario']) . "</td>";
											echo "<td>" . utf8_encode($row['pos_graduacao']) . "</td>";
											echo "<td>" . utf8_encode($row['mestrado']) . "</td>";
											echo "<td>" . utf8_encode($row['doutorado']) . "</td>";
											echo "<td>" . utf8_encode($row['vinculo_marinha']) . "</td>";
											echo "<td>" . utf8_encode($row['quadro_forca_anterior']) . "</td>";
											echo "<td>" . utf8_encode($row['om_origem']) . "</td>";
											echo "<td>" . utf8_encode($row['servidor_publico']) . "</td>";
											echo "<td>" . utf8_encode($row['residencia_medica']) . "</td>";
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
										}
									}
								}
								echo "</tbody>";
								echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
								}else {
									echo "<p class='lead'><em>Nenhum registro foi encontrado.</em></p>";
								}
                        } else {
                            echo "ERROR: Não foi possí­vel executar $sql. " . mysqli_error($conn);
                        }

                        // Close connection
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    function ajax_call_function(element) {
        console.log(element.getAttribute("data-name"));
        console.log(element.getAttribute("data-mail"));

        // make your AJAX call to a server-side script 
        // that updates your database with these informations.
        //
        // OR
        //
        // Update some hidden fields in a form and submit it. 

    }
</script>

<script>
$(document).ready(function(){
 $('#framework').multiselect({
  enableClickableOptGroups: true,
  buttonWidth:'200px',
  nonSelectedText: 'Selecionar Categorias',
  includeSelectAllOption: true,
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  enableCollapsibleOptGroups: true
 });
  $("#framework").multiselect('selectAll', false);
  $("#framework").multiselect('updateButtonText');
 
  $('#framework2').multiselect({
  enableClickableOptGroups: true,
  buttonWidth:'200px',
  nonSelectedText: 'Filtrar InformaÃ§Ãµes',
  includeSelectAllOption: true,
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  enableCollapsibleOptGroups: true
 });
  $("#framework2").multiselect('selectAll', false);
  $("#framework2").multiselect('updateButtonText');
 
   $('#framework3').multiselect({
  enableClickableOptGroups: true,
  buttonWidth:'200px',
  nonSelectedText: 'Naturalidade',
  includeSelectAllOption: true,
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  enableCollapsibleOptGroups: true
 });
 // $("#framework3").multiselect('selectAll', false);
 // $("#framework3").multiselect('updateButtonText');
 
  $('#framework4').multiselect({
  enableClickableOptGroups: true,
  buttonWidth:'200px',
  nonSelectedText: 'Sexo',
  includeSelectAllOption: true,
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  enableCollapsibleOptGroups: true
 });
 // $("#framework4").multiselect('selectAll', false);
 // $("#framework4").multiselect('updateButtonText');
 
  $('.btn-info').on( "click.tssupp", function(e){
 
            var others = $('.btn-info').not(this);
 
            $('.btn-info').off( "click.tssupp");
             
            others.click();
 
    });
 
 
});

</script>