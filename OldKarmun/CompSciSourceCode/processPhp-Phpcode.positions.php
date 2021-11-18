<p class="user"><!-- <?php echo $_SESSION['a'], $_SESSION['a']=""; ?><br><?php echo $_SESSION['b'], $_SESSION['b']=""; ?><?php echo $_SESSION['c'], $_SESSION['c']=""; ?><?php echo $_SESSION['e'], $_SESSION['e']=""; ?> --></p> 


<h4 class="here">Here you can send money to other countries!<br>
				           		<!-- <?php 
				                    
				                    if ($conn->connect_error) {
				                     die("Connection failed: " . $conn->connect_error);
				                    } 
				                     $user=$_SESSION['usern'];
				                     $cyber=0;
				                     $sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
				                    $result2 = $conn->query($sql2);
				                    if ($result2->num_rows > 0) {
				                   while($row = $result2->fetch_assoc()){
				                    if($row["onoff"] == 1){
				                        $cyber=1;
				                    }else $cyber = 0;
				                   }
				                   }else echo "0 results";
				                   if($cyber == 0){ 
				                    echo "<div class=money id=output></div>";
				                  }else { echo "<div class=money2>Your balance: "." <div class=money id=output2></div>"."$ (in billions)</div>";}
				     
				                   ?> -->
				        	</h4>



<datalist id="countries">
				               <!--  <?php 
				                                      
				                                if ($conn->connect_error) {
				                                  die("Connection failed: " . $conn->connect_error);
				                              } 
				                              $sql = "SELECT username,Money FROM Everything";
				                              $result = $conn->query($sql);
				                              if ($result->num_rows > 0) {

				                              while($row = $result->fetch_assoc()) {
				                                if ($row["username"] != $_SESSION['usern'] && $row["username"]!="Admin" && $row["username"]!="Chair") {
				                                  # code...
				                                
				                              echo "<option value=$row[username]>";
				                              }
				                              }
				                              } else { echo "0 results"; }

				                                     ?> -->
				        	</datalist>




				        	<table class="recieved">    
				        	<tr>      
				          		<th>Time</th>
				          		<th>From</th>
				          		<th>Amount (billion)</th>
				       		</tr>
	       				<!--    <?php 
				                          
				                        if ($conn->connect_error) {
				                            die("Connection failed: " . $conn->connect_error);
				                        } 
				                        $sql = "SELECT Time,Sender,Reciever,Amount FROM Money_Transfer";
				                        $result = $conn->query($sql);


				                        if ($result->num_rows > 0) {

				                        while($row = $result->fetch_assoc()) {
				                          if($row["Reciever"] == $_SESSION['usern']){
				                            echo "<tr><td>" . $row["Time"]. "</td><td>" . $row["Sender"] . "</td><td>"
				                         . $row["Amount"]."$"."</tr></td>";
				                        }
				                        }


				                        } else { echo "0 results"; }


				                          ?> -->
				      	</table>




				      	<table class="sent">
				        	<tr>    
				         		 <th>Time</th>
				         		 <th>To</th>
				        		  <th>Amount (billion)</th>
				       		</tr>
							<!--   <?php 
				                      
				                    if ($conn->connect_error) {
				                        die("Connection failed: " . $conn->connect_error);
				                    } 
				                    $sql = "SELECT Time,Sender,Reciever,Amount FROM Money_Transfer";
				                    $result = $conn->query($sql);


				                    if ($result->num_rows > 0) {

				                    while($row = $result->fetch_assoc()) {
				                      if($row["Sender"] == $_SESSION['usern']){
				                        echo "<tr><td>" . $row["Time"]. "</td><td>". $row["Reciever"]. "</td><td>" . $row["Amount"]. "$" ."</tr></td>";
				                    }
				                    }


				                    } else { echo "0 results"; }


				                      ?> -->
				      	</table>