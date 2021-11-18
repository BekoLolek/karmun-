<?php 
session_start();
include 'connection.php';
if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}
$notpermanentusername = $_SESSION['usern'];
$country="";

if(isset($_GET["country"]))
{
  $country = $_GET["country"];
}
$country=$_SESSION["sessioncountry"];
$sender = $notpermanentusername;
if(isset($_POST['btnReply']))
{ 
  $receiver = $country;
  $message = $_POST["sendingmessage"];
  $time = time();
  $newstatus="read";
  $status="unread";
  $approved = 0;
  if(!$_POST["sendingmessage"]){
    //do nothing
  }
  else{
    $command = mysqli_query($connection,"INSERT INTO newmessaging (sender,receiver,message,time,approved,status) VALUES ('$sender','$receiver',\"$message\",'$time','$approved','$status');");
    $command2 = mysqli_query($connection,"UPDATE newmessaging SET status = 'read' WHERE receiver = '$sender' AND sender = '$receiver'");


    if (!$command) {
        die("Query failed: " .mysqli_error($connection) );
      }
      if (!$command2) {
        die("Query failed: " .mysqli_error($connection) );
      }
  }
  

}



?>  
<!DOCTYPE html>
<html>
<head>
  <title>Messaging</title>
  <script>
// after dom is loaded
(function() {
  // scroll all the way down
  $('html, body').scrollTop($(document).height() - $(window).height());
});
</script>            
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Communication</title>
<style>
*,
*::before,
*::after {
  margin: 0;
  border: 1%;
  padding: 0;
  word-wrap: break-word;
  box-sizing: border-box;
}

html,
body {
  height: 100%;
  background: black;

}

body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  line-height: 2;
  color: #808080;
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
}

.divMessage{
  max-width: 450px;
}
.plswork{
  max-width: 450px;
}
.cyber{
  text-align: center;
  color: white;
  font-size: 30px;
}




</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: 'POST',
                url: 'comm_ref.php',
                success: function(data){
                    $('#topContainer').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 100);  // it will refresh your data every 1 sec

    });
</script>
</head>
<body style="background-color:  #262626;">

<div id="mainContainer" style="height:95%; width: 100%; background-color: #262626;">
  <h2 style="text-align: center; color: white;"><?php echo "$country"; ?></h2>
  <div id="top" style="height: 80%; background-color: #262626;">
    <div id="topContainer" style=" background-color: #262626; ">
  
     
  </div>
  </div>

 

</body>
</html>