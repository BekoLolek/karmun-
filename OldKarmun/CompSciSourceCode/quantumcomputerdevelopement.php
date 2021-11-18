<?php 
session_start();
echo "hello world";
include 'connection.php';
include 'outh.php';
$conn=$connection;
function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}
header("refresh: 30");
$notpermanentusername = $_SESSION['usern']; 
if(isset($_GET["war_group"]))
{
  $notpermanentwar_group = $_GET["war_group"];
}
else
{
  die();
}

if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}

$command = "SELECT max(Construction_id) as maxid FROM War WHERE war_group = $notpermanentwar_group;";
$query = mysqli_query($connection,$command);
if (!$query) {
  die("Query failed: " .mysqli_error($connection) );
}
if ( $connection->affected_rows > 0 ){
  $row= $query->fetch_assoc(); 
  $max_war_stage=$row["maxid"];
}
else
{
   $max_war_stage=0;
}

function mydate($epoch){
  if (($epoch-time()) > 3600 && $epoch > 0){ $check=1; $time = ($epoch-time()-3600); return date('h:i:s', $time); }
  elseif (($epoch-time()) < 3600 && $epoch-time() > 0 && $epoch > 0){ $check=1; $time = ($epoch-time()); return date('i:s', $time); }
  elseif(($epoch-time()) < 0 && $epoch > 0){$check= 0; return "Completed";}
  else {return "Not yet completed";}
};




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
   echo "(".$newmess.") Upgrades";
}else echo "Upgrades";
?></title>
	<script defer src="process.js"></script>
	<link rel="stylesheet" type="text/css" href="warstyle2.css"><style>
.first{
  position: all;
}

body{
  background-image: url(https://wallpaperaccess.com/full/204728.jpg);
  background-color: #cccccc;
  height: 100%;
  background-size: cover;
  font-family: Arial;
  
}

table {
  font-family: arial, sans-serif;
  color: red;
  border-collapse: collapse;
  width: 50%;
  position: relative;
  
  }

td, th {
  border: 1px solid green;
  text-align: left;
  padding: 8px;
}
th {
	text-align: center;
	font-size: 19px;
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

.button {
	position: absolute;
	right: 15%;
	bottom: 25%;
	width: 70%;
	height: 50%;
	border: 1px solid rgba(95, 204, 0, 1);
	background-color: black;
	box-shadow: -7px -7px 8px 0px rgba(95, 204, 0, 1);
	color: rgba(68, 129, 14, 1);
	cursor: pointer;
	font-size: 40%;
}

}
.button:hover{
opacity:0.8;
cursor:pointer;
}
#table {
	position: relative;
	top: 0%;
	left: -8%;
	width: 116%;
	height: 100%;
	background-color: transparent;
	color: rgba(95, 204, 0, 1);

}
#bigtrans{
	width: 60%;
    height: 90%;
    position: absolute;
    top: 55%;
    left: 68.5%;
    transform: translate(-50%,-50%);
    color: rgba(95, 204, 0, 1);
    border:3px solid rgba(68, 129, 14, 1);
    padding-left: 4%;
    padding-right: 4%;
    padding-bottom: 0%;
    background: rgba(0, 0, 0, 0.9);
    overflow-y: none;
}
#middletrans{ 
    width: 35%;
    height: 50%;
    position: absolute;
    top: 75%;
    left: 19.5%;
    transform: translate(-50%,-50%);
    color: red;
    border:3px solid rgba(68, 129, 14, 1);
    padding-left: 4%;
    padding-right: 4%;
    padding-bottom: 0%;
    background: rgba(0, 0, 0, 0.9);
    overflow-y: none;
}
#smalltrans {
	width: 35%;
    height: 35%;
    position: absolute;
    top: 27.5%;
    left: 19.5%;
    transform: translate(-50%,-50%);
    color: red;
    border:3px solid rgba(68, 129, 14, 1);
    padding-left: 4%;
    padding-right: 4%;
    padding-bottom: 0%;
    background: rgba(0, 0, 0, 0.9);
    overflow-y: none;
    font-family: Arial;
    font-size: 55px;

}
p {
  text-align: right;
  font-size:60px;
  margin-top: 0px;
  position: absolute;
  top: 10%;
  right: 3%;
  color: rgba(95, 204, 0, 1);
}

.spycard{
	display: block;
  color: white;
  text-align: center;
  padding: 14px 10px;
  text-decoration: none;
  cursor: pointer;
  font-size: 14px;
}
.cyberattack{
	display: block;
  color: white;
  text-align: center;
  padding: 14px 10px;
  text-decoration: none;
  cursor: pointer;
  font-size: 14px;
}
.spycard:hover:not(.active) {
  background-color: #111;
}
.cyberattack:hover:not(.active) {
  background-color: #111;
}

