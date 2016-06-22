<?php

	session_start();
	$conn= new MongoClient();
	$db = $conn->lab;
	$coll = $db->post;
	$tags =['mans','os','iti'];
	if($conn)
	{
		if(isset($_POST['submit']))
		{
			if($_POST['submit']=='Add Comment')
			{
				if(!empty(trim($_POST['comment'],"\t\n\r\0\x0B")))
				{
					$id=$_POST['id'];
					$comment=$_POST['comment'];
					echo $id;
					$result = $coll->update(
					array('_id' => new MongoId($id)),
					// array('$set' => array('comments'=> $comment)),
					array('$push' => array("comments" => $comment))
					);

					header("Location: home.php");
				}
				else
				{
					header("Location: home.php");	
				}
			}
			else
			{
				header("Location: home.php");	
			}
		}
		else
		{
			header("Location: home.php");	
		}
	}
	else
	{

	}