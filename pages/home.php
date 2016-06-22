<?php

	session_start();
	$conn= new MongoClient();
	$db = $conn->lab;
	$coll = $db->post;
	$tags =['mans','os','iti'];

	if($conn)
	{

		$where=array( 'is_approved' =>'on' );
		$data = $coll->find($where);
		echo "<h2> All Posts </h2>";
		echo "------------------------------------------------------------------";
		foreach ($data as $key => $value)
		 {
		 	echo "</pre>";
			$post_id = $value['_id'];
			$post_title= $value['title'];
			$post_content = $value['content'];
			$post_author= $value['post_author'];

			$_SESSION['post_id']= $post_id;
			echo "<h3>Title : $post_title</h3>";
			// echo "<br>";
			echo "<h3> Author: $post_author</h3>";
			
			echo "<h3>Content: $post_content</h3>";
			echo "<h3>Comments:</h3>";

			if($value['comments'])
			{
				$post_comment = $value['comments'];
				foreach ($post_comment as  $comment) 
				{
					echo $comment;
					echo "<br>";
				}
			}
			else
			{
				echo "No comments yet";
			}
			
			
			echo "<form action='add_comment.php' method='post'>";
			echo "<input type='text' name='comment'>";
			echo"<input type='hidden' name='id' value='$post_id'>";
			echo "<input type='submit' name='submit' value='Add Comment'/>";
			echo "</form>";
			


		}
	echo "<a href='post.php'> Add New Post</a>";
	echo "<br>";
	echo "<a href='login.php'> Login </a>";
	echo "<br>";
	echo "----------------------------------------------------------------------";


	}