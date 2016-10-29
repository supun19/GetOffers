<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$dbname = "Offer";
$conn = mysqli_connect($hostname, $username, $password,$dbname);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$db = mysqli_select_db($conn,$dbname)
  or die("Could not select examples");

?>