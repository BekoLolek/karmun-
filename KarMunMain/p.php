<?php
session_start();
include 'connection.php';
//$abrakadabra = array("Brazil", "DPRK", "France", "Germany", "India", "Iran", "Japan", "Mexico", "PRC", "Russia", "South Africa", "UAE", "UK", "Ukraine", "USA");
//Brazil,DPRK,France,Germany,India,Iran,Japan,Mexico,PRC,Russia,South Africa,UAE,UK,Ukraine,USA

$user = $_SESSION['usern'];

?>
<!DOCTYPE html>
<html>

<head>
	<title>KarMUN</title>
	<link rel="stylesheet" type="text/css" href="processCSS1.css">

	<style type="text/css">
		html {
			background-image: url(https://www.gstatic.com/earth/social/00_generic_facebook-001.jpg);
			background-size: cover;
			overflow-y: hidden;
			font-family: Prime, Fallback, sans-serif;

		}

		@font-face {
			font-family: Prime;
			src: url("Prime-Regular.eot");
		}

		.alliance td {
			border: 1px solid red;
			text-align: center;
			color: white;
		}

		.alliance .country {
			color: red;
		}

		.War {
			background-color: red;
		}

		.Neutral {
			background-color: transparent;
		}

		.Ally {
			background-color: green;
		}


		.button {
			text-align: center;
			border: 0px solid #24d9ff;
			background-color: rgba(34, 119, 138, 0.8);
			border: 1px solid black;
			width: 40%;

		}

		.page {
			width: 100%;
			height: 100%;
			position: relative;
			left: 0.5%;
			border: 0px solid red;
			background-color: rgba(0, 0, 0, 0.9);
			border-bottom: 1px solid #24d9ff;

		}

		.page:last-child {
			border-bottom: 0px solid red;
		}

		#transbox {
			position: absolute;
			top: 10%;
			left: 0.5%;
			width: 77%;
			height: 90%;
			border-top: 1px solid #24d9ff;
			overflow-y: scroll;


		}

		#notifications {
			position: absolute;
			top: 4%;
			right: 2%;
			height: 91%;
			width: 26%;
			background-color: rgba(0, 0, 0, 0.5);
			border: 1px solid black;
		}

		#notifTable {
			color: white;
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			height: 89%;
		}

		.img {
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
			background-color: rgba(0, 0, 0, 0.8);
			overflow-x: hidden;
			overflow-y: hidden;
			padding-top: 60px;
		}

		.sidenav a:not(.anchorActive) {

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

		.nav-li {
			display: block;
			text-align: center;
			height: 100%;
			flex-direction: column;
			line-height: 500%;
			list-style: none;


		}

		#ANCHOR {
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

		.anchorActive {
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
			border: 0px solid #24d9ff;
			background-color: transparent;
		}

		#messageTB::-webkit-scrollbar-track {
			background: transparent;
		}

		#messageTB::-webkit-scrollbar-thumb {
			background: #24d9ff;
			border: 0px solid #24d9ff;
		}

		#messageTB::-webkit-scrollbar-thumb:hover {
			background: blue;
		}

		#messageTB::-webkit-srcollbar-track-piece {
			color: transparent;
		}

		::-webkit-scrollbar {
			width: 0px;
			border: 0px solid #24d9ff;
			background-color: transparent;
		}

		::-webkit-scrollbar-track {
			background: transparent;
		}

		::-webkit-scrollbar-thumb {
			background: transparent;
			border: 0px solid #24d9ff;
		}

		::-webkit-scrollbar-thumb:hover {
			background: transparent;
		}

		::-webkit-srcollbar-track-piece {
			background: transparent;
		}



		.page p {
			color: white;
			padding: 50px;
			font-size: 20px;
		}

		.grid-container {
			height: 100%;
			width: 100%;
			position: absolute;
			left: 0;
			padding: 0;
			margin: 0;

		}

		
	</style>
	<style type="text/css" name="war_and_comm_Style">
		.commLink {
			text-decoration: none;
			padding-bottom: 6px;
			padding-top: 6px;
			text-align: center;
			font-size: 30px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}

		.warLink:hover {
			background-color: #818181;
			color: red;

		}

		.commLink:hover {
			background-color: #818181;
			color: red;

		}

		.warpageNav {
			list-style: none;
			justify-content: space-around;
			position: absolute;
			bottom: 5%;
			right: 5%;
			width: 40%;

		}

		.warpageNav li {
			height: 25%;
		}

		.warpageNav li a {
			padding: 5%;
		}

		#warText {
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
		#matrixTransbox {
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

		.inf {
			position: absolute;
			top: 2%;
			left: 2%;
			width: 47%;
			height: 80%;
			color: #24d9ff;
		}

		.status {
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

		#enemies_country_matrix {
			color: red;
		}
	</style>
	<style type="text/css" name="warQuantumStyle">
		#quantumTable {
			position: absolute;
			top: 5%;
			left: 5%;
			height: 70%;
			width: 60%;
			color: red;
		}

		#quantumTable tr {
			width: 100%;
		}

		#quantumTable table tr th,
		#quantumTable tr td {
			color: red;
			border: 1px solid red;
			text-align: center;
			padding: 0;
			margin: 0;
			width: auto;
			padding-left: 20px;
			padding-right: 20px;
		}

		#btnUpgradeQuantum {
			position: absolute;
			right: 5%;
			top: 5%;
			background-color: transparent;
			border: 1px solid red;
			width: 10%;
			height: 8%;
			box-shadow: 3px 3px 10px 1px;
			color: red;
		}
	</style>
	<style type="text/css">
		#allianceActions {
			width: 18%;
			height: 100%;
			position: absolute;
			top: 0;
			right: 0;
			border-left: 1px solid red;
		}

		.requestGrid {
			position: relative;
			bottom: 0;
			left: 1%;
			width: 98%;
			height: 30%;
			border: 1px solid red;
		}

		.requestGrid p {
			padding: 5px;
			margin: 0 0 0 0;
			font-size: 16px;
		}

		#submitAction {
			position: absolute;
			bottom: 2%;
			left: 25%;
			width: 50%;
			height: 15%;
			background-color: transparent;
			color: red;
			box-shadow: -2px -2px 10px 1px;
			border: 1px solid red;

		}

		.allianceBTN {
			position: relative;
			width: 50%;
			height: 40%;
			background-color: transparent;
			color: red;
			box-shadow: -2px -2px 10px 1px;
			border: 1px solid red;
			margin: 10px;

		}

		#allianceActionInput {
			position: absolute;
			width: 76%;
			height: 15%;
			left: 12%;
			top: 5%;

		}

		#allianceCountriesInput {
			position: absolute;
			width: 76%;
			height: 15%;
			left: 12%;
			top: 25%;
		}

		.allianceButtons {
			position: absolute;
			top: 5%;
			right: 50%;
			height: 100%;
			width: 20%;
			align-items: center;
		}

		#bigtb {
			position: absolute;
			top: 10%;
			height: 10%;
			width: 50%;
			left: 25%;
		}

		#bigtb table td {
			border: 1px solid red;
			color: red;
		}

		#bigtb table th {
			color: red;
		}

		#bigtb button {
			position: relative;
			left: 0%;
			width: 100%;

		}

		#bigtb td {
			text-align: center;
		}
	</style>

