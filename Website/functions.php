<?php

	function connect_db(){
		$dbhost = "ecsmysql"; 
		$dbuser = "cs431s6";
		$dbpass = "otohjoom";
		$dbname = "cs431s6";
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		// Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	        return 0;
	    }
		return $conn;
	}


	function close_db($conn){
		$conn->close();
	}


	function redirect_to($new_location){
		header("Location: " . $new_location);
		exit;
	}


?>