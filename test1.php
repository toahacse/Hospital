<!DOCTYPE html>
<?php
require('dbConfig.php'); 
session_start();
if(empty($_SESSION['p_name'])){
	header("location:index.php");
}
?>


<html>
<head><title></title>
<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="main.css">
  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">
<link href="style.css" rel="stylesheet" />
	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">
<script src="main.js"></script>
  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>


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
			
			$(document).ready(function(){
				$("#slct1").on('click' , function(){
					var slct1=(this).val();
					if(slct1){
						$.ajax({
							type:'POST',
							url:'ajax.php',
							data:'slct1=' + slct1,
							success function(html){
								$("#slct1").html(html);
							}
						});
					}
				});
			});
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
						<div class="form-group" id="p_profile">
						<p><u>User Book Appoinment</u></p>
						<br/>
						<div class="appoint_input">
						
						<select name="slct1" id="slct1">
							<option>Select Option1</option>
							<?php 
							$query = $db->query("SELECT * FROM doctor_special ORDER BY NAME ACS");
							$rowCount = $query->num_rows;
							if($rowCount > 0){
								while($row = $query->fetch_assoc()){
									echo '<option value="'.$row =['slct1'].'">'.$row['d_s_name'].'</option>';
								}
							}else{
								echo 'no doctor_special';
							}
							?>
						</select>
						
						<select name="slct2" id="slct2">
							<option>Select Option2</option>
						</select>
						
						<select name="slct3" id="slct3">
							<option>Select Option3</option>
						</select>
					
						</div>
				</div>
	
		
		</div>
		</div>


	</body>
</html>