<?php

	session_start();
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
					$_SESSION['loggedin user']=$uname;

					if(!empty(trim($_POST['pass'],"\t\n\r\0\x0B")))
					{
						$pass = md5($_POST['pass']); 

						// Check into database
						// $result = $coll->find(array(
						// 		'_id'=> $uname,	
						// 	));

						$where=array( '$and' => array( array('_id' =>$uname), array('Password'=>$pass) ) );
							$result = $coll->find($where);

						if($result->count()>0)
						{
						 	foreach ($result as $key => $value) {
								// print_r($value);
								if($value['_id']=='admin')
							 	{
							 		echo "admin";
							 		header("Location: admin.php");
							 	}
							 	else
							 	{
							 		echo "user";
							 		header("Location: home.php");
							 	}
						 	}

							// echo "<h4> Welcome to our system </h4>";
						}
						else
						{
							echo " <h4> This user name or password is invalid </h4>";
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
