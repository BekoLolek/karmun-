<?php
include('connection.php');
session_start();
$user=$_SESSION['usern'];

$sql = "SELECT status FROM newmessaging WHERE receiver = '$user'";

$result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()){
      	if($row['status']=='unread'){
      		$_SESSION['refresh']=1;
      	}
      }
      }

?>