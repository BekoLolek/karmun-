
<!DOCTYPE html>
<html>
<head>
	<title>KarMUN</title>
	<link rel="stylesheet" type="text/css" href="processCSS1.css">
		
	<style type="text/css">
		html{
			background-image: url(https://www.gstatic.com/earth/social/00_generic_facebook-001.jpg);
			background-size: cover;
			overflow-y: hidden;
			font-family: Prime, Fallback, sans-serif;

		}
		@font-face{
			font-family: Prime;
			src:url("Prime-Regular.eot");
		}	

		
		.button{
			text-align: center;
			border:0px solid #24d9ff;
			background-color: rgba(34,119,138,0.8);
			border:1px solid black;
			width: 40%;

		}
		.page{
			width: 100%;
			height: 100%;
			position: relative;
			left: 0.5%;
			border: 0px solid red;
			background-color: rgba(0,0,0,0.9);
			border-bottom: 1px solid #24d9ff;

		}
		.page:last-child{
			border-bottom: 0px solid red;
		}
		#transbox{
			position: absolute;
			top: 10%;
			left: 0.5%;
			width: 77%;
			height: 90%;
			border-top: 1px solid #24d9ff;
			overflow-y: scroll;
			

		}
		#notifications{
			position: absolute;
			top: 4%;
			right: 2%;
			height: 91%;
			width: 26%;
			background-color: rgba(0,0,0,0.5);
			border: 1px solid black;
		}
		#notifTable{
			color: white;
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			height:89%;
		}

		.img{
			width: 30%;
			height: 55%;
			position: relative;
			top: 10%;
			left: 35%;
		}
		
		.sidenav {
				  height: 90%;
				  width: 20%;
				  position: fixed;  
				  top: 5%;
				  right: 2%;
				  background-color: rgba(0,0,0,0.8);
				  overflow-x: hidden;
				  overflow-y: hidden;
				  padding-top: 60px;
				}
				.sidenav a:not(.anchorActive){

				  text-decoration: none;
				  padding-bottom: 6px;
				  padding-top: 6px;
				  text-align: center;
				  font-size: 20px;
				  color: #818181;
				  display: block;
				  transition: 0.3s;
				}

				.sidenav a:hover {
				  color: #f1f1f1;
				  background-color: #818181;
				}
				.nav-li{
				  display: block;
				  text-align: center;
				  height:100%;
				  flex-direction: column;
				  line-height: 500%;
				  list-style: none;


				}
				#ANCHOR{
					background-color: transparent;
					position: fixed;
					top: 18%;
					width: 10%;
					height: 5%;
				}
					nav {
				  display: flex;
				  justify-content: space-around;
				  align-items: center;
				  min-height: 8vh;
				  background-color: #151719;
				}
				.anchorActive{
					color: #f1f1f1;
				  background-color: #818181;
				  text-decoration: none;
				  padding-bottom: 6px;
				  padding-top: 6px;
				  text-align: center;
				  font-size: 20px;  
				  display: block;
				  transition: 0.2s;
				}	


	</style>
	<style type="text/css">
	
				#messageTB::-webkit-scrollbar {
				width: 10px;
				border:0px solid #24d9ff;
				background-color: transparent;
				}
				#messageTB::-webkit-scrollbar-track {
				background: transparent;
				}
				#messageTB::-webkit-scrollbar-thumb {
				background: #24d9ff;
				border:0px solid #24d9ff;
				}
				#messageTB::-webkit-scrollbar-thumb:hover {
				background: blue;
				}
				#messageTB::-webkit-srcollbar-track-piece{
				color: transparent;
				}

					::-webkit-scrollbar {
						width: 0px;
						border:0px solid #24d9ff;
						background-color: transparent;
					}
					::-webkit-scrollbar-track {
						background: transparent;
					}
					::-webkit-scrollbar-thumb {
						background: transparent;
						border:0px solid #24d9ff;
					}
					::-webkit-scrollbar-thumb:hover {
						background: transparent;
					}
					::-webkit-srcollbar-track-piece{
						background: transparent;
					}
				
	

				.page p{
					color: white;
					padding: 50px;
					font-size: 20px;
				}
				.grid-container{
					height: 100%;
					width: 100%;
					position: absolute;
					left: 0;
					padding: 0; margin: 0;
					
				}
				#welcomeTitle{

				}

	</style>
	<style type="text/css" name="war_and_comm_Style">
			
			.commLink{
				text-decoration: none;
				padding-bottom: 6px;
				padding-top: 6px;
				text-align: center;
				font-size: 30px;
				color: #818181;
				display: block;
				transition: 0.3s;
			}
			.warLink:hover{
				background-color: #818181;
				color: red;
				
			}
			.commLink:hover{
				background-color: #818181;
				color: red;
				
			}
			.warpageNav{
				list-style: none;
				justify-content: space-around;
				position: absolute;
				bottom: 5%;
				right: 5%;
				width: 40%;

			}
			.warpageNav li{
				height: 25%;
			}
			.warpageNav li a {
				padding: 5%;
			}
			#warText{
				position: absolute;
				top: 1%;
				width: 50%;
				left: 5%;
				padding: 5%;
			}
			#warText p {
				color: #24d9ff;
			}
			
	</style>
	<style type="text/css" name="country_matrix_Style">
				#matrixTransbox{
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					padding: 0;
					margin: 0;
					border: 0px;
					color: #24d9ff;
				}
				.inf{
					position: absolute;
					top: 2%;
					left: 2%;
					width: 47%;
					height: 80%;
					color: #24d9ff;
				}
				.status{
					position: absolute;
					top: 2%;
					right: 2%;
					width: 47%;
					height: 80%;
					color: #24d9ff;
				}
				.inf p {
					color: #24d9ff;
				}
				#enemies_country_matrix{
					color: red;
				}
	</style>
	<style type="text/css" name="warQuantumStyle">
		#quantumTable{
			position: absolute;
			top: 5%; left: 5%;
			height: 70%; width: 60%;
			color: red;
		}
		#quantumTable tr{
			width: 100%;
		}
		#quantumTable table tr th, #quantumTable tr td{
			color: red;
			border: 1px solid red;
			text-align: center;
			padding: 0; margin: 0;
			width: auto;
			padding-left: 20px;
			padding-right: 20px;
		}
		#btnUpgradeQuantum{
			position: absolute;
			right: 5%; top: 5%;
			background-color: transparent;
			border: 1px solid red;
			width: 10%; height: 8%;
			box-shadow: 3px 3px 10px 1px;
			color: red;
		}
	</style>	
	
