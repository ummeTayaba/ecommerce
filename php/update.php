<?php

	include('my_pdo.php');

	if(isset($_GET['update']))
	{
		$table = "";
		if($_GET['cat'] == 1)
		{
			$table = " men ";
		}
		else if($_GET['cat'] == 2)
		{
			$table = " women ";
		}
		else
		{
			$table = " child ";
		}

		$id = $_GET['id'];

		$sql = "UPDATE " . $table . " SET available = available - 1 WHERE id = '$id'";
		
		getData($sql);
		$array = array('success'=>'true');

		echo json_encode($array);
	}