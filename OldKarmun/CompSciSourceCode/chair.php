<?php 
session_start();
include 'connection.php';
public class Queue {
		public $_values = array();
		public function enqueue($value){
			array_push($_values[], $value);
		}
		public function dequeue(){
			return array_shift($_values[]);
			
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
	<title>Chair</title>
	<link rel="stylesheet" type="text/css" href="processst.css">
	<script defer src="process.js"></script>

	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
		<style>
			html{
				background-color: black;
			}
						#transbox{
							
						width:100%;
						height:100%;
						overflow-x: scroll;
						}
						textarea{
							resize: none;
							background-color: transparent;
							color: #24d9ff;
						}
						table{
							width: 100%;
							position: absolute;
							left: 0; top: 0;
						}


						.smoll{
							width: 10%;
						}
						.big{
							width: 70%;
						}
						#tblMessages{
							position: absolute;
							top: 0;
							left: 0;
						}
						tr{
							width: 100%;
						}

		</style>
</head>
<body>

	<div id="transbox">  
		<div class="countrymessages">
  			<transbox id='messTB'> 
			<table id="tblMessages"> 		
    			<tr>     
    				<th class="smoll">Country</th>
					<th class="bigg">Country message</th> 
  				</tr>
  			<?php 

  				$queue = new Queue();

  				if ($connection->connect_error)
  				{
   					die("Connection failed: " . $connection->connect_error);
   				}
   				$user=$_SESSION['usern'];
   				$sql = "SELECT id,Time,Admin,Message,Country,term,Type, announced  FROM Messaging";
   				$sqll = "SELECT id,Time,Admin,Message,Country,term,Type, announced FROM (SELECT * FROM Messaging ORDER BY Time DESC) AS `i` ORDER BY `i`.`Time` DESC";
   				$result = $connection->query($sqll);
   				if ($result->num_rows > 0)
   				{
   					while($row = $result->fetch_assoc()) 
   					{
   						if($row["Admin"] == "Approved" && $row["announced"] == false)
   						{
   							$queue->enqueue($row["Message"]);
   							echo "<tr><td><textarea readonly class='tableid smol' href=process.css rows='8' cols='25'>" . $row["Country"] . "</textarea></td><td><textarea readonly class='tableid' href=process.css rows='8' cols='60'>" . $row["Message"] . "</textarea></td></tr>";
   							$_SESSION['mssg']= $row['Message'];
   						}
   					}
   				}
   				// $newestThreeQ = new Queue();
   				// for($i = 0; $i < 3; $i++){
   				// 	if(!$queue){
   				// 		return null;
   				// 	}
   				// 	else{
   				// 		$newestThreeQ->enqueue($queue->dequeue());
   				// 	}
   				// }

   			?> 
			</table>
			</transbox>
		</div>
	</div>
		
</body>
</html>