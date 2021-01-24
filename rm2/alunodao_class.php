<?php
//alunodao_class.php

require_once ('funcoes_apoio.php');
require_once ('aluno_class.php');

class AlunoDao {
	
	private mysqli $dbConection;
	
    public function __construct($dbConection) {
		$this->dbConection = $dbConection;
    }
	
	public function ObterPorId($id_aluno){
		$aluno = NULL;
		
		$sql = "SELECT a.*, q.nome_quadro, q.sigla_quadro, p.nome_pelotao, c.nome_companhia 
			FROM aluno a 
		INNER JOIN quadro q ON q.id_quadro = a.fk_quadro 
		INNER JOIN pelotao p ON p.id_pelotao = a.fk_pelotao 
		INNER JOIN companhia c ON c.id_companhia = a.fk_companhia 
		WHERE id_aluno = ?";
		
		if ($stmt = mysqli_prepare($this->dbConection, $sql)) {
			// Bind
			mysqli_stmt_bind_param($stmt, "s", $id_aluno);

			if (mysqli_stmt_execute($stmt)) {
				$result = mysqli_stmt_get_result($stmt);

				if (mysqli_num_rows($result) == 1) {
					/* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					
					$aluno = new Aluno();
					
					$aluno->id_aluno = $row['id_aluno'];
					$aluno->nip = $row['nip'];
					$aluno->nome_completo = $row['nome_completo'];
					$aluno->nome_de_guerra = $row['nome_de_guerra'];
					$aluno->turma = $row['turma'];
					
					$aluno->id_quadro = $row['fk_quadro'];
					$aluno->id_pelotao = $row['fk_pelotao'];
					$aluno->id_companhia = $row['fk_companhia'];
					
					$aluno->nome_quadro = $row['nome_quadro'];
					$aluno->sigla_quadro = $row['sigla_quadro'];
					$aluno->nome_pelotao = $row['nome_pelotao'];
					$aluno->nome_companhia = $row['nome_companhia'];
					
					$aluno->funcol = $row['funcol'];
					
					$aluno->data_de_apresentacao = ObterDataDoMySql($row['data_de_apresentacao']);
					
					$aluno->nacionalidade = $row['nacionalidade'];
					$aluno->naturalidade = $row['naturalidade'];
					$aluno->cidade_nascimento = $row['cidade_nascimento'];
					$aluno->data_nascimento =  ObterDataDoMySql($row['data_nascimento']);
					$aluno->cor = $row['cor'];
					$aluno->sexo = $row['sexo'];
					$aluno->estado_civil = $row['estado_civil'];
					$aluno->nome_pai = $row['nome_pai'];
					$aluno->nome_mae = $row['nome_mae'];
					$aluno->cpf = $row['cpf'];
					$aluno->identidade = $row['identidade'];
					$aluno->identidade_data_emissao =  ObterDataDoMySql($row['identidade_data_emissao']);
					$aluno->identidade_orgao = $row['identidade_orgao'];
					$aluno->identidade_uf = $row['identidade_uf'];
					$aluno->bdf = $row['bdf'];
					$aluno->cronico = $row['cronico'];
					$aluno->alojamento = $row['alojamento'];
					$aluno->armario = $row['armario'];
					$aluno->pos_graduacao = $row['pos_graduacao'];
					$aluno->mestrado = $row['mestrado'];
					$aluno->doutorado = $row['doutorado'];
					$aluno->vinculo_marinha = $row['vinculo_marinha'];
					$aluno->quadro_forca_anterior = $row['quadro_forca_anterior'];
					$aluno->om_origem = $row['om_origem'];
					$aluno->servidor_publico = $row['servidor_publico'];
					$aluno->residencia_medica = $row['residencia_medica'];	

					return $aluno;
				}
			}
			
			// Close statement
			mysqli_stmt_close($stmt);
		}
	}

	public function ObterTodos(){
		$arrayAlunos = Array();
		
		$sql = "SELECT a.*, q.nome_quadro, q.sigla_quadro, p.nome_pelotao, c.nome_companhia 
			FROM aluno a 
			INNER JOIN quadro q ON q.id_quadro = a.fk_quadro 
			INNER JOIN pelotao p ON p.id_pelotao = a.fk_pelotao 
			INNER JOIN companhia c ON c.id_companhia = a.fk_companhia";
		
		if ($result = mysqli_query($this->dbConection, $sql)) {
			
			if (mysqli_num_rows($result) > 0) {
				
				 while ($row = mysqli_fetch_array($result)) { 
										
					$aluno = new Aluno();
					
					$aluno->id_aluno = $row['id_aluno'];
					$aluno->nip = $row['nip'];
					$aluno->nome_completo = $row['nome_completo'];
					$aluno->nome_de_guerra = $row['nome_de_guerra'];
					$aluno->turma = $row['turma'];
					
					$aluno->id_quadro = $row['fk_quadro'];
					$aluno->id_pelotao = $row['fk_pelotao'];
					$aluno->id_companhia = $row['fk_companhia'];
					
					$aluno->nome_quadro = $row['nome_quadro'];
					$aluno->sigla_quadro = $row['sigla_quadro'];
					$aluno->nome_pelotao = $row['nome_pelotao'];
					$aluno->nome_companhia = $row['nome_companhia'];
					
					$aluno->funcol = $row['funcol'];
					
					$aluno->data_de_apresentacao = ObterDataDoMySql($row['data_de_apresentacao']);
					
					$aluno->nacionalidade = $row['nacionalidade'];
					$aluno->naturalidade = $row['naturalidade'];
					$aluno->cidade_nascimento = $row['cidade_nascimento'];
					$aluno->data_nascimento =  ObterDataDoMySql($row['data_nascimento']);
					$aluno->cor = $row['cor'];
					$aluno->sexo = $row['sexo'];
					$aluno->estado_civil = $row['estado_civil'];
					$aluno->nome_pai = $row['nome_pai'];
					$aluno->nome_mae = $row['nome_mae'];
					$aluno->cpf = $row['cpf'];
					$aluno->identidade = $row['identidade'];
					$aluno->identidade_data_emissao =  ObterDataDoMySql($row['identidade_data_emissao']);
					$aluno->identidade_orgao = $row['identidade_orgao'];
					$aluno->identidade_uf = $row['identidade_uf'];
					$aluno->bdf = $row['bdf'];
					$aluno->cronico = $row['cronico'];
					$aluno->alojamento = $row['alojamento'];
					$aluno->armario = $row['armario'];
					$aluno->pos_graduacao = $row['pos_graduacao'];
					$aluno->mestrado = $row['mestrado'];
					$aluno->doutorado = $row['doutorado'];
					$aluno->vinculo_marinha = $row['vinculo_marinha'];
					$aluno->quadro_forca_anterior = $row['quadro_forca_anterior'];
					$aluno->om_origem = $row['om_origem'];
					$aluno->servidor_publico = $row['servidor_publico'];
					$aluno->residencia_medica = $row['residencia_medica'];	
					
					$arrayAlunos[] = $aluno;
				}
			}
			
			mysqli_free_result($result);
		}
		
		return $arrayAlunos;
	}
}
?>
