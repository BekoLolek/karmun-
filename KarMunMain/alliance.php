<?php
    include 'connection.php';
    $user = $_SESSION['usern'];

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel= "stylesheet" media="all" type="text/css" href="css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css\alliance.css">
    
	<title>KarMUN</title>
	
	
	


</head>

<body>
	<form action="process.php" method="POST">		
        <nav class="navbar navbar-expand bg-dark navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand active mx-5" href="process.php">KarMUN</a>
                <div class="collapse navbar-collapse" id="MainNavbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mx-5"><a class="nav-link" href="process.php">Home</a></li>
                        <li class="nav-item mx-5"><a class="nav-link" href="newsflash.php">Newsflash</a></li>
                        <li class="nav-item mx-5"><a class="nav-link" href="moneytransfer.php">Money Transfer</a></li>
                        <li class="nav-item mx-5"><a class="nav-link" href="alliance.php">Alliance</a></li>
                    </ul>
                    <ul class="nav navbar-nav ms-auto">
                        <li><a href="index.php"><span class=""></span> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="page grid-item" id="alliancePage" >
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
               

            </transbox>
            <div class="requestGrid">
                <div>
                    <p>Alliance Requests:</p>
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
                        echo "<div>";
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
	</form>
</body>

</html>