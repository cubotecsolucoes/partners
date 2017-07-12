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
$table = 'view_reservas';
 
// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'dia',  'dt' => 1 ),
    array( 'db' => 'nome',   'dt' => 2 ),
    array( 'db' => 'cpf',     'dt' => 3 ),
    array( 'db' => 'email',     'dt' => 4 ),
    array( 'db' => 'coluna',     'dt' => 5 ),
    array( 'db' => 'numero',     'dt' => 6, )
);
 
// SQL server connection information
// DEVELOPER
// $sql_details = array(
//     'user' => 'root',
//     'pass' => '',
//     'db'   => 'partners',
//     'host' => '127.0.0.1'
// );

// PRODUCTION
$sql_details = array(
    'user' => 'local',
    'pass' => 'weev2017',
    'db'   => 'evento',
    'host' => 'mysql873.umbler.com'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require('ssp.class.php');


// Id Evento to filter

if (isset($_GET['idevento']))
{
    $idEvento = $_GET['idevento'];

    echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $idEvento, $primaryKey, $columns )
    );

}