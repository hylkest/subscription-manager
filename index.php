<?php require_once 'header.php';

if (!isset($_SESSION['loggedin'])) {
  header("Location: login.php");
}
?>

<body>
  <!-- Add service form  -->
	<form method="post" class="serviceform">
		<input type="text" name="servicenaam" placeholder="Service name" required>
    <select name="commonservice">
      <option value="netflix">Netflix</option>
      <option value="netflix">Netflix</option>
      <option value="netflix">Netflix</option>
      <option value="netflix">Netflix</option>
    </select><br>
    <input type="text" name="kosten" placeholder="Price per month" required><br>
		<input type="text" name="betaaldag" placeholder="Pay day (1 - 31)" required><br>
		<input type="submit" name="servicetoevoegen" placeholder="Toevoegen">
	</form>
</body>
<?php
