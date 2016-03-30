<?php 

include_once 'DatabaseSingleton.php';

/**
 * 
 * @brief 	this class extends singleton design pattern and we telling him what exactly to do
 * 	
 * @param	@database;			
 *
 */	
class DatabaseSingletonContinue
{
	
	protected $database;
	
	/**
	 * @brief	we create the connection;
	 * 
	 * @return	$this->database = Database::getInstance;$this
	 * 
	 *  
	 */
	public function __construct()
	{	
		$this->database = DatabaseSingleton::getInstance();//connection made!
	}
	
	
	/* public function getMeDatas( $sql, $arguments = array() )
	{
		$result			= array();
		
		$sql	= 'SELECT * FROM users';
		
		$stmt = $this->database->prepare( $sql );
		
		$result = $stmt->execute( $arguments );
		
		if ( $result )
		{
			$stmt->fetchAll( PDO::FETCH_ASSOC );
		}
		return $result;
		
	} */
	///////////////////////////////////////////////////////
 	public function getMeDatas( $sql, $arguments = array() ) // zadava dve promenlivi, sql-zayavka, vtorata array; 
	{
		$result	= array();

		$stmt = $this->database->prepare( $sql ); //iziskva array; 
	
		$stmResult = $stmt->execute( $arguments );
	
		if ( $stmResult )
		{
			$result=$stmt->fetchAll( PDO::FETCH_ASSOC );
		}
		return $result; //var_dump( $result - vadi vsi4ko!);
		//	$sql	= 'SELECT * FROM users';
	}
	
	/**
	 * 
	 * @param unknown $result
	 * @return number
	 */
	  
	function getPDOConstantType( $result )
	{
		if( is_int( $result ) )
			return pdo::PARAM_INT;
		if( is_bool( $result ) )
			return pdo::PARAM_BOOL;
		if ( is_null( $result ) )
			return pdo::PARAM_NULL;
	
		return pdo::PARAM_STR;
	
	}

}
	
	$user = new DatabaseSingletonContinue();
	$sql	= 'SELECT * FROM users';
	$result = $user->getMeDatas( $sql );
	
	var_dump( $user->getPDOConstantType( $result ));
	//die();
	var_dump( $result );
	
	
	//$user->getMeDatas( $arguments );
	//$user->getMeDatas( $result );
	
	//$alldatas = ($this->database)->getMeDatas( $sql, $arguments );
	//$user->getMeDatas( $alldatas ); 
////////////////////////////////////////////////////////////////////////////////
//$user = new DatabaseSingletonContinue();
//$user->getMeDatas( $sql );
//$user->getMeDatas( $arguments );
//$user->getMeDatas( $result );

//$alldatas = ($this->database)->getMeDatas( $sql, $arguments );
//$user->getMeDatas( $alldatas );


?>