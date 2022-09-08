<body>
	<!-- Register Form -->
	<h1>Register</h1>
	<form method="post">
		<input type="text" name="fname" placeholder="First name" required>
		<input type="text" name="lname" placeholder="Last name" required>
		<input type="email" name="email" placeholder="Email Adress" required>
		<input type="text" name="uname" placeholder="Username" required>
		<input type="password" name="password" placeholder="Password" required>
		<input type="submit" name="register" value="Register">
	</form>
</body>

<?php
// If register submit button is set then: 
if (isset($_POST['register'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$uname = $_POST['uname'];
	$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "abbo";

	try {
	  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	  // set the PDO error mode to exception
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $sql = "INSERT INTO users (first_name, last_name, email, username, password)
	  VALUES ('$fname', '$lname', '$email', '$uname', '$pass')";
	  // use exec() because no results are returned
	  $conn->exec($sql);
	  echo "New record created successfully";
	} catch(PDOException $e) {
	  echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
}
