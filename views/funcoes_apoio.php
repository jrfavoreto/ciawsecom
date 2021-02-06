<?php
	
//Carrega o array de Pelotões/Companhias		
function ObterArrayPelotoes($connection) {
	$sqlPelotao = "SELECT p.id_pelotao, p.fk_companhia, p.nome_pelotao, c.nome_companhia FROM pelotao p 
		INNER JOIN companhia c on p.fk_companhia = c.id_companhia
		order by p.id_pelotao";
	
	$arrayPelotao = Array();
	if ($result = mysqli_query($connection, $sqlPelotao)) {
				if (mysqli_num_rows($result) > 0) {
					 while ($row = mysqli_fetch_array($result)) {
						 $arrayPelotao[] = Array(
							 "id_pelotao"=>$row['id_pelotao'], 
							 "fk_companhia"=>$row['fk_companhia'],
							 "nome_pelotao"=>$row['nome_pelotao'], 
							 "nome_companhia"=>$row['nome_companhia']
						 );
					 }
				}
	}
	return $arrayPelotao;
}

//Carrega o array de Quadros
function ObterArrayQuadros($connection) {
	$sqlQuadro = "SELECT q.id_quadro, q.nome_quadro, q.sigla_quadro FROM quadro q
		order by q.sigla_quadro";
	
	$arrayQuadros = Array();
	if ($result = mysqli_query($connection, $sqlQuadro)) {
				if (mysqli_num_rows($result) > 0) {
					 while ($row = mysqli_fetch_array($result)) {
						 $arrayQuadros[] = Array(
							 "id_quadro"=>$row['id_quadro'], 
							 "nome_quadro"=>$row['nome_quadro'],
							 "sigla_quadro"=>$row['sigla_quadro']
						 );
					 }
				}
	}
	
	return $arrayQuadros;
}

//Função para obter o fk_companhia do array de pelotões
function ObterIdCompanhia($array, $id_pelotao) {
	foreach ($array as $row) {
		if($row['id_pelotao'] == $id_pelotao)
			return $row['fk_companhia'];
	}
}

function DataEhValida($inputDateDDMMYYYY) {
		
		if(empty($inputDateDDMMYYYY))
			return false;
		
		try {
			$partsDate = explode('/', $inputDateDDMMYYYY);//  dd/mm/yyyy
			$date  = "$partsDate[2]-$partsDate[1]-$partsDate[0]";
			$dmy = DateTime::createFromFormat('Y-m-d', $date);
			
			if (!$dmy) {
				return false;
			}
			else {
				return true;
			}
			
		} catch (Exception $e) {
			return false;
		}
}


function ObterDataFormatoMySql($inputDateDDMMYYYY) {
		if(empty($inputDateDDMMYYYY))
			return	"";
		
		$partsDate = explode('/', $inputDateDDMMYYYY);//  dd/mm/yyyy
		$date  = "$partsDate[2]-$partsDate[1]-$partsDate[0]";
		
        return $date;
}

function ObterDataDoMySql($date) {
		if(empty($date))
			return	"";
		
		$partsDate = explode('-', $date);//  yyyy-mm-dd
		$date  = "$partsDate[2]/$partsDate[1]/$partsDate[0]";
		
        return $date;
}
?>