<<?php 
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>KarMUN</title>
	<link rel="stylesheet" type="text/css" href="processCSS.css">
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
			width: 79%;
			height: 100%;
			position: relative;
			left: 0.5%;
			border: 1px solid red;
			background-color: rgba(0,0,0,0.9);

		}
		#transbox{
			position: absolute;
			top: 10%;
			left: 0%;
			width: 100%;
			height: 90%;
			border: 0px solid red;
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
  right: 0%;
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
  font-size: 25px;
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
  font-size: 25px;  
  display: block;
  transition: 0.3s;
}	


	</style>
<style type="text/css">
	::-webkit-scrollbar {
  width: 10px;
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
  color: transparent;
}

.page p{
	color: white;
	padding: 50px;
	font-size: 20px;
}


</style>


	
</head>
<body>
	<form method="post" >
	<h4 style="color:#24d9ff; font-size: 30px;position: absolute;width: 40%; left: 30%; top:-2%; text-align: center;">Welcome [COUNTRY]!</h4>
	<div id="ANCHOR"></div>
	
<transbox id = "transbox" onscroll="changeSidenavColor()">
	
	<div class="grid-container">
		<div class="page grid-item" id="newsflash">
			<!-- <img class ="img" src="images/newsflash.png"> -->

			<div id="newsflashModal" class="modal">
				<span class="close">&times;</span>
				<h3 id="srvbottom">Here you can construct a newsflash:</h3>
				<transbox id="surveytb" class="modal-content">
					<label class="switch ">
						<input id="surv" name="surv" type="checkbox" />						
						<span class="slider round" ></span>
						<span class="other round"></span>
					</label>
					<label class="secret">
						<input id="secr" name="secr" type="checkbox" />						
						<span class="goer around" ></span>
						<span class="stay around"></span>
					</label>				
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
									<th class="adm">Term</th>
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
						  "</textarea></td><td><textarea rows='6' readonly class='tableid tim' style='color:#24d9ff;'>" . $row["term"].
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
				<img class ="img" src="images/coutrymatrix.png">
				<br>
				Country Matrix
			
		</div>
		<div class="page grid-item" id="comms">
				<img class ="img" src="images/comunications.jpg">
				<br>
				Communications
			
		</div>
		
		<div class="page grid-item" id="moneyTransfer">
				<div id="moneyTransbox">
				    <p class="user"></p>  
				    <div class="transfer">
				      	<div class="balance">
				        	<h4 class="here">Here you can send money to other countries!<br>
				           		
				        	</h4>
				      	</div>
				    	<form method="post" action="xxx_upd.php">
				        	<input type="number" min="0" max="$_SESSION['d']" name="amount" placeholder="Amount..."><br>
				        	<input list="countries" name="countries" placeholder="Please select a country" ><br>
				        	<datalist id="countries">
				               
				        	</datalist>
				        	<button type="Submit" id="Send" name="Send" value="Send">Send</button>
				      	</form>
				    </div>
				    <div class="table1">
				    	<table class="recieved">    
				        	<tr>      
				          		<th>Time</th>
				          		<th>From</th>
				          		<th>Amount (billion)</th>
				       		</tr>
	       				
				      	</table>
				    </div>
				    <div class="table2">
				      	<table class="sent">
				        	<tr>    
				         		 <th>Time</th>
				         		 <th>To</th>
				        		  <th>Amount (billion)</th>
				       		</tr>
							
				      	</table>
				    </div>

				</div>		
		</div>
		<div class="page grid-item" id="war">
				<img class ="img" src="images/war.png">
				<br>
				War
			
		</div>
		
	</div>
	
	<div id="mySidenav" class="sidenav" style="">
  		<ul class="nav-li">
    		<li><a id="newsflashNav" href="#newsflash" class="anchorActive">Newsflash Management</a></li>
  			<li><a id="countryMatrixNav" href="#countryMatrix" >Country Matrix</a></li>
  			<li><a id="commsNav" href="#comms" >Communications</a></li>
			<li><a id="moneyTransferNav" href="#moneyTransfer" >Money Transfer</a></li>
  			<li><a id="warNav" href="#war" >War</a></li>
  		</ul>
	</div>
	<!-- <div class="sidenavClosed">
		<ul>
			<li><img class ="img" src="images/newsflash.png"></li>
			<li><img class ="img" src="images/coutrymatrix.png"></li>
			<li><img class ="img" src="images/comunications.jpg"></li>
			<li><img class ="img" src="images/dollarsign.png"></li>
			<li><img class ="img" src="images/war.png"></li>
		</ul>
	</div> -->
	
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
								document.getElementById("moneyTransfer").getBoundingClientRect().y,
								document.getElementById('war').getBoundingClientRect().y ];		

			var sidenavItemsHeights = [document.getElementById('newsflash').offsetHeight,
									   document.getElementById('countryMatrix').offsetHeight,
									   document.getElementById('comms').offsetHeight,
									   document.getElementById('moneyTransfer').offsetHeight,
									   document.getElementById('war').offsetHeight ];
			
		
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

		}				
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
				}
	</script>
</form>
</body>
</html>