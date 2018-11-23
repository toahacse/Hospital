<!DOCTYPE html>

<?php 
session_start();
if(empty($_SESSION['a_name'])){
	header("location:index.php");
}
$con = new PDO ("mysql:host=localhost;dbname=hms","root","");
$select3=$con->prepare("SELECT * FROM add_doctor");
$select3->setFetchMode(PDO::FETCH_ASSOC);
$select3->execute();
$l=0;
while($p=$select3->fetch()) {
    $p['id'];
    $l++;
}
$select=$con->prepare("SELECT * FROM p_register");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$i=0;
while($p=$select->fetch()) {
    $p['id'];
    $i++;
}
$select1=$con->prepare("SELECT * FROM bookappoinment");
$select1->setFetchMode(PDO::FETCH_ASSOC);
$select1->execute();
$j=0;
while($p=$select1->fetch()) {
    $p['s_d_s'];
    $j++;
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
        <div style="padding: 120px 0px 0px 300px;">
            <div class="row">
                <div class="card col-sm-3 bg-success m-2">
                    <div class="card-body">
                    <h4 class="text-center text-light">Total Doctors</h4>
                    <h2 class="text-center text-dark"><?php echo $l;?></h2>
                    <a class="btn btn-dark btn-block" href="">View Details</a>
                    </div>
                </div>
                <div class="card col-sm-3 bg-info m-2">
                    <div class="card-body">
                    <h4 class="text-center text-light">Total Patient</h4>
                    <h2 class="text-center text-dark"><?php echo $i;?></h2>
                    <a class="btn btn-dark btn-block" href="all_patient.php">View Details</a>
                    </div>
                </div>
                <div class="card col-sm-3 bg-primary m-2">
                    <div class="card-body">
                    <h4 class="text-center text-light">Total Appoinment</h4>
                    <h2 class="text-center text-dark"><?php echo $j;?></h2>
                    <a class="btn btn-dark btn-block" href="all_appoinment.php">View Details</a>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>