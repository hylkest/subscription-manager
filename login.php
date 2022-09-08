<?php require_once "header.php";

if (isset($_SESSION['loggedin'])) {
  header("Location: index.php");
}
 ?>
<html>
	<!-- Login form  -->
	<body class="loginback">
		<div class="loginform">
			<h1>Login</h1>
			<form method="post">
				<input type="email" name="emaillogin" placeholder="Email Adress" required><br>
				<input type="password" name="passlogin" placeholder="Password" required><br>
				<input type="submit" name="loginsubmit" value="Login" required><br>
			</form>
		</div>
	</body>
</html>


<?php

if (isset($_POST['loginsubmit'])) {
	$emaillogin = $_POST['emaillogin'];

	// SQL 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "abbo";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM users WHERE email='$emaillogin'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
	    	if ($emaillogin == $row['email']) {
	    		if (password_verify($_POST['passlogin'], $row['password'])) {
	    			session_start();
	    			$_SESSION['loggedin'] = true;
	    			$_SESSION['email'] = $row['email'];
	    			$_SESSION['user_id'] = $row['user_id'];
 
	    			header("Location: index.php");
	    		} else {
	    			echo "Credentials are wrong";
	    		}
	  		} else {
	  			echo "Credentials are wrong";
	  		}
		}
	}
	$conn->close();
}