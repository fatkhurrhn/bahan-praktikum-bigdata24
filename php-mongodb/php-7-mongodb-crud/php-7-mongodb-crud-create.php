<?php

// include database file
include_once 'mongodb_config.php';

$dbname = 'roytuts';
$collection = 'users';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();

$user1 = array(
    'first_name' => 'Soumitra',
    'last_name' => 'Roy',
    'tags' => array('developer','admin')
);

$single_insert = new MongoDB\Driver\BulkWrite();
$single_insert->insert($user1);

$conn->executeBulkWrite("$dbname.$collection", $single_insert);

/*$user2 = array(
    'first_name' => 'Arup',
    'last_name' => 'Chatterjee',
    'tags' => array('developer')
);

$inserts = new MongoDB\Driver\BulkWrite();
$inserts->insert($user1);
$inserts->insert($user2);

$conn->executeBulkWrite("$dbname.$collection", $inserts);*/

?>