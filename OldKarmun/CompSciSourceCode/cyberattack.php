<?php 
session_start();
include("connection.php");
$conn=$connection;
$notpermanentusername=$_SESSION['usern'];
function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php  
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
   echo "(".$newmess.") Cyber Attack";
}else echo "Cyber Attack";
?></title>
	<script defer src="process.js"></script>
	<link rel="stylesheet" type="text/css" href="warstyle2.css">
<style>
body{
background-repeat:repeat;
}

@media screen and (min-width:  1220px){
.nav-li{
  display: none;
}
.sidenav{
  display: none;
}
span{
  display: none;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}
.active {
  background-color: rgba(68, 129, 14, 1);

}
}
input{
	border:1px solid red;
	background-color: rgba(0,0,0,0.8);
	color: white;
	font-size: 20px;
	margin-bottom: 20px;
}
button{
	
	font-size: 2vh;
	cursor: pointer;
}
p{
	color: white;
}

  #BigTb{

     width: 90%;
     height: 90%;
     position: absolute;
     top: 55%;
       left: 50%;
     transform: translate(-50%,-50%);
     color: red;
     border:3px solid #800000;
     padding-left: 4%;
     padding-right: 4%;
     padding-bottom: 0%;
     background: rgba(0, 0, 0, 0.9);
     overflow-y: none;
    }
.attackbtn{
  position: absolute;
  right: 80%;
  bottom: 70%;
  width: 10%;
  height: 10%;
  border: 1px solid red;
  background-color: black;
  box-shadow: -3px -3px 10px 0px red;
  color: red;
  cursor: pointer;
}
h3{
	padding-bottom: 2%;
}
#countries{
	height: 20%;
}
</style>
</head>
<body>

<nav>
	<div class="logo">

	</div>
	


<ul class="nav-links">
  <li><a href="process.php#war">HOME</a></li>
 
  <li><a  href="quantumcomputerdevelopement.php">Quantum computer development</a></li>
  <li><a  href="armament2.php">Armament</a></li>
  <li><a  href="cyberattack.php"  class="active">Cyber Attack</a></li>
  <li><a  href="spycard.php">Spycard</a></li>
<li><a href="alliance.php">Alliance</a></li>
 
  
</ul>


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

<transbox id="BigTb">

<p><?php echo $_SESSION['underattack'], $_SESSION['underattack']=""; ?><br><?php echo $_SESSION['valid'], $_SESSION['valid']=""; ?></p>
 <form method="post" action="cyber_upd.php">
   <h3>The cost of an attack is 100$(in billions)</h3>
   <input list="countries" name="countries" placeholder="Please select a country" ><br>
   <datalist list="countries" name="countries" id="countries">

      <?php 
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT username FROM Everything";
$sqll = "STOP IT";
$result = $conn->query($sqll);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  if ($row["username"] != $_SESSION['usern'] && $row["username"]!="Admin" && $row["username"]!="Chair") {
    # code...
  
echo "<option value=$row[username]>";
}
}
} else { echo "0 results"; }
$conn->close();
       ?>

    </datalist>
    <!-- <button type="submit" class="attackbtn" name="attackbtn">Submit Attack</button> -->

 </form>
  </transbox>
 



</body>
</html>