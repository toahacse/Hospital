<!DOCTYPE html>
<?php 
session_start();
if(empty($_SESSION['p_name'])){
	header("location:index.php");
}
?>
<?php
try{	
		$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
		$p_name=$_SESSION['p_name'];
		
		if(isset($_POST['p_update'])){
	
	$p_name=  	$_POST['p_name'];
	$p_address=	$_POST['p_address'];
	$p_city=	$_POST['p_city'];
	$gender=	$_POST['gender'];
	$p_email=	$_POST['p_email'];

	
	$insert=$con->prepare("UPDATE p_register SET p_name = :p_name, p_address = :p_address, p_city = :p_city, gender = :gender, p_email = :p_email where p_name = '$p_name'");
	$insert->bindparam(':p_name',$p_name);
	$insert->bindparam(':p_address',$p_address);
	$insert->bindparam(':p_city',$p_city);
	$insert->bindparam(':gender',$gender);
	$insert->bindparam(':p_email',$p_email);
    $insert->execute();
    header("location:p_index.php");
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
	<body class="p_indexBody">
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
						<a href="p_index.php">
							<span><i class="fa fa-user"></i></span>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="bookAppoinment.php">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Book Appoinment</span>
						</a>
					</li>
					<li>
						<a href="appoinmentHistory.php">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Appoinment History</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main">
		<div class="form-group" id="u_profile">
		<p><u>User Profile</u></p>
		<br/>
		<table border="0" width="500" > 
		<?php
		
				try{
					
				$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
					$p_name=$_SESSION['p_name'];
					$select=$con->prepare("SELECT * FROM p_register WHERE p_name='$p_name'"); 
					$select->setFetchMode(PDO::FETCH_ASSOC);
					$select->execute();
					
					
			while($p=$select->fetch()){
			
			echo "<form method='post' action='p_index.php'>";
				
			echo "<tr id='p_tr' height='100' width='500' align='center'>";
			echo "<td id='name'>"."Name"."</td>";	
			echo "<td>"."<input id='name' name='p_name' type='text' class='form-control' value=".$p['p_name'].">"."</td>";
			echo "</tr>";
			echo "<tr id='p_tr' height='100' width='500' align='center' >";	
			echo "<td id='name'>"."p_address"."</td>";
			echo "<td>"."<input id='name' name='p_address' type='text' class='form-control' value=".$p['p_address'].">"."</td>";
			echo "</tr>";
			echo "<tr id='p_tr' height='100' width='500' align='center' >";	
			echo "<td id='name'>"."p_city"."</td>";
			echo "<td>"."<input id='name' name='p_city' type='text' class='form-control' value=".$p['p_city'].">"."</td>";
			echo "</tr>";
			echo "<tr id='p_tr' height='100' width='500' align='center' >";
			echo "<td id='name'>"."gender"."</td>";
			echo "<td>"."<input id='name' name='gender' type='text' class='form-control' value=".$p['gender'].">"."</td>";
			echo "</tr>";
			echo "<tr id='p_tr' height='100' width='500' align='center' >";	
			echo "<td id='name'>"."p_email"."</td>";
			echo "<td>"."<input id='name' name='p_email' type='text' class='form-control' value=".$p['p_email'].">"."</td>";
			echo "</tr>";
			echo "<tr id='p_tr' height='100' width='500' align='center' >";
			echo "<td>"."</td>";
			echo "<td>"."<input type='submit' name='p_update' value='Update' class='p_update'>"."</td>";
			echo "</tr>";
			echo "</form>";
				
				}
				}
				
					catch(PDOException $e)
				{echo "error" . $e->getMessage();
					}
		?>
		
		</table>
		</div>"
		</div>
	</body>
</html>