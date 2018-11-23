<html>
<head>
<title>Hospital Menagment</title>
<link href="style.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p_body">

<div class="p_input"><br/><br/><br/><br/><br/>
<p id="p1"><u>Doctros Login</u></p>
<br/><br/>
<?php	
session_start();
	try{
	$con = new PDO ("mysql:host=localhost;dbname=hms","root","");

	if(isset($_POST['d_ok'])){
	$a_d_name=$_POST['a_d_name'];
	$a_d_password=$_POST['a_d_password'];
	
	$select=$con->prepare("SELECT * FROM add_doctor WHERE a_d_name='$a_d_name' and a_d_password='$a_d_password'"); 
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$data=$select->fetch();
	
	if($data['a_d_name']!=$a_d_name and $data['a_d_password']!=$a_d_password){
	
	echo "<font color='red'>"."<h4>"."invalid Name or Pass"."</h4>"."</font>";
	}
	
	elseif($data['a_d_name']==$a_d_name and $data['a_d_password']==$a_d_password){
		$_SESSION['a_d_name']= $data['a_d_name'];
		$_SESSION['a_d_password']= $data['a_d_password'];
		header("location:d_index.php");
	}
}
	}
	
	catch(PDOException $e)
{echo "error" . $e->getMessage();
}
?>
<form method="post">
<div class="form-group">
<label class="sr-only">Name:</label>
<div class="input-group">
<div class="input-group-addon">Name:</div>
<input type="text" name="a_d_name" placeholder="Name" class="form-control" /><br/>
</div><br/>
<div class="input-group">
<div class="input-group-addon">Password:</div>
<input type="password" name="a_d_password" placeholder="Password" class="form-control"/>
</div>
<a href="index.php" style="text-decoration: none;" class="btn btn-primary mt-3">Home</a>
<input type="submit" name="d_ok" value="Login" style="text-decoration: none;" class="btn btn-primary mt-3">
</div>
</form>

</div>

</body>
</head>
</html>