<?php 
	session_start();
	include "connection.php";

	$username = $_SESSION['username'];
	$_SESSION["quantumWarning"] = "";
	$userMoney = 0;
	$quantumCost = 0;
	$newMoney = 0;

	$sql = "SELECT Cost,Timetaken FROM War WHERE Construction_id = $quantumState";
	$result = mysqli_query($connection,$sql);
	if($result->num_rows > 0){
		while($row = mysqli_fetch_array($result)){
			$quantumCost = $row["Cost"];
			$quantumTimeOfUpgrade = $row["Timetaken"];
		}
	}
	$sql = "SELECT Money FROM Everything WHERE username = $username";
	$result = mysqli_query($connection,$sql);
	if($result->num_rows > 0){
		while($row = mysqli_fetch_array($result)){
			$userMoney = $row["Money"];
		}
	}
	$sql = "SELECT quantumState, quantumTime FROM Everything WHERE username = $username";
	$result = mysqli_query($connection,$sql);
	if($result->num_rows > 0){
		while($row = mysqli_fetch_array($result)){
			$quantumState = $row["quantumState"] + 1;
			$quantumTime = strtotime("+30 minutes");
		}
	}

	if($userMoney >= $quantumCost){
		$newMoney = $userMoney - $quantumCost;
		$command1 = mysqli_query($connection,"UPDATE Everything SET quantumState='$quantumState', quantumTime='$quantumTime' WHERE username='$username'");
		$command2 = mysqli_query($connection,"UPDATE Everything SET Money = '$newMoney' WHERE username = '$username'");
	}
	else{
		$_SESSION["quantumWarning"] = "You don't have enough money to complete this action!";
	}

	
	redirect("process.php");

?>