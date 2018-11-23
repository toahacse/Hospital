<?php
$connect=mysqli_connect("localhost","root","","hms");
$outpute='';
$sql="SELECT * FROM doctor_special WHERE d_s_name LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0){
	$outpute .='<h4 align="center">Search Result</h4>';
	$outpute .='<div class="table-responsive">
				<table class="table table bordered">
			<tr>
					<th>ID</th>
					<th>Doctor spetialist</th>
			</tr>';
			while($row=mysqli_fetch_array($result)){
				$outpute .='
				<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["d_s_name"].'</td>
				</tr>
				';
				
			}
			echo $outpute;
}else{
	echo "data not found";
}
?>