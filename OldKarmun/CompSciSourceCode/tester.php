<?php 
	include("connection.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h4>AAAAAAAAAAAAAAAAAAAAAAAAAAAA</h4>
<table class="sent">
				        	<tr>    
				         		 <th>Time</th>
				         		 <th>To</th>
				        		  <th>Amount (billion)</th>
				       		</tr>
							<?php 
				                    
				                    $sql5 = "SELECT Time,Sender,Reciever,Amount FROM Money_Transfer";
				                    $result5 = $conn->query($sql5);
				                    if ($result5->num_rows5 > 0)
				                    {
					                    while($row5 = $result5->fetch_assoc())
					                    {
				                      		if($row5["Sender"] == $_SESSION['usern'])
				                      		{
				                        		echo "<tr><td>" . $row5["Time"]. "</td><td>". $row5["Reciever"]. "</td><td>" . $row5["Amount"]. "$" ."</tr></td>";
				                    		}
				                   		 }
				                    }
				                    
				            ?> 
				      	</table>
				      	<h4>AAAAAAAAAAAAAAAAAAAAAAAAAAAA</h4>
</body>
</html>