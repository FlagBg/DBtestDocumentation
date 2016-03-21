<?php

// class ExamplePdo
// {

$host 			= "localhost";
$username 		= "username";
$password 		= "password";

//create connection:
$conn = new MySQL( $host, $username, $password);
//check connection:
	if ( $conn->connect_error)
	{
	die(" connection failed: " . $conn->connect_error);
	}

//create database
	$sql = "CREATE DATABASE myNEWNEWNEWNEWnewDB";
		if ( $conn->query( $sql === TRUE ))
			{
			print "Database created successfully";
			}
		else 
		{
			print "Error creating database: " . $conn->error;
		}

$conn->close();

//}
?>


