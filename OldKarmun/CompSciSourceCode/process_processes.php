<?php 


session_start()
include('connection.php');
		$messTime=$_SESSION[$messTime];
		$messCountry=$_SESSION['usern'];
		$enteredmess=$_POST['srvtxt'];
		$enteredmessage=stripcslashes($enteredmess);
		$messAdmin="Waiting for admin.";
		$type = $_SESSION['type123'];
		$term = $_SESSION['term123'];
		$command = mysqli_query($connection,"INSERT INTO Messaging (Time,Country,Message,Admin,term,count,Approved,Type) 
			VALUES('$messTime','$messCountry','$enteredmessage','$messAdmin','$term','0','no','$type')");
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		redirect('process.php');
 ?>