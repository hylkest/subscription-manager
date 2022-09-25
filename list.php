<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'header.php';
if (!isset($_SESSION['loggedin'])) {
  header("Location: login.php");
}


$dataPoints = array(
    array("label"=> "Netflix", "y"=> 41),
);
?>

<html>

<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Stats"
            },
            axisY:{
                includeZero: true
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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
    <tr>
        <th scope="row"></th>
        <td><?php echo $servicename; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['paydate']; ?></td>
        <td><?php echo $row['date_added']; ?></td>
        <form method="post">
        <td><input name="selectremove" type="checkbox" value="<?php echo $row['id']; ?>"></td>
            <td><input type="submit" name="confirmdelete" value="Delete"></td>
        </form>
    </tr>
</html>

<?php
  }
} else {
  echo "<div class='alert alert-warning alertwidth' role='alert'>
  You have no active subscriptions
</div>";
}
$conn->close();
$selectremove = $_POST['selectremove'];

if (isset($_POST['confirmdelete'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql2 = "DELETE FROM services WHERE id='$selectremove'";

    if ($conn->query($sql2) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    header('Location: list.php');
}

?>

<html>
</tbody>
</table>
</html>
