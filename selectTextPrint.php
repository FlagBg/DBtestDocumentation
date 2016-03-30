  <?php
  
  /**
   * @brief 	combining all the function for PDO:
   * 
   * @author Me;
   *
   */

class JustText
{
	/**
	 * 
	 * @var string root
	 * @var string pass
	 */
 	private $user = 'root';
 	private $pass = '';
  
 	/**
 	 * @brief This function is rading the datas''
 	 * 
 	 * @details it works with connection, intersection, cry/catch scenario;
 	 * 
 	 */
	function readData()
	{
		/**
		 * @param	boolean 	$dbh
		 * @param	string		$this->user
		 * @param	string		$sql
		 * 		
		 * @return  string 		$stmt
		 */
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
		$this->user, $this->pass );//$user, $pass)
	
  	 	$sql = 'SELECT age, fname, lname FROM users';
  	 	 
  		try {
    		$stmt = $dbh->prepare( $sql );
    		$stmt->execute();

    /* Bind by column number */
    	//$stmt->bindColumn(1, $fname);
    	//$stmt->bindColumn(2, $lname);
    
    /* Bind by column name */
    	$stmt->bindColumn('fname', $fname);
    	$stmt->bindColumn('lname', $lname);
    	$stmt->bindColumn('age', $age);
    		
    	//$stmt->bindColumn(1, $fname);
    	//$stmt->bindColumn(2, $lname);
    	//$stmt->bindColumn(3, $age);
    		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) 
    		{
    			//var_dump( $row); die();
      		$data = $fname . "\t" . $lname . "\t" . $age . "\n";
      		//$data =  $lname . "\t" . $age . "\n";
      		print $data;
    		}
  		
  		}catch (PDOException $e)
  		{
   		print $e->getMessage();
  		}
	}
	
	/**
	 * @brief	function that is selecting statement from the database;
	 * 
	 * @details	works with pdo
	 * 
	 * @return	string $result;
	 *
	 */
  function readDataNext()
  {
  	/**
  	 * 
  	 * @return string $result;
  	 * 
  	 */
  	$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
  			$this->user, $this->pass );//$user, $pass)
  
  	$sql = 'SELECT age, fname, lname FROM users';
 	$stmt = $dbh->prepare( $sql );
 	$stmt->execute();
		if ( $stmt )
		{
			$result = $stmt->fetchAll();
		}
 		return $result;
		print("ASFAS");
  	}
  	
  	/**
  	 * trying fetchAll plus TryCatchScenario;justReview
  	 * 
  	 * @brief = interesting is the most common scenarip, prepare,execute,print;
  	 */
  	public function fetchAll()
  	{
  		/**
  		 * @brief 	query that is made; ;
  		 * 
  		 * @details	
  		 */
  		try{
  			
	  		$sql =  'SELECT * FROM users';
	  		
	  		$dbh = new PDO('mysql:host=localhost;dbname=electromer;',
						$this->user, $this->pass );
	  		
	  		$stmt = $dbh->prepare( $sql );
	  		$stmt->execute();
	  		
	  		if ( $stmt )
	  		{
	  			$result = $stmt->fetchAll();
	  		}	return $result;
  		
  		}catch (PDOException $e)
  		{
  			print "connection failed" . $e->getMessage();
  		}
  			
	}
	 
	/**
	 * @brief		select from ID from in a DB
	 * 
	 * @details		the most interesting thing here is that we use prepare(put SQL 
	 * 				,execute(ARRAY)using global $_GET! very good example;
	 */ 
	public function selectFromId()
	{
		$dbh = new PDO ('mysql:host=localhost;dbname=electromer;',
					$this->user, $this->pass );
		
		$stmt = $dbh->prepare( 'SELECT * FROM users WHERE ID=1');
		
		if ( $stmt->execute( array( $_GET['id'])))
			{
				while ( $row = $stmt->fetchAll())
				{
					print_r( $row );
				}
			}
			
	}
	
	/**
	 * @brief	function that is using BINDparam from PDO, here using that i am adding
	 * 			datas into my db;($dbh)
	 * 
	 * @details	try/catch Scenario! some trickss/// 
	 * 
	 */
		
	public function bindParam()
	{
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;', 
						$this->user, $this->pass);
		
		
		//PDO won't throw exceptions unless you tell it to. Have you run:
		//$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//on the PDO object?
		
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try 
		{
			$id 	= '16';
			$role 	= 'adminUj';
			
			$stmt = $dbh->prepare( "INSERT INTO roles ( id, role ) 
											VALUES (:id, :role)" );
			$stmt->bindParam(':id',$id );
			$stmt->bindParam(':role', $role);
			
			//throw new Exception('test');
			
			$result = $stmt->execute();
			
			
			$sql	= 'INSERT INTO roles ( id, role )  VALUES ( 16, adminUj )';
			$result = $dbh->query( $sql );
			
			//var_dump($stmt->errorInfo());	
			//var_dump($result);
			//throw new Exception('hi');
			
		}catch (PDOException $error )
		{
			print "The error is:"; 
			print_r( $error->getMessage() ); 
			//print_r( $error->getTrace() );
			//print_r( $error ->getTraceAsString());
		}	
	
	}
	
	/**
	 * @brief 	this function just texting functuon rowCount() from the documentation;
	 * 
	 * 	@detail	when we get connected with the database we do select and than we put rowCount and it is 
	 * 			counting;	just have decided to test one more thing;
	 *	
	 *	@param	int	$counting;$this
	 *
	 *
	 *	$return int
	 * 	
	 */
	public function rowCount()
	{
		$dbh = new PDO('mysql:host=localhost;dbname=electromer;',
							$this->user, $this->pass);
		//$dbh->setAttribute(PDOStatement::rowC, $value)
		
		$count = $dbh->prepare( " SELECT fname from users " );
		$count->execute();
		
		$countRows 		= $count->rowCount();
		$countColumns 	= $count->columnCount();
		print( "all rows in column fname from users are $countRows rows." . "\n");
		print "all columns are: .$countColumns  ";
		//print_r( $countRows );
/////////////////////////////////////////////////////////////////////////////////////		
		$countLastName = $dbh->prepare( "SELECT lname from users ");
		$countLastName->execute();
		
		$countRowsLastName = $countLastName->rowCount();
		$countColumnsLastName = $countLastName->columnCount();
		print( "all rows in column last name from users are $countRowsLastName ");
		print ( "all columns in column last name from users are $countColumnsLastName ");
		
	}
	
	/**
	 * @brief	this function i am trying set, transaction execution commit
	 */
	public function addingValuesCommit()
	{
	try {
		
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
							$this->user, $this->pass);
		
		$dbh->setAttribute(Pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
		
		$dbh->beginTransaction();
		
		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('8','Admin')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('4','a')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('5','b')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('6','c')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('7','d')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('8','e')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('9','Aaaaa')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('10','abbbb')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('11','Acccc')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('12','adddd')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('13','Adeee')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('14','adrrr')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('15','opppp')");
// 		$dbh->exec("INSERT INTO `roles`(`id`, `role`) VALUES ('16','yakoo')");
		
		
		print "Commit Successful! ";
			
		if (true){
			print "hi";
			$sql = 'SELECT id, role FROM roles';
			$stmt = $dbh->prepare( $sql );
			$stmt->execute(array($_GET['id']));
			$row = $stmt->fetchAll();
	
			print_r( $row );
		
			
			//sega shte go pravim s get!
/////////////////////////////////////////////////////////////////			
// 			$sql = 'SELECT , id, role FROM roles';
// 				foreach ($dbh->query($sql) as $row )
// 				{
// 					print_r( $row );
// 				}	
// 				//$stmt = $dbh->query( $sql );
			
		}
		
		/* if (true)
		{
			//popravyam!!!
			$sql = 'SELECT , id, role FROM roles';
			$stmt = $dbh->prepare( $sql );
    		$stmt->execute();
			
    		$stmt->bindColumn('id', $id);
    		$stmt->bindColumn('role', $role);
    		while ($row = $stmt->fetch(PDO::FETCH_BOUND))
    		{
    			//var_dump( $row); die();
    			$data = $id . "\t" . $role . "\n";
    			//$data =  $lname . "\t" . $age . "\n";
    			print $data;
    		}
    		
    	}else 
    		{
    			print "Error";
    		}
		 */
		$dbh->commit();
		
	}catch 	(Exception $error)
		{	
			$dbh->rollBack();
			print "something is wrong:" . $error->getMessage();
		}
		
	}
	
// 	
}

 	$gepi = new JustText();
 	$gepi->rowCount( );
 	
  	//$gepi->readData();
  	//$gepi->readDataNExt();
 	//$printiBe = $gepi->readDataNext();
 	//var_dump($printiBe);
 
 	//////////////////////////////////////////////////////
 	//For function fetchAll()
 	$fetchAll = new JustText();
 	//$fetchAll->fetchAll();
 	//$result = $fetchAll->fetchAll();
 	//var_dump($result);
 	$fetchAll->selectFromId();
 	$fetchAll->rowCount();
 	
 	///////////////////////////////////////////////
 	//$gepi->bindParam();
 	//$gepi->addingValuesCommit();
 	
 	
  	