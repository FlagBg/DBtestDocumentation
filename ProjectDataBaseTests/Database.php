
<?php 

class Database
{
	const SERVERNAME		= 'localhost';
	const PASSWORD			= "";
	const USERNAME			= "root";
	const DB_NAME			= "electromer";
	
	private static $instance;
	
	private $connection;
	
	/**
	 * konstruktorut go vzehme ot documentaciyata... tryaba da bude private po default
	 * kakvo prati tuk, pravi edin obekt, koyto polzva stati4ni propertita na clasa; Zashto stati4ni, 
	 * zashtoto sa validni za klasa, no ne i za obekta, oshte nyama obekt
	 * pravim obekta
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
	 * tazi functiya pravi ve4e malkiyt obekt database, kato vzima stati4nite propertitata na klasa
	 * shtom vikame stati4ni propertita izpolzvame self:: i pravim parametara $instance; zatova $instance
	 * e podadohme kato private static/ kogato s metoda getDatabase e suzdadem
	 * moe vrusjta,e rezultat = edna bazadanni, koyto e ot clasa
	 * vednaga sled tova suzdavame vtora baza, danni, koyato ni izvlicha dannite ot istinskata baza danni
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
	}
	
	/**
	 * s tazi functiya v momenta izvlichame dannite ot istinskata baza danni. kak stava tova,
	 * stava s $this->connection; 
	 * @return PDO
	 */	public function getConnnection()
	{
		return $this->connection;
	}
	
	/**
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
	 * primary key=a); .. taka nakraya ako napravi rezultat.... natatuk lesno.
	 * FETCHALL - PLJUE resultata, kato imashe 20 vida na4ini ot documentaciyata kak to4no da stane.
	 * ... s dve dumi.... stati4ni propertita za bazata danni, za da napravi baza danni kato obekt
	 * edna connectiya za da napylni tozi obekt!! i nakraya da printi! taka lesno!
	 * @param unknown $sql
	 * @param array $arguments
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

?>