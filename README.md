# ciawsecom - Projeto Cadastro de alunos da SECOM/CIAW


### *Alterações:*

* Criação da página update.php
* Criação da página delete.php
* Refatoramento da página create.php - troca dos inputs Quadro e Pelotão/Companhia para selects
* Inclusão de 2 novos botões (editar, deletar) na coluna de Ação da página index2.php
* Novo arquivo funcoes_apoio.php onde concentrei a carga dos datasources dos campos Quadro e Pelotão/Companhia - (utilizado em update.php e create.php)
* Renomeado o label do campo "Pós-Graduação" para "Especialidade" (no banco continua sendo a coluna "pos_graduacao"
* Renomeado o label do campo "Telefone Residencial" para "Tel. em caso de Emergência" (conforme passado pelo Codama, depois verificar se pode substituir esse o te. residencial mesmo)
* Removido encode de alguns lugares, pois causava exibição de caracters estranhos (do banco já vem utf-8, sendo desnecessário em meus testes a conversão)
