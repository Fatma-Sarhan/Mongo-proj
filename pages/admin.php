<?php

	session_start();
	$conn= new MongoClient();
	$db = $conn->lab;
	$coll = $db->post;
	$tags =['mans','os','iti'];


if(isset($_SESSION['loggedin user']))
	{
		$post_author=$_SESSION['loggedin user'];
		if($post_author=='admin')
		{
			if($conn)
			{
				$data = $coll->find();
				echo "<h2> Admin Pannel</h2>";
				echo "<table border=2px solid width=500px >";
				echo "<tr><th>ID</th><th>Title</th><th>AuthorName</th><th>Actions</th></tr>";
				foreach ($data as $key => $value)
				 {
				 	echo "</pre>";
					// var_dump($value);
					$post_id = $value['_id'];
					$post_title= $value['title'];
					$post_approve = $value['is_approved'];
					$post_author= $value['post_author'];
					
					
					echo "<tr><td>$post_id</td> <td>$post_title</td> <td>$post_author</td><td><a href='approve_post.php?id=$post_id' >$post_approve </a> & <a href='delete_post.php?id=$post_id'>Delete</a></td></tr>";
					// echo "<br>";
					// echo  "<tr><td>$post_title<td></tr>";
					// // echo "<br>";
					//  echo "<tr><td>$post_author<td></tr>";
					// // echo "<br>";
					// echo "<tr><td>$post_approve<td></tr>";
					


				}
				echo "</table>";
				echo "<a href='home.php'> See User Home </a>";
			}

		}
		else
		{
			echo "<h1> You are not allowed to be here !! </h1>";
			echo "<a href='login.php'> Login </a>";
		}
	}	

			