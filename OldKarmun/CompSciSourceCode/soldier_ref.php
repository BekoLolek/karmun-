<?php 
session_start();
include 'connection.php';

$notpermanentusername = $_SESSION['usern'];

$conn=$connection;
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT soldiertime FROM armament WHERE username = '$notpermanentusername'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
	date_default_timezone_set('Europe/Budapest');
if (strtotime($row['soldiertime'])-time()>0) {
$soldiertime = strtotime($row['soldiertime'])-time();
$_SESSION['soldier'] = date('i:s', $soldiertime);
echo $_SESSION['soldier'];
}else echo "Completed";

}



} else { echo "0 results"; }
$conn->close();
  ?>
