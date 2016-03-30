<?php 

/**
 * 
 * @brief	Class that create database using singleton with static properties;
 *
 */
class Database
{
	/**
	 * 
	 * @var const SERVERNAME
	 */
	const SERVERNAME		= 'localhost';
	
	/**
	 * @var	string PASSWORD
	 */
	const PASSWORD			= "";
	
	/**
	 * @var	string USERNAME
	 */
	const USERNAME			= "root";
	
	/**
	 * @var	string DB_NAME
	 */
	const DB_NAME			= "electromer";
	
	/**
	 * @var	Database $instance
	 */
	private static $instance;
	
	/**
	 * @var	\PDO $connection
	 */
	private $connection;
	
	/**
	 * @brief 	We create connection with constructor that is coming from the pdo; it works as creating object that possess the connection;
	 * 			Using static properties, because we can't make object from that instance but they are valid for the static class; 
	 *
	 */
	private function __construct()
	{	
		$this->connection	= new PDO(
			"mysql:host=" . self::SERVERNAME . ";dbname=" . self::DB_NAME . ";",
			self::USERNAME,
			self::PASSWORD
		);
	}
	/**
	 * 
	 * @brief	this function create the database it works with pdo; return $instance;
	 * 
	 * @return Database
	 */
	public static function getDatabase()
	{
		if ( ! self::$instance )
		{
			self::$instance = new self();
		}
		return self::$instance;
		/* tazi functiya pravi ve4e malkiyt obekt database, kato vzima stati4nite propertitata na klasa
	 	* shtom vikame stati4ni propertita izpolzvame self:: i pravim parametara $instance; zatova $instance
	 	* e podadohme kato private static/ kogato s metoda getDatabase e suzdadem
	 	* moe vrusjta,e rezultat = edna bazadanni, koyto e ot clasa
	 	* vednaga sled tova suzdavame vtora baza, danni, koyato ni izvlicha dannite ot istinskata baza danni
		*/
	
	}
	
	/**
	 * @brief	function that we take the information from the database
	 *     
	 * @return PDO
	 * 
	 */
	
	public function getConnnection()
	{
		return $this->connection;
	}
	
	/**
	 * @brief	create the database 
	 * 
	 * @return	array;
	 * 
	 */
	public function getResults( $sql, $arguments = array() )
	{
		$result		= array();
		
		$connection	= self::getDatabase()->getConnnection();
		
		$stmt		= $connection->prepare( $sql );
		
		$result		= $stmt->execute( $arguments );
		
		if($result)
		{
			$result	= $stmt->fetchAll( PDO::FETCH_ASSOC );	
		}
		
		return $result;
	}
}
//	tozi primer raboti s index.php na koyto podavame:

/* <?php

include 'Database.php';

//database instance
$database	= Database::getDatabase();


$sql		= 'SELECT * FROM users';

$arguments	= array();

$rows		= $database->getResults($sql, $arguments);

var_dump($rows);die();
 */


// 	$connection = new Database(  $user, $password, $DB_NAME);
// 		if ( $connection->connect_error)
// 		{
// 			die( "connection failed: " . $connection->connect_error);
// 		}
		
// 		else
// 		{
// 			for($connection->query('SELECT * from users') as $row)
// 			{
// 				print_r( $row );
// 			}
// 		$connection = NULL;
// 		}
		
	/////////////////////////////////////////////////////
		
// 	$servername = "localhost";
// 	$username   = "root";
// 	$password   = "";
// 	try {
// 		$connection = new PDO( "mysql:host=$servername; dbname = myDB", $username, $password);
// 		//set tne PDO error mode to exception
// 		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 		$sql = "CREATE DATABASE myDBPDO";
// 		//use exec() because no results are returned
// 		$connection->exec($sql);
// 		print "Database created successfully"";
		
// 	} catch ( PDOException $e)
// 	{
// 		print $sql . "" . $e->getMessage();
// 	}

// $connection = null;
/**
*
*
* i nakraya obedinyavame bazata danni, kakto i tryabva da izkarame resultata. tova stava,
* izkarvame STATEMENT, koyto shte bude izkaran vuv formata na masiv. Purvo podavame parametrite
* $sql, sled tova arguments=array()
* ve4e tuk $conection e subrana ot dvete instancii, bazata ot stati4nite propertita na clasa, getDatabase()metod
* i samata vryzka s istinskata baza danni getConnection(); za da izprinti dannite
* minavame na nova taktika:
* $connection = $connection = self::getDatabase(), tuk razli4noto e self::stati4nite propertita
* na getDatabase()->getConnection()
* i podavame............ STATEMENT = $connection->(podgotvi $sql )
* $resultat = STATEMENT->EXECUTE ($ARGUMENTS...kato drugata tunkost, che argumentite gi vzima ot
*	 * primary key=a); .. taka nakraya ako napravi rezultat.... natatuk lesno.
*	 * FETCHALL - PLJUE resultata, kato imashe 20 vida na4ini ot documentaciyata kak to4no da stane.
*	 * ... s dve dumi.... stati4ni propertita za bazata danni, za da napravi baza danni kato obekt
*	 * edna connectiya za da napylni tozi obekt!! i nakraya da printi! taka lesno! * @param	string $sql* @param	array $arguments
* 
*/
?>