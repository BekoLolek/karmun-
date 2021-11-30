<?php
session_start();
//$connection2 = mysqli_connect("db.karinthy.hu","karmun_web_cc","lbng4TNodp5yBFuK", "karmun_web_cc");
$connection =  mysqli_connect("localhost","root","","karmun_web_cc");
$conn = $connection;
function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}





?>
