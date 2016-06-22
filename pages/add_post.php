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
			if($_POST['submit']=='Add Post')
			{

				if(!empty(trim($_POST['title'],"\t\n\r\0\x0B")))
				{
					$title = $_POST['title'];
					if(!empty(trim($_POST['content'],"\t\n\r\0\x0B")))
					{
						$content = $_POST['content']; 
						//Find tags
						$post_tags= array();
						foreach ($tags as $value) 
						{

							if (strstr($content, $value)) 
							{ 

								array_push($post_tags, $value);
								// print_r($post_tags);
							}
							else
							{
								$post_tags = array();
							}
						}

						if(!empty(trim($_POST['date'],"\t\n\r\0\x0B")))
						{

							$date = $_POST['date'];

							// if(isset($_POST['approve']))
							// {
								// $is_approved = $_POST['approve'];
							// }
							// else
							// {
							// 	$is_approved="off";
							// }

							if(isset($_SESSION['loggedin user']))
								{
									$post_author=$_SESSION['loggedin user'];
									// echo $post_author;
									if($post_author=='admin')
									{
										$is_approved="on";
									}
									else
									{
										$is_approved="off";
									}
									//Insert into database

									try
									{
										$result = $coll->insert(
										[
											'title'  => $title,
											'content' => $content,
											'date'=> $date,
											'is_approved'=> $is_approved,
											'post_author'=>$post_author,
											'tags'=> $post_tags,
											'comments'=>array()
										]);
										// var_dump($result);
										echo "<h4>You post added successfully ^_^</h4>";
										echo "<br/>";
										echo "<a href='home.php'> Login </a>";

										// echo "<a href='login.php'> Plz login </a>";
									}
									catch (MongoWriteConcernException $e)
									{
										echo " <h4>This </h4> ";
									}
									
								}
								else
								{
									echo "<h4>You not allowed to add post before login !!</h4>";
								}
							}
						else
						{
							header("Location: post.php");	
						}

					}
					else
					{
						header("Location: post.php");	
					}

				}
				else
				{
					header("Location: post.php");
				}

			}
			else
			{
				header("Location: post.php");
				
			}
		}
		else
		{
			header("Location: post.php");
		}
	}
	else
	{
		header("Location: post.php");
	}