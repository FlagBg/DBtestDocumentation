<?php 

/**
 *
 *  @brief  		Class that is creating connection with my database and testing INSERT INTO;
 * 		   		It works with createConnection INSERT DATA'S values in my database using WHERE clause;
 *
 *  @details		when we start the application we create objects(connections and than we doing one query select* from;
 *
 */
class beginTransaction
{
	
	/**
	 * 
	 * @var string $user
	 */
	private $user = "root";
	
	/**
	 * 
	 * @var string $pass
	 */
	private $pass = "";
	//const PASSWRD			= "";
	//const USERNAME		= "root";
	//$dbh = new PDO( 'mysql:host= localhost; dbname = electromer', $user, $pass );
	
	/**
	 * @brief	this function is doing prepare'sql',than execute(as array $_get(what we need)
	 * 			While fetch(taking all datas in new $row! and finally print $row, which is result;
	 * @return	array;
	 */
	public function selectID()
	{
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
				$this->user, $this->pass );
		
		$stmt = $dbh->prepare("SELECT * FROM users WHERE ID=1");
			
		if( $stmt->execute(array($_GET['id'])))
		{
			while ($row = $stmt->fetch())
			{
				print_r( $row );
			}
		}
		
	}
	
	/**
	 * @brief	this function is doing prepare'sql',than execute(as array $_get(what we need)
	 * 			While fetch(taking all datas in new $row! and finally print $row, which is result;
	 * 
	 * @return	array;
	 */
	public function selectID2()
	{
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
				$this->user, $this->pass );
		
		$stmt = $dbh->prepare("SELECT * FROM users WHERE username='peter'");
		
		if ( $stmt->execute(array($_GET['username'])))
		{
			while ( $row = $stmt->fetch())
			{
				print_r( $row );
			}
		}
	}
	
	
	public function setPDO()		//////////////////////example 3
	{
		try{
			
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
				$this->user, $this->pass );
		
		$id 	= '15';
		$role 	= 'admin';
		
		
		$stmt = $dbh->prepare(" INSERT INTO roles (id, role) VALUES (:id, :role)" );
		$stmt->bindParam( ':id',$id );
		$stmt->bindParam(':role',$role);
		
	//DELETE FROM `electromer`.`roles` WHERE `roles`.`id` = 7;
	
		$id = '16';
		$role = 'admin';
		
		
	throw new Exception('Test message');
	//insert values;
		
		$result	= $stmt->execute(); 
		var_dump($result);die();
		}catch ( Exception $e )
		{
			print_r($e->getMessage());die();
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * @var		$dbh
	 *
	 * @brief		create the connection with DB and than we insert into it using where clause
	 *
	 * @details		using Transaction() and than exec( $str );
	 *
	 * @return		boolean 
	 */
	public function setAttrubute()			/////////// example 2
	{
	try {
		
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;', 
										$this->user, $this->pass );
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$dbh->beginTransaction();//INSERT/........ 
		//$dbh->exec("INSERT INTO `price`(`dayValueRate`, `nightValueRate`, `id`) 
		//						VALUES (30,40,7)");
		
		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('6','Admin')");
		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('7','Member')");
		
		
		$dbh->commit();
		//$result = $dbh->commit();
		print "Successfully added: " ;
		
		}catch (Exception $e)
			{
				$dbh->rollBack();
				print "Failed: " . $e->getMessage();
			}
	}
	
	public function getConnection() /////example 1
	{
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
			die();
		}
	}

}
	$insert = new beginTransaction();
	//$insert->selectID();
	//$insert->selectID2();
	$insert->setAttrubute();
	//$connection->getConnection();
	//$insert->setPDO();
	//$insert->setAttrubute();