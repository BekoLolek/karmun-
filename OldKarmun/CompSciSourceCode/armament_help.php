<?php
include 'connection.php';
include 'outh.php';
date_default_timezone_set('Europe/Budapest');

$quantitypl=0;
$quantityta=0;
$quantitysh=0;
$quantityso=0;
$ctrName = $_SESSION['usern'];
$name = $_SESSION['armament'];
if ($name == "plane") {
	$type="planetime";
	$cost=30;
	$quantitypl=100;
}elseif ($name=="tank") {
	$type="tanktime";
	$cost=25;
	$quantityta=50;
}elseif ($name=="ship") {
	$type="shiptime";
	$cost=59;
	$quantitysh=25;
}elseif ($name=="soldier") {
	$type="soldiertime";
	$cost=10;
	$quantityso=1000;
}
echo "Please Wait...!";
$today2 = strtotime("+20 minutes");
$today = date("Y-m-d H:i:s",$today2);
$command1=mysqli_query($connection,"UPDATE armament SET $type = '$today' WHERE username = '$ctrName'");

$command2 = mysqli_query($connection, "SELECT Airplanes,Ships,Tanks,Soldiers FROM armament WHERE username = '$ctrName'");
$times = mysqli_fetch_array($command2);
$tank=($times['Tanks']+$quantityta);
$ship=($times['Ships']+$quantitysh);
$soldiers=($times['Soldiers']+$quantityso);
$planes=($times['Airplanes']+$quantitypl);


$command3=mysqli_query($connection,"UPDATE armament SET Airplanes='$planes' WHERE username = '$ctrName'");
$command4=mysqli_query($connection,"UPDATE armament SET Ships='$ship' WHERE username = '$ctrName'");
$command5=mysqli_query($connection,"UPDATE armament SET Tanks='$tank' WHERE username = '$ctrName'");
$command6=mysqli_query($connection,"UPDATE armament SET Soldiers='$soldiers' WHERE username = '$ctrName'");

$sql = "SELECT * FROM strength WHERE username = '$ctrName'";
  	$result = $connection->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
$tank1=($row["Tanks"]);
$soldiers1=($row["Soldiers"]);
$planes1=($row["Airforce"]);
$ship1=($row["Navalforce"]);
}
}
$tank1=$tank1+$quantityta;
$soldiers1=$soldiers1+$quantityso;
$planes1=$planes1+$quantitypl;
$ship1=$ship1+$quantitysh;

$shipname="Navalforce";
$planename="Airforce";

$com2=mysqli_query($connection,"UPDATE strength SET Soldiers='$soldiers1' WHERE username='$ctrName'");
$com3=mysqli_query($connection,"UPDATE strength SET $shipname='$ship1' WHERE username='$ctrName'");
$com4=mysqli_query($connection,"UPDATE strength SET $planename='$planes1' WHERE username='$ctrName'");
$com5=mysqli_query($connection,"UPDATE strength SET Tanks='$tank1' WHERE username='$ctrName'");

$sql = "SELECT Money,username FROM Everything WHERE username = '$ctrName'";
  	$result = $connection->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$oldmoney=round($row["Money"]);
}
}
$newmoney=$oldmoney-$cost;

$comfinal=mysqli_query($connection,"UPDATE Everything SET Money='$newmoney' WHERE username='$ctrName'");

redirect("process.php");
?>