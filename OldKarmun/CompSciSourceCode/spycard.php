<?php 
session_start();
include 'connection.php';
$crtName=$_SESSION['usern'];
$spycard=$_SESSION['spycard'];
$notpermanentusername=$crtName;
function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}

$sql="SELECT spycard FROM Everything WHERE username='$crtName'";
          $result = $connection->query($sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $spycard=$row["spycard"];
      }
    }

$abrakadabra=[];
$abrakadabra = array( "France", "PRC", "Russia", "UK", "USA", "Mexico", "Netherlands", "Egypt", "Sweden", "Brazil", "UAE", "Iran", "DPRK", "Germany", "Japan","Admin" );


?>

<!DOCTYPE html>
<html>
<head>
  
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
   echo "(".$newmess.") Spycard";
}else echo "Spycard";
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
table{
  background-color: transparent;
  text-align: center;
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
  text-align: left;
  color: red;
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

table td{
  padding: 0px;
}

textarea.tableid{
  background-color: transparent;
  color: red;
  width: 100%;
  height: 70%;
  font-size: 14px;
  resize: none;
  border:1px solid #800000;
  
}
#messTB{
  width: 60%;
  height: 100%;
  position: absolute;
  display: flex;
  overflow-y: scroll;
  top: 50%;
  left: 70%;
  transform: translate(-50%,-50%);
  color: white;
  background-color: none;
}
#abrakadabra{
  position: absolute;
  border:2px solid #800000;
  color:red;
  width:15%;
  height: 6%;
  top: 2%;
  left: 12%;
  background-color: transparent;

}

#first{
  padding-bottom: 20px;
}

.btn{
  position: absolute;
	width: 10%;
	height: 11%;
	top: 20%;
	left: 0%;
	text-align: center;
	box-shadow: -2px -2px 10px 0px red;
	background-color: black;
	color: red;
	border:none;
	font-size: 100%;
	cursor: pointer;
}

#abrakadabra.option{
  background-color: transparent;
}
#second{
  position: absolute;
  border:2px solid #800000;
  color:red;
  width:15%;
  height: 6%;
  top: 10%;
  left: 12%;
  background-color: transparent;
}

#second.option{
  background-color: transparent;
}

#inp{
  position: absolute;
  left: 20%;
  
  height: 6%;
}
.option{
  background-color: transparent;
  color: red;
}

#selectctr{
  position: absolute;
  border:1px solid #800000; 
  top: 6%;
  left: 60%;
  text-align: center;
  background-color: transparent;
  color: red;
  resize: none;
}
#opti{
  background-color: transparent;
  color: red;
}

    #middleTB{

     width: 80%;
     height: 90%;
     position: absolute;
     top: 55%;
       left: 50%;
     transform: translate(-50%,-50%);
     color: white;
     border:3px solid #800000;
     padding-left: 4%;
     padding-right: 4%;
     padding-bottom: 0%;
     background: rgba(0, 0, 0, 0.9);
     overflow-y: none;
    }

.table2{
display: flex;
}
.tdc{
  padding: 0px;
}

table{
  width: 100%;
  text-align: center;
  margin: 0 0 0 0;
  left: 5%;
  right: 5%;
  background: white;
}

.message-sent,
.message-received {
  clear: both;


}

.message-sent::before,
.message-received::before,
.message-sent::after,
.message-received::after {
  content: '';
  display: table;
}

header,
section,
footer {
  padding: 2em;
}

.center {
  max-width: 80em;
  margin-right: auto;
  margin-left: auto;
}

