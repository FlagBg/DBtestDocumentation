<?php 

/**
 * 
 * @brief	One more example of database singleton connection;
 * 			it demonstrates how this one works;  
 *			
 *	@param	const USER
 *	@param	const PASSWORD
 *	@param	const HOST
 *	@param	const DB_NAME	
 *
 * 	@return self:connection	
 */
class DatabaseSingleton
{
	const USER					= 'root';
	const PASSWORD				= '';
	const HOST					= 'localhost';
	const DB_NAME				= 'electromer';
	
	public static $connection = NULL;
	
	private function __construct()
	{
	
	}
	
	/**
	 * @brief	class that create the connection
	 * 
	 * @return	$connection
	 */
	public static function getInstance()
	{
		if ( self::$connection === NULL)
		{
			self::$connection = new PDO( "mysql:host=" . self::HOST . ";dbname="  . 
					self::DB_NAME . ";", self::USER, self::PASSWORD );
		}
		
	return self::$connection;
		
	}

}
?>