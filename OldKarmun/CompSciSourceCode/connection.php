<?php
session_start();
$connection = mysqli_connect("db.karinthy.hu","karmun_web_cc","lbng4TNodp5yBFuK", "karmun_web_cc");
$conn = $connection;
function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}





?>
