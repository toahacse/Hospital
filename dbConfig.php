<?php 
mysqli_connect("localhost", "root", "", "hms");
if(mysqli_connect_errno()){
	echo "Failed to connect:".mysqli_connect_errno();
}
?>