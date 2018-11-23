
<html>
<head>
<title>Hospital Menagment</title>
<link href="style.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p_body">

<div class="p_input">

<p id="p1"><u>Patient Login</u></p>
<br/><br/>
<?php	
session_start();
	try{
	$con = new PDO ("mysql:host=localhost;dbname=hms","root","");

	if(isset($_POST['p_ok'])){
	$p_name=$_POST['p_name'];
	$p_password=$_POST['p_password'];
	
	$select=$con->prepare("SELECT * FROM p_register WHERE p_name='$p_name' and p_password='$p_password'"); 
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$data=$select->fetch();
	
	if($data['p_name']!=$p_name and $data['p_password']!=$p_password){
	
	echo "<font color='red'>"."<h4>"."Invalid Name or Pass!"."</h4>"."</font>";
	}
	
	elseif($data['p_name']==$p_name and $data['p_password']==$p_password){
		$_SESSION['p_name']= $data['p_name'];
		$_SESSION['p_password']= $data['p_password'];
		header("location:p_index.php");
	}
}
	}
	
	catch(PDOException $e)
{echo "error" . $e->getMessage();
}
?>
<form  method="post">
<div class="form-group">
<label class="sr-only">Name:</label>
<div class="input-group">
<div class="input-group-addon">Name:</div>
<input type="text" name="p_name" placeholder="UserName" class="form-control" /><br/>
</div><br/>
<div class="input-group">
<div class="input-group-addon">Password:</div>
<input type="password" name="p_password" placeholder="Password" class="form-control"/>
</div>
<a href="index.php" style="text-decoration: none;" class="btn btn-primary mt-3">Home</a>
<input type="submit" name="p_ok" value="Login" style="text-decoration: none;" class="btn btn-primary mt-3">

</div>
</form>
<p id="p2">Don't have an account yet?<a href="p_regester.php"> Create an account</a> </p>

</div>

</body>
</head>
</html>