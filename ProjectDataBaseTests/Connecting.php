
<?php 

/**
 * 
 * @brief	class that we do a connection with the database and we do some transactions;
 * 
 * @details	works with singleton design pattern;
 *
 */
class DatabaseConnectingExample
{
	const SERVERNAME		= 'localhost';
	const PASSWORD			= "";
	const USERNAME			= "root";
	const DB_NAME			= "electromer";
	
	private static $instance;
	
	private $connection;

	/**
	 * 
	 */
	private function __construct()
	{
		
		$this->connection = new PDO(
			"mysql:host=" . self::SERVERNAME . ";dbname=" . self::DB_NAME . ";",
				self::USERNAME,
				self::PASSWORD
		);
	}
	
	/**
	 * @brief 	it create instance connection, if ont connection, connect, in not - connect again;
	 *
	 * @return boolean	$instance;
	 */
	public static function getDatabase()
	{
		
		if( ! self::$instance )
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	/**
	 * @brief	Get connection object
	 *
	 * @return	\PDO
	 */
	public function getConnection()
	{
		return $this->connection;
	}
	
	/**
	 * @brief	Get query result
	 *
	 * @param	string $sql
	 * @param	array $arguments
	 *
	 * @return	array $result
	 */
	public function getResults( $sql, $arguments = array() )
	{
		$result				= array();
		
		$connection 		= self::getDatabase()->getConnection();
		
		$stmt   		= $connection->prepare( $sql );
		
		$result 		= $stmt->execute( $arguments );
		
		//I want to get all result
		if ($result )
		{
			$stmt->fetchAll( PDO::FETCH_ASSOC);
		}
		
		return $result; 
	}
}

