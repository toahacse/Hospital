<html>
 <head>
	 <title>Untitled</title>
	 <meta charset="UTF-8"/>
	 <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
	 <script src="bootstrap/js/bootstrap.js"></script>
	 <script src="bootstrap/js/bootstrap.bundle.js"></script>
	<script src="bootstrap/jquery.js"></script>
 </head>
<body>
<form id="catch">
<input type="text" id="value"/>
</form>
<script>
$(document).ready(function(){
$("#value").clickUp(function(){
	var  name=$("#value").val();
	consol.log(name);
});
});
</script>

<?php echo name;?>

</body>
</html>