</head>

<body>
	<form action="process.php" method="POST">
		<h4 id="welcomeTitle" style="color:#24d9ff; font-size: 30px;position: absolute;width: 40%; left: 30%; top:-2%; text-align: center;"><?php echo $_SESSION['usern']; ?></h4>
		<div id="ANCHOR"></div>

		<transbox id="transbox" onscroll="changeSidenavColor()">

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
								if ($cyber == 0) {
									$sql = "SELECT Type,Admin,Message,term  FROM Messaging WHERE Country='$notpermanentusername'";
									$sqll = "SELECT id,Time,Admin,Message,Country,term,Type FROM (SELECT * FROM Messaging  WHERE Country='$notpermanentusername' ORDER BY Time DESC) AS `i`  WHERE Country='$notpermanentusername' ORDER BY `i`.`Time` DESC";
									$result = mysqli_query($connection, $sqll);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											echo "<tr><td><textarea readonly rows='6' class='tableid tim' style='color:#24d9ff;'>" . $row["Type"] .
												"</textarea></td><td><textarea rows='6' readonly style='color:#24d9ff;' class='tableid ad' >" . $row["Admin"] .
												"</textarea></td><td><textarea rows='6' style='color:#24d9ff;' readonly class='tableid mes' >" . $row["Message"] . "</textarea></tr></td>";
										}
									} else {

										echo "<tr><td>No messages</td></tr>";
									}
								} else {
									echo "<p class=cyber >You are under cyber attack!</p>";
								}
								?>
							</table>
						</transbox>
					</div>

				</div>
				<div class="page grid-item" id="countryMatrix">
					<div id="matrixTransbox">
						<h1 class="user"></h1>
						<div class="inf">

							<!-- <p>Economic increase: <?php echo round($_SESSION["GDP"] * 100); ?>%</p> -->
							<p><?php if ($connection->connect_error) {
									die("Connection failed: " . $connection->connect_error);
								}
								$user = $_SESSION['usern'];
								$cyber = 0;
								$sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
								$result2 = $connection->query($sql2);
								if ($result2->num_rows > 0) {
									while ($row = $result2->fetch_assoc()) {
										if ($row["onoff"] == 1) {
											$cyber = 1;
										} else $cyber = 0;
									}
								} else echo "0 results";
								if ($cyber != 0) {
									echo "<div class=money id=output2></div>";
								} else {
									// echo "<div class=money2>Your balance: "." <div class=money id=output></div>"."$ (in billions)</div>";
								} ?></p>
						</div>
						<div class="status">
							<h2>Allies: </h2>
							<p><?php
								if ($connection->connect_error) {
									die("Connection failed: " . $connection->connect_error);
								}
								$user = $_SESSION['usern'];
								$cyber = 0;
								$sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
								$result2 = $connection->query($sql2);
								if ($result2->num_rows > 0) {
									while ($row = $result2->fetch_assoc()) {
										if ($row["onoff"] == 1) {
											$cyber = 1;
										} else $cyber = 0;
									}
								}
								if ($cyber == 0) {
									$ally = $_SESSION["usern"];
									if ($connection->connect_error) {
										die("Connection failed: " . $connection->connect_error);
									}
									$sql = "SELECT username,$ally  FROM Alliances";
									$result = $connection->query($sql);
									if ($result->num_rows > 0) {

										while ($row = $result->fetch_assoc()) {
											if ($row["$ally"] == 'Allied') {
												echo  $row["username"] . "<br>";
											}
										}
										echo "";
									} else {
										echo "None";
									}
								} else {
									echo "You are under cyber attack";
								} ?></p>

							<h2 id="enemies_country_matrix">Enemies: </h2>
							<p>
								<?php
								if ($connection->connect_error) {
									die("Connection failed: " . $connection->connect_error);
								}
								$user = $_SESSION['usern'];
								$cyber = 0;
								$sql2 = "SELECT Countries,onoff FROM Cyber_attack WHERE Countries='$user'";
								$result2 = $connection->query($sql2);
								if ($result2->num_rows > 0) {
									while ($row = $result2->fetch_assoc()) {
										if ($row["onoff"] == 1) {
											$cyber = 1;
										} else $cyber = 0;
									}
								}
								if ($cyber == 0) {
									$ally = $_SESSION["usern"];
									if ($connection->connect_error) {
										die("Connection failed: " . $connection->connect_error);
									}
									$sql = "SELECT username,$ally  FROM Alliances";
									$result = $connection->query($sql);
									if ($result->num_rows > 0) {

										while ($row = $result->fetch_assoc()) {

											if ($row["$ally"] == 'War') {
												echo $row["username"] . "<br>";
											}
										}
										echo "";
									} else {
										echo "None";
									}
								} else {
									echo "You are under cyber attack";
								}

								?></p>

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
									if ($abrakadabra[$i] != $notpermanentusername) {
										echo "<option>" . $abrakadabra[$i] . "</option>";
									}
								}
								?>
							</datalist>
							<input id="spycard1CountriesInput" list="spycard1Countries" placeholder="Select a country...">
							<datalist id="spycard1Countries" contenteditable="false">
								<?php
								for ($i = 0; $i < count($abrakadabra); $i++) {
									if ($abrakadabra[$i] != $notpermanentusername) {
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
									if ($abrakadabra[$i] != $notpermanentusername) {
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
								<?php
								if ($cyber == 0) {
									for ($i = 0; $i < count($abrakadabra); $i++) {
										echo "<th class='country'>" . $abrakadabra[$i] . "</th>";
									}
								}
								?>
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
						$sql = "SELECT * FROM requests WHERE Receiver = '$notpermanentusername' && Status = 'Waiting for response'";
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
				<ul class="nav-li">
					<li><a id="newsflashNav" href="#newsflash" class="anchorActive">Newsflash Management</a></li>
					<li><a id="countryMatrixNav" href="#countryMatrix">Country Matrix</a></li>
					<li><a id="commsNav" href="#comms">Communications</a></li>
					<li><a id="moneyTransferNav" href="#moneyTransfer">Money Transfer</a></li>
					<li><a id="warNav" href="#" onclick="toggleProcess();return false;">War Page</a></li>
				</ul>
			</div>
			<div id="warNavbar" class="sidenav" hidden>
				<ul class="nav-li">
					<li><a id="quantumNav" href="#quantumPage" class="warLink anchorActive">Quantum Computer Development</a></li>
					<li><a id="armamentNav" href="#armamentPage" class="warLink">Armament</a></li>
					<li><a id="cyberNav" href="#cyberPage" class="warLink">Cyber Attack & Spycard</a></li>
					<li><a id="allianceNav" href="#alliancePage" class="warLink">Alliance</a></li>
					<li><a id="warNav" href="#" onclick="toggleWar();return false;">Home Page</a></li>
				</ul>
			</div>
		</transbox>
		
	</form>
</body>

</html>