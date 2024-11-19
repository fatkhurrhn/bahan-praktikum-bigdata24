<?php

// include database file
include_once 'mongodb_config.php';

$dbname = 'roytuts';
$collection = 'users';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();

/*$delete = new MongoDB\Driver\BulkWrite();
$delete->delete(
    ['first_name' => 'Arup'],
    ['limit' => 1]
);

$result = $conn->executeBulkWrite("$dbname.$collection", $delete);*/

$deletes = new MongoDB\Driver\BulkWrite();
$deletes->delete(
    ['first_name' => 'Liton'],
    ['limit' => 1]
);

$deletes->delete(
    ['first_name' => 'Arup'],
    ['limit' => 1]
);

$result = $conn->executeBulkWrite("$dbname.$collection", $deletes);

if($result) {
	echo nl2br("Record deleted successfully \n");
}

?>