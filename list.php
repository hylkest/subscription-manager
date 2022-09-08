<?php
require_once 'header.php';
if (!isset($_SESSION['loggedin'])) {
  header("Location: login.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abbo";

$uid = $_SESSION['user_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM services WHERE user_id='$uid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<b>Service name:</b> ".$row['service_name']."<br>
    <b>Price (monthly):</b> ".$row['price']."<br>
    <b>Pay day:</b> ".$row['paydate']."<br><br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>