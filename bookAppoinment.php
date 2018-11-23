<!DOCTYPE html>
<?php 
session_start();
if(empty($_SESSION['p_name'])){
	header("location:index.php");
}
?>
<?php
//session_start();
try{
$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
    $mass="";
    $mass1="";
    $mass2="";
if(isset($_POST['all_ok'])){
	$s_d_s=         $_POST['s_d_s'];
    $d_name=	    $_POST['d_name'];
	$s_a_d_name=	$_POST['s_a_d_name'];
	$s_a_d_date=	$_POST['s_a_d_date'];
	$insert=$con->prepare("INSERT INTO bookAppoinment(s_d_s,d_name,s_a_d_name,s_a_d_date)
	VALUES(:s_d_s,:d_name,:s_a_d_name,:s_a_d_date)");
	$insert->bindparam(':s_d_s',$s_d_s);
	$insert->bindparam(':d_name',$d_name);
	$insert->bindparam(':s_a_d_name',$s_a_d_name);
	$insert->bindparam(':s_a_d_date',$s_a_d_date);
    if($insert->execute()){
        $mass="Booking Successfuly!!";

        $select=$con->prepare("SELECT id FROM bookAppoinment ");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        while($p=$select->fetch()){?>
        <?php $mass1= $p['id']?>
        <?php
        }
        $mass2='Your Serial Number :'.$mass1;
    }
    }
	else{
		

		
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
		<link rel="stylesheet" href="main.css">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
		<link href="style.css" rel="stylesheet" />
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/jquery.js"></script>
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
						<?php
						try{			
						$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
						$select=$con->prepare("SELECT * FROM doctor_special"); 
						$select->setFetchMode(PDO::FETCH_ASSOC);
						$select->execute();		
						?>
						<div class="main">
						<div class="form-group" id="p_profile">
						<p><u>User Book Appoinment</u></p>
						<br/>
						<h4 style="text-align: center; color: #00a946;"><?php echo $mass;?></h4>
						<h4 style="text-align: center; color: #00a946;"><?php echo $mass2;?></h4>
						<form method="post">
						<div class="appoint_input">
					<select name="s_d_s" id="s_d_s">
						<option>Slect Specialization</option>
						<?php while($p=$select->fetch()){?>
						<option><?php echo $p['d_s_name']?> </option>
						<?php }?>
					</select>
                        <?php	}
                        catch(PDOException $e)
                        {echo "error" . $e->getMessage();
                        }?>
                            <select name="d_name" id="d_name">
                                <option>Slect Doctor</option>
                            </select>
                            <select name="s_a_d_name" id="s_a_d_name">
                                <option>Doctor Fee</option>
                            </select>
                            <input type="text" readonly  name="s_a_d_date" value="<?php echo date('d/m/y');?>"/>
							<input type="submit" name="all_ok" value="OK"/>
						</form>
					
		</div>
		</div>


		</div>
		</div>
        <script>
            $("#s_d_s").click(function () {
                var value=$("#s_d_s").val();
                if(value){
                    $.ajax({
                        type:'POST',
                        url:'Ajex.php',
                        data:'value='+ value,
                        success:function (html) {
                            $("#d_name").html(html);
                        }
                    });
                }
            });
            $("#d_name").click(function () {
                var value1=$("#d_name").val();
                if(value1){
                    $.ajax({
                        type:'POST',
                        url:'Ajex.php',
                        data:'value1='+ value1,
                        success:function (html) {
                            $("#s_a_d_name").html(html);
                        }
                    });
                }
            });

            </script>

	</body>
</html>