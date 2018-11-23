<?php
//session_start();
try{
$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
if(isset($_POST['p_ok'])){
	
	$p_name=  	$_POST['p_name'];
	$p_address=	$_POST['p_address'];
	$p_city=	$_POST['p_city'];
	$gender=	$_POST['gender'];
	$p_email=	$_POST['p_email'];
	$p_password=$_POST['p_password'];
	
	$insert=$con->prepare("INSERT INTO p_register(p_name,p_address,p_city,gender,p_email,p_password)
	VALUES(:p_name,:p_address,:p_city,:gender,:p_email,:p_password)");
	$insert->bindparam(':p_name',$p_name);
	$insert->bindparam(':p_address',$p_address);
	$insert->bindparam(':p_city',$p_city);
	$insert->bindparam(':gender',$gender);
	$insert->bindparam(':p_email',$p_email);
	$insert->bindparam(':p_password',$p_password);
    $insert->execute();
    }
}

catch(PDOException $e)
{echo "error" . $e->getMessage();
}
?>
<html>
<head>
<title>Hospital Menagment</title>
<link href="style.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p_body">

<div class="p_input">
<p id="p5"><u>Patient Registration</u></p>
<br/><br/>
<form method="post" action="p_regester.php">
<div class="form-group">
Enter your details:<br/><br/>
<input type="text" name="p_name" placeholder="UserName" class="form-control"required="required"/><br/>
<input type="text" name="p_address" placeholder="Address" class="form-control"required="required" /><br/>
<input type="text" name="p_city" placeholder="City" class="form-control" required="required"/><br/>
<label><b>Gender:</b></label></br>
<input type="radio" name="gender" value="Male"/>Male
<input type="radio" name="gender" value="Fmale"/>Fmale<br/><br/>

<input type="mail" name="p_email" placeholder="Email" class="form-control" required="required"/><br/>
<input type="password" name="p_password" placeholder="Password" class="form-control"required="required"/><br/>
<p id="p_p">Already have an account?<a href="patient.php"> Login</a> </p>
<input type="submit" name="p_ok" value="Submit" style="text-decoration: none;" class="btn btn-primary mt-3">
</div>
</form>


</div>

</body>
</head>
</html>