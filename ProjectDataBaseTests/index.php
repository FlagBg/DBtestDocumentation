<?php

include 'Database.php';

//database instance
$database	= Database::getDatabase();


$sql		= 'SELECT * FROM users';

$arguments	= array();

$rows		= $database->getResults($sql, $arguments);

var_dump($rows);die();