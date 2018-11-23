<!DOCTYPE html>
<?php 
session_start();
if(empty($_SESSION['a_name'])){
	header("location:index.php");
}
?>
<?php
//session_start();
try{
$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
if(isset($_POST['a_d_ok'])){
	
	$s_d_s=  	$_POST['s_d_s'];
	$a_d_name=	$_POST['a_d_name'];
	$a_d_fees=	$_POST['a_d_fees'];
	$a_d_number=	$_POST['a_d_number'];
	$a_d_email=	$_POST['a_d_email'];
	$a_d_password=$_POST['a_d_password'];
	
	$insert=$con->prepare("INSERT INTO add_doctor(s_d_s,a_d_name,a_d_fees,a_d_number,a_d_email,a_d_password)
	VALUES(:s_d_s,:a_d_name,:a_d_fees,:a_d_number,:a_d_email,:a_d_password)");
	$insert->bindparam(':s_d_s',$s_d_s);
	$insert->bindparam(':a_d_name',$a_d_name);
	$insert->bindparam(':a_d_fees',$a_d_fees);
	$insert->bindparam(':a_d_number',$a_d_number);
	$insert->bindparam(':a_d_email',$a_d_email);
	$insert->bindparam(':a_d_password',$a_d_password);
    $insert->execute();
    }
}

catch(PDOException $e)
{echo "error" . $e->getMessage();
}
?>
<?php
		try{			
		$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
		$select=$con->prepare("SELECT * FROM doctor_special"); 
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();		
		?>


<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hospital Menagment</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="main.css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="style.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>

		<style>
			.ad {
				position: absolute;
				width: 300px;
				height: 250px;
				border: 1px solid #ddd;
				left: 50%;
				transform: translateX(-50%);
				top: 250px;
				z-index: 10;
			}
			.ad .close {
				position: absolute;
				font-family: 'ionicons';
				width: 20px;
				height: 20px;
				color: #fff;
				background-color: #999;
				font-size: 20px;
				left: -20px;
				top: -1px;
				display: table-cell;
				vertical-align: middle;
				cursor: pointer;
				text-align: center;
			}
		</style>
		<script type="text/javascript">
			$(function() {
				$('.close').click(function() {
					$('.ad').css('display', 'none');
				})
			})
		</script>

	</head>
	<body class="a_indexBody">
		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Admin</span>
			</div>
			<a href="p_logout.php"><p class="logout">LogOut</p></a>
		<p class="title">Hospital Menagment</p>
	
		</div>
		<div class="side-nav">
			
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Admin</span>
			</div>
		<nav>
				<ul>
					<li>
						<a href="a_index.php">
							<span><i></i></span>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="doctor-special.php">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Add Doctor Special</span>
						</a>
					</li>
					<li>
						<a href="add-doctor.php">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Add Doctor</span>
						</a>
					</li>
					
					<li>
						<a href="all_patient.php">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Patient</span>
						</a>
					</li>
					
					<li>
					
						<a href="all_appoinment.php">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Appoinment History</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main">
		<div class="form-group" id="d_s_profile">
		<p><u>Add Doctor</u></p>
		<br/>
		<form method="post" action="add-doctor.php">
		<div class="a_d_input">
	<select name="s_d_s">
		<option>Slect Specialization</option>
		<?php while($p=$select->fetch()){?>
		<option><?php echo $p['d_s_name']?> </option>
		<?php }?>
	</select>
			
	<input type="text" name="a_d_name" placeholder="Enter Doctor Name" class="form-control" required="required"/><br/>
	<input type="text" name="a_d_fees" placeholder="Enter Doctor Fees" class="form-control" required="required"/><br/>
	<input type="text" name="a_d_number" placeholder="Enter Doctor Contact Number" class="form-control" required="required"/><br/>
	<input type="text" name="a_d_email" placeholder="Enter Doctor Email" class="form-control" required="required"/><br/>
	<input type="password" name="a_d_password" placeholder="Password" class="form-control" required="required"/><br/>
	<input type="submit" name="a_d_ok" value="Submit" class="d_s_ok"/>
	</div>	
		</form>

		</div>
		</div>
	</body>
	<?php	}
		catch(PDOException $e)
				{echo "error" . $e->getMessage();
					}
	?>
</html>