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
$nome_completo = $nome_de_guerra = $turma = $fk_quadro = $fk_pelotao = $fk_companhia = $endereco = $nip = $funcol = $nacionalidade = $naturalidade = $cidade_nascimento = $data_nascimento
= $sexo = $estado_civil = $nome_pai = $nome_mae = $cor = $bdf = $cronico = $pos_graduacao = $mestrado = $doutorado  = $vinculo_marinha = $quadro_forca_anterior = $om_origem
= $servidor_publico = $telefone_residencial = $telefone_celular = $cpf = $identidade = $identidade_data_emissao = $identidade_orgao = $identidade_uf = $e_mail = $alojamento
= $armario = $data_de_apresentacao = $residencia_medica = "";

$nome_completo_err = $nome_de_guerra_err = $turma_err = $fk_quadro_err = $fk_pelotao_err = $fk_companhia_err = $endereco_err = $nip_err = $funcol_err = $nacionalidade_err
= $naturalidade_err = $cidade_nascimento_err = $data_nascimento_err = $sexo_err = $estado_civil_err = $nome_pai_err = $nome_mae_err = $cor_err = $bdf_err = $cronico_err
= $pos_graduacao_err = $mestrado_err = $doutorado_err  = $vinculo_marinha_err = $quadro_forca_anterior_err = $om_origem_err = $servidor_publico_err = $telefone_residencial_err
= $telefone_celular_err = $cpf_err = $identidade_err = $identidade_data_emissao_err = $identidade_orgao_err = $identidade_uf_err = $e_mail_err = $alojamento_err
= $armario_err = $data_de_apresentacao_err = $residencia_medica_err = "";

