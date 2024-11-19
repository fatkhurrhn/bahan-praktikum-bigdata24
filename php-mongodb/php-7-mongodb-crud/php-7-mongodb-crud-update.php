<?php

// include database file
include_once 'mongodb_config.php';

$dbname = 'roytuts';
$collection = 'users';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();

/*$single_update = new MongoDB\Driver\BulkWrite();
$single_update->update(
    ['last_name' => 'Roy'],
    ['$set' => ['first_name' => 'Liton', 'last_name' => 'Sarkar']],
    ['multi' => false, 'upsert' => false]
);
$result = $conn->executeBulkWrite("$dbname.$collection", $single_update);*/

$updates = new MongoDB\Driver\BulkWrite();
$updates->update(
    ['last_name' => 'Roy'],
    ['$set' => ['first_name' => 'Liton', 'last_name' => 'Sarkar']],
    ['multi' => true, 'upsert' => true]
);
$result = $conn->executeBulkWrite("$dbname.$collection", $updates);

/*$updates = new MongoDB\Driver\BulkWrite();
$updates->update(
    ['last_name' => 'Roy'],
    ['$set' => ['first_name' => 'Liton', 'last_name' => 'Sarkar']],
    ['multi' => false, 'upsert' => false]
);
$updates->update(
    ['last_name' => 'Chatterjee'],
    ['$set' => ['first_name' => 'Soumitra', 'last_name' => 'Roy']],
    ['multi' => false, 'upsert' => false]
);
$result = $conn->executeBulkWrite("$dbname.$collection", $updates);*/

if($result) {
	echo nl2br("Record updated successfully \n");
}

?>