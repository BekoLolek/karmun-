<?php 
session_start();
include 'connection.php';

$notpermanentusername = $_SESSION['usern'];

$conn=$connection;
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT shiptime FROM armament WHERE username = '$notpermanentusername'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
	date_default_timezone_set('Europe/Budapest');

if (strtotime($row['shiptime'])-time()>0) {
$shiptime = strtotime($row['shiptime'])-time();
$_SESSION['ship'] = date('i:s', $shiptime);
echo $_SESSION['ship'];
}else echo "Completed";


}



} else { echo "0 results"; }
$conn->close();
  ?>
