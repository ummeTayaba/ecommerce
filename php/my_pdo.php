<?php

	require_once("constant.php");

	function getData($query)
	{
		$conn = mysqli_connect(SERVER, USER, PASSWORD, DBNAME);
		
		if ($conn->connect_error) {
  		  die("Connection failed: " . $conn->connect_error);
		}

		$result = $conn -> query($query);
		$conn -> close();
		return $result;

	}

	function insertData($query)
	{
		
		$conn = mysqli_connect(SERVER, USER, PASSWORD, DBNAME);
		
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		
		if (mysqli_query($conn, $query)) {

			mysqli_close($conn);

			return true;
		} 
		else 
		{
			
			mysqli_close($conn);

			return false;			
		}

	}