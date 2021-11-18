<?php 
session_start();
include 'connection.php';
include 'outh.php';
  date_default_timezone_set('Europe/Budapest');
function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}
$ctrName=$_SESSION['usern'];
$abrakadabra = array( "France", "PRC", "Russia", "UK", "USA", "Mexico", "Netherlands", "Egypt", "Sweden", "Brazil", "UAE", "Iran", "DPRK", "Germany", "Japan" );
$coma=mysqli_query($connection,"SELECT Tanks,Soldiers,Airforce,Navalforce FROM strength WHERE username='$ctrName'");
$countall=mysqli_fetch_array($coma);
$planecount=$countall['Airforce'];
$shipcount=$countall['Navalforce'];
$soldiercount=$countall['Soldiers'];
$tankcount=$countall['Tanks'];

$a=0;

$sql = "SELECT username FROM Alliances WHERE $ctrName='Ally'";
    $result = $connection->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      ${"ally$a"}=$row['username'];
        $a++;

}
}
$allyship=0;
$allytank=0;
$allysoldier=0;
$allyplane=0;

for ($i=0; $i < $a; $i++) { 
$sql = "SELECT Tanks,Soldiers,Airforce,Navalforce FROM strength WHERE username='${"ally$i"}'";
    $result = $connection->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $allyship=$allyship+$row['Navalforce'];
    $allytank=$allytank+$row['Tanks'];
    $allyplane=$allyplane+$row['Airforce'];
    $allysoldier=$allysoldier+$row['Soldiers'];
}
}
}

$command1 = mysqli_query($connection, "SELECT tanktime, shiptime, planetime, soldiertime FROM armament WHERE username = '$ctrName'");
$times = mysqli_fetch_array($command1);
$tanktime = $times['tanktime'];
$shiptime = $times['shiptime'];
$planetime = $times['planetime'];
$soldiertime = $times['soldiertime'];

if(isset($_POST['tank'])){
  if((strtotime($tanktime)-time())<0){
  $_SESSION['armament'] = "tank";
redirect("armament_help.php");
}else {$_SESSION{'timeprob'}="It hasn't been completed yet!";}
} 
if(isset($_POST['ship'])){
if((strtotime($shiptime)-time())<0){
  $_SESSION['armament'] = "ship";
redirect("armament_help.php");
}else {$_SESSION{'timeprob'}="It hasn't been completed yet!";}
} 
if(isset($_POST['plane'])){
if((strtotime($planetime)-time())<0){
  $_SESSION['armament'] = "plane";
redirect("armament_help.php");
}else {$_SESSION{'timeprob'}="It hasn't been completed yet!";}
} 
if(isset($_POST['soldier'])){
if((strtotime($soldiertime)-time())<0){
  $_SESSION['armament'] = "soldier";
redirect("armament_help.php");
}else {$_SESSION{'timeprob'}="It hasn't been completed yet!";}
} 

?>

<!DOCTYPE html>
<html>
<head>
  
  <title><?php  
  $newmess=0;

  $sql = "SELECT status FROM newmessaging WHERE receiver='$ctrName'";
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
   echo "(".$newmess.") Armament";
}else echo "Armament";
?></title>
<link rel="stylesheet" type="text/css" href="warstyle2.css">


  <style type="text/css">
    body{
       background-image: url(https://wallpaperaccess.com/full/204728.jpg);
       background-repeat: repeat;
     background-color: #cccccc;
     height: 100%;  
       background-repeat: repeat;
     background-size: cover;
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
p {
  text-align: right;
  font-family: Arial;
  font-size:55px;
  margin-top: 0px;
  position: absolute;
  top: 10%;
  right: 3%;
  color: white;
}
::-webkit-scrollbar {
  width: 10px;
 border:1px solid #800000;
}
::-webkit-scrollbar-track {
  background: #000000;
}
::-webkit-scrollbar-thumb {
  background: #9A9A9A;
  border:1px solid #800000;
}
::-webkit-scrollbar-thumb:hover {
  background: #9A9A9A;
}
::-webkit-srcollbar-track-piece{
  color: black;
}
  


#middletb{ 
     width: 35%;
     height: 50%;
     position: absolute;
     top: 75%;
       left: 81.5%;
     transform: translate(-50%,-50%);
     color: red;
     border:3px solid #800000;
     padding-left: 4%;
     padding-right: 4%;
     padding-bottom: 0%;
     background: rgba(0, 0, 0, 0.9);
     overflow-y: none;
}
#smalltb{
       width: 35%;
     height: 35%;
     position: absolute;
     top: 27.5%;
       left: 81.5%;
     transform: translate(-50%,-50%);
     color: red;
     border:3px solid #800000;
     padding-left: 4%;
     padding-right: 4%;
     padding-bottom: 0%;
     background: rgba(0, 0, 0, 0.9);
     overflow-y: none;

}


    #bigtb{

     width: 60%;
     height: 90%;
     position: absolute;
     top: 55%;
       left: 31.5%;
     transform: translate(-50%,-50%);
     color: red;
     border:3px solid #800000;
     padding-left: 4%;
     padding-right: 4%;
     padding-bottom: 0%;
     background: rgba(0, 0, 0, 0.9);
     overflow-y: none;
    }
