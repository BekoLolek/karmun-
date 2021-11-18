<?php
session_start();
	$target=$_POST['Warcountry'];
$user=$_SESSION["usern"];
$ally=$_POST["alliance"];
$normal=$_POST['normal'];
$no=$_POST['no'];
$peace=$_POST['peace'];
$secret=0;
$not=0;
$alreadysent=0;


$date= date("Y.m.d.H.i.s");
$conn = mysqli_connect("db.karinthy.hu","karmun_web_cc","lbng4TNodp5yBFuK", "karmun_web_cc");


if (isset($_POST['declarebtn'])) {
	if( ($target == "UK") or ($target == "France") or ($target == "Russia") or ($target == "USA") or ($target == "Sweden") or ($target == "Netherlands") or ($target == "Egypt") or ($target == "PRC") or ($target == "DPRK") or ($target == "Iran") or ($target == "Mexico") or ($target == "Brazil") or ($target == "Germany") or ($target == "UAE") or ($target == "Japan")){

	$sql="SELECT * FROM Alliances WHERE username='$user'";
  	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		if($row[$target]!='War'){
	$sql="SELECT * FROM Alliances";
	$command = mysqli_query($conn, "UPDATE Alliances SET $target='War' WHERE username='$user'");
	$command2 = mysqli_query($conn, "UPDATE Alliances SET $user='War' WHERE username='$target'");

	$sql="SELECT id FROM Allyprocess";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){	
	$id=max($row)+1;
	}
	}
	$command3 = mysqli_query($conn, "INSERT INTO Allyprocess (username,reciever,type,status,date,id)
	 VALUES ('$user','$target','War','unread','$date','$id') ");
	}else $_SESSION['under']= "You are already at war with this country!";
	}
	}
	}else $_SESSION['valid'] = "Please select a valid country!";
	}
	


if (isset($_POST['normalbtn'])) {
	if( ($normal == "UK") or ($normal == "France") or ($normal == "Russia") or ($normal == "USA") or ($normal == "Sweden") or ($normal == "Netherlands") or ($normal == "Egypt") or ($normal == "PRC") or ($normal == "DPRK") or ($normal == "Iran") or ($normal == "Mexico") or ($normal == "Brazil") or ($normal == "Germany") or ($normal == "UAE") or ($normal == "Japan")){

		$sql="SELECT * FROM AlliancesSecret WHERE username='$user'";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
	if($row[$normal]=='Ally'){
		$secret=4;
	}
	}
	}else echo "0 results";

	$sql="SELECT * FROM AlliancesSecret WHERE username='$user'";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
	if($row[$normal]=='War'){
		$secret=3;
	}
	}
	}else echo "0 results";

	$sql="SELECT * FROM AlliancesSecret WHERE username='$user'";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
	if($row[$normal]=='Secret'){
		$secret=2;
	}
	}
	}else echo "0 results";

	if($secret==0){
		$sql="SELECT * FROM Allyprocess";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		if($row['username']==$user && $row['reciever']==$normal && $row['type']=='Normal'){
			$alreadysent=1;
		}
	}
	}
	if($alreadysent==0){
	$sql="SELECT id FROM Allyprocess";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){	
	$id=max($row)+1;
	}
	}
	$command3 = mysqli_query($conn, "INSERT INTO Allyprocess (username,reciever,type,status,date,id)
	 VALUES ('$user','$normal','Normal','unread','$date','$id') ");
	$_SESSION['under']="Request sent!";
	}else {$_SESSION['under']="You have already sent a request!";}
	}	elseif($secret==2){$_SESSION['under']="You are already allied with this country!";}
	elseif($secret==3){$_SESSION['under']="You are at war with this country. You have to make peace first!";}
	elseif($secret==4){$_SESSION['under']="You are already allied with this country!";}
	}else $_SESSION['valid'] = "Please select a valid country!";
	}


if(isset($_POST['peacebtn'])){
	if( ($peace == "UK") or ($peace == "France") or ($peace == "Russia") or ($peace == "USA") or ($peace == "Sweden") or ($peace == "Netherlands") or ($peace == "Egypt") or ($peace == "PRC") or ($peace == "DPRK") or ($peace == "Iran") or ($peace == "Mexico") or ($peace == "Brazil") or ($peace == "Germany") or ($peace == "UAE") or ($peace == "Japan")){
		$sql="SELECT * FROM Alliances WHERE username='$user'";
  		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			if($row[$peace]=='War'){
	$sql="SELECT * FROM Allyprocess";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		if($row['username']==$user && $row['reciever']==$peace && $row['type']=='Peace'){
			$alreadysent=1;
		}
	}
	}
	if($alreadysent==0){
	$sql="SELECT id FROM Allyprocess";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){	
	$id=max($row)+1;
	}
	}
	$command = mysqli_query($conn, "INSERT INTO Allyprocess (username,reciever,type,status,date,id)
	 VALUES ('$user','$peace','Peace','unread','$date','$id') ");
	$_SESSION['under']="Request sent!";
	}else{$_SESSION['under']="You have already sent a request!";}
	}else{$_SESSION['under']="You are not at war with this country!";}
	}
	}
	}
	}

