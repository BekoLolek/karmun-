<?php 
session_start();
include 'connection.php';
if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}

$notpermanentusername = $_SESSION['usern'];
$sender = $notpermanentusername;
$receiver = $_SESSION["sessioncountry"];


$sql = "SELECT value FROM notif WHERE username='$receiver'";
	$result = $connection->query($sql);
	if (!$result) {
	  die("Query failed: <br><br><br> " .mysqli_error($connection)."<br>" );
	}

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$previousvalue = $row['value'];
			$newvalue=($previousvalue+1);
			}
	}
	





if(isset($_POST['btnReply']))
{	
	
	
	$message = $_POST["sendingmessage"];
	$time = time();
	$approved = 0;
	if(!$_POST["sendingmessage"]){
		//do nothing
	}
	else{
		$command = mysqli_query($connection,"INSERT INTO newmessaging (sender,receiver,message,time,approved) VALUES ('$sender','$receiver',\"$message\",'$time','$approved');");

		if (!$command) {
	    	die("Query failed: " .mysqli_error($connection) );
	    }
	    $command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'");

	    if (!$command2) {
	    	die("Query failed: " .mysqli_error($connection) );
	    }
	}
	header("Refresh:0");


}
?>
<!DOCTYPE html>
<html>
<head>
	
	<style type="text/css">
		body{
			background-color: transparent;
			border:none;
			
		}
		#textarea{
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			background-color: #b3b3b3;
			border: 1px solid black;
			position: absolute;
			top: 20%;
			left: 1%;
			height: 55%;
			width: 80%;

		}
		#div{
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
		}
		.button{
			position: absolute;
			top: 20%;
			left: 85%;
			width: 10%;
			height: 57%;
			border: 1px solid red;
			background-color: black;
			box-shadow: -3px -3px 10px 0px red;
			color: red;
			cursor: pointer;
		}
		.input{
			position: absolute;
			top: 0%;
			left: 0;
			width: 100%;
			height: 100%;
		}
	</style>

</head>
<body style="background-color: #262626;">


		<div class="input">
		<form method="post">
			<div id="div">
		<textarea name="sendingmessage" id="textarea" rows="2" cols="130" style="resize: none; "placeholder="Write a message!"></textarea>
	
		<?php 	
		echo '<input type="submit" class="button" name="btnReply" value="Send">';
		?>
		</div>
		</form>
	</div>


</body>
</html>