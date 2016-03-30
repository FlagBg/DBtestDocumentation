<?php 

/**
 * @brief 		class that we chech pdo::errors handling; 
 * 
 * @details 	ew doing exam after 
 * 
 *
 */
class ErrorHandling
{
	/**
	 * 
	 * @var string $user
	 * @var	string $pass
	 */
	private $user = 'root';
	private $pass = '';
	
	/**
	 * @brief function set error, it works we make connection;
	 * 
	 * @details	we made the connectin and than set attr_errmode and 
	 */
	public function setError()
	{
		
	try{
			
		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
						$this->user, $this->pass );
		$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		print "Connection made";
		
	}catch ( PDOException $e )
	{
	 	print 'Connection Failed'. $e->getMessage();
	}

	}
	
	public function setErrorOne()
	{
	
		try{
				
			$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
					$this->user, $this->pass ,
					array( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ));
	
		}catch ( PDOException $e )
		{
			print 'Connection Failed' . $e->getMessage();
	
		}
		//die();
	}
}

$error = new ErrorHandling();
$error->setError();
//Connection();
//$error-> var_dump( $new);

$sth = $dbh->prepare( $sql->prepare, array(pdo::ATTR_CURSOR => pdo::CURSOR_FWDONLY));
$sth->execute(array($_GET['id']));
print_r( $sql);
$new = $sth->fetchall();
print_r( $new ); 


?>