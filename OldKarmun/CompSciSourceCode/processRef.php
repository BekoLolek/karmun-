<?php 


	session_start();
	include('connection.php');
	$username = $_SESSION['usern'];

	if($_SESSION['task'] == "submitNewsflash"){
		$messTime=$_SESSION['messTime123'];
		$messCountry=$_SESSION['usern'];
		$enteredmess=$_SESSION['enteredmess123'];
		$enteredmessage=stripcslashes($enteredmess);
		$messAdmin="Waiting for admin.";
		$type = $_SESSION['type123'];
		
		$command = mysqli_query($connection,"INSERT INTO Messaging (Time,Country,Message,Admin,term,count,Approved,Type) 
			VALUES('$messTime','$messCountry','$enteredmessage','$messAdmin','$term','0','no','$type')");
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		
	}
	if($_SESSION['task'] == "submitAction"){
		$alliAction = $_SESSION['alliAction'];
		$alliCountry = $_SESSION['alliCountry'];
		if($alliAction == "Declare War"){
			$sql = "UPDATE Alliances SET $username = 'War' WHERE Country = $alliCountry";
			$command = mysqli_query($connection, $sql);
			$sql = "UPDATE Alliances SET $alliCountry = 'War' WHERE Country = $username";
			$command = mysqli_query($connection, $sql);
		}else{
			$sql = "INSERT INTO requests Sender = $username, Receiver = $alliCountry, Action = $alliAction, Status = 'Waiting for response'";
			$command = mysqli_query($connection, $sql);
		}
		
	}
	if($_SESSION['task'] == "accept_peace"){
		$sender = $_SESSION['Sender'];
		$sql = "UPDATE requests SET Status = 'Completed' WHERE Sender = $sender && Receiver = $username && Status = Waiting for response";
		$command = mysqli_query($connection, $sql);
		$sql = "UPDATE Alliances SET $username = 'Neutral' WHERE Country = $sender";
		$command = mysqli_query($connection, $sql);
		$sql = "UPDATE Alliances SET $sender = 'Neutral' WHERE Country = $username";
		$command = mysqli_query($connection, $sql);
	}
	if($_SESSION['task'] == "reject_peace"){
		$sender = $_SESSION['Sender'];
		$sql = "UPDATE requests SET Status = 'Completed' WHERE Sender = $sender && Receiver = $username && Status = Waiting for response";
	}
	if($_SESSION['task'] == "accept_alliance"){
		$sender = $_SESSION['Sender'];
		$sql = "UPDATE requests SET Status = 'Completed' WHERE Sender = $sender && Receiver = $username && Status = Waiting for response";
		$command = mysqli_query($connection, $sql);
		$sql = "UPDATE Alliances SET $username = 'Allied' WHERE Country = $sender";
		$command = mysqli_query($connection, $sql);
		$sql = "UPDATE Alliances SET $sender = 'Allied' WHERE Country = $username";
		$command = mysqli_query($connection, $sql);
	}
	if($_SESSION['task'] == "reject_alliance"){
		$sender = $_SESSION['Sender'];
		$sql = "UPDATE requests SET Status = 'Completed' WHERE Sender = $sender && Receiver = $username && Status = Waiting for response";
	}
	redirect("process.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>F</title>
 </head>
 <body>
 
 </body>
 </html>