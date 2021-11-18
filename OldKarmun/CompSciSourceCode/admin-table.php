<?php
session_start();
include('connection.php');

  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		html{
			background-color: black;
		}
		#messTable{
	position: absolute;
	top: 10%; left: 0; 
	color: #24d9ff;
	width: 100%;
	text-align: center;
	background-color: transparent;
	border: 1px solid #24d9ff;

}
#messageTB{
	position: absolute;
	height: 85%;
	width: 90%;
	top: 12%;
	left: 5%;
	border: 0px solid #24d9ff;
	overflow-y: scroll;
	overflow-x:auto; 
	color: #24d9ff;
	background-color: transparent;
	
}
#messTable tr td textarea{

	background-color: transparent;
	width: 100%;
}
	</style>
	
}
</head>
<body>
	<table id="messTable">
								<tr>
									<th class="time">Type</th>
									<th class="adm">Admin</th>
									<th calss="mess">Message</th>
								</tr>
					
										<?php 
										if($cyber==0){
										$sql = "SELECT Type,Admin,Message,term  FROM Messaging " ;
										$sqll = "SELECT id,Time,Admin,Message,Country,term,Type FROM (SELECT * FROM Messaging  ORDER BY Time DESC) AS `i` ORDER BY `i`.`Time` DESC";
										$result = mysqli_query($connection,$sqll);
										if ($result->num_rows > 0) 
										{
											while($row = $result->fetch_assoc())
											{
												echo "<tr><td><textarea readonly rows='6' class='tableid tim' style='color:#24d9ff;'>" . $row["Type"].
												 "</textarea></td><td><textarea rows='6' readonly style='color:#24d9ff;' class='tableid ad' >" . $row["Admin"] .
												   "</textarea></td><td><textarea rows='6' style='color:#24d9ff;' readonly class='tableid mes' >". $row["Message"]."</textarea></tr></td>";									
											}
										}
										else
										{
											
											echo "<tr><td>No messages</td></tr>";
										}
										}else {echo "<p class=cyber >You are under cyber attack!</p>";}
									?>	
							</table>

							<p><a href="admin.php">Back to admin page.</a></p>
</body>
</html>