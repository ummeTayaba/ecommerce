<?php

	include('my_pdo.php');

	if(isset($_GET['find']))
	{

		$sql = "SELECT * FROM ";
		if($_GET['cat'] == 1)
		{
			$sql = $sql . " men ";
		}
		else if($_GET['cat'] == 2)
		{
			$sql = $sql . " women ";
		}
		else
		{
			$sql = $sql . " child ";
		}

		$sql = $sql . " WHERE price >= " . $_GET['min'] . " AND " . " price 
		 <= " . $_GET['max'];

		 if(isset($_GET['key']))
		 {
		 	$sql = $sql . " AND description LIKE '%" . $_GET['key'] . "%'"; 
		 }


		 $result = getData($sql);
	 	 
		 $array = array();


		 while($row = $result -> fetch_assoc())
		 {
		 	$temp = array();
		 	$temp['id'] = $row['id'];
		 	$temp['name'] = $row['item_name'];
		 	$temp['price'] = $row['price'];
		 	$temp['desc'] = $row['description'];
		 	$temp['img'] = $row['image_loc'];
		 	$temp['count'] = $row['available'];
		 	$temp['prev'] = $row['prev_price'];
	 		
		 	array_push($array, $temp);
		 }

		 echo json_encode($array);
	}