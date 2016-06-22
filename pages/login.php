
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
<legend id="head">SignIn</legend>
      
<form class="form-horizontal" name="registration" id="mainform" action="check.php" method="post" accept-charset="utf-8" >

	<div  class="form-group " id="div1">
		    <label for="Name" class="col-md-3 control-label"> User Name </label>
		    <div  class="col-md-8"> 
		        <input type="text" id="uname"  name="uname" placeholder="Name" class="form-control">
		    </div>
	</div>
	<div  class="form-group " id="div1">
		    <label for="Password" class="col-md-3 control-label"> Password </label>
		    <div  class="col-md-8"> 
		        <input type="password" id="pass"  name="pass" placeholder="Password" class="form-control">
		    </div>
	</div>

	<br/>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-2">
        <input type="submit" id="res" class="btn btn-primary" name="submit" value="Submit"/>
        <input style="margin-left:10px;" id="sub" type="reset" class="btn btn-warning"name="reset" value="Reset"/>
    </div>
    </div>
		</form>
	   </fieldset>
    </div>
</form>
</fieldset>
</div>