#bigtable{
position:absolute;
top:0%;
left:0%;
width:100%;
height:30%;
color:red;
background-color:black;
border: 1px solid #800000;
border-bottom:3px solid #800000;
text-align:center;
border-collapse:collapse;
}
table{
border-bottom:3px solid #800000;
}
th,td{
height:20%;
border: 1px solid #800000;
}
.unique{
border:0px solid red;
}
th,td{height:16.6%;}
#smalltable{
  position:absolute;
  top:0%;
  left:0%;
  width:100%;
  height:100%;
  color:red;
  background-color:black;
  border: 1px solid #800000;
  text-align:center;
  border-collapse:collapse;

}
.bottom{
border-bottom:3px solid #800000;
}
.top{
border-top:3px solid #800000;
}
button{
width:90%;
height:80%;
color:#000000;
background-color:#B00000;
border-color:#D10000;
} 
.notcomplete{
  font-size: 20px;
  padding-top: 10px;
position: absolute;
left: 0px;
}

.timeprob{
  position: absolute;
  bottom: 55%;
  left: 2%;
  font-size: 30px;
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
button{
  cursor: pointer;
}
button:hover{
  opacity: 0.9;
}

  </style>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
     
  </script>
  </head>
<body>

<input type="hidden" value="<?php if(isset($_POST["tank"])){echo $res;}?>" id="tanktime"/>

<?php
   $rand=rand();
   $_SESSION['random']=$rand;
  ?>
 <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />



<form method="POST">
<transbox id="bigtb">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: 'POST',
                url: 'soldier_ref.php',
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
                url: 'tank_ref.php',
                success: function(data){
                    $('#output3').html(data);
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
                url: 'ship_ref.php',
                success: function(data){
                    $('#output4').html(data);
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
                url: 'plane_ref.php',
                success: function(data){
                    $('#output2').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  // it will refresh your data every 1 sec

    });
</script>
<div>
<table id="bigtable">
<tr>    
<th>Button</th>
<th>Type</th>
<th>Quantity</th>
<th>Cost [Billion $]</th>
<th>Completion Time</th>      
</tr>


<tr>
<td><button type="submit" id="ship" name="ship">Build</button></td><td>Ships</td><td>25</td><td>59</td><td ><div id=output4></div></td>
</tr>

<tr>
<td><button type="submit" id="tank" name="tank">Build</button></td><td>Tanks</td><td>50</td><td>30</td><td ><div id=output3></div></td>
</tr>

<tr>
<td><button type="submit" id="plane" name="plane">Construct</button></td><td>Airplanes</td><td>100</td><td>25</td><td ><div id=output2></div></td>
</tr>

<tr>
<td><button type="submit" id="soldier" name="soldier">Recruit</button></td><td>Soldiers</td><td>1000</td><td>10</td><td> <div id=output ></div></td>
</tr>


</table>
</div>

<?php echo "<div class=timeprob >".$_SESSION{'timeprob'}."</div>";  $_SESSION{'timeprob'}="";?>
</transbox>

<transbox id='smalltb'>
<table id="smalltable">
<tr>
<th>Ships</th><th>Tanks</th><th>Airplanes</th><th>Soldiers</th>
</tr>
<tr>
<td class="bottom"><?php echo $shipcount;?></td><td class="bottom"><?php echo $tankcount;?></td><td class="bottom"><?php echo $planecount;?></td><td class="bottom"><?php echo $soldiercount;?></td>
</tr>
<tr>
<th class="unique"></th>
</tr>
<tr>
<th class="unique">Alliance:</th>
</tr>
<tr>
<th class="top">Ships</th><th class="top">Tanks</th><th class="top">Airplanes</th><th class="top">Soldiers</th>
</tr>
<tr>
<td><?php echo $allyship;?></td><td><?php echo $allytank;?></td><td><?php echo $allyplane;?></td><td><?php echo $allysoldier;?></td>
</tr>



</table>

</transbox>
<transbox id="middletb">
<div>
<p id="Stoppwatch">Stopwatch</p>
</div>

</transbox>

</form>

<nav>
  <div class="logo">

  </div>
  


<ul class="nav-links">
   <li><a href="process.php#war">HOME</a></li>
  
  <li><a  href="quantumcomputerdevelopement.php">Quantum computer development</a></li>
  <li><a href="armament2.php"class="active">Armament</a></li>
<?php 
  $conn=$connection;
  $ctrName=$_SESSION['usern'];
  $sql = mysqli_query($conn,"SELECT construction_id ,war_group,username FROM War_Country WHERE username='$ctrName'");
  if ($conn->affected_rows == 0){
    echo "probelms";
  }
$check=0;
if ($conn->affected_rows !=  0) {
while($row = $sql->fetch_assoc()) {
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

 <li><a  href="alliance.php">Alliance</a></li>
</ul>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="nav-li">
   <li><a href="process.php#war">HOME</a></li>
  <!--<li><a  href="nuclearreactordevelopement.php?war_group=1">Nuclear reactor development</a></li>
  <li><a  href="nuclearreactordevelopement.php?war_group=2">Nuclear bomb development</a></li>-->
  <li><a  href="nuclearreactordevelopement.php?war_group=3">Quantum computer development</a></li>
  <li><a href="armament2.php"class="active">Armament</a></li>
<?php 
  $conn=$connection;
  $ctrName=$_SESSION['usern'];
  $sql = mysqli_query($conn,"SELECT construction_id ,war_group,username FROM War_Country WHERE username='$ctrName'");
  if ($conn->affected_rows == 0){
    echo "probelms";
  }
$check=0;
if ($conn->affected_rows !=  0) {
while($row = $sql->fetch_assoc()) {
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
$conn->close();
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




<script id="stopwatch">



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