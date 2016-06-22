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
			echo $id;
		}

		$result=$coll->find(array('_id' => new MongoId($id)));
		var_dump($result);
		
		foreach ($result as $value) 
		{
			$status= $value['is_approved'];
			if($status== 'off')
			{
				$status= 'on';
				$result = $coll->update(array(
						'_id' => new MongoId($id),
					),
					['$set' => ['is_approved' => 'on']]
				);
			}
			else
			{

				$result = $coll->update(array(
						'_id' => new MongoId($id),
					),
					['$set' => ['is_approved' => 'off']]
				);	
			}
		 header("Location: admin.php");
		}

	}