</style>
</head>
<body id="body">



<?php
//function evolve(){
if (isset($_POST['stage1']))
{
  $nextstage = 1;

}
elseif (isset($_POST['stage2']))
{
  $nextstage = 2;
} 
elseif (isset($_POST['stage3']))
{
  $nextstage = 3;
} 
elseif (isset($_POST['stage4']))
{
  $nextstage = 4;
} 
elseif (isset($_POST['stage5']))
{
  $nextstage = 5;
} 
elseif (isset($_POST['stage6']))
{
  $nextstage = 6;
} 
elseif (isset($_POST['stage7']))
{
  $nextstage = 7;
} 
elseif (isset($_POST['stage8']))
{
  $nextstage = 8;
} 
elseif (isset($_POST['stage9']))
{
  $nextstage = 9;
} 
elseif (isset($_POST['stage10']))
{
  $nextstage = 10;
} 
elseif (isset($_POST['stage_final']))
{
  //$nextstage = 10;
  //what should we do here???
  $nextstage=0;
} 
elseif (isset($_POST['stage_ongoing']))
{
  //$nextstage = 10;
  //what should we do here???
  $nextstage=0;
} 
else
$nextstage=0;

if ($nextstage>0) {


        $query_cost = mysqli_query($conn,"SELECT Cost, Timetaken FROM War WHERE Construction_id='$nextstage' AND war_group='$notpermanentwar_group'");
        if ( $conn->affected_rows == 0 )
            {
              $message="War table is empty";
             echo "<script> alert('$message'); </script>";
            }
            
        $row= $query_cost ->fetch_assoc(); 
        $developementcost=$row["Cost"];
        $developementtime = $row["Timetaken"];

        $query = "SELECT Money,GDP FROM Everything WHERE username = '$notpermanentusername' ";
        $query_money = mysqli_query($conn,$query);
        if (!$query_money) {
              die("Query failed: " .mysqli_error($conn) );
            }
        if ( $conn->affected_rows == 0 )
            {
              $message="MSG3".$notpermanentusername.$query;

              echo "<script> alert('$message'); </script>";
            }

        $row=$query_money ->fetch_assoc();
         $sessionmoney=$row["Money"];
	       $GDP=$row["GDP"];

        //$developementcost = (int)$developementcost;
        //$developementcost = intval($developementcost);
        //$sessionmoney = intval($_SESSION["Money"])
        $newmoney = $sessionmoney-$developementcost;
	
	$newGDP=$GDP+($GDP * 0.05);
        

        if ($developementcost<$sessionmoney) {

            $completion_time = time() + $developementtime;
            $command = mysqli_query($conn,"INSERT INTO War_Country (username, Construction_id, completion_time, war_group) VALUES ('$notpermanentusername', $nextstage, $completion_time, $notpermanentwar_group) ;");
            if (!$command) {
              die("Query failed: " .mysqli_error($conn) );
            }
            $command = mysqli_query($conn,"UPDATE Everything SET Money=$newmoney WHERE username= '$notpermanentusername' ");
	    	$command2 = mysqli_query($conn,"UPDATE Everything SET GDP=$newGDP WHERE username= '$notpermanentusername' ");
            if (!$command) {
              die("Query failed: " .mysqli_error($conn) );
            }
           

           redirect("nuclearreactordevelopement.php?war_group=".$notpermanentwar_group);
        }
        else {
          $message = "Your financial status does not allow you this upgrade!  \\n $sessionmoney is less than $developementcost! \\n user: $notpermanentusername ";
          echo "<script>alert('$message');</script>";
        }
            

} 
?>


<form method=post>
<transbox id="smalltrans">
  <?php 
          if (!$connection) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $query = mysqli_query($connection,"SELECT completion_time, Construction_id FROM War_Country WHERE username='$notpermanentusername' AND war_group='$notpermanentwar_group' and Construction_id = ( SELECT max(Construction_id) FROM War_Country WHERE username='$notpermanentusername'AND war_group='$notpermanentwar_group')  ");

        if ( $connection->affected_rows == 0 )
            {
                $current_phase = 0;
            }
        $row= $query ->fetch_assoc(); 
        $completion_time=$row["completion_time"];
        $current_phase = $row["Construction_id"];

if ($current_phase < $max_war_stage){
  if (time() > $completion_time){
        $button_name = "stage".($current_phase+1);
        $button_value = "Upgrade to phase".($current_phase+1);
      }
      else
      {
        $button_name = "stage_ongoing";
        $button_value = "Still upgrading to phase".($current_phase);

      }
}
else
{
        $button_name = "stage_final";
        $button_value = "No more phase to upgrade";
}
     echo '<input  type="submit" class="button" name="'.$button_name.'" value="'.$button_value.'">'; 

  ?>