if(isset($_POST['alliancebtn'])){
	if( ($ally == "UK") or ($ally == "France") or ($ally == "Russia") or ($ally == "USA") or ($ally == "Sweden") or ($ally == "Netherlands") or ($ally == "Egypt") or ($ally == "PRC") or ($ally == "DPRK") or ($ally == "Iran") or ($ally == "Mexico") or ($ally == "Brazil") or ($ally == "Germany") or ($ally == "UAE") or ($ally == "Japan")){

	$sql="SELECT * FROM AlliancesSecret WHERE username='$user'";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
	if($row[$ally]=='Ally'){
		$secret=4;
	}
	}
	}else echo "0 results";

	$sql="SELECT * FROM AlliancesSecret WHERE username='$user'";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
	if($row[$ally]=='War'){
		$secret=3;
	}
	}
	}else echo "0 results";

		$sql="SELECT * FROM AlliancesSecret WHERE username='$ally'";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
	foreach($row as $field => $value){
		if($value=='Secret'){$secret=1;}
	}
	}
	}else echo "0 results";

	$sql="SELECT * FROM AlliancesSecret WHERE username='$user'";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		foreach($row as $d => $val){
		if($val=='Secret'){$secret=2;}
	}
	}
	}

	if($secret==0){
		$sql="SELECT * FROM Allyprocess";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		if($row['username']==$user && $row['reciever']==$ally && $row['type']=='Secret'){
			$alreadysent=1;
		}
	}
	}
	if($alreadysent==0){
	$sql="SELECT id FROM Allyprocess";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){	
	$id=max($row)+1;
	}
	}
	$command3 = mysqli_query($conn, "INSERT INTO Allyprocess (username,reciever,type,status,date,id)
	 VALUES ('$user','$ally','Secret','unread','$date','$id') ");
	$_SESSION['under']="Request sent!";
	}else{$_SESSION['under']="You have already sent a request!";}
	}elseif($secret==1){$_SESSION['under']="Unfortunately you cannot make a Secret alliance with this country!";}
	elseif($secret==2){$_SESSION['under']="You cannot have more than 1 secret ally!";}
	elseif($secret==3){$_SESSION['under']="You are at war with this country. You have to make peace first!";}
	elseif($secret==4){$_SESSION['under']="You are already allied with this country!";}
	}else $_SESSION['valid'] = "Please select a valid country!";
	}

if(isset($_POST['noalliancebtn'])){
	if( ($no == "UK") or ($no == "France") or ($no == "Russia") or ($no == "USA") or ($no == "Sweden") or ($no == "Netherlands") or ($no == "Egypt") or ($no == "PRC") or ($no == "DPRK") or ($no == "Iran") or ($no == "Mexico") or ($no == "Brazil") or ($no == "Germany") or ($no == "UAE") or ($no == "Japan")){

		$sql="SELECT * FROM Alliances WHERE username='$user'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
		if($row[$no]=='Ally'){
		$not=1;
		}
		}
		}else echo "0 results";

			$sql="SELECT * FROM AlliancesSecret WHERE username='$user'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
		if($row[$no]=='Secret'){
		$not=2;
		}
		}
		}else echo "0 results";

		if($not==0){
		
		$_SESSION['under'] = "You are not allied with this country!";

		}elseif ($not==1){ 
			$sql="SELECT id FROM Allyprocess";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){	
		$id=max($row)+1;
		}
		}
			$command3 = mysqli_query($conn, "INSERT INTO Allyprocess (username,reciever,type,status,date,id)
		 VALUES ('$user','$no','Neutral','unread','$date','$id') ");
		$command2 = mysqli_query($conn, "UPDATE Alliances SET $no='Neutral' WHERE username='$user'");
		$command1 = mysqli_query($conn, "UPDATE Alliances SET $user='Neutral' WHERE username='$no'");
		$_SESSION['under']="Status set to Neutral!";}
		elseif ($not==2){ 
			$sql="SELECT id FROM Allyprocess";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){	
		$id=max($row)+1;
		}
		}
			$command3 = mysqli_query($conn, "INSERT INTO Allyprocess (username,reciever,type,status,date,id)
		 VALUES ('$user','$no','NeutralSecret','unread','$date','$id') ");
		$command2 = mysqli_query($conn, "UPDATE AlliancesSecret SET $no='Neutral' WHERE username='$user'");
		$command1 = mysqli_query($conn, "UPDATE AlliancesSecret SET $user='Neutral' WHERE username='$no'");
		$_SESSION['under']="Secret alliance set to Neutral!";}
		}else $_SESSION['valid'] = "Please select a valid country!";
		}
						
		


header("Location:alliance.php");
$conn->close();



?>