<?php
	session_start();
	include("connection.php");
	if($connection){
		header("Location:index.php");
	}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Servers Down</title>
	<style type="text/css">
		body{
			background-color: #24d9ff;
		}
		p{
			position: absolute;
			color: black;
			top: 20%;
			left: 35%;
			width: 30%;
			text-align: center;
			font-size: 40px;
		}
	</style>
</head>
<body>
	<p>The Server is currently down.</p>
</body>
</html>