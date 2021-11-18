<?php 
session_start();
include 'outh.php';
//include 'connection.php';

function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}
$result = mysqli_query($connection,"SELECT * FROM Messaging WHERE Admin='Waiting for admin.'");
$row = mysqli_fetch_assoc($result);
$ids=$row['id'];

if(isset($_POST['approve']))
{
	$update = mysqli_query($connection, "UPDATE Messaging SET Admin='Approved' WHERE id='$ids'");
	$update2 = mysqli_query($connection, "UPDATE Messaging SET Approved='Yes' WHERE id='$ids'");
	redirect("admin.php");
}

if(isset($_POST['decline']))
{	
		$adminmessage = "Disapproved";
		$upload = mysqli_query($connection,"UPDATE Messaging SET Admin='Disapproved'  WHERE id='$ids' ");
		if (!$upload) {
	    	die("Query failed: " .mysqli_error($connection) );
	    }
	    redirect("admin.php");

}
if(isset($_POST['rephrase']))
{	
		$adminmessage = "Rephrase yourself";
		$upload = mysqli_query($connection,"UPDATE Messaging SET Admin='Rephrase yourself'  WHERE id='$ids' ");
		if (!$upload) {
	    	die("Query failed: " .mysqli_error($connection) );
	    }
	    redirect("admin.php");

}


if($_SESSION["connection"] == "up"){
	$serverStatus = "Server is running.";
}
if($_SESSION["connection"] == "down"){
	$serverStatus = "Server is  not running.";
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="refresh" content="5" />
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
	<script type="text/javascript" name="inp">document.getElementById("dropdownList").innerHTML;="<?php $phpvar="'+javavar+'";echo $phpvar;?>";</script>
</head>

<body>
<style type="text/css">
	html{
		background-color: black;
	}

	h4 a {
		text-decoration: none;
		color: white;
		clear: none;
	}
	table{
		position: absolute;
		top: 0; left: 0;
		width: 65%;
		height: 40%;
		color: white;
		border-bottom: 1px solid #24d9ff;
		border-right: 1px solid #24d9ff;
		margin: none;
		padding: none;
		
	}
	#buttons{
		position: absolute;
		top: 40%;
		left: 0%;
		height: 40%;
		width: 30%;
		border-bottom: 0px solid #24d9ff; 
	}
	#approve{
		position: absolute;
		width: 39.5%;
		height: 35%;
		top: 10%;
		left: 5%;
		box-shadow: -3px -3px 10px 0px #24d9ff;
		background-color: transparent;
		color: #24d9ff;
		border:none;
	}
	#decline{
		position: absolute;
		width: 39.5%;
		height: 35%;
		top: 10%;
		right: 5%;
		box-shadow: -3px -3px 10px 0px #24d9ff;
		background-color: transparent;
		color: #24d9ff;
		border:none;
	}
	#rephrase{
		position: absolute;
		top: 55%;
		right: 5%;
		width: 90%;
		height: 35%;
		box-shadow: -3px -3px 10px 0px #24d9ff;
		background-color: transparent;
		color: #24d9ff;
		border:none;
	}
		th, td, tr{
			color: #24d9ff;
			border: 1px solid #24d9ff;
		}
		th{
			height: 15%;
			color: #24d9ff;
		}
		.short{
			width: 10%;
		}
		#transboxx{
			position: absolute;
			width: 98%;
			height: 90%;
			top: 10%;
			left: 1%;
			border: 1px solid #24d9ff;
			background-color: rgba(0,0,0,0.8);
		}
		textarea{
			position: absolute;
			width: 54.5%;
			height: 83%;
			right:  2;
			bottom: 2;
			background-color: transparent;
			border: none;
			color: #24d9ff;
		}
		button{
			cursor: pointer;
		}
		button:hover{
			opacity: 0.6;

		}
		#remaining{
			color: white;
			position: absolute;
			left: 30%;
			top: 45%;
			color: #24d9ff;
		}
		#allNews{
			position: absolute;
			top: 10%;
			right: 5%;
			font-size: 20px;
		}
		.notshort{
			width: 40%;
		}
		#resetData{
			position: absolute;
			bottom: 0;
			right: 0;
			width: 10%;
			height: 12%;
			
		}
		#serverstatus{
			position: absolute;
			bottom: 20%;
			right: 0;
			color:#24d9ff;
		}
		
		button a{
			text-decoration: none;
			color: red;
		}
		.resetModal {
		  display: none;
		  position: fixed; 
		  z-index: 1; 
		  left: 10%;
		  top: 10%;
		  width: 80%; 
		  height: 80%; 
		  overflow: none; 
		  background-color: rgb(0,0,0);
		  background-color: rgba(0,0,0,0.4);
		  border: 2px solid #24d9ff ;
		  background-color: black;
		}
		.modal-content {
		  background-color: #fefefe;
		  margin: 15% auto;  15% from the top and centered 
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		}
		  .close {
		  color: #24d9ff;
		  border: none;
		  position: absolute;
		  top: 1%; right: 1%;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #24d9ff;
		  text-decoration: none;
		  border: none;
		  cursor: pointer;
		}
		.actualReset{
			position: absolute;
			top: 2%;
			left: 5%;
			width: 10%;
			height: 8%;
			border: 1px solid #24d9ff;
			background-color: black;
			box-shadow: 2px -2px 10px 0px #24d9ff;
			color: #24d9ff;
			cursor: pointer;
			text-align: center;
			line-height: 140%;
			

		}
