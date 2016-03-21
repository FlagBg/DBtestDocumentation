<?php 




//not working yet!



$user = 'root';
$pass = '';


$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
			$user, $pass );//$user, $pass)


			
$dbh->beginTransaction();
$dbh->exec("UPDATE users SET username = 'Havana' WHERE id=5");



?>




	