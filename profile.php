<?php
// Check if loggedin if not send to login.php
require_once "header.php";  
if (!isset($_SESSION['loggedin'])) {
  header("Location: login.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abbo";

$sesmail = $_SESSION['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE email='$sesmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
  

?>



<!-- Profile info container -->
<div class="infocontainer">
  <h3>Profile Info</h3>
  <form>
    <p>First Name:</p>
    <input type="text" name="editfname" class="profileinput" value="<?php echo $row['first_name']; ?>"><br>
    <p>Last Name:</p>
    <input type="text" name="editlname" class="profileinput" value="<?php echo $row['last_name']; ?>"><br>
    <p>Username:</p>
    <input type="text" name="edituname" class="profileinput" value="<?php echo $row['username']; ?>"><br>
    <p>Email:</p>
    <input type="email" name="editemail" class="profileinput" value="<?php echo $row['email']; ?>"><br>
    <input type="submit" name="editinfo" class="savebtn" value="Save">
    <a class="" href="logout.php">Logout</a>
  </form>
</div>
<?php
  }
}

//@todo Make it so changes will be saved to database
$conn->close();
?>


