<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Mongo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css" />

  </head>
<body>


<div class="container" style="width:550px; font-size:12px;">
<fieldset>
<legend id="head">New Post</legend>
      
<form class="form-horizontal" name="registration" id="mainform" action="add_post.php" method="post" accept-charset="utf-8" >

	<div  class="form-group ">
		    <label for="Title" class="col-md-3 control-label"> Title</label>
		    <div  class="col-md-8"> 
		        <input type="text" id="title"  name="title" placeholder="Title" class="form-control">
		    </div>
	</div>
	<div  class="form-group ">
		    <label for="content" class="col-md-3 control-label"> Content </label>
		    <div  class="col-md-8"> 
		        <textarea id="content" name="content" placeholder="content" class="form-control"></textarea>
		    </div>
	</div>
	<div  class="form-group ">

		    <label for="Date" class="col-md-3 control-label"> Published date</label>
		    <div  class="col-md-8"> 
		        <input type="date" id="date"  name="date" placeholder="Date" class="form-control">
		    </div>
	</div>
	<div class="checkbox-inline">
    <label>
      <input type="checkbox" name="approve"> Apporoved
    </label>
  </div>
	

	<br/>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-2">
        <input type="submit" id="res" class="btn btn-primary" name="submit" value="Add Post"/>
        <input style="margin-left:10px;" id="sub" type="reset" class="btn btn-warning"name="reset" value="Reset"/>
    </div>
    </div>
		</form>
	   </fieldset>