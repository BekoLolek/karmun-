<?php 
session_start();
include 'connection.php';

$notpermanentusername = $_SESSION['usern'];

$conn=$connection;
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT tanktime FROM armament WHERE username = '$notpermanentusername'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
	date_default_timezone_set('Europe/Budapest');
if (strtotime($row['tanktime'])-time()>0) {
$tanktime = strtotime($row['tanktime'])-time();
$_SESSION['tank'] = date('i:s', $tanktime);
echo $_SESSION['tank'];
}else echo "Completed";


}



} else { echo "0 results"; }
$conn->close();
  ?>