</head>
<body>
<form action="process.php" method="POST">	
	<h4 id="welcomeTitle" style="color:#24d9ff; font-size: 30px;position: absolute;width: 40%; left: 30%; top:-2%; text-align: center;"><?php echo $_SESSION['usern']; ?></h4>
	<div id="ANCHOR"></div>
	
	<transbox id = "transbox" onscroll="changeSidenavColor()">
		
		<div id="processTb" class="grid-container">
			<div class="page grid-item" id="newsflash">
				

				<div id="newsflashModal" class="modal">
					<span class="close">&times;</span>
					<h3 id="srvbottom">Here you can construct a newsflash:</h3>
					<transbox id="surveytb" class="modal-content">
						<!-- <label class="switch ">
							<input id="surv" name="surv" type="checkbox" />						
							<span class="slider round" ></span>
							<span class="other round"></span>
						</label>
						<label class="secret">
							<input id="secr" name="secr" type="checkbox" />						
							<span class="goer around" ></span>
							<span class="stay around"></span>
						</label>	 -->	
						<p style="position: relative; top: -3%; left: 10%; color:#24d9ff;">Please include the term (short or long) and the type (secret or open) of the newsflash in the body of the newsflash!</p>		
						<textarea id="srvtxt" name="srvtxt" placeholder="Write your newsflash here:"></textarea>
						<button id="btnNews" name="btnNews">Submit Newsflash</button>
					</transbox>
				</div>
				
						<span id="myBtn">Newsflash sender</span>		
						<div class="messages">
							<transbox id= "messageTB">
								<table id="messTable">
									<tr>
										<th class="time">Type</th>
										<th class="adm">Admin</th>
										<th calss="mess">Message</th>
									</tr>
						
											<?php 
											if($cyber==0){
											$sql = "SELECT Type,Admin,Message,term  FROM Messaging WHERE Country='$notpermanentusername'" ;
											$sqll = "SELECT id,Time,Admin,Message,Country,term,Type FROM (SELECT * FROM Messaging  WHERE Country='$notpermanentusername' ORDER BY Time DESC) AS `i`  WHERE Country='$notpermanentusername' ORDER BY `i`.`Time` DESC";
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
							</transbox>
						</div>
				
			</div>
			<div class="page grid-item" id="countryMatrix">
				<div id="matrixTransbox">
	    			<h1 class="user"></h1>  
	    			<div class="inf">
	      				
	      				<!-- <p>Economic increase: <?php echo round($_SESSION["GDP"]*100); ?>%</p> -->
	      				<p><?php if ($connection->connect_error)
	      						{
	                 				die("Connection failed: " . $connection->connect_error);
	                			} 
	                 			$user=$_SESSION['usern'];
	                 			$cyber=0;
	                 			$sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
	                			$result2 = $connection->query($sql2);
	                			if ($result2->num_rows > 0)
	                			{
	               					while($row = $result2->fetch_assoc())
	               					{
	                					if($row["onoff"] == 1)
	                					{
	                    					$cyber=1;
	                					}else $cyber = 0;
	               					}
	               				}else echo "0 results";
	              				if($cyber != 0)
	              				{ 
	               					echo "<div class=money id=output2></div>";
	               				}
	               				else
	               				{
	               					// echo "<div class=money2>Your balance: "." <div class=money id=output></div>"."$ (in billions)</div>";
	               				}?></p>
	      			</div>
	      			<div class="status">
						<h2>Allies: </h2>
	 					<p><?php 
	                		if ($connection->connect_error) {
	                		 die("Connection failed: " . $connection->connect_error);
	                				} 
			                 $user=$_SESSION['usern'];
			                 $cyber=0;
			                 $sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
			                $result2 = $connection->query($sql2);
			                if ($result2->num_rows > 0) {
			               while($row = $result2->fetch_assoc()){
			                if($row["onoff"] == 1){
			                    $cyber=1;
			                }else $cyber = 0;
			               }
			               }
						     if($cyber == 0){
						  $ally=$_SESSION["usern"];
						  if ($connection->connect_error) {
						    die("Connection failed: " . $connection->connect_error);
						} 
						$sql = "SELECT username,$ally  FROM Alliances";
						$result = $connection->query($sql);
						if ($result->num_rows > 0) {  

						while($row = $result->fetch_assoc()) {
							if($row["$ally"]=='Allied'){
						echo  $row["username"]."<br>";
						}
						}
						echo "";
						} else { echo "None"; }
						}else{echo "You are under cyber attack";}?></p>

						<h2 id="enemies_country_matrix">Enemies: </h2>
							<p>
		 					 <?php
			                if ($connection->connect_error) {
			                 die("Connection failed: " . $connection->connect_error);
			                } 
			                 $user=$_SESSION['usern'];
			                 $cyber=0;
			                 $sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
			                $result2 = $connection->query($sql2);
			                if ($result2->num_rows > 0) {
			               while($row = $result2->fetch_assoc()){
			                if($row["onoff"] == 1){
			                    $cyber=1;
			                }else $cyber = 0;
			               }
			               }
	               			if($cyber == 0){
							  $ally=$_SESSION["usern"];
							  if ($connection->connect_error) {
							    die("Connection failed: " . $connection->connect_error);
							} 
							$sql = "SELECT username,$ally  FROM Alliances";
							$result = $connection->query($sql);
							if ($result->num_rows > 0) {  

							while($row = $result->fetch_assoc()) {
								
								if($row["$ally"]=='War'){
									echo $row["username"]."<br>";
								}
							}
							echo "";
							} else { echo "None"; }
							}else{echo "You are under cyber attack";}

							  ?></p>

					</div>

	  


				</div>
				
			</div>
			<div class="page grid-item" id="comms">				
				
				<div id="warText">
					
					<p>Press the button below.</p>
				</div>
				<ul class="warpageNav">		
					<li><a href="refreshing.php"  class="commLink">Communications</a></li>
				</ul>
			</div>
			
			<div class="page grid-item" id="moneyTransfer">
					<div id="moneyTransbox">
						<h4 class="here" style="color: #24d9ff;">Money Transfer will be available later in session.<br></h4>
					    <p class="user">
					    	<?php echo $_SESSION['a'], $_SESSION['a']=""; ?>
					    	<br>
					    	<?php echo $_SESSION['b'], $_SESSION['b']=""; ?>
					    	<?php echo $_SESSION['c'], $_SESSION['c']=""; ?>
					    	<?php echo $_SESSION['e'], $_SESSION['e']=""; ?>
					    </p>  
					    <div class="transfer">
					      	<div class="balance">
					        	
					      	</div>
					    	
					        	<input type="number" min="0" max="$_SESSION['d']" name="amount" placeholder="Amount..."><br>
					        	<input list="countries" name="countries" placeholder="Please select a country" ><br>
					        	<datalist id="countries">


					               <?php 
					                                    
					                            
					                            $sql9 = "SELECT username FROM Everything";
					                            $result9 = $connection->query($sql9);
					                           	while($row9 = mysqli_fetch_array($result9))
												{
					                               if($row9['username'] != "Admin" && $row9['username'] != "AdminNews" && $row9['username'] != "Chair" && $row9['username'] != $ctrName)
					                               {
					                               		echo "<option value=$row9[username]>".$row9['username']."</option>";
					                               }

					                               
					                            }
					                            if ( ($_POST['countries'] == "UK") or ($_POST['countries'] == "France") or ($_POST['countries'] == "Russia") or ($_POST['countries'] == "USA") or ($_POST['countries'] == "Sweden") or ($_POST['countries'] == "Netherlands") or ($_POST['countries'] == "Brazil") or ($_POST['countries'] == "PRC") or ($_POST['countries'] == "DPRK") or ($_POST['countries'] == "Iran") or ($_POST['countries'] == "Mexico") or ($_POST['countries'] == "Egypt") or ($_POST['countries'] == "Germany") or ($_POST['countries'] == "UAE") or ($_POST['countries'] == "Japan")){ if($_POST['countries'] != $_SESSION['usern']){ if($_POST['amount'] > 0)
					                            $_SESSION['mt_amount']=$_POST['amount'];
												$_SESSION['mt_country']=$_POST['countries'];
												$_SESSION['mt_oldmoney']=0;
												$_SESSION['mt_oldmoney2']=0;
												$_SESSION['mt_messTime']=date("H:i:s");
												$_SESSION['mt_user']=$_SESSION['usern'];
					                            	redirect('xxx_upd.php');
					                            }
					                            				                            
					                        }
					                        
					                 ?> 
					        	</datalist>
							<button type="Submit" id="SendMoney" name="SendMoney" value="Send">Send</button>
								      	
					    </div>
					    <div class="table1">
					    	<table class="recieved">    
					        	<tr>      
					          		<th>Time</th>
					          		<th>From</th>
					          		<th>Amount (billion)</th>
					       		</tr>
		       						<?php 
					                          
					                    
					                    $sql4 = "SELECT Time,Sender,Reciever,Amount FROM Money_Transfer";
					                    $result4 = $conn->query($sql4);
										
											while($row4 = $result4->fetch_assoc())
											{
					                        	if($row4['Reciever'] == $_SESSION['usern'])
					                        	{
					                            	echo "<tr><td>" . $row4['Time']. "</td><td>" . $row4['Sender'] . "</td><td>". $row4['Amount']."$"."</tr></td>";
					                        	}
					                        }
					                    
					                    


					                ?> 
					      	</table>
					    </div>
					    <div class="table2">
					      	<table class="sent">
					        	<tr>    
					         		 <th>Time</th>
					         		 <th>To</th>
					        		  <th>Amount (billion)</th>
					       		</tr>
								<?php 
					                    
					                    $sql5 = "SELECT Time,Sender,Reciever,Amount FROM Money_Transfer";
					                    $result5 = $conn->query($sql5);
					                    
						                    while($row5 = $result5->fetch_assoc())
						                    {
					                      		if($row5["Sender"] == $_SESSION['usern'])
					                      		{
					                        		echo "<tr><td>" . $row5["Time"]. "</td><td>". $row5["Reciever"]. "</td><td>" . $row5["Amount"]. "$" ."</tr></td>";
					                    		}
					                   		 }
					                    
					                    
					            ?> 
					      	</table>
					    </div>

					</div>		
			</div>
			
		</div>
		<div id="warTb" class="grid-container" hidden>
			<div class="page grid-item" id="quantumPage" style="border-top: 2px solid red; border-bottom: none;">
				<button id="btnUpgradeQuantum">Upgrade</button>
				<div id="quantumTable">
					<table id="">
						<tr>
							<th>Phase name</th>
							<th>Cost [$]</th>
							<th>Time [min]</th>
						</tr>
						<?php
							$sql = "SELECT quantumState FROM Everything WHERE username = '$user'";
							$result = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_assoc($result)){
								$maxState = $row["quantumState"];
							}
							
							$sql = "SELECT Construction, Cost, Timetaken, Construction_id FROM War WHERE Construction_id <= $maxState";
							$result = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_assoc($result)){
								if($row["Construction_id"] < $maxState){
									echo "<tr><td>".$row["Construction"]."</td><td>".$row["Cost"]."</td><td>Completed</td></tr>";
								}
								else{
									if($row["Construction_id"] == 7){
										echo "<tr><td>".$row["Construction"]."</td><td>".$row["Cost"]."</td><td>Final Stage Completed</td></tr>";
									}
									else{
										echo "<tr><td>".$row["Construction"]."</td><td>".$row["Cost"]."</td><td>".$row["Timetaken"]."</td></tr>";
									}
									
								}
								
							}
						?>
							
						

					</table>
				</div>			
			</div>
			<div class="page grid-item" id="armamentPage" style="border-top: 2px solid red; border-bottom: none;">
				
			</div>	
			<div class="page grid-item" id="cyberPage" style="border-top: 2px solid red;border-bottom: none;">
				
			</div>
			<div class="page grid-item" id="alliancePage" style="border-top: 2px solid red;border-bottom: none;">
				
			</div>	
			
		</div>
		
		<div id="mySidenav" class="sidenav" style="">
	  		<ul class="nav-li">
	    		<li><a id="newsflashNav" href="#newsflash" class="anchorActive">Newsflash Management</a></li>
	  			<li><a id="countryMatrixNav" href="#countryMatrix" >Country Matrix</a></li>
	  			<li><a id="commsNav" href="#comms" >Communications</a></li>
				<li><a id="moneyTransferNav" href="#moneyTransfer" >Money Transfer</a></li>
	  			<li><a id="warNav" href="#" onclick="toggleProcess();return false;">War Page</a></li>
	  		</ul>
		</div>
		<div id="warNavbar" class="sidenav" hidden>
	  		<ul class="nav-li">
	  			<li><a id="quantumNav" href="#quantum" class="warLink anchorActive">Quantum Computer Development</a></li>
				<li><a id="armamentNav" href="#armament" class="warLink">Armament</a></li>
				<li><a id="cyberNav" href="#cyber" class="warLink">Cyber Attack & Spycard</a></li>
				<li><a id="allianceNav" href="#alliance" class="warLink">Alliance</a></li>
	    		<li><a id="warNav" href="#" onclick="toggleWar();return false;">Home Page</a></li>
	  		</ul>
		</div>
		
		
	</transbox>

	<script type="text/javascript">



		function changeSidenavColor(){
			var anchor = document.getElementById('ANCHOR');
			var anchorHeightHeight = anchor.getBoundingClientRect().y;
			var pageHeight = document.getElementById('newsflash').offsetHeight;
			var sidenavItemsElements = [document.getElementById('newsflashNav'),
							document.getElementById('countryMatrixNav'),
							document.getElementById('commsNav'),
							document.getElementById('moneyTransferNav'),
							document.getElementById('warNav') ];

			var sidenavItems = [document.getElementById('newsflash').getBoundingClientRect().y,
								document.getElementById('countryMatrix').getBoundingClientRect().y,
								document.getElementById('comms').getBoundingClientRect().y,
								document.getElementById("moneyTransfer").getBoundingClientRect().y ];		

			var sidenavItemsHeights = [document.getElementById('newsflash').offsetHeight,
									   document.getElementById('countryMatrix').offsetHeight,
									   document.getElementById('comms').offsetHeight,
									   document.getElementById('moneyTransfer').offsetHeight];
			
		
			for (var i =0;i <  sidenavItems.length; i++) {
				if(sidenavItems[i] + pageHeight > anchorHeightHeight && sidenavItems[i] + sidenavItemsHeights[i] < anchorHeightHeight + pageHeight){
					sidenavItemsElements[i].classList.add("anchorActive");
				}
				else{
					if(sidenavItemsElements[i].classList.contains("anchorActive")){
						sidenavItemsElements[i].classList.remove("anchorActive");
					}
				}

			}
			var anchor = document.getElementById('ANCHOR');
			var anchorHeightHeight = anchor.getBoundingClientRect().y;
			var pageHeight = document.getElementById('quantumPage').offsetHeight;
			var sidenavWarItemsElements = [document.getElementById('quantumNav'),
							document.getElementById('armamentNav'),
							document.getElementById('cyberNav'),
							document.getElementById('allianceNav')];

			var sidenavWarItems = [document.getElementById('quantumPage').getBoundingClientRect().y,
								document.getElementById('armamentPage').getBoundingClientRect().y,
								document.getElementById('cyberPage').getBoundingClientRect().y,
								document.getElementById("alliancePage").getBoundingClientRect().y];		

			var sidenavWarItemsHeights = [document.getElementById('quantumPage').offsetHeight,
									   document.getElementById('armamentPage').offsetHeight,
									   document.getElementById('cyberPage').offsetHeight,
									   document.getElementById('alliancePage').offsetHeight ];
			
		
			for (var i =0;i <  sidenavWarItems.length; i++) {
				if(sidenavWarItems[i] + pageHeight > anchorHeightHeight && sidenavWarItems[i] + sidenavWarItemsHeights[i] < anchorHeightHeight + pageHeight){
					sidenavWarItemsElements[i].classList.add("anchorActive");
				}
				else{
					if(sidenavWarItemsElements[i].classList.contains("anchorActive")){
						sidenavWarItemsElements[i].classList.remove("anchorActive");
					}
				}

			}

		}	
		function changeWarSidenavColor(){
			var anchor = document.getElementById('ANCHOR');
			var anchorHeightHeight = anchor.getBoundingClientRect().y;
			var pageHeight = document.getElementById('newsflash').offsetHeight;
			var sidenavWarItemsElements = [document.getElementById('quantumNav'),
							document.getElementById('armamentNav'),
							document.getElementById('cyberNav'),
							document.getElementById('allianceNav')];

			var sidenavWarItems = [document.getElementById('quantumPage').getBoundingClientRect().y,
								document.getElementById('armamentPage').getBoundingClientRect().y,
								document.getElementById('cyberPage').getBoundingClientRect().y,
								document.getElementById("alliancePage").getBoundingClientRect().y];		

			var sidenavWarItemsHeights = [document.getElementById('quantumPage').offsetHeight,
									   document.getElementById('armamentPage').offsetHeight,
									   document.getElementById('cyberPage').offsetHeight,
									   document.getElementById('alliancePage').offsetHeight ];
			
		
			for (var i =0;i <  sidenavWarItems.length; i++) {
				if(sidenavWarItems[i] + pageHeight > anchorHeightHeight && sidenavWarItems[i] + sidenavWarItemsHeights[i] < anchorHeightHeight + pageHeight){
					sidenavWarItemsElements[i].classList.add("anchorActive");
				}
				else{
					if(sidenavWarItemsElements[i].classList.contains("anchorActive")){
						sidenavWarItemsElements[i].classList.remove("anchorActive");
					}
				}

			}

		}				//change sidenav color
	</script>
	<script type="text/javascript">
		var modal = document.getElementById("newsflashModal");

				// Get the button that opens the modal
				var btn = document.getElementById("myBtn");

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

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal) {
				    modal.style.display = "none";
				  }
				}//newsflash modal
	</script>
	<script type="text/javascript">
		function toggleProcess(){ //when war is to be displayed
			var processTb = document.getElementById("processTb");
			var warTb = document.getElementById("warTb");
			var processNav = document.getElementById("mySidenav");
			var warNavbar = document.getElementById("warNavbar");

			document.getElementById("welcomeTitle").style.color = "red";
			document.getElementById("transbox").style.borderTopColor = "red";

			warTb.hidden = false;
			warNavbar.hidden = false;
			processTb.hidden = true;
			processNav.hidden = true;
		}
		function toggleWar(){ //when process is to be displayed
			var processTb = document.getElementById("processTb");
			var warTb = document.getElementById("warTb");
			var processNav = document.getElementById("mySidenav");
			var warNavbar = document.getElementById("warNavbar");

			document.getElementById("welcomeTitle").style.color = "#24d9ff";
			document.getElementById("transbox").style.borderTopColor = "#24d9ff";

			warTb.hidden = true;
			warNavbar.hidden = true;
			processTb.hidden = false;
			processNav.hidden = false;
		}//toggle process and war		
	</script>

</body>
</html>