</style>
<style type="text/css">
	/* The switch - the box around the slider */
		.switch {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		}

		/* Hide default HTML checkbox */
		.switch input {
		  opacity: 0;
		  width: 0;
		  height: 0;
		}

		/* The slider */
		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: red;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: green;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px green;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}
</style>
<form method="POST" action="admin.php">
	<div id="transboxx">
		<p id="serverstatus"><?php echo $serverStatus; ?></p>
	<div style="width: 60%;" >		
		<table>
			<tr>
				<th>Time</th>
				<th>Country</th>
				<th>Class</th>
				<th>Newsflash</th>
			</tr>
			<tr>
			<?php
			$rowDateTime = explode(" ",$row['Time']);			
			$rowTotal = $rowDateTime[0]."\n".$rowDateTime[1];
			echo "<td class='short'>".$rowTotal."</td><td class='short'>".$row['Country']."</td><td class='short'>".$row['term']."</td><td class='notshort'><textarea readonly cols='20' rows='6'>".$row['Message']."</textarea></td>";

			
			 ?>
			</tr>
		</table>
	</div>
		<div id="buttons">
			<button type="submit" name="approve" id="approve">Approve</button>
			<button type="submit" name="decline" id="decline">Disapprove</button>
			<button type="submit" name="rephrase" id="rephrase">Rephrase yourself</button>
		</div>
		<div>
			<p id="remaining">Remaining:<?php echo mysqli_num_rows($result);?></p>
		</div>
		<div id="resetData">
			<label class="switch">
			  	<input type="checkbox" id="resetCheck" checked= <?php echo $serverBool; ?> >
			  	<span class="slider"></span>
			</label>	
		</div>
		
		<a id="allNews" href="admin-table.php">All newsflashes</a>

	</div>
	
	

		
			
</form>
	
	<script type="text/javascript" value="messageJS">
		var messageJS = document.getElementById("dropdownList").value;
		

		var modal = document.getElementById("resetModalId");

				// Get the button that opens the modal
				var btn = document.getElementById("resetData");

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks on the button, open the modal
				btn.onclick = function() {
				  modal.style.display = "block";
				}

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				  modal.style.display = "none";
				}
	</script>

	<script>
			    if ( window.history.replaceState ) {
			        window.history.replaceState( null, null, window.location.href );
			    }
	</script>
		<?php
			   $rand1=rand();
			   $_SESSION['rand1']=$rand1;
			   
			 ?>

 <input type="hidden" value="<?php echo $rand1; ?>" name="randomchecker" />



</body>
</html>