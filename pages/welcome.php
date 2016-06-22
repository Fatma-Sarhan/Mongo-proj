<?php

	// session_start();
	$conn= new MongoClient();
	$db = $conn->lab;
	$coll = $db->users;
	if($conn)
	{
		if(isset($_POST['submit']))
		{
			if($_POST['submit']=='Submit')

				if(!empty(trim($_POST['uname'],"\t\n\r\0\x0B")))
				{
					$uname = $_POST['uname'];

					if(!empty(trim($_POST['pass'],"\t\n\r\0\x0B")))
					{
						$pass = md5($_POST['pass']); 

						// Insert into database
						
						try
						{
							$result = $coll->insert(
							[
								'_id'  => $uname,
								'Password' => $pass,
							]);
							// var_dump($result);
							echo "<h4>You are in our system now , thnx for registration</h4>";
							echo "<br/>";
							header("Location: login.php");	
						}
						catch (MongoWriteConcernException $e)
						{
							echo " <h4>This username exists</h4> ";
						}
						

					}
					else
					{
						header("Location: registration.php");	
					}
				}
				else
				{
					header("Location: registration.php");
				}
		}
		// echo "ok";
	}


	else
	{
		header("Location: registration.php");
	}
