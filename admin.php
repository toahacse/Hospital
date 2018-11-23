

<html>
<head>
<title>Hospital Menagment</title>
<link href="style.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p_body">

<div class="p_input"><br/><br/><br/><br/><br/>
<p id="p1"><u>Admin Login</u></p>
<br/><br/>
<?php	
session_start();
	try{
	$con = new PDO ("mysql:host=localhost;dbname=hms","root","");

	if(isset($_POST['a_ok'])){
	$a_name=$_POST['a_name'];
	$a_password=$_POST['a_password'];
	
	$select=$con->prepare("SELECT * FROM a_register WHERE a_name='$a_name' and a_password='$a_password'"); 
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$data=$select->fetch();
	
	if($data['a_name']!=$a_name and $data['a_password']!=$a_password){
	
	echo "<font color='red'>"."<h5>"."Invalid Name or Pass!"."</h5>"."</font>";
	}
	
	elseif($data['a_name']==$a_name and $data['a_password']==$a_password){
		$_SESSION['a_name']= $data['a_name'];
		$_SESSION['a_password']= $data['a_password'];
		header("location:a_index.php");
	}
}
	}
	
	catch(PDOException $e)
{echo "error" . $e->getMessage();
}
?>
<form method="post" action="admin.php">
<div class="form-group">
<label class="sr-only">Name:</label>
<div class="input-group">
<div class="input-group-addon">Name:</div>
<input type="text" name="a_name" placeholder="UserName" class="form-control" /><br/>
</div><br/>
<div class="input-group">
<div class="input-group-addon">Password:</div>
<input type="password" name="a_password" placeholder="Password" class="form-control"/>
</div>
<a href="index.php" style="text-decoration: none;" class="btn btn-primary mt-3">Home</a>
<input type="submit" name="a_ok" value="Login" style="text-decoration: none;" class="btn btn-primary mt-3">
</div>
</form>

</div>

</body>
</head>
</html>