<?php

	include('my_pdo.php');

	if(isset($_POST['id']))
	{
		$data = json_decode(stripslashes($_POST['data']), true);
	 	$success = false;

	 	foreach($data as $d){
	 		$email = $_POST['id'];
	 		$name = $d['name'];
	 		$price = $d['price'];
	 		$prev = $d['prev_p'];

	 		$sql = "INSERT INTO delivery(email, item, price, del_date, prev_price) VALUES('$email', '$name', '$price', NOW() + INTERVAL 7 DAY, '$prev')";
	 		$success = insertData($sql);
	    }
		
		echo json_encode(array('success'=>$success));
	}