[class^='grid-'] {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

[class^='grid-'] {
  -webkit-flex-direction: row;
  -ms-flex-direction: row;
  flex-direction: row;
}

.grid-message >[class^='col-'] {
  margin-top: 1em;
  margin-right: 1em;
}

.grid-message >[class^='col-']:nth-child(-n + 1) {
  margin-top: 0;
}

.grid-message >[class^='col-']:nth-child(1n) {
  margin-right: 0;
}

.col-message-sent {
  margin-left: calc(8.33333333% + 0.08333333em) !important;
}

.col-message-received {
  margin-right: calc(8.33333333% + 0.08333333em) !important;
}

.col-message-sent,
.col-message-received {
  width: calc(91.66666667% - 0.08235677em);
}

.message-sent,
.message-received {
  margin-top: 0.0625em;
  margin-bottom: 0.0625em;
  padding: 0.25em 1em;
}

.message-sent p,
.message-received p {
  margin: 0;
  line-height: 1.5;
}

.message-sent {

  float: right;
  color: white;
  background-color: #4d0000;
  border-radius: 1em 0.25em 0.25em 1em;
}

.message-sent:first-child {
  border-radius: 1em 1em 0.25em 1em;
}

.message-sent:last-child {
  border-radius: 1em 0.25em 1em 1em;
}

.message-sent:only-child {
  border-radius: 1em;
}

.message-received {
  float: left;
  color: black;
  background-color: lightgray;
  border-radius: 0.25em 1em 1em 0.25em;
}

.message-received:first-child {
  border-radius: 1em 1em 1em 0.25em;
}

.message-received:last-child {
  border-radius: 0.25em 1em 1em 1em;
}

.message-received:only-child {
  border-radius: 1em;
}

.message-box {
  margin-top: 1em;
  padding: 1em 0.5em;
  border-top-width: 0.0625em;
  border-style: solid;
  border-color: lightgray;
  color: darkgray;
}

.message-box p {
  margin: 0;
  line-height: 1.5;
}

.col-message-sent {
  margin-top: 0.25em !important;
}

.col-message-received {
  margin-top: 0.25em !important;
}

.message {
  /*min-height: 53.33203125em;*/  
  max-width: 30em;
  /* !!!!!!!!!! COMMENT OUT THIS LINE TO MAKE IT FULL WIDTH !!!!!!!!!! */
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;

}

.stext{
resize: none;
background-color: #4d0000;
border:none;
color: white;
overflow-y: hidden;
min-height: 100%;
max-width: 100%;

}

#mainContainer {
  display: table;
  height: 100%;
  width: 75%;
  background: #262626;
}
#top{
  display: table-row;
  background-color: #262626;
}
#topContainer {
  display: table-cell;
  border: 1px;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 100%;
  background-color: grey;
}
#bottom{
  display: table-row;
}
#bottomContainer {
  display: table-cell;
  border: 1px;
  bottom: 100px;
  left: 0px;
  height: 100px;
  width: 100%;
}
#messagingarea{
  color: white; 
  background-color: #262626;
  width: 600px;
}
.plswork{
  max-width: 400px;
}
.comon{
  display: flex;
  justify-content: space-between;
  font-size: 26px;
  border-bottom: 1px solid white;
}
  </style>
  <?php include "scrollbar.php" ?>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
     
    
  </script>
  </head>
<body>
<nav>
  <div class="logo">

  </div>
  


<ul class="nav-links">
   <li><a href="process.php#war">HOME</a></li>
  <!-- <li><a  href="nuclearreactordevelopement.php?war_group=1">Nuclear reactor development</a></li>
  <li><a  href="nuclearreactordevelopement.php?war_group=2">Nuclear bomb development</a></li> -->
  <li><a  href="quantumcomputerdevelopement.php">Quantum computer development</a></li>
  <li><a  href="armament2.php">Armament</a></li>
  <li><a  href="cyberattack.php">Cyber Attack</a></li>
  <li><a  href="spycard.php" class="active">Spycard</a></li>
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




  <form method="post">
  <transbox id="middleTB">
    
      <div id="first">
      	<br><p>First:</p>
    <select id="abrakadabra" name="abrakadabra">
      <?php 

        foreach($abrakadabra as $abra){
          if($abra!=$crtName){
          echo "<option style='background-color:transparent' value='".$abra."'>".$abra."</option>";
        }
      }
        
      ?>
    </select>
  </div>
  <div class="second2">
  	<p>Second:</p>
    <select id="second" name="second">
      <?php 

        foreach($abrakadabra as $abra){
          if($abra!=$crtName){
          echo "<option style='background-color:transparent' value='".$abra."'>".$abra."</option>";
        }
      }
        
      ?>
    </select>
  </div>
    
    <div>
   <button id="inp" class="btn" type="submit" name="inp"> Submit</button>
    </div>
    
    <div class="countrymessages">
    <transbox id='messTB'> <div class="table2">
 <table id="messagingarea">
    <tr>
      <th class="comon"><?php echo "<div>".$_POST["abrakadabra"]."</div>";
      echo " <div>".$_POST["second"],"</div>";?></th>
    </tr>
  <?php
  $select=$_POST["abrakadabra"];
  $select2=$_POST["second"];
  if(isset($_POST['imp'])){
  if($spycard > 0){
    $sql = "SELECT message,sender,receiver FROM newmessaging WHERE ((sender='$select' and receiver='$select2') OR (sender='$select2' and receiver='$select'))";
  

  $result = $connection->query($sql);
  if (!$result) {
    die("Query failed: <br><br><br> " .mysqli_error($connection)."<br>" );
  }

  if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    if($row["sender"]==$select2){  
      echo nl2br("<selection class='message'><div class='center'><div class='grid-message'><tr class='message-sent'><td><div class=plswork>"
       . $row["message"]. 
   
      "</div></td></tr></div></div></selection>");
    }
    elseif($row["sender"]==$select){ 
      echo nl2br("<selection class='message'><div class='center'><div class='grid-message'><tr class='message-received'><td><div class=plswork>"
       . $row["message"]. 
      "</div></td></tr></div></div></selection>");
    }
    else{
      echo "<tr><td>Ain't works \n".$sender.$country.$notpermanentusername."</td></tr>";
    }
  }
  echo "</table>";

  } else { echo ""; }
}else {
  $message="You have no spycards left!!!";
  echo "<script> alert('$message'); </script>";
}
redirect("spycard.php");
}

  ?>
  </table>
  </div>
  </transbox>
  
</div>
 <?php
$newspy = $spycard-1;
if(isset($_POST["inp"])){
  if($spycard>0){
$command=mysqli_query($connection,"UPDATE Everything SET spycard = '$newspy' WHERE username = '$crtName'");
}
}
?>

</form>


</body>
</html>