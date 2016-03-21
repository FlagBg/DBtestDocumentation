<?php


function getPDOConstantType( $var )
{
	if( is_int( $var ) )
		return pdo::PARAM_INT;
	if( is_bool( $var ) )
		return pdo::PARAM_BOOL;
	if ( is_null( $var ) )
		return pdo::PARAM_NULL;
	
		return pdo::PARAM_STR;
		
}

var_dump( $var );

// if ($db->getAttribute(PDO::ATTR_DRIVER_NAME) == 'MYSQL')
// {
// 	print "Running on mysql; doing something mysql specific here\n";
// }





p?>