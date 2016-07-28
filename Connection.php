
<?php

/**
 * 
 * @brief 		class that is creating connection to database and print all the values from a table;
 * 
 * @details		when create the connection execute all datas;
 * 
 */
class Connection
{
	/**
	 * @var		string	$pass
	 * @var 	string $user
	 */
	private $user = "root";
	private $pass = "";
	//const PASSWoRD			= "";
	//const USERNAME			= "root";
	//$dbh = new PDO( 'mysql:host= localhost; dbname = electromer', $user, $pass );
	
	/**
	 * @brief	function that create connection with the database with all host,user,pass,databasename;
	 * 	PDO::query(string $statement)
	 * Executes an SQL statement, returning a result set as a PDOStatement object
	 * Parameters:string $statement
	 * The SQL statement to prepare and execute.
	 * Data inside the query should be properly escaped.
	 *
	 * @Returns:PDOStatement PDO::query returns a PDOStatement object, or false on failure.
	 *
	 */
	public function getConnection()
	{
	
	try {
	$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;', $this->user, $this->pass );
	foreach ($dbh->query('SELECT * FROM users ') as $row )
	{
		print_r( $row );
	}
	
	$dbh = null;
	
	} catch( PDOException $e )
	
		{
		print "Error!: " . $e->getMessage() . " ";
		//die();
		}
	}

}
	$connection = new Connection();
	$connection->getConnection();
	///tova ako stane sega shte se grumna  hahahaha beginTransaction()!
	
	
	
// 	function exception_handler($exception) {
// 		echo "Uncaught exception: " , $exception->getMessage(), "\n";
// 	}
	
// 	set_exception_handler('exception_handler');
	
// 	throw new Exception('Uncaught Exception');
// 	echo "Not Executed\n";
	
	
// class DatabaseDocumentation
// {

// 	const USER 					= 'root';
// 	const PASSWORD 				= '';
// 	const LOCALHOST 			= 'localhost';
// 	const DB_NAME 				= 'electromer';
	
	
// 	private function __construct()
// 	{
		
// 	}
	
// 	$dbh = new 

	
	
//}
?>