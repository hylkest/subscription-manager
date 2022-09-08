<?php require_once 'header.php';

if (!isset($_SESSION['loggedin'])) {
  header("Location: login.php");
}
?>

<body>
  <!-- Add service form  -->
	<form method="post" class="serviceform">
            <div class="serviceheader"></div>
                <h2>Add service</h2>
            <select name="commonservice" class="addservice">
                <option value="netflix">Netflix</option>
                <option value="videoland">Videoland</option>
                <option value="disneyplus">Disney+</option>
                <option value="prime">Prime</option>
                <option value="phone">Phone subscription</option>
                <option value="internet">Internet subscription</option>
                <option value="other">Other</option>
            </select>
            <br>
            <input type="text" name="costs" class="addservice" placeholder="Price per month" required><br>
            <input type="text" name="payday" class="addservice" placeholder="Pay day (1 - 31)" required><br>
            <input type="submit" name="addservice" class="btn btn-success margin" placeholder="Add service">
	</form>
</body>
<?php


#When form is submitted



if (isset($_POST['addservice'])) {
    #VARS
    $commonservice = $_POST['commonservice'];
    $costs = $_POST['costs'];
    $payday = $_POST['payday'];
    $uid = $_SESSION['user_id'];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO services (service_name, price, paydate, user_id)
VALUES ('$commonservice', '$costs', '$payday', '$uid')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}