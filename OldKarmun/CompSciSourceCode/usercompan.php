<?php 
session_start();
$notpermanentusername=$_SESSION['usern'];

include "connection.php";
$conn = $connection;

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Money Transfer
    
  </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initaial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" type="text/css" href="usercompanst.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: 'POST',
                url: 'autoref.php',
                success: function(data){
                    $('#output').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  // it will refresh your data every 1 sec

    });
    </script>
     <script>
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: 'POST',
                url: 'moneyhacked.php',
                success: function(data){
                    $('#output2').html(data);
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

<style >
  html, body {
    max-width: 100%;
    overflow-x: hidden;
}
.nav-active{
  transform: translateX(0%);
}


input{
  height: 5vh;
  
  font-size: 100%;
  display: flex;
  text-align: left;
  
}
 #Send{
    position: absolute;
	width: 10%;
	height: 11%;
	top: 43%;
	left: 3%;
	text-align: center;
	box-shadow: -3px -3px 10px 0px #24d9ff;
	background-color: black;
	color: #24d9ff;
	border:none;
	font-size: 100%;
	cursor: pointer;
	
}


.recieved{
  position: fixed;
  right: 3%;
  top: 3%;
  width: 30%;
  overflow-y: scroll;
  display: block;
  height: 45%;
  color: #24d9ff;

}
.sent{
  position: fixed;
  right: 3%;
  bottom: 3%;
  width: 30%;
  overflow-y: scroll;
  display: block;
  height: 45%;
  color: #24d9ff;
}
td,th{
  padding-right: 30px;
  color: #24d9ff;

}
.balance{
  padding-bottom: 15px;
  max-width: 60%;
  line-height: 26px;
  letter-spacing: 1px;
  color: #24d9ff;
}

.logo{
  font-size: 1.5rem;
  font-weight: lighter;
  top:2.5%;
}

.money2{
  display: flex;
}

@media screen and (max-width: 700px){
  .recieved{

  }
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {

  text-decoration: none;
  padding-bottom: 10px;
  padding-top: 10px;
  text-align: center;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
  background-color: #818181;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  left: -25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
@media screen and (max-width: 750px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}

}
nav {
  display: flex;
  justify-content: space-around;
  align-items: center;
  min-height: 8vh;
  background-color: #151719;
}
.nav-li{
  display: flex;
  text-align: center;
    height:100%;
    flex-direction: column;
  justify-content: space-around;
}
.nav-li a{
  color: white;
  text-decoration: none;
  letter-spacing:1px;
  font-weight: bold;
  font-size: 18px;
  font-family: sans-serif;
  color: #818181;

}

.nav-li li{
  list-style: none;
  text-align: center;

}
.nav-li :hover {
  color: #f1f1f1;

}

</style>
<?php include "scrollbar.php" ?>
<body>
  <div id="transbox">
    <p class="user"><?php echo $_SESSION['a'], $_SESSION['a']=""; ?><br><?php echo $_SESSION['b'], $_SESSION['b']=""; ?><?php echo $_SESSION['c'], $_SESSION['c']=""; ?><?php echo $_SESSION['e'], $_SESSION['e']=""; ?></p>  
    <div class="transfer">
      <div class="balance">
      <h4 class="here">Here you can send money to other countries!<br>
        <?php 
                
                if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                } 
                 $user=$_SESSION['usern'];
                 $cyber=0;
                 $sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
               while($row = $result2->fetch_assoc()){
                if($row["onoff"] == 1){
                    $cyber=1;
                }else $cyber = 0;
               }
               }else echo "0 results";
               if($cyber == 0){ 
                echo "<div class=money id=output></div>";
              }else { echo "<div class=money2>Your balance: "." <div class=money id=output2></div>"."$ (in billions)</div>";}
 
               ?>
             </h4>
    </div>
    <form method="post" action="xxx_upd.php">
    <input type="number" min="0" max="$_SESSION['d']" name="amount" placeholder="Amount..."><br>
    <input list="countries" name="countries" placeholder="Please select a country" ><br>
    <datalist id="countries">
      <?php 
        
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT username,Money FROM Everything";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
  if ($row["username"] != $_SESSION['usern'] && $row["username"]!="Admin" && $row["username"]!="Chair") {
    # code...
  
echo "<option value=$row[username]>";
}
}
} else { echo "0 results"; }

       ?>
    </datalist>
    <button type="Submit" id="Send" name="Send" value="Send">Send</button>
    </form>
  </div>
  <div class="table1">
  <table class="recieved">
    
    <tr>
    
      <th>Time</th>
      <th>From</th>
      <th>Amount (billion)</th>
      
    
  </tr>
     <?php 
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT Time,Sender,Reciever,Amount FROM Money_Transfer";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
  if($row["Reciever"] == $_SESSION['usern']){
    echo "<tr><td>" . $row["Time"]. "</td><td>" . $row["Sender"] . "</td><td>"
 . $row["Amount"]."$"."</tr></td>";
}
}


} else { echo "0 results"; }


  ?>
</table>
</div>
<div class="table2">
<table class="sent">
    <tr>
    
      <th>Time</th>
      <th>To</th>
      <th>Amount (billion)</th>
      
    
  </tr>
     <?php 
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT Time,Sender,Reciever,Amount FROM Money_Transfer";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
  if($row["Sender"] == $_SESSION['usern']){
    echo "<tr><td>" . $row["Time"]. "</td><td>". $row["Reciever"]. "</td><td>" . $row["Amount"]. "$" ."</tr></td>";
}
}


} else { echo "0 results"; }


  ?>
</table>
</div>

</div>

<nav>
  <div class="logo">
    <h4><?php echo $_SESSION['usern'] ;?></h4>

  </div>
  
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="nav-li">
    <li><a href="process.php" >Home</a></li>
  <li><a href="usercountrymatrix.php" >Country Matrix</a></li>
  <li><a href="refreshing.php" >Comm. panel</a></li>
 <li><a href="usercompan.php" >Money Transfer</a></li>
  <li><a href="nuclearreactordevelopement.php?war_group=1" >War</a></li>
  </ul>
</div>

<span style="font-size:40px;cursor:pointer;position: absolute;right: 3%;" onclick="openNav()">&#9776;</span>
</nav>
    <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "40%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<?php 

$user=$_SESSION['usern'];
$currenttime=date("H:i:s");
$current=strtotime($currenttime);

 
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "SELECT Time,Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
  $result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
   if($row["Countries"]== $user){
    $time=$row["Time"];
    $time2=strtotime($time);
    if((($current-$time2)/60)>20){
      $command=mysqli_query($conn,"UPDATE Cyber_attack SET onoff=0 WHERE Countries='$user'");
    }
    }
 }
}
?>

 
    
  <script src="sidebar.js"></script>


</body>
</html>