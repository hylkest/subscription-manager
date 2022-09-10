<?php
require_once 'header.php';
if (!isset($_SESSION['loggedin'])) {
  header("Location: login.php");
}
?>

<html>

<table class="table">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Servicename</th>
        <th scope="col">Price</th>
        <th scope="col">Payday</th>
        <th scope="col">Date added</th>
    </tr>
    </thead>
    <tbody>

</html>

<?php

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
      $servicename = ucfirst($row['service_name'])
?>
<html>
    <tr>
        <th scope="row"></th>
        <td><?php echo $servicename; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['paydate']; ?></td>
        <td><?php echo $row['date_added']; ?></td>
    </tr>
</html>

<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<html>
</tbody>
</table>
</html>
