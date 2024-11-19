<?php

// include database file
include_once 'mongodb_config.php';

$dbname = 'roytuts';
$collection = 'users';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();

$filter = [];
$option = [];

$read = new MongoDB\Driver\Query($filter, $option);

$all_users = $conn->executeQuery("$dbname.$collection", $read);

echo nl2br("List of users:\n");

foreach ($all_users as $user) {
	echo nl2br($user->first_name.' '.$user->last_name.' has following roles:' . "\n");
	foreach ($user->tags as $tag) {
		echo nl2br($tag . "\n");
	}
}

echo nl2br("\n\nRead single record based on filter:\n");

$filter = ['first_name' => 'Arup'];
$option = [];
$read = new MongoDB\Driver\Query($filter, $option);
$single_user = $conn->executeQuery("$dbname.$collection", $read);

echo nl2br("\nSingle user:\n");

foreach ($single_user as $user) {
	echo nl2br($user->first_name.' '.$user->last_name.' has following roles:' . "\n");
	foreach ($user->tags as $tag) {
		echo nl2br($tag . "\n");
	}
}

?>