<?php 
session_start();
include "connection.php";
$conn = $connection;


$amount="";
$country="";
$sql="";
$_SESSION['a']="";
$_SESSION['b']="";


 



    
  $amount=$_SESSION['mt_amount'];
  $country=$_SESSION['mt_country'];
  $oldmoney=$_SESSION['mt_oldmoney'];
  $oldmoney2=$_SESSION['mt_oldmoney2'];
  $messTime=$_SESSION['mt_messTime'];
  $user=$_SESSION['usern'];

  
//  $sql = "SELECT username,Money  FROM Everything WHERE username='$country'";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
    
//     while($row = $result->fetch_assoc()) {
//         $oldmoney= $row["Money"];
//         echo $row["Money"];
//     }
    
// } 
//  $sql = "SELECT Money  FROM Everything WHERE username='$_SESSION['usern']'";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
    
//     while($row = $result->fetch_assoc()) {
//         $oldmoney2= $row["Money"];
//         $_SESSION['d']=$oldmoney2;
//         echo $row["Money"];
//     }
//     if ($amount <= $oldmoney2) {
//       $newmoney2=$oldmoney2-$amount;
//           $newmoney=$oldmoney+$amount;
//     }else {
//       $_SESSION['c']="You do not have enough money for this action!";
//     }
// }
 

// if($_SESSION['c']!="You do not have enough money for this action!") {
  
// $command = mysqli_query($conn,"UPDATE Everything SET Money=$newmoney WHERE username='$country'");
// $command2 = mysqli_query($conn,"UPDATE Everything SET Money=$newmoney2 WHERE username='$_SESSION[usern]'");
// $command3 = mysqli_query($conn,"INSERT INTO Money_Transfer (Time,Sender,Reciever,Amount) VALUES ('$messTime','$user','$country','$amount')");
// }
// }else {
//     $_SESSION['a']="You have to give a valid amount!";
//   }
// }else{
//   $_SESSION['b']="Please choose a valid Country!";
//  }
//   }else {
//   $_SESSION['b']="Please choose a valid Country!";
//  }
// }
 
     













    $sql = "SELECT Money FROM Everything WHERE username = '$_SESSION[usern]'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $currentSenderMoney = $row["Money"];
      }
    }
    $sql = "SELECT Money FROM Everything WHERE username='$country'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $currentReceiverMoney = $row["Money"];
      }
    }


    if($currentSenderMoney >= $amount){
      $currentSenderMoney=$currentSenderMoney - $amount;
      $currentReceiverMoney= $currentReceiverMoney + $amount;

      $command1 = mysqli_query($conn,"UPDATE Everything SET Money=$currentReceiverMoney WHERE username='$country'");
      $command2 = mysqli_query($conn,"UPDATE Everything SET Money=$currentSenderMoney WHERE username='$user'");
      $command3 = mysqli_query($conn,"INSERT INTO Money_Transfer (Time,Sender,Reciever,Amount) VALUES ('$messTime','$user','$country','$amount')");
    }
    else{
      $_SESSION['c']="You do not have enough money for this action!";
    }
    redirect("process.php#moneyTransfer");
























 ?>