//$descrição_err = $quantidade_err = $minimo_err = $observações_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_nome_completo = trim($_POST["nome_completo"]);
    if(empty($input_nome_completo)){
        $nome_completo_err = "Digite o nome do aluno";
    } elseif(!filter_var($input_nome_completo)){
        $nome_completo_err = "Por favor, coloque um nome válido";
    } else{
        $nome_completo = $input_nome_completo;
    }
    
    // Validate
    $input_nome_de_guerra = trim($_POST["nome_de_guerra"]);
    if(empty($input_nome_de_guerra)){
        $nome_de_guerra_err = "Digite o nome de guerra";     
    }  elseif(!filter_var($input_nome_de_guerra)){
        $nome_de_guerra_err = "Por favor, coloque um nome de guerra válido";
	}	else{
        $nome_de_guerra = $input_nome_de_guerra;
    }
    
    // Validate
    $input_turma = trim($_POST["turma"]);
    if(empty($input_turma)){
        $turma_err = "Digite a turma do aluno";     
    } elseif(!filter_var($input_turma)){
        $turma_err = "Por favor, digite uma turma válida";
    } else{
        $turma = $input_turma;
    }
   
    // Validate name
    $input_fk_quadro = trim($_POST["fk_quadro"]);
    if(empty($input_fk_quadro)){
        $fk_quadro_err = "Digite o quadro do aluno";
    } elseif(!ctype_digit($input_fk_quadro)){
        $fk_quadro_err = "Por favor, digite um quadro válido";
    } else{
        $fk_quadro = $input_fk_quadro;
    }
    
    // Validate
    $input_fk_companhia = trim($_POST["fk_companhia"]);
    if(empty($input_fk_companhia)){
        $fk_companhia_err = "Digite a companhia do aluno";     
    }  elseif(!ctype_digit($input_fk_companhia)){
        $fk_companhia_err = "Por favor, digite uma companhia válida";
	}	else{
        $fk_companhia = $input_fk_companhia;
    }
	
	// Validate name
    $input_fk_pelotao = trim($_POST["fk_pelotao"]);
    if(empty($input_fk_pelotao)){
        $fk_pelotao_err = "Digite o pelotão do aluno";
    } elseif(!ctype_digit($input_fk_pelotao)){
        $descrição_err = "Por favor, digite um pelotão válido";
    } else{
        $fk_pelotao = $input_fk_pelotao+(($input_fk_companhia-1)*3);
    }
    
    // Validate
    $input_endereco = trim($_POST["endereco"]);
    if(empty($input_endereco)){
        $endereco_err = "Digite o endereço";     
    } elseif(!filter_var($input_endereco)){
        $endereco_err = "Por favor, digite um endereco válido";
    } else{
        $endereco = $input_endereco;
    }
   
    // Validate name
    $input_nip = trim($_POST["nip"]);
    if(empty($input_nip)){
        $nip_err = "Digite o nip";
    } elseif(!filter_var($input_nip)){
        $nip_err = "Por favor, coloque um nip válido";
    } else{
        $nip = $input_nip;
    }
	
	    // Validate name
    $input_funcol = trim($_POST["funcol"]);
    if(empty($input_funcol)){
        $funcol_err = "Digite a funcol do aluno";
    } elseif(!filter_var($input_funcol)){
        $funcol_err = "Por favor, coloque uma funcol válida";
    } else{
        $funcol = $input_funcol;
    }
    
    // Validate
    $input_nacionalidade = trim($_POST["nacionalidade"]);
    if(empty($input_nacionalidade)){
        $nacionalidade_err = "Digite a nacionalidade";     
    }  elseif(!filter_var($input_nacionalidade)){
        $nacionalidade_err = "Por favor, coloque uma nacionalidade válida";
	}	else{
        $nacionalidade = $input_nacionalidade;
    }
    
    // Validate
    $input_naturalidade = trim($_POST["naturalidade"]);
    if(empty($input_naturalidade)){
        $naturalidade_err = "Digite a naturalidade";     
    } elseif(!filter_var($input_naturalidade)){
        $naturalidade_err = "Por favor digite uma naturalidade válida";
    } else{
        $naturalidade = $input_naturalidade;
    }
   
    // Validate name
    $input_cidade_nascimento = trim($_POST["cidade_nascimento"]);
    if(empty($input_cidade_nascimento)){
        $cidade_nascimento_err = "Digite a cidade de nascimento do aluno";
    } elseif(!filter_var($input_cidade_nascimento)){
        $cidade_nascimento_err = "Por favor, coloque uma cidade válida";
    } else{
        $cidade_nascimento = $input_cidade_nascimento;
    }
	
	    // Validate name
    $input_data_nascimento = trim($_POST["data_nascimento"]);
    if(empty($input_data_nascimento)){
        $data_nascimento_err = "Digite a data de nascimento do aluno";
    } elseif(!filter_var($input_data_nascimento)){
        $descrição_err = "Por favor, coloque uma data de nascimento válida";
    } else{
        $data_nascimento = $input_data_nascimento;
    }
    
    // Validate
    $input_sexo = trim($_POST["sexo"]);
    if(empty($input_sexo)){
        $sexo_err = "Digite o sexo correspondente";     
    }  elseif(!filter_var($input_sexo)){
        $sexo_err = "Por favor, digite o sexo corretamente";
	}	else{
        $sexo = $input_sexo;
    }
    
    // Validate
    $input_estado_civil = trim($_POST["estado_civil"]);
    if(empty($input_estado_civil)){
        $estado_civil_err = "Digite o estado civil";     
    } elseif(!filter_var($input_estado_civil)){
        $estado_civil_err = "Por favor digite o campo corretamente";
    } else{
        $estado_civil = $input_estado_civil;
    } 
   
    // Validate name
    $input_nome_pai = trim($_POST["nome_pai"]);
    if(empty($input_nome_pai)){
        $nome_pai_err = "Digite o nome do pai";
    } elseif(!filter_var($input_nome_pai)){
        $observações_err = "Por favor digite o campo corretamente";
    } else{
        $nome_pai = $input_nome_pai;
    }
	
	    // Validate name
    $input_nome_mae = trim($_POST["nome_mae"]);
    if(empty($input_nome_mae)){
        $nome_mae_err = "Digite o nome da mãe";
    } elseif(!filter_var($input_nome_mae)){
        $nome_mae_err = "Por favor, coloque um nome válido";
    } else{
        $nome_mae = $input_nome_mae;
    }
	
    // Validate
    $input_cor = trim($_POST["cor"]);
    if(empty($input_cor)){
        $cor_err = "Digite a cor corretamente";     
    }  elseif(!filter_var($input_cor)){
        $cor_err = "Digite a cor corretamente";
	}	else{
        $cor = $input_cor;
    }
    
    // Validate
    $input_bdf = trim($_POST["bdf"]);
    if(empty($input_bdf)){
        $bdf_err = "Digite o campo BDF";     
    } elseif(!filter_var($input_bdf)){
        $bdf_err = "Digite o campo BDF corretamente";
    } else{
        $bdf = $input_bdf;
    }
  
    // Validate name
    $input_cronico = trim($_POST["cronico"]);
    if(empty($input_cronico)){
        $cronico_err = "Digite o campo Crônico";
    } elseif(!filter_var($input_cronico)){
        $cronico_err = "Por favor preencha o campo corretamente";
    } else{
        $cronico = $input_cronico;
    }	
	
	    // Validate name
    $input_pos_graduacao = trim($_POST["pos_graduacao"]);
    if(empty($input_pos_graduacao)){
        $pos_graduacao_err = "Digite a pós-graduação";
    } elseif(!filter_var($input_pos_graduacao)){
        $pos_graduacao_err = "Por favor, digite uma pós-graduação válida";
    } else{
        $pos_graduacao = $input_pos_graduacao;
    }
    
    // Validate
    $input_mestrado = trim($_POST["mestrado"]);
    if(empty($input_mestrado)){
        $mestrado_err = "Digite o mestrado";     
    }  elseif(!filter_var($input_mestrado)){
        $mestrado_err = "Por favor, digite um mestrado válido";
	}	else{
        $mestrado = $input_mestrado;
    }
    
    // Validate
    $input_doutorado = trim($_POST["doutorado"]);
    if(empty($input_doutorado)){
        $doutorado_err = "Digite o doutorado";     
    } elseif(!filter_var($input_doutorado)){
        $doutorado_err = "Por favor, digite um doutorado válido";
    } else{
        $doutorado = $input_doutorado;
    }
   
    // Validate name
    $input_vinculo_marinha = trim($_POST["vinculo_marinha"]);
    if(empty($input_vinculo_marinha)){
        $vinculo_marinha_err = "Digite o vínculo com a Marinha";
    } elseif(!filter_var($input_vinculo_marinha)){
        $vinculo_marinha_err = "Por favor, digite o vínculo correto";
    } else{
        $vinculo_marinha = $input_vinculo_marinha;
    }
	
	    // Validate name
    $input_quadro_forca_anterior = trim($_POST["quadro_forca_anterior"]);
    if(empty($input_quadro_forca_anterior)){
        $quadro_forca_anterior_err = "Digite o quadro na força anterior";
    } elseif(!filter_var($input_quadro_forca_anterior)){
        $quadro_forca_anterior_err = "Por favor preencha o campo corretamente";
    } else{
        $quadro_forca_anterior = $input_quadro_forca_anterior;
    }
    
    // Validate
    $input_om_origem = trim($_POST["om_origem"]);
    if(empty($input_om_origem)){
        $om_origem_err = "Digite a OM de origem";     
    }  elseif(!filter_var($input_om_origem)){
        $om_origem_err = "Por favor preencha o campo corretamente";
	}	else{
        $om_origem = $input_om_origem;
    }
    
    // Validate
    $input_servidor_publico = trim($_POST["servidor_publico"]);
    if(empty($input_servidor_publico)){
        $servidor_publico_err = "Digite se já foi servidor público";     
    } elseif(!filter_var($input_servidor_publico)){
        $servidor_publico_err = "Por favor preencha o campo corretamente";
    } else{
        $servidor_publico = $input_servidor_publico;
    }
   
    // Validate name
    $input_telefone_residencial = trim($_POST["telefone_residencial"]);
    if(empty($input_telefone_residencial)){
        $telefone_residencial_err = "Digite o telefone residencial";
    } elseif(!filter_var($input_telefone_residencial)){
        $telefone_residencial_err = "Por favor, coloque um número válido";
    } else{
        $telefone_residencial = $input_telefone_residencial;
    }
	
	    // Validate name
    $input_telefone_celular = trim($_POST["telefone_celular"]);
    if(empty($input_telefone_celular)){
        $telefone_celular_err = "Digite o telefone celular";
    } elseif(!filter_var($input_telefone_celular)){
        $telefone_celular_err = "Por favor, coloque um número válido";
    } else{
        $telefone_celular = $input_telefone_celular;
    }
	
    // Validate
    $input_cpf = trim($_POST["cpf"]);
    if(empty($input_cpf)){
        $cpf_err = "Digite o CPF";     
    }  elseif(!filter_var($input_cpf)){
        $cpf_err = "Por favor digite um número válido";
	}	else{
        $cpf = $input_cpf;
    }
    
    // Validate
    $input_identidade = trim($_POST["identidade"]);
    if(empty($input_identidade)){
        $identidade_err = "Digite o número de identidade";     
    } elseif(!filter_var($input_identidade)){
        $identidade_err = "Por favor preencha o campo corretamente";
    } else{
        $identidade = $input_identidade;
    }	
   
    // Validate name
    $input_identidade_data_emissao = trim($_POST["identidade_data_emissao"]);
    if(empty($input_identidade_data_emissao)){
        $identidade_data_emissao_err = "Digite a data de emissão da identidade";
    } elseif(!filter_var($input_identidade_data_emissao)){
        $identidade_data_emissao_err = "Por favor preencha o campo corretamente";
    } else{
        $identidade_data_emissao = $input_identidade_data_emissao;
    }
	
	
	    // Validate name
    $input_identidade_orgao = trim($_POST["identidade_orgao"]);
    if(empty($input_identidade_orgao)){
        $identidade_orgao_err = "Digite o órgão de emissão da identidade";
    } elseif(!filter_var($input_identidade_orgao)){
        $identidade_orgao_err = "Por favor preencha o campo corretamente";
    } else{
        $identidade_orgao = $input_identidade_orgao;
    }
	
		// Validate name
    $input_identidade_uf = trim($_POST["identidade_uf"]);
    if(empty($input_identidade_uf)){
        $observações_err = "Digite a UF da identidade";
    } elseif(!filter_var($input_identidade_uf)){
        $identidade_uf_err = "Por favor preencha o campo corretamente";
    } else{
        $identidade_uf = $input_identidade_uf;
	}
		
		// Validate name
    $input_e_mail = trim($_POST["e_mail"]);
    if(empty($input_e_mail)){
        $e_mail_err = "Digite o e-mail";
    } elseif(!filter_var($input_e_mail)){
        $e_mail_err = "Por favor preencha o campo corretamente";
    } else{
        $e_mail = $input_e_mail;
	}
		
		
		// Validate name
    $input_alojamento = trim($_POST["alojamento"]);
    if(empty($input_alojamento)){
        $alojamento_err = "Digite o alojamento";
    } elseif(!filter_var($input_alojamento)){
        $alojamento_err = "Por favor preencha o campo corretamente";
    } else{
        $alojamento = $input_alojamento;
	}
	
		// Validate name
    $input_armario = trim($_POST["armario"]);
    if(empty($input_armario)){
        $armario_err = "Digite o armário";
    } elseif(!filter_var($input_armario)){
        $armario_err = "Por favor preencha o campo corretamente";
    } else{
        $armario = $input_armario;
	}

		// Validate name
    $input_data_de_apresentacao = trim($_POST["data_de_apresentacao"]);
    if(empty($input_data_de_apresentacao)){
        $data_de_apresentacao_err = "Digite a data de apresentação";
    } elseif(!filter_var($input_data_de_apresentacao)){
        $data_de_apresentacao_err = "Por favor preencha o campo corretamente";
    } else{
        $data_de_apresentacao = $input_data_de_apresentacao;
	}		
	
	    // Validate name
    $input_residencia_medica = trim($_POST["residencia_medica"]);
    if(empty($input_residencia_medica)){
        $residencia_medica_err = "Digite a residência médica";
    } elseif(!filter_var($input_residencia_medica)){
        $residencia_medica_err = "Por favor preencha o campo corretamente";
    } else{
        $residencia_medica = $input_residencia_medica;
    }

    // Check input errors before inserting in database
    if(empty($nome_completo_err) && empty($nome_de_guerra_err) && empty($turma_err) && empty($fk_quadro_err) && empty($fk_pelotao_err) && empty($fk_companhia_err) && empty($endereco_err)
		 && empty($nip_err) && empty($funcol_err) && empty($nacionalidade_err) && empty($naturalidade_err) && empty($cidade_nascimento_err) && empty($data_nascimento_err)
	  && empty($sexo_err) && empty($estado_civil_err) && empty($nome_pai_err) && empty($nome_mae_err) && empty($cor_err) && empty($bdf_err)
	   && empty($cronico_err) && empty($pos_graduacao_err) && empty($mestrado_err) && empty($doutorado_err) && empty($vinculo_marinha_err) && empty($quadro_forca_anterior_err)
	    && empty($om_origem_err) && empty($servidor_publico_err) && empty($telefone_residencial_err) && empty($telefone_celular_err) && empty($cpf_err) && empty($identidade_err)
		 && empty($identidade_data_emissao_err) && empty($identidade_orgao_err) && empty($identidade_uf_err) && empty($e_mail_err) && empty($alojamento_err) && empty($armario_err)
		  && empty($data_de_apresentacao_err) && empty($residencia_medica_err)){
        // Prepare an insert statement
        //$sql = "INSERT INTO item (item_Descricao, Item_Quantidade, Item_Minimo, item_Observacao) VALUES (?, ?, ?, ?)";
		
		
		//MANDAR O ENDEREÇO PARA O BD;!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
        $sql = "INSERT INTO aluno (nome_completo, nome_de_guerra, turma, fk_quadro, fk_pelotao, fk_companhia, endereco, nip, funcol, nacionalidade, naturalidade, cidade_nascimento, 
		data_nascimento, sexo, estado_civil, nome_pai, nome_mae, cor, bdf, cronico, pos_graduacao, mestrado, doutorado, vinculo_marinha, quadro_forca_anterior, om_origem, 
		servidor_publico, telefone_residencial, telefone_celular, cpf, identidade, identidade_data_emissao, identidade_orgao, identidade_uf, e_mail, alojamento, 
		armario, data_de_apresentacao, residencia_medica) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        
		echo $sql;
		
		if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssiiisssssssssssssssssssssssssssssssss", $param_nome_completo, $param_nome_de_guerra, $param_turma, $param_fk_quadro, $param_fk_pelotao, 
			$param_fk_companhia, $param_endereco, $param_nip, $param_funcol, $param_nacionalidade, $param_naturalidade, $param_cidade_nascimento, $param_data_nascimento, $param_sexo, 
			$param_estado_civil, $param_nome_pai, $param_nome_mae, $param_cor, $param_bdf, $param_cronico, $param_pos_graduacao, $param_mestrado, $param_doutorado, $param_vinculo_marinha, 
			$param_quadro_forca_anterior, $param_om_origem, $param_servidor_publico, $param_telefone_residencial, $param_telefone_celular, $param_cpf, 
			$param_identidade, $param_identidade_data_emissao, $param_identidade_orgao, $param_identidade_uf, $param_e_mail, $param_alojamento, $param_armario, $param_data_de_apresentacao, 
			$param_residencia_medica);
    
	
            // Set parameters
            //$param_descrição = $item_Descricao;
            //$param_quantidade = $item_Quantidade;
            //$param_minimo = $item_Minimo;
			//$param_observação = $item_Observacao;
			
			$param_nome_completo = $nome_completo;
			$param_nome_de_guerra = $nome_de_guerra;
			$param_turma = $turma;
			$param_fk_quadro = $fk_quadro;
			$param_fk_pelotao = $fk_pelotao;
			$param_fk_companhia = $fk_companhia;
			$param_endereco = $endereco;
			$param_nip = $nip;
			$param_funcol = $funcol;
			$param_nacionalidade = $nacionalidade;
			$param_naturalidade = $naturalidade;
			$param_cidade_nascimento = $cidade_nascimento;
			$param_data_nascimento = $data_nascimento;
			$param_sexo = $sexo;
			$param_estado_civil = $estado_civil;
			$param_nome_pai = $nome_pai;
			$param_nome_mae = $nome_mae;
			$param_cor = $cor;
			$param_bdf = $bdf;
			$param_cronico = $cronico;
			$param_pos_graduacao = $pos_graduacao;
			$param_mestrado = $mestrado;
			$param_doutorado = $doutorado;
			$param_vinculo_marinha = $vinculo_marinha;
			$param_quadro_forca_anterior = $quadro_forca_anterior;
			$param_om_origem = $om_origem;
			$param_servidor_publico = $servidor_publico;
			$param_telefone_residencial = $telefone_residencial;
			$param_telefone_celular = $telefone_celular;
			$param_cpf = $cpf;
			$param_identidade = $identidade;
			$param_identidade_data_emissao = $identidade_data_emissao;
			$param_identidade_orgao = $identidade_orgao;
			$param_identidade_uf = $identidade_uf;
			$param_e_mail = $e_mail;
			$param_alojamento = $alojamento;
			$param_armario = $armario;
			$param_data_de_apresentacao = $data_de_apresentacao;
			$param_residencia_medica = $residencia_medica;
			
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index2.php");
                exit();
            } else{
                echo "Oops! Algo deu errado. Tente novamente mais tarde";
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
    <title>Create Record</title>
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
                        <h2>Adicionar Aluno</h2>
                    </div>
                    <p>Por favor, preencha os campos abaixo para adicionar um novo aluno à base de dados</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nome_completo_err)) ? 'has-error' : ''; ?>">
                            <label>Nome Completo</label>
                            <input type="text" name="nome_completo" class="form-control" value="<?php echo $nome_completo; ?>">
                            <span class="help-block"><?php echo $nome_completo_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nome_de_guerra_err)) ? 'has-error' : ''; ?>">
                            <label>Nome de Guerra</label>
                            <input type="text" name="nome_de_guerra" class="form-control" value="<?php echo $nome_de_guerra; ?>">
                            <span class="help-block"><?php echo $nome_de_guerra_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($turma_err)) ? 'has-error' : ''; ?>">
                            <label>Turma</label>
                            <input type="text" name="turma" class="form-control" value="<?php echo $turma; ?>">
                            <span class="help-block"><?php echo $turma_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($fk_quadro_err)) ? 'has-error' : ''; ?>">
                            <label>Quadro</label>
                            <input type="text" name="fk_quadro" class="form-control" value="<?php echo $fk_quadro; ?>">
                            <span class="help-block"><?php echo $fk_quadro_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($fk_pelotao_err)) ? 'has-error' : ''; ?>">
                            <label>Pelotão</label>
                            <input type="text" name="fk_pelotao" class="form-control" value="<?php echo $fk_pelotao; ?>">
                            <span class="help-block"><?php echo $fk_pelotao_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($fk_companhia_err)) ? 'has-error' : ''; ?>">
                            <label>Companhia</label>
                            <input type="text" name="fk_companhia" class="form-control" value="<?php echo $fk_companhia; ?>">
                            <span class="help-block"><?php echo $fk_companhia_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($endereco_err)) ? 'has-error' : ''; ?>">
                            <label>Endereço</label>
                            <input type="text" name="endereco" class="form-control" value="<?php echo $endereco; ?>">
                            <span class="help-block"><?php echo $endereco_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($nip_err)) ? 'has-error' : ''; ?>">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" value="<?php echo $nip; ?>">
                            <span class="help-block"><?php echo $nip_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($funcol_err)) ? 'has-error' : ''; ?>">
                            <label>Funcol</label>
                            <input type="text" name="funcol" class="form-control" value="<?php echo $funcol; ?>">
                            <span class="help-block"><?php echo $funcol_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($nacionalidade_err)) ? 'has-error' : ''; ?>">
                            <label>Nacionalidade</label>
                            <input type="text" name="nacionalidade" class="form-control" value="<?php echo $nacionalidade; ?>">
                            <span class="help-block"><?php echo $nacionalidade_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($naturalidade_err)) ? 'has-error' : ''; ?>">
                            <label>Naturalidade</label>
                            <input type="text" name="naturalidade" class="form-control" value="<?php echo $naturalidade; ?>">
                            <span class="help-block"><?php echo $naturalidade_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($cidade_nascimento_err)) ? 'has-error' : ''; ?>">
                            <label>Cidade de Nascimento</label>
                            <input type="text" name="cidade_nascimento" class="form-control" value="<?php echo $cidade_nascimento; ?>">
                            <span class="help-block"><?php echo $cidade_nascimento_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($data_nascimento_err)) ? 'has-error' : ''; ?>">
                            <label>Data de Nascimento</label>
                            <input type="text" name="data_nascimento" class="form-control" value="<?php echo $data_nascimento; ?>">
                            <span class="help-block"><?php echo $data_nascimento_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($sexo_err)) ? 'has-error' : ''; ?>">
                            <label>Sexo</label>
                            <input type="text" name="sexo" class="form-control" value="<?php echo $sexo; ?>">
                            <span class="help-block"><?php echo $sexo_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($estado_civil_err)) ? 'has-error' : ''; ?>">
                            <label>Estado Civil</label>
                            <input type="text" name="estado_civil" class="form-control" value="<?php echo $estado_civil; ?>">
                            <span class="help-block"><?php echo $estado_civil_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($nome_pai_err)) ? 'has-error' : ''; ?>">
                            <label>Nome do Pai</label>
                            <input type="text" name="nome_pai" class="form-control" value="<?php echo $nome_pai; ?>">
                            <span class="help-block"><?php echo $nome_pai_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($nome_mae_err)) ? 'has-error' : ''; ?>">
                            <label>Nome da Mãe</label>
                            <input type="text" name="nome_mae" class="form-control" value="<?php echo $nome_mae; ?>">
                            <span class="help-block"><?php echo $nome_mae_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($cor_err)) ? 'has-error' : ''; ?>">
                            <label>Cor</label>
                            <input type="text" name="cor" class="form-control" value="<?php echo $cor; ?>">
                            <span class="help-block"><?php echo $cor_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($bdf_err)) ? 'has-error' : ''; ?>">
                            <label>BDF</label>
                            <input type="text" name="bdf" class="form-control" value="<?php echo $bdf; ?>">
                            <span class="help-block"><?php echo $bdf_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($cronico_err)) ? 'has-error' : ''; ?>">
                            <label>Crônico</label>
                            <input type="text" name="cronico" class="form-control" value="<?php echo $cronico; ?>">
                            <span class="help-block"><?php echo $cronico_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($pos_graduacao_err)) ? 'has-error' : ''; ?>">
                            <label>Pós-Graduação</label>
                            <input type="text" name="pos_graduacao" class="form-control" value="<?php echo $pos_graduacao; ?>">
                            <span class="help-block"><?php echo $pos_graduacao_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($mestrado_err)) ? 'has-error' : ''; ?>">
                            <label>Mestrado</label>
                            <input type="text" name="mestrado" class="form-control" value="<?php echo $mestrado; ?>">
                            <span class="help-block"><?php echo $mestrado_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($doutorado_err)) ? 'has-error' : ''; ?>">
                            <label>Doutorado</label>
                            <input type="text" name="doutorado" class="form-control" value="<?php echo $doutorado; ?>">
                            <span class="help-block"><?php echo $doutorado_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($vinculo_marinha_err)) ? 'has-error' : ''; ?>">
                            <label>Vínculo anterior com a Marinha</label>
                            <input type="text" name="vinculo_marinha" class="form-control" value="<?php echo $vinculo_marinha; ?>">
                            <span class="help-block"><?php echo $vinculo_marinha_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($quadro_forca_anterior_err)) ? 'has-error' : ''; ?>">
                            <label>Quadro Anterior na Força</label>
                            <input type="text" name="quadro_forca_anterior" class="form-control" value="<?php echo $quadro_forca_anterior; ?>">
                            <span class="help-block"><?php echo $quadro_forca_anterior_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($om_origem_err)) ? 'has-error' : ''; ?>">
                            <label>OM de Origem</label>
                            <input type="text" name="om_origem" class="form-control" value="<?php echo $om_origem; ?>">
                            <span class="help-block"><?php echo $om_origem_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($servidor_publico_err)) ? 'has-error' : ''; ?>">
                            <label>Servidor Público</label>
                            <input type="text" name="servidor_publico" class="form-control" value="<?php echo $servidor_publico; ?>">
                            <span class="help-block"><?php echo $servidor_publico_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($telefone_residencial_err)) ? 'has-error' : ''; ?>">
                            <label>Telefone Residencial</label>
                            <input type="text" name="telefone_residencial" class="form-control" value="<?php echo $telefone_residencial; ?>">
                            <span class="help-block"><?php echo $telefone_residencial_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($telefone_celular_err)) ? 'has-error' : ''; ?>">
                            <label>Telefone Celular</label>
                            <input type="text" name="telefone_celular" class="form-control" value="<?php echo $telefone_celular; ?>">
                            <span class="help-block"><?php echo $telefone_celular_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($cpf_err)) ? 'has-error' : ''; ?>">
                            <label>CPF</label>
                            <input type="text" name="cpf" class="form-control" value="<?php echo $cpf; ?>">
                            <span class="help-block"><?php echo $cpf_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($identidade_err)) ? 'has-error' : ''; ?>">
                            <label>Número da Identidade</label>
                            <input type="text" name="identidade" class="form-control" value="<?php echo $identidade; ?>">
                            <span class="help-block"><?php echo $identidade_err;?></span>
						</div>
						<div class="form-group <?php echo (!empty($identidade_data_emissao_err)) ? 'has-error' : ''; ?>">
                            <label>Data de Emissão da Identidade</label>
                            <input type="text" name="identidade_data_emissao" class="form-control" value="<?php echo $identidade_data_emissao; ?>">
                            <span class="help-block"><?php echo $identidade_data_emissao_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($identidade_orgao_err)) ? 'has-error' : ''; ?>">
                            <label>Órgão Emissor da Identidade</label>
                            <input type="text" name="identidade_orgao" class="form-control" value="<?php echo $identidade_orgao; ?>">
                            <span class="help-block"><?php echo $identidade_orgao_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($identidade_uf_err)) ? 'has-error' : ''; ?>">
                            <label>UF da Identidade</label>
                            <input type="text" name="identidade_uf" class="form-control" value="<?php echo $identidade_uf; ?>">
                            <span class="help-block"><?php echo $identidade_uf_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($e_mail_err)) ? 'has-error' : ''; ?>">
                            <label>E-mail</label>
                            <input type="text" name="e_mail" class="form-control" value="<?php echo $e_mail; ?>">
                            <span class="help-block"><?php echo $e_mail_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($alojamento_err)) ? 'has-error' : ''; ?>">
                            <label>Alojamento</label>
                            <input type="text" name="alojamento" class="form-control" value="<?php echo $alojamento; ?>">
                            <span class="help-block"><?php echo $alojamento_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($armario_err)) ? 'has-error' : ''; ?>">
                            <label>Armario</label>
                            <input type="text" name="armario" class="form-control" value="<?php echo $armario; ?>">
                            <span class="help-block"><?php echo $armario_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($data_de_apresentacao_err)) ? 'has-error' : ''; ?>">
                            <label>Data de Apresentação ao CIAW</label>
                            <input type="text" name="data_de_apresentacao" class="form-control" value="<?php echo $data_de_apresentacao; ?>">
                            <span class="help-block"><?php echo $data_de_apresentacao_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($residencia_medica_err)) ? 'has-error' : ''; ?>">
                            <label>Residência Médica</label>
                            <input type="text" name="residencia_medica" class="form-control" value="<?php echo $residencia_medica; ?>">
                            <span class="help-block"><?php echo $residencia_medica_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Criar">
                        <a href="/comcasec/cfo/index2.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>