<?php 

class BindDataTest
{
	private $user = 'root';
	//private $pass = 'pass';as i put wrong pass it shows me $e(error)
	private $pass = '';
	/**
	 * @brief - iskam da vidya dali shte stane; ako stane, dobre;
	 * @param unknown $dbh
	 */
	
	public function readData( )//experiment if I put $dbh inside the function, i do not need it;
	{
	
		$sql = 'SELECT * FROM users';
	
		try
		{
			$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;',
					$this->user, $this->pass );
	
			$stmt = $dbh->prepare( $sql );
			$stmt->execute();
	
			if ( $stmt )
			{
				$result = $stmt->fetchAll();
					
			}
			return $result;
	
		}catch (PDOException $e)
		{
			print "connection failed" . $e->getMessage();
		}
		//var_dump($result); die();
	}
	
	}
	
	$data = new BindDataTest();
	$data->readData();//here i am removing $dbh; WORKS PERFECTLY; WHY
	//$result1 = $data->readData();//removing $dbh and test
	// must be in a object!!!
	$printi = $data->readData();
	var_dump($printi);

	
// 	public function readData( )//experiment if I put $dbh inside the function, i do not need it;
// 	{
		
// 		$sql = 'SELECT * FROM users';
		
// 		try 
// 		{
// 		$dbh = new PDO( 'mysql:host=localhost;dbname=electromer;', 
// 				$this->user, $this->pass );
	
// 		$stmt = $dbh->prepare( $sql );
// 		$stmt->execute();
		
// 		if ( $stmt )
// 		{
// 			$result = $stmt->fetchAll();
			
// 		}
// 			return $result;	
		
// 		}catch (PDOException $e)
// 		{
// 			print "connection failed" . $e->getMessage();
// 		}
// 		var_dump($result); die();	
// 	}

// }

// $data = new BindDataTest();
// $data->readData();//here i am removing $dbh; WORKS PERFECTLY; WHY
// //$result1 = $data->readData();//removing $dbh and test
// // must be in a object!!!
// $printi = $data->readData();
// var_dump($printi);
//$data->readData($dbh);     if i am put in this way  - shows undefined variable;
//$result = $data->readData($dbh); undefined variable;
//var_dump($result1);//If i am starting just this var_dump - it shows me undefinied $result;
					//but if i am putting $result = $data->readData() it shows the result;




?>




