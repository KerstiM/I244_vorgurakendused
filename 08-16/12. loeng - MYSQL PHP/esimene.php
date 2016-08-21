<?php

$user = "test";
$pass = "t3st3r123";
$db = "test";
$host = "localhost";

$link = mysqli_connect($host, $user, $pass, $db) or die("ei saanud ühendatud - ");

$sql = "SELECT * FROM 0_loomaaed ";
$result = mysqli_query($link, $sql) or die( $sql. " - ". mysqli_error($link));

if (!empty($result)) {
	echo "Sain ridu!";
}
echo "<pre>";
print_r(mysqli_fetch_array($result));
echo "</pre>";
echo "<pre>";
print_r(mysqli_fetch_assoc($result));
echo "</pre>";
?>