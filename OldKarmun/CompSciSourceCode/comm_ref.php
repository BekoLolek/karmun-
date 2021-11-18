<?php
include("connection.php");
session_start();
 
$notpermanentusername = $_SESSION['usern'];
$country="";

 if ($connection->connect_error) {
                   die("Connection failed: " . $connection->connect_error);
                  } 
                   $user=$_SESSION['usern'];
                   $cyber=0;
                   $sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$notpermanentusername'";
                  $result2 = $connection->query($sql2);
                  if ($result2->num_rows > 0) {
                 while($row = $result2->fetch_assoc()){
                  if($row["onoff"] == 1){
                      $cyber=1;
                  }else $cyber = 0;
                 }
                 }

if(isset($_GET["country"]))
{
  $country = $_GET["country"];
}
$country=$_SESSION["sessioncountry"];
$sender = $notpermanentusername;
if($cyber==0){
    $sql = "SELECT message,sender,receiver FROM newmessaging WHERE ((sender='$sender' and receiver='$country') OR (sender='$country' and receiver='$sender'))";
  $result = $connection->query($sql);
  if (!$result) {
    die("Query failed: <br><br><br> " .mysqli_error($connection)."<br>" );
  }
  if ($result->num_rows > 0) {
    echo "<table id=messagingarea>
    <tr>
      <th>message</th>
    </tr>";

  while($row = $result->fetch_assoc()) {
    if($row["sender"]==$notpermanentusername){  
      echo nl2br("<selection class='message'><div class='center'><div class='grid-message'><tr class='message-sent'><td><div class=divMessage>"
       . $row["message"]. 
      "</div></td></tr></div></div></selection>");
    }
    elseif($row["sender"]==$country){ 
      echo nl2br("<selection class='message'><div class='center'><div class='grid-message'><tr class='message-received'><td><div class=divMessage>"
       . $row["message"]. 
      "</div></td></tr></div></div></selection>");
    }
    else{
        echo "<tr><td>Ain't works \n".$sender.$country.$notpermanentusername."</td></tr>";
    }
  }
  echo "</table>";

  } else { echo ""; }
}else{echo "<p class=cyber>You are under cyber attack!</p>";}

$user=$_SESSION['usern'];
$currenttime=date("H:i:s");
$current=strtotime($currenttime);

  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    } 
    $sql = "SELECT Time,Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
  $result = $connection->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
   if($row["Countries"]== $user){
    $time=$row["Time"];
    $time2=strtotime($time);
    if((($current-$time2)/60)>20){
      $command=mysqli_query($connection,"UPDATE Cyber_attack SET onoff=0 WHERE Countries='$user'");
    }
    }
 }
}
  $connection->close();
  ?>