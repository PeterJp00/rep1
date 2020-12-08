<?php 

include (__DIR__ . DIRECTORY_SEPARATOR . 'db_connection.php'); 

	session_start();
	session_unset();
	// session_destroy();
	
 
	if(session_destroy())
	{
		header("Location: index.php");
    }
    
    
?>