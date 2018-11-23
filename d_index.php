
<?php 
session_start();
if(empty($_SESSION['a_d_name'])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
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
	<body>
		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Doctros</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
			<a href="d_logout.php"><p class="logout">LogOut</p></a>
		<p class="title">Hospital Menagment</p>
	
		</div>
		<div class="side-nav">
			
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Doctros</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="#">
							<span><i class="fa fa-user"></i></span>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="DoctorappoinmentHistory.php">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Appoinment History</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</body>
</html>