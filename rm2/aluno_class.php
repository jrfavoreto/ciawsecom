<?php
	
//aluno_class.php
class Aluno {
	
	public int $id_aluno;
	public int $id_quadro;
	public int $id_pelotao;
	public int $id_companhia;
	
	public ?string $nip;
	public ?string $nome_completo;
	public ?string $nome_de_guerra;
	
	public ?string $nome_companhia;
	public ?string $nome_pelotao;
	public ?string $nome_quadro;
	public ?string $sigla_quadro;
	
	public ?string $turma;
	public ?string $funcol;
	public ?string $data_de_apresentacao;
	public ?string $nacionalidade;
	public ?string $naturalidade;
	public ?string $cidade_nascimento;
	public ?string $data_nascimento;
	public ?string $cor;
	public ?string $sexo;
	public ?string $estado_civil;
	public ?string $nome_pai;
	public ?string $nome_mae;
	public ?string $cpf;
	public ?string $identidade;
	public ?string $identidade_data_emissao;
	public ?string $identidade_orgao;
	public ?string $identidade_uf;
	public ?string $bdf;
	public ?string $cronico;
	public ?string $alojamento;
	public ?string $armario;
	public ?string $pos_graduacao;
	public ?string $mestrado;
	public ?string $doutorado;
	public ?string $vinculo_marinha;
	public ?string $quadro_forca_anterior;
	public ?string $om_origem;
	public ?string $servidor_publico;
	public ?string $residencia_medica;	
				
    public function __construct()
    {       
    }
}
?>
