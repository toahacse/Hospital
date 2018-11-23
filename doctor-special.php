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
if(isset($_POST['d_s_ok'])){
	
	$d_s_name=$_POST['d_s_name'];
	
	$insert=$con->prepare("INSERT INTO doctor_special(d_s_name)
	VALUES(:d_s_name)");
	$insert->bindparam(':d_s_name',$d_s_name);
    $insert->execute();
    }
}

catch(PDOException $e)
{echo "error" . $e->getMessage();
}
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
				<span>Patient</span>
			</div>
			<a href="p_logout.php"><p class="logout">LogOut</p></a>
		<p class="title">Hospital Menagment</p>
	
		</div>
		<div class="side-nav">
			
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Patient</span>
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
		<p><u>Doctor Specialization</u></p>
		<br/>
		<form method="post" action="doctor-special.php">
<div class="d_s_input">
<input type="text" name="d_s_name" placeholder="Enter Doctor Specialization" class="form-control"required="required"/><br/>
<input type="submit" name="d_s_ok" value="Submit" class="d_s_ok">
</div>
<?php
	try{
					
		$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
		
		$select=$con->prepare("SELECT * FROM doctor_special"); 
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();		
		
			?>
</form>
<table border="1">

<tr>
<td id="d_s1">SL.</td>
<td id="d_s2">Specialization</td>
</tr>
<?php while($p=$select->fetch()){?>
<tr>
<td id="d_s3"> <?php echo $p['id']?></td>
<td id="d_s4"><?php echo$p['d_s_name']?> </td>
</tr>
	<?php }
	}
		catch(PDOException $e)
				{echo "error" . $e->getMessage();
					}
	?>
</table>

	
		</div>
		</div>
	</body>
</html>