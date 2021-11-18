<?php
session_start();
//$abrakadabra = array("Brazil", "DPRK", "France", "Germany", "India", "Iran", "Japan", "Mexico", "PRC", "Russia", "South Africa", "UAE", "UK", "Ukraine", "USA");
//Brazil,DPRK,France,Germany,India,Iran,Japan,Mexico,PRC,Russia,South Africa,UAE,UK,Ukraine,USA

$user = $_SESSION['usern'];

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel= "stylesheet" media="all" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="processPhpCss.css">
    
	<title>KarMUN</title>
	
	
	


</head>

<body>
	<form action="process.php" method="POST">
		
		<div id="ANCHOR"></div>
		
		<nav class="navbar navbar-expand bg-dark navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand active mx-5" href="process.php">KarMUN</a>
            <div class="collapse navbar-collapse" id="MainNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item mx-5"><a class="nav-link" href="process.php">Home</a>
                    </li>
                    <li class="nav-item mx-5"><a class="nav-link" href="">Newsflash</a></li>
                    <li class="nav-item mx-5"><a class="nav-link" href="">Money Transfer</a></li>
                    <li class="nav-item mx-5"><a class="nav-link" href="">Alliance</a></li>

                </ul>
				<ul class="nav navbar-nav navbar-right">
      				<li><a href="index.php"><span class=""></span> Log Out</a></li>
    			</ul>
            </div>
        </div>
    </nav>
			
		<!-- <transbox id="transbox" onscroll="changeSidenavColor()">

			<div id="processTb" class="grid-container">
				<div class="page grid-item" id="newsflash">


					<div id="newsflashModal" class="modal">
						<span class="close">&times;</span>
						<h3 id="srvbottom">Here you can construct a newsflash:</h3>
						<transbox id="surveytb" class="modal-content">
							<label class="switch ">
								<input id="surv" name="surv" type="checkbox" />
								<span class="slider round"></span>
								<span class="other round"></span>
							</label>
							<label class="secret">
								<input id="secr" name="secr" type="checkbox" />
								<span class="goer around"></span>
								<span class="stay around"></span>
							</label>

							<textarea id="srvtxt" name="srvtxt" placeholder="Write your newsflash here:"></textarea>
							<button id="btnNews" name="btnNews">Submit Newsflash</button>
						</transbox>
					</div>

					<span id="myBtn">Newsflash sender</span>
					<div class="messages">
						<transbox id="messageTB">
							<table id="messTable">
								<tr>
									<th class="time">Type</th>
									<th class="adm">Admin</th>
									<th calss="mess">Message</th>
								</tr>

								<?php
								
								?>
							</table>
						</transbox>
					</div>

				</div>
				<div class="page grid-item" id="countryMatrix">
					<div id="matrixTransbox">
						<h1 class="user"></h1>
						<div class="inf">

							
							
						</div>
						<div class="status">
							<h2>Allies: </h2>
							

							<h2 id="enemies_country_matrix">Enemies: </h2>
							

						</div>




					</div>

				</div>
				<div class="page grid-item" id="comms">

					<div id="warText">

						<p>Press the button below.</p>
					</div>
					<ul class="warpageNav">
						<li><a href="refreshing.php" class="commLink">Communications</a></li>
					</ul>
				</div>

				<div class="page grid-item" id="moneyTransfer">
					<div id="moneyTransbox">
						<h4 class="here" style="color: #24d9ff;">Here you can send money to other countries:<br></h4>
						<h3 style="color: #24d9ff;">You have <?php echo "$currentMoney"; ?> billion dollars.</h3>
						<p class="user">
							<?php echo $_SESSION['a'], $_SESSION['a'] = ""; ?>
							<br>
							<?php echo $_SESSION['b'], $_SESSION['b'] = ""; ?>
							<?php echo $_SESSION['c'], $_SESSION['c'] = ""; ?>
							<?php echo $_SESSION['e'], $_SESSION['e'] = ""; ?>
						</p>
						<div class="transfer">
							<div class="balance">

							</div>

							<input type="number" min="0" max="$_SESSION['d']" name="amount" placeholder="Amount..."><br>
							<input list="countries" name="countries" placeholder="Please select a country"><br>
							<datalist id="countries">


								<?php


								$sql9 = "SELECT username FROM Everything";
								$result9 = $connection->query($sql9);
								while ($row9 = mysqli_fetch_array($result9)) {
									if ($row9['username'] != "Admin" && $row9['username'] != "AdminNews" && $row9['username'] != "Chair" && $row9['username'] != $ctrName) {
										echo "<option value=$row9[username]>" . $row9['username'] . "</option>";
									}
								}
								if (($_POST['countries'] == "UK") or ($_POST['countries'] == "France") or ($_POST['countries'] == "Russia") or ($_POST['countries'] == "USA") or ($_POST['countries'] == "Sweden") or ($_POST['countries'] == "Netherlands") or ($_POST['countries'] == "Brazil") or ($_POST['countries'] == "PRC") or ($_POST['countries'] == "DPRK") or ($_POST['countries'] == "Iran") or ($_POST['countries'] == "Mexico") or ($_POST['countries'] == "Egypt") or ($_POST['countries'] == "Germany") or ($_POST['countries'] == "UAE") or ($_POST['countries'] == "Japan")) {
									if ($_POST['countries'] != $_SESSION['usern']) {
										if ($_POST['amount'] > 0)
											$_SESSION['mt_amount'] = $_POST['amount'];
										$_SESSION['mt_country'] = $_POST['countries'];
										$_SESSION['mt_oldmoney'] = 0;
										$_SESSION['mt_oldmoney2'] = 0;
										$_SESSION['mt_messTime'] = date("H:i:s");
										$_SESSION['mt_user'] = $_SESSION['usern'];
										redirect('xxx_upd.php');
									}
								}

								?>
							</datalist>
							<button type="Submit" id="SendMoney1" name="SendMoney1" value="Send1">Send</button>

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

								while ($row4 = $result4->fetch_assoc()) {
									if ($row4['Reciever'] == $_SESSION['usern']) {
										echo "<tr><td>" . $row4['Time'] . "</td><td>" . $row4['Sender'] . "</td><td>" . $row4['Amount'] . "$" . "</tr></td>";
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

								while ($row5 = $result5->fetch_assoc()) {
									if ($row5["Sender"] == $_SESSION['usern']) {
										echo "<tr><td>" . $row5["Time"] . "</td><td>" . $row5["Reciever"] . "</td><td>" . $row5["Amount"] . "$" . "</tr></td>";
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
								<th>Status</th>
							</tr>
							<?php
							$sql = "SELECT Construction, Timetaken, Cost FROM War";
							$result = mysqli_query($conn, $sql);
							if ($result->num_rows > 0) {
								$counter = 0;
								while ($row = mysqli_fetch_array($result)) {

									if ($quantumState > $counter) {
										$quantumStatusMessage = "Completed";
										$counter = $counter + 1;
									} elseif ($quantumState == $counter) {
										$quantumStatusMessage = "In progress";
										$counter = $counter + 1;
									} elseif ($quantumState < $counter) {
										$quantumStatusMessage = "Not yet completed";
										$counter = $counter + 1;
									}
									echo "<tr><td>" . $row["Construction"] . "</td><td>" . $row["Cost"] . "</td><td>" . $row["Timetaken"] . "</td><td>" . $quantumStatusMessage . "</td></tr>";
								}
							}
							?>





						</table>
					</div>
				</div>
				<div class="page grid-item" id="armamentPage" style="border-top: 2px solid red; border-bottom: none;">
					<form method="POST">
						<transbox id="bigtb">


							<div>
								<table id="bigtable">
									<tr>
										<th>Button</th>
										<th>Type</th>
										<th>Quantity</th>
										<th>Cost [Billion $]</th>
										<th>Completion Time</th>
									</tr>


									<tr>
										<td><button type="submit" id="ship" name="ship" onclick="startTimer(600,'ship_remaining')">Build</button></td>
										<td>Ships</td>
										<td>25</td>
										<td>59</td>
										<td id="ship_remaining"></td>
									</tr>

									<tr>
										<td><button type="submit" id="tank" name="tank" onclick="startTimer(600,'tank_remaining')">Build</button></td>
										<td>Tanks</td>
										<td>50</td>
										<td>30</td>
										<td id="tank_remaining"></td>
									</tr>

									<tr>
										<td><button type="submit" id="plane" name="plane" onclick="startTimer(600,'plane_remaining')">Construct</button></td>
										<td>Airplanes</td>
										<td>100</td>
										<td>25</td>
										<td id="plane_remaining"></td>
									</tr>

									<tr>
										<td><button type="submit" id="soldier" name="soldier" onclick="startTimer(600,'soldier_remaining')">Recruit</button></td>
										<td>Soldiers</td>
										<td>1000</td>
										<td>10</td>
										<td id="soldier_remaining"></td>
									</tr>


								</table>
							</div>

							<?php echo "<div class=timeprob >" . $_SESSION['timeprob'] . "</div>";
							$_SESSION['timeprob'] = ""; ?>
						</transbox>



					</form>
				</div>
				<div class="page grid-item" id="cyberPage" style="border-top: 2px solid red;border-bottom: none;">
					<transbox id="cyberPageBeforeCompletion">
						<p id="cyberWarning" style="font-size: 20px; color: red;
					position: absolute;top: 40%;height: 5%;
					width: 70%;left:15%;">You have to complete the Quantum Computer Development to unlock the Cyber Attack and Spycard features</p>
					</transbox>
					<transbox id="cyberPageAfterCompletion" hidden>
						<transbox id="spycardMainPage" style="position: absolute; top:0; left: 0; height: 100%; width: 30%;">
							<p>Select two countries to show their messages between each other!</p>
							<input id="spycard2CountriesInput" list="spycard2Countries" placeholder="Select a country...">
							<datalist id="spycard2Countries" contenteditable="false">
								<?php
								for ($i = 0; $i < count($abrakadabra); $i++) {
									if ($abrakadabra[$i] != $user) {
										echo "<option>" . $abrakadabra[$i] . "</option>";
									}
								}
								?>
							</datalist>
							<input id="spycard1CountriesInput" list="spycard1Countries" placeholder="Select a country...">
							<datalist id="spycard1Countries" contenteditable="false">
								<?php
								for ($i = 0; $i < count($abrakadabra); $i++) {
									if ($abrakadabra[$i] != $user) {
										echo "<option>" . $abrakadabra[$i] . "</option>";
									}
								}
								?>
							</datalist>
							<button id="cyberConfirmAttack">Confirm Attack</button>
						</transbox>
						<transbox id="cyberAttackMainPage" style="position: absolute; top:0; right: 0; height: 100%; width: 30%;">
							<input id="cyberCountriesInput" list="cyberCountries" placeholder="Select a country...">
							<datalist id="cyberCountries" contenteditable="false">
								<?php
								for ($i = 0; $i < count($abrakadabra); $i++) {
									if ($abrakadabra[$i] != $user) {
										echo "<option>" . $abrakadabra[$i] . "</option>";
									}
								}
								?>
							</datalist>
							<button id="cyberConfirmAttack">Confirm Attack</button>
						</transbox>
						<transbox id="spycardAttackCover" style="position: absolute; top:0; left: 0; height: 100%; width: 70%; background-color: rgba(0,0,0,0.7);" hidden>
							<p id="cyberWarning" style="font-size: 20px; color: red;position: absolute;top: 40%;height: 5%;	width: 70%;left:15%;">You have used your Spycard!</p>
						</transbox>
						<transbox id="cyberAttackCover" style="position: absolute; top:0; right: 0; height: 100%; width: 30%; background-color: rgba(0,0,0,0.7);" hidden>
							<p id="cyberWarning" style="font-size: 20px; color: red;position: absolute;top: 40%;height: 5%;	width: 70%;left:15%;">You have used your Cyber Attack!</p>
						</transbox>
					</transbox>
				</div>
				<div class="page grid-item" id="alliancePage" style="border-top: 2px solid red;border-bottom: none; overflow: scroll;">
					<transbox id="middleTB">

						<table class="alliance">
							<tr>
								<th class="country">Countries</th>
								
							</tr>
							<?php
							$sql = "SELECT * FROM Alliances";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo "<tr>";
									foreach ($row as $field => $value) {
										if ($value == 'War') {
											echo "<td class='War'>" . $value . "</td>";
										} else if ($value == 'Allied') {
											echo "<td class='Ally'>" . $value . "</td>";
										} else if ($value == 'Neutral') {
											echo "<td class='Neutral'>" . $value . "</td>";
										} else echo "<td class='country'>" . $value . "</td>";
									}
									echo "</tr>";
								}
							} else {
								echo "<p class=cyber > You are under cyber attack!</p>";
							}
							?>
						</table>
						<p><?php echo $_SESSION['under'];
							$_SESSION['under'] = "";
							echo $_SESSION['valid'];
							$_SESSION['valid'] = ""; ?></p>

					</transbox>
					<div class="requestGrid">
						<div>
							<p style="padding:10px 0 0 0;margin: 0 0 0 0; position: absolute;top: 0;left: 0; color: red;height: 100%; width: 30%; text-align: center; ">Alliance Requests:</p>
						</div>

						<?php
						$sql = "SELECT * FROM requests WHERE Receiver = '$user' && Status = 'Waiting for response'";
						$result = $conn->query($sql);
						if ($result->num_rows < 1) {
							echo "<p>You have no alliance requests!</p>";
						} else {
							$row = mysqli_fetch_array($result);
							$_SESSION['allianceRequest_action'] = $row['Action'];
							$_SESSION['allianceRequest_sender'] = $row['Sender'];
							echo "<div style='position:absolute; top:20%; left:5%;'>";
							echo "<p>Action: " . $_SESSION['allianceRequest_action'] . "</p>";
							echo "<p>From: " . $_SESSION['allianceRequest_sender'] . "</p>";
							echo "</div>";

							if ($_SESSION['allianceRequest_action'] == "Make Peace") {
								echo "<div class='allianceButtons'>";
								echo "<button class='allianceBTN' id='alliance_acceptPeace'>Accept Peace</button><br>";
								echo "<button class='allianceBTN' id='alliance_rejectPeace'>Reject Peace</button>";
								echo "</div>";
							}
							if ($_SESSION['allianceRequest_action'] == "Form Alliance") {
								echo "<div class='allianceButtons'>";
								echo "<button class='allianceBTN' id='alliance_acceptAlliance'>Accept Alliance Request</button><br>";
								echo "<button class='allianceBTN' id='alliance_rejectAlliance'>Reject Alliance Request</button>";
								echo "</div>";
							}
						}
						?>



						<div id="allianceActions">
							<input id="allianceActionInput" list="allianceAction" placeholder="Select an action...">
							<datalist id="allianceAction" contenteditable="false">
								<option>Form Alliance</option>
								<option>Make Peace</option>
								<option>Declare War</option>
							</datalist>
							<input id="allianceCountriesInput" list="allianceCountries" placeholder="Select a country...">
							<datalist id="allianceCountries" contenteditable="false">
								<?php
								for ($i = 0; $i < count($abrakadabra); $i++) {
									echo "<option>" . $abrakadabra[$i] . "</option>";
								}
								?>
							</datalist>
							<button id="submitAction">SUBMIT</button>
						</div>
					</div>
				</div>
			</div>
			<div id="mySidenav" class="sidenav" >
				<ul class="nav-bar">
					<li><a id="newsflashNav" href="#newsflash" class="anchorActive">Newsflash Management</a></li>
					<li><a id="countryMatrixNav" href="#countryMatrix">Country Matrix</a></li>
					<li><a id="commsNav" href="#comms">Communications</a></li>
					<li><a id="moneyTransferNav" href="#moneyTransfer">Money Transfer</a></li>
					<li><a id="warNav" href="#" onclick="toggleProcess();return false;">War Page</a></li>
				</ul>
			</div>
			<div id="warNavbar" class="sidenav" hidden>
				<ul class="nav-bar">
					<li><a id="quantumNav" href="#quantumPage" class="warLink anchorActive">Quantum Computer Development</a></li>
					<li><a id="armamentNav" href="#armamentPage" class="warLink">Armament</a></li>
					<li><a id="cyberNav" href="#cyberPage" class="warLink">Cyber Attack & Spycard</a></li>
					<li><a id="allianceNav" href="#alliancePage" class="warLink">Alliance</a></li>
					<li><a id="warNav" href="#" onclick="toggleWar();return false;">Home Page</a></li>
				</ul>
			</div>
			
		</transbox> -->
		
	</form>
</body>

</html>