</transbox>
</form>      
<transbox id="bigtrans">
<table id= "table">
   <tr>
    
      <th>#</th>
      <th>Construction Phase</th>
      <th>Cost [10^9$]</th>
      <th>Time [s]</th>
      <th>Remaining time</th>
    
  </tr>

<?php 
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "
SELECT Construction,Cost,Timetaken, completion_time  
FROM War LEFT OUTER JOIN 
(SELECT * FROM War_Country WHERE War_Country.username='$notpermanentusername') as wc
ON (War.war_group = wc.war_group and War.Construction_id = wc.Construction_id) 
WHERE War.war_group='$notpermanentwar_group' ";

$result = $conn->query($sql);
if (!$result) {
  die("Query failed: <br><br><br> " .mysqli_error($conn)."<br>" );
}

if ($result->num_rows > 0) {
$counter=1;
while($row = $result->fetch_assoc()) {
echo "<tr><td>".$counter."</td><td>" . $row["Construction"]. "</td><td>"
. $row["Cost"]. "</td><td>" .$row["Timetaken"]."</td><td>".
 mydate($row["completion_time"])
 ."</td></tr>";
 $counter++;
}
echo "</table>";
} else { echo "0 results"; }

  ?>

</table>
</transbox>
<transbox id="middletrans">
<p id="Stoppwatch">Stopwatch</p>
</transbox>
<nav>
	<div class="logo">
		<h4>War</h4>

	</div>
	<script>
  	function click(){
  		alert("You need to upgrade Quantum computer to level 7 first!!!");
  	}
  </script>


<ul class="nav-links">
  <li><a href="process.php">HOME</a></li>
  <!-- <li><a <?php if ($notpermanentwar_group==1) {echo "class=\"active\"";} ?> href="nuclearreactordevelopement.php?war_group=1">Nuclear reactor development</a></li>
  
  <li><a <?php if ($notpermanentwar_group==2) {echo 'class="active"';} ?> href="nuclearreactordevelopement.php?war_group=2">Nuclear bomb development</a></li>	 -->
  <li><a <?php if ($notpermanentwar_group==3) {echo 'class="active"';} ?> href="nuclearreactordevelopement.php?war_group=3">Quantum computer development</a></li>
  <li><a href="armament2.php">Armament</a></li>
<?php 
  $conn=$connection;
  $sql = "SELECT construction_id,war_group FROM War_Country WHERE username='$notpermanentusername'";
  $result = $conn->query($sql);
if (!$result) {
  die("Query failed: <br><br><br> " .mysqli_error($conn)."<br>" );
}

$check=0;
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if($row['war_group'] == 3 && $row['construction_id']==6){
    $check=1;
     echo "<li><a href=cyberattack.php>Cyber Attack</a></li>";
     echo "<li><a href=spycard.php>Spycard</a></li>";
    break;
  }
}
}
if($check==0){
  echo "<li class=cyberattack onclick=\"alert('You need to upgrade Quantum Computer to level 6 first!!!');\"> Cyberattack</li>";
  echo "<li class=spycard onclick=\"alert('You need to upgrade Quantum Computer to level 6 first!!!');\">Spycard</li>";
}
?>
  <li><a href="alliance.php" >Alliance</a></li>
</ul>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="nav-li">
   <li><a href="process.php">HOME</a></li>
  
  <li><a class="active" href="nuclearreactordevelopement.php?war_group=3">Quantum computer development</a></li>
  <li><a href="armament2.php">Armament</a></li>
<?php 
  $conn=$connection;
  $sql = "SELECT construction_id,war_group FROM War_Country WHERE username='$notpermanentusername'";
  $result = $conn->query($sql);
if (!$result) {
  die("Query failed: <br><br><br> " .mysqli_error($conn)."<br>" );
}

$check=0;
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if($row['war_group'] == 3 && $row['construction_id']==6){
    $check=1;
     echo "<li><a href=cyberattack.php>Cyber Attack</a></li>";
     echo "<li><a href=spycard.php>Spycard</a></li>";
    break;
  }
}
}
if($check==0){
  echo "<li class=cyberattack onclick=\"alert('You need to upgrade Quantum Computer to level 6 first!!!');\"> Cyberattack</li>";
  echo "<li class=spycard onclick=\"alert('You need to upgrade Quantum Computer to level 6 first!!!');\">Spycard</li>";
}
?>
  <li><a href="alliance.php" >Alliance</a></li>
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



<script>
// Set the date we're counting down to
var countDownDate = new Date("Mar 13, 2020 18:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("Stoppwatch").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("Stoppwatch").innerHTML = "End of the session";
  }
}, 1000);
</script>



</body>
</html>
