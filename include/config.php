<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "painel_v1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM configs WHERE config_id = 1";
$result = $conn->query($sql); 
$configs = $result->fetch_array();


define("PERIODO", $configs["periodo"]);

?>