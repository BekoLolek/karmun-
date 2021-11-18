<?php 
	session_start();
	function redirect($url)
	{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
	}
	if(isset($_POST["turn"])){
		$_SESSION["connection"] = "up";
		redirect("admin.php");
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #24d9ff;">
	<form method="POST" action="turnOnServer.php">
		<button id="turnOn" style="position: absolute; top:10%; width: 20%; left: 40%;">Turn Server On</button>
	</form>
</body>
</html>