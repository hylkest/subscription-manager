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
?>
<html>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Servicename</th>
        <th scope="col">Price</th>
        <th scope="col">Payday</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td><?php echo $row['service_name']; ?></td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>
</html>

<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>