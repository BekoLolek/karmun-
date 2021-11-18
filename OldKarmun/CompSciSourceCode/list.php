<?php session_start() ?>

<?php 
include("connection.php");

$notpermanentusername=$_SESSION["usern"];
$sender = $notpermanentusername;
$receiver = $sender;


$sql = "SELECT value FROM notif WHERE username='$receiver'";
  $result = $connection->query($sql);
  if (!$result) {
    die("Query failed: <br><br><br> " .mysqli_error($connection)."<br>" );
  }

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $previousvalue = $row['value'];
      $newvalue=($previousvalue-1);
      }
  }

$country="Admin";
if(isset($_GET["country"]))
{
  $country = $_GET["country"];
  header("Refresh:0");
}
$country=$_SESSION["sessioncountry"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>list</title>
  <style>

      body{
        border:none;
	      top: 100%; left: 0;
        background-color:transparent;
        padding:0;
      
    }
    #div{
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
    }
   
   span{
    font-size: 35px;
    vertical-align: -18%;
    padding-left: 20px;

   }
   .home{
   	background-color: green;
   }

    ul {
  list-style-type: none;
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  background-color: #262626;  
  height: 100%;
  overflow: auto;
  border:none;
}

li{
  color: white;
  display: block;
  background-color: #262626;
  padding: 8px 16px;
  text-decoration: none;
}

li a {
  color: white;
  display: block;
  background-color: #262626;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {

  background-color: #4d0000;
  color: white;
}

li a:hover:not(.active):not(.home) {
  background-color: #555;
  color: white;
}
  </style>
  <?php include "scrollbar.php"; ?>
  <style type="text/css">
    ::-webkit-scrollbar-thumb {
  background: #9A9A9A;
  border:none;
}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: 'POST',
                url: 'list_ref.php',
                success: function(data){
                    $('#output').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 70);  // it will refresh your data every 1 sec

    });
</script>
</head>

<body>
  
	
<?php
if ($notpermanentusername=="Admin") {
  $tohome="admin.php";
}
else{
  $tohome="process.php";
}
?>

<div id="div">
<ul>
  <li><?php echo "You are logged in as '$notpermanentusername'";?></li>
  <li class="home"><a class="home" href="process.php#comms" target='_parent' >Home </a></li>
  <li><a <?php if ($country=="Admin") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=Admin" target="_top" >HQ<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Admin'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
         echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="France") {echo "class=\"active\"";
    $command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=France" target="_top" >France<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'France'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="PRC") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=PRC" target="_top" >PRC<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'PRC'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="Russia") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=Russia" target="_top" >Russia<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Russia'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="UK") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=UK" target="_top" >UK<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'UK'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="USA") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=USA" target="_top" >USA<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'USA'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="Mexico") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=Mexico" target="_top" target="_top" >Mexico <?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Mexico'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li class="notif"><a <?php if ($country=="South Africa") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");}else echo "class = South Africa" ?> href="refreshing.php?country=South Africa" target="_top" >South Africa     <?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'South Africa'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}
  ?></a></li>
  <li><a <?php if ($country=="India") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=India" target="_top" >India<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'India'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="Ukraine") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=Ukraine" target="_top" >Ukraine<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Ukraine'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="Brazil") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=Brazil" target="_top" >Brazil<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Brazil'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="UAE") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=UAE" target="_top" >UAE<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'UAE'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="Iran") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=Iran" target="_top" >Iran<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Iran'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="DPRK") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=DPRK" target="_top" >DPRK<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'DPRK'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="Germany") {echo "class=\"active\"";
$command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");} ?> href="refreshing.php?country=Germany" target="_top" >Germany<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Germany'";
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
  <li><a <?php if ($country=="Japan") {echo "class=\"active\"";} ?> href="refreshing.php?country=Japan" target="_top" >Japan<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Japan'";
  $command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");
  $result = $connection->query($sql);
      if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["receiver"]==$notpermanentusername) {if ($row["status"]=="unread") {
          echo "<span>&#8226;</span>";$command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'"); break;}}}}?></a></li>
 
</ul>
</div>
<div>
  

<li><a 
  <?php 
    if($country=="Japan") {
      echo "class=\"active\"";} ?>
      href="refreshing.php?country=Japan" target="_top" >Japan<?php $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = 'Japan'";
      $command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");
      $result = $connection->query($sql);
      if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
          if ($row["receiver"]==$notpermanentusername) {
            if ($row["status"]=="unread") {
              echo "<span>&#8226;</span>";
              $command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'");
               break;
             }
           }
         }
       }


       ?></a></li>


<?php 
$countryList = ["A","B","C"];
  for ($i=0; $i < count($countryList); $i++) { 
    echo "<li><a";
    if($country==$countryList[$i]){
      echo "class=\"active\"";
    }
    echo 'href="refreshing.php?country="'.$countryList[$i].'target="_top" >Japan';
    $sql="SELECT receiver,sender,status FROM newmessaging WHERE sender = '$countryList[$i]'";
    $command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$notpermanentusername' AND sender = '$country'");
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
        if ($row["receiver"]==$notpermanentusername) {
          if ($row["status"]=="unread") {
            echo "<span>&#8226;</span>";
            $command2 = mysqli_query($connection,"UPDATE notif SET value='$newvalue' WHERE username='$receiver'");
            break;
          }
        }
      }
    }
    echo "</a></li>";
  }
?>

</div>
</body>
</html>