<?php

	session_start();
	$conn= new MongoClient();
	$db = $conn->lab;
	$coll = $db->post;


	if($conn)
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			// echo $id;
		}

		$result=$coll->remove(array('_id' => new MongoId($id)));
		var_dump($result);
		header("Location: admin.php");
	}