<?php

$host="localhost";
$username="root";
$password="";
$database="php-master";

$con = new mysqli($host,$username,$password,$database)or die("Could not connect to mysql".mysqli_error($conn));

if ($con != true) {
    mysqli_close($con);
}
?>