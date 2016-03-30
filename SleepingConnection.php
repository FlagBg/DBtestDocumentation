<?php 

/**
 * 
 *  @brief  		Class that is creating connection with my database and testing sleepFunction;
 * 		   		It works with createConnection and after that printing all the values that are in my database;
 * 
 *  @details		when we start the application we create objects(connections and than we doing one query select* from;		  
 *	
 */

class SleepingConnection
{
	/**
	 * @var string	$user
	 */
	private $user = 'root';
	
	/**
	 * 
	 *@var	string	$pass
	 */
	private $pass = '';
	
	
	/**
	 * @var		$dbh
	 * @var		array stmt
	 * $var		array $stmtResult
	 * 
	 * @return 	array $result
	 * 
	 * @brief		when we create the connection with DB we have datas that we want to extract;
	 * 
	 * @details		it works with prepare statement, that is the query('select from'), than execution of it in new var, using FetchAll and print all; 
	 * 
	 * @return		ArrayObject;
	 */
	public function  createConnection ( $dbh )
	{
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
				$this->user, $this->pass );//$user, $pass)
		
		sleep( 4 );
		
		$stmt = $dbh->prepare( 'SELECT * FROM users ');
		
		$stmtResult = $stmt->execute();
		
		$dbh = NULL;
		
		if ( $stmtResult )
		{
			$result = $stmt->fetchAll();
		}
			return $result;
	
	}
	
}
	$slpConnection = new SleepingConnection();
	
	$slpConnection->createConnection();
	
	$sql = 'SELECT * FROM users';
	$result = $slpConnection->createConnection();
	var_dump( $result );
	
	
	$obj1 = new \StdClass();
	$obj2 = $obj1;
	
	


	/* public function createConnection( $arguments = array() )//moga da ostavya poleto prazno
	{
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
				$this->user, $this->pass );//$user, $pass)
		sleep( 5 );//sleeping seconds:) basi kefa :)
		
		$result = array();
		
		$stmt = $dbh->prepare( 'SELECT * FROM users ' );//can $sql = 'select *'
		
		$stmtResult = $stmt->execute( $arguments );//can be with no $arguments;
	
		$dbh = NULL;
		if ( $stmtResult )
			{
				$result = $stmt->fetchAll();
			}
			
			return $result;
		
	}
}	
	$slpConnection = new SleepingConnection();
	$slpConnection->createConnection();
	$sql = 'SELECT * FROM users';
	$result = $slpConnection->createConnection();
	var_dump( $result );
	////////////////////////////////////////////////////////////
	 
	primer s referenciya....... rabotesht!
	public function  createConnection ( &$rows )
	{
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
				$this->user, $this->pass );//$user, $pass)
		
		//$id		= (int)$id;
				
		$sql = 'SELECT * FROM users WHERE id='.$id;
		
		$result = $dbh->query( $sql );
		$rows	= $result->fetchAll();
	
	
		// 		$stmt = $dbh->prepare( 'SELECT * FROM users ');
		
		// 		$stmtResult = $stmt->execute();
		
		// 		$dbh = NULL;
		
		// 		if ( $stmtResult )
		// 		{
		// 			$result = $stmt->fetchAll();
		// 		}
	
	}
}
 	$slpConnection = new SleepingConnection();
 	
	$rows		= array();
	$slpConnection->createConnection($rows);
	var_dump($rows);
 tova doide ot tova
	/**
	 * 
	 * @var 	string localhost
	 * @var		string $user
	 * @var		string $pass
	 * @var		string $dbname
	 * 
	 * 
	 */
?>
