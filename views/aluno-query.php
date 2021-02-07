<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'aluno';

// Table's primary key
$primaryKey = 'id_aluno';

/* Exemplos de definição das colunas que quero exibir......
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => '`u`.`first_name`', 'dt' => 0, 'field' => 'first_name' ),
	array( 'db' => '`u`.`last_name`',  'dt' => 1, 'field' => 'last_name' ),
	array( 'db' => '`u`.`position`',   'dt' => 2, 'field' => 'position' ),
	array( 'db' => '`u`.`office`',     'dt' => 3, 'field' => 'office'),
	array( 'db' => '`ud`.`email`',     'dt' => 4, 'field' => 'email' ),
	array( 'db' => '`ud`.`phone`',     'dt' => 5, 'field' => 'phone' ),
	array( 'db' => '`u`.`start_date`', 'dt' => 6, 'field' => 'start_date', 'formatter' => function( $d, $row ) {
																	return date( 'jS M y', strtotime($d));
																}),
	array('db'  => '`u`.`salary`',     'dt' => 7, 'field' => 'salary', 'formatter' => function( $d, $row ) {
																return '$'.number_format($d);
															})
);
*/

$columns = array(
	array( 'db' => '`a`.`id_aluno`', 'dt' => 0, 'field' => 'id_aluno' ),
	array( 'db' => '`a`.`nip`',  'dt' => 1, 'field' => 'nip' ),
	array( 'db' => '`a`.`nome_completo`',   'dt' => 2, 'field' => 'nome_completo' ),
	array( 'db' => '`a`.`nome_de_guerra`',     'dt' => 3, 'field' => 'nome_de_guerra'),
    array( 'db' => '`a`.`turma`',     'dt' => 4, 'field' => 'turma'),
    array( 'db' => '`q`.`nome_quadro`',     'dt' => 5, 'field' => 'nome_quadro'),
    array( 'db' => '`p`.`nome_pelotao`',     'dt' => 6, 'field' => 'nome_pelotao'),
    array( 'db' => '`c`.`nome_companhia`',     'dt' => 7, 'field' => 'nome_companhia')
    ,array( 'db' => '`a`.`funcol`',     'dt' => 8, 'field' => 'funcol'),
    array( 'db' => '`a`.`data_de_apresentacao`',     'dt' => 9, 'field' => 'data_de_apresentacao', 
    'formatter' => function( $d, $row ) {
         return date( 'd/m/Y', strtotime($d));
    }),
    array( 'db' => '`a`.`nacionalidade`',     'dt' => 10, 'field' => 'nacionalidade'),
    array( 'db' => '`a`.`naturalidade`',     'dt' => 11, 'field' => 'naturalidade'),
    array( 'db' => '`a`.`cidade_nascimento`',     'dt' => 12, 'field' => 'cidade_nascimento'),
    array( 'db' => '`a`.`data_nascimento`',     'dt' => 13, 'field' => 'data_nascimento' , 
            'formatter' => function( $d, $row ) {
                 return date( 'd/m/Y', strtotime($d));
    }),
    array( 'db' => '`a`.`cor`',     'dt' => 14, 'field' => 'cor'),
    array( 'db' => '`a`.`sexo`',     'dt' => 15, 'field' => 'sexo'),
    array( 'db' => '`a`.`estado_civil`',     'dt' => 16, 'field' => 'estado_civil'),
    array( 'db' => '`a`.`nome_pai`',     'dt' => 17, 'field' => 'nome_pai'),
    array( 'db' => '`a`.`nome_mae`',     'dt' => 18, 'field' => 'nome_mae'),
    array( 'db' => '`a`.`cpf`',     'dt' => 19, 'field' => 'cpf'),
    array( 'db' => '`a`.`identidade`',     'dt' => 20, 'field' => 'identidade'),
    array( 'db' => '`a`.`identidade_data_emissao`',     'dt' => 21, 'field' => 'identidade_data_emissao', 
    'formatter' => function( $d, $row ) {
         return date( 'd/m/Y', strtotime($d));
    }),
    array( 'db' => '`a`.`identidade_orgao`',     'dt' => 22, 'field' => 'identidade_orgao'),
    array( 'db' => '`a`.`identidade_uf`',     'dt' => 23, 'field' => 'identidade_uf'),
    array( 'db' => '`a`.`bdf`',     'dt' => 24, 'field' => 'bdf'),
    array( 'db' => '`a`.`cronico`',     'dt' => 25, 'field' => 'cronico'),
    array( 'db' => '`a`.`alojamento`',     'dt' => 26, 'field' => 'alojamento'),
    array( 'db' => '`a`.`armario`',     'dt' => 27, 'field' => 'armario'),
    array( 'db' => '`a`.`pos_graduacao`',     'dt' => 28, 'field' => 'pos_graduacao'),
    array( 'db' => '`a`.`mestrado`',     'dt' => 29, 'field' => 'mestrado'),
    array( 'db' => '`a`.`doutorado`',     'dt' => 30, 'field' => 'doutorado'),
    array( 'db' => '`a`.`vinculo_marinha`',     'dt' => 31, 'field' => 'vinculo_marinha'),
    array( 'db' => '`a`.`quadro_forca_anterior`',     'dt' => 32, 'field' => 'quadro_forca_anterior'),
    array( 'db' => '`a`.`om_origem`',     'dt' => 33, 'field' => 'om_origem'),
    array( 'db' => '`a`.`servidor_publico`',     'dt' => 34, 'field' => 'servidor_publico'),
    array( 'db' => '`a`.`residencia_medica`',     'dt' => 35, 'field' => 'residencia_medica'),
    array( 'db' => '`a`.`endereco`',     'dt' => 36, 'field' => 'endereco'),
    array( 'db' => '`a`.`telefone_residencial`',     'dt' => 37, 'field' => 'telefone_residencial'),
    array( 'db' => '`a`.`telefone_celular`',     'dt' => 38, 'field' => 'telefone_celular'),
	array( 'db' => '`a`.`e_mail`',     'dt' => 39, 'field' => 'e_mail' )

);

// SQL server connection information
require('../db/config-db-rm2.php');
$sql_details = array(
	'user' => $db_username,
	'pass' => $db_password,
	'db'   => $db_name,
	'host' => $db_host
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../db/ssp.php' ); //esse arquivo já é o customizado
//require('ssp.customized.class.php' );

/* Sql que quero executar no banco:
$sql = "SELECT a.*, q.nome_quadro, q.sigla_quadro, p.nome_pelotao, c.nome_companhia 
			FROM aluno a 
		INNER JOIN quadro q ON q.id_quadro = a.fk_quadro 
		INNER JOIN pelotao p ON p.id_pelotao = a.fk_pelotao 
		INNER JOIN companhia c ON c.id_companhia = a.fk_companhia";
*/

$joinQuery = "FROM `aluno` AS `a` JOIN `quadro` AS `q` ON (`q`.`id_quadro` = `a`.`fk_quadro`)
JOIN `pelotao` AS `p` ON (`p`.`id_pelotao` = `a`.`fk_pelotao`)
JOIN `companhia` AS `c` ON (`c`.`id_companhia` = `a`.`fk_companhia`)";
//$extraWhere = "`u`.`salary` >= 90000";
//$groupBy = "`u`.`office`";
//$having = "`u`.`salary` >= 140000";

echo json_encode(
	SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery
    //, $extraWhere, $groupBy, $having 
    )
);