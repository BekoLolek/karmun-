<?php 
session_start();
include 'connection.php';
include 'outh.php';
$conn=$connection;
$abrakadabra = array( "France", "PRC", "Russia", "UK", "USA", "Mexico", "South Africa", "India", "Ukraine", "Iran", "UAE", "Germany", "Japan", "Brazil", "DPRK" );
$ctrName=$_SESSION['usern'];
$user=$ctrName;
$notpermanentusername=$user;
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

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,
  initial-scale=1.0">
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
   echo "(".$newmess.") Alliance";
}else echo "Alliance";
?></title>
<link rel="stylesheet" type="text/css" href="warstyle2.css">
  <script defer src="process.js"></script>


  <style type="text/css">
    body{
       background-image: url(https://wallpaperaccess.com/full/204728.jpg);
       background-repeat: repeat;
     background-color: #cccccc;
     height: 100%;  
       background-repeat: repeat;
     background-size: cover;
     overflow-y:scroll;
      }
table{
  background-color: transparent;
  text-align: center;
  color: white;
} 

.alliance{
border: 1px solid #800000;
border-collapse:collapse;
width:100%;
font-size:15px;

} 
.alliance td,th{
border: 1px solid #800000;
text-align:center;
padding:5px;

}

.inform{
padding:5px;
}

.secretally{
padding-top:5px;
font-size:28px;
height:5px;
}
td.War{
  color: red;
}
td.Ally{
  color: cyan;
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
#tblMessages{
  text-align: center;
  color: red;
}
.declare{
  padding-bottom: 14px;
  padding-top: 14px;
  font-size: 20px;
  
}
input{
  width: 300px;
  font-size: 20px;
}
button{
  font-size: 20px;
  cursor: pointer;
}
button:hover{
  opacity: 0.9;
}
.peace{
  padding-bottom: 14px;
}
.normal{
  padding-top: 14px;
  padding-bottom: 14px;
  font-size: 20px;
}

.declare2{
  padding-bottom: 14px;

}

.righter{
 display: inline-grid; 
 padding-right: 30px;
}
.lefter{
  display: inline-grid;
}
button{
  border: 2px solid #800000;
  background-color: black;
  box-shadow: -1px -1px 10px 0px #8000000;
  color: white;
  cursor: pointer;
}

    #middleTB{

     width: 90%;
     height: 105%;
     position: absolute;
     top: 63%;
       left: 50%;
     transform: translate(-50%,-50%);
     color: white;
     border:3px solid #800000;
     padding-left: 0%;
     padding-right: 4%;
       background: rgba(0, 0, 0, 0.9);
     
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

.Peace{
  color:chartreuse;
}


@media screen and (max-width: 550px){
.alliance{
  font-size: 4px;
  overflow-x: scroll;
}
#middleTB{
height:140%;
top:80%;
overflow-y:visible;
}
.alliance td,th{
border: 1px solid #800000;
text-align:center;
padding:1px;
}
.alliance th{
  background-color: red;
}
input{
width:40%;
font-size:10px;

}
button{
width:40%;
font-size:10px;
}
.secretally{
font-size:10px;
top:26%;
}

.normal{
padding:1px;

}

.declare{
padding:1px;
}


}
.cyber{
  text-align: center;
  font-size: 30px;
  padding-top: 20px;
  padding-bottom: 30px;
}
.peace, .declare2, .normal, .alliance2, .no{
  display: inline-grid;
}



  </style>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
     
    
  </script>
  </head>
<body>



  <form method="post" action="alliance_upd.php">

  <transbox id="middleTB">
    
    <table class="alliance">
      <tr>
        <th>Countries</th>
        <?php
         if($cyber == 0){
        for ($i=0; $i < count($abrakadabra); $i++) { 
          
          echo "<th>". $abrakadabra[$i] ."</th>";
        }
        ?>
      </tr>
<?php
 
      $sql = "SELECT * FROM Alliances";
$result = $conn->query($sql);
if ($result->num_rows > 0) {  

while($row = $result->fetch_assoc()) {

echo "<tr>";

foreach ($row as $field => $value){
  if($value == 'War'){
     echo "<td class=War>". $value . "</td>";
  }else if ($value == 'Allied'){
    echo "<td class=Ally>". $value . "</td>";
  }else if ($value == 'Peace'){
    echo "<td class=Peace>". $value . "</td>";
  }
  else echo "<td>". $value . "</td>";
}
  

echo "</tr>";
}
}
}else {echo "<p class=cyber > You are under cyber attack!</p>";}
?>
    </table>

<p ><?php echo $_SESSION['under']; $_SESSION['under']=""; echo $_SESSION['valid']; $_SESSION['valid']=""; ?></p>

<div class="secretally">
  <p>Your Secret Ally is:<br></p>
  <p><?php

$noally=0;
    $sql = "SELECT username,$user FROM AlliancesSecret";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if($row[$user] == 'Secret'){
$noally=1;
echo $row['username']."<br>";
}
}
} 
if($noally==0)echo "You have no Secret Allies!";

  ?>
  </p>
</div>

<!-- <div class="declare">

<div class="righter">
    <div class="declare2">
        <input  list="countries" name="Warcountry" placeholder="Please select a country" >
        <datalist list="countries" name="countries" id="countries">
            <?php
                for ($i=0; $i < count($abrakadabra); $i++)
                {
                    echo "<option>". $abrakadabra[$i] ."</option>";
                }
                ?>     
        </datalist>
        <button type="submit" class="attackbtn" name="declarebtn">Declare War</button>
    </div>

    <div class="alliance2">  
        <input list="countries" name="alliance" placeholder="Please select a country" >
        <datalist list="countries" name="alliance" id="alliance">
            <?php 
                for ($i=0; $i < count($abrakadabra); $i++)
                {
                    echo "<option>". $abrakadabra[$i] ."</option>";
                }
                ?>
        </datalist>    
        <button type="submit" class="alliancebtn" name="alliancebtn">Make Secret Alliance</button>
    </div>

    <div class="normal">
        <input list="countries" name="normal" placeholder="Please select a country" >
        <datalist list="countries" name="normal" id="normal">
            <?php          
                for ($i=0; $i < count($abrakadabra); $i++)
                {
                    echo "<option>". $abrakadabra[$i] ."</option>";
                }
            ?>
        </datalist>        
        <button type="submit" class="normalbtn" name="normalbtn">Make Normal Alliance</button>
    </div>


</div>

<div class="lefter">
    <div class="peace">
        <input list="peace" name="peace" placeholder="Please select a country" >
        <datalist list="countries4" name="peace" id="peace">
            <?php          
                for ($i=0; $i < count($abrakadabra); $i++)
                {
                    echo "<option>". $abrakadabra[$i] ."</option>";
                }
            ?>
        </datalist>
        <button type="submit" class="peacebtn" name="peacebtn">Make Peace</button>
    </div>

    <div class="no">
        <input list="no" name="no" placeholder="Please select a country" >
        <datalist list="countries5" name="no" id="no">
            <?php          
                for ($i=0; $i < count($abrakadabra); $i++)
                {
                    echo "<option>". $abrakadabra[$i] ."</option>";
                }
            ?>
        </datalist>
        <button type="submit" class="noalliancebtn" name="noalliancebtn">Break alliance</button>
    </div>

    
</div>
</div> -->


  </transbox>
</form>

<nav>
  <div class="logo">

  </div>
  


<ul class="nav-links">
   <li><a href="process.php#war">HOME</a></li>
  <!-- <li><a  href="quantumcomputerdevelopement.php">Quantum computer development</a></li>
  <li><a  href="armament2.php">Armament</a></li> -->
<?php 
  $conn=$connection;
  $sql = "SELECT construction_id,war_group FROM War_Country WHERE username='$ctrName'";
  $result = $conn->query($sql);
if (!$result) {
  die("Query failed: <br><br><br> " .mysqli_error($conn)."<br>" );
}
$check=0;
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if($row['war_group'] == 3 && $row['construction_id']==6){
    $check=1;
     // echo "<li><a href=cyberattack.php>Cyber Attack</a></li>";
     // echo "<li><a href=spycard.php>Spycard</a></li>";
    break;
  }
}
}
if($check==0){
  // echo "<li class=cyberattack onclick=\"alert('You need to upgrade Quantum Computer to level 6 first!!!');\"> Cyberattack</li>";
  // echo "<li class=spycard onclick=\"alert('You need to upgrade Quantum Computer to level 6 first!!!');\">Spycard</li>";
}
?>
  <li><a  href="alliance.php" class="active">Alliance</a></li>
  </ul>
  
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="nav-li">
   <li><a href="process.php">HOME</a></li>
  <!-- <li><a  href="nuclearreactordevelopement.php?war_group=1">Nuclear reactor development</a></li>
  <li><a  href="nuclearreactordevelopement.php?war_group=2">Nuclear bomb development</a></li>
  <li><a  href="nuclearreactordevelopement.php?war_group=3">Quantum computer development</a></li>
  <li><a  href="armament2.php">Armament</a></li> -->
<?php 
  $conn=$connection;
  $sql = "SELECT construction_id,war_group FROM War_Country WHERE username='$ctrName'";
  $result = $conn->query($sql);
if (!$result) {
  die("Query failed: <br><br><br> " .mysqli_error($conn)."<br>" );
}
$check=0;
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if($row['war_group'] == 3 && $row['construction_id']==6){
    $check=1;
     // echo "<li><a href=cyberattack.php>Cyber Attack</a></li>";
     // echo "<li><a href=spycard.php>Spycard</a></li>";
    break;
  }
}
}
if($check==0){
  // echo "<li class=cyberattack onclick=\"alert('You need to upgrade Quantum Computer to level 6 first!!!');\"> Cyberattack</li>";
  // echo "<li class=spycard onclick=\"alert('You need to upgrade Quantum Computer to level 6 first!!!');\">Spycard</li>";
}
?>
  <li><a  href="alliance.php" class="active">Alliance</a></li>
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
?>


</body>
</html>