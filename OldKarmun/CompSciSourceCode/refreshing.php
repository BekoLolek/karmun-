<?php session_start(); 

$notpermanentusername = $_SESSION['usern'];
include('connection.php');

?>
<!DOCTYPE html>
<html>
<head>

 
	<title >
		<?php  
	$newmess=0;

  $sql = "SELECT status FROM newmessaging WHERE receiver='$notpermanentusername'";
  $result = $connection->query($sql);
  if (!$result) {
    die("Query failed: <br><br><br> " .mysqli_error($connection)."<br>" );
  }

  if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
  	if($row['status']=="unread"){
    $newmess=$newmess+1;
    }
	}
  }
  ?> 
  <?php
  if($newmess>0){
   echo "(".$newmess.") Messaging";
}else echo "Messaging";
?>
		
	</title>
	

<style>
	body{
		background-color: black;
	}
html{
background-color:black;
}
  #div{
    position: absolute;
    top:0; left: 0;
    width: 100%;
    height: 100%;
border:none;
  }
</style>
	
</head>

<?php
$country="Admin";
if(isset($_GET["country"]))
{
  $country = $_GET["country"];
}
$_SESSION["sessioncountry"]=$country;
?>

<div id="div">
<frameset cols="250,*" frameborder="no">

<frame id="lefty"name="_left" src="list.php" noresize="noresize" ></frame>

<frameset rows="*,50" frameborder="no">
<frame  id="righty" name="_right" src="comm.php" frameBorder="0" noresize="noresize"></frame>

<frame name="_bottom" src="textarea.php" frameBorder="0" noresize="noresize"></frame>
</frameset>


</frameset>
</div>
<body>


</body>
</html>