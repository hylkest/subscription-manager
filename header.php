<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abbo";

if (!isset($_SESSION['loggedin'])) {
	echo "
<div class='navbar'>
	<a class='navlink' href='login.php'>Login</a>
	<a class='navlink' href='register.php'>Register</a>
</div>
";
?>
<?php
} else {
		echo "
		<div class='navbar'>
		<a class='navlink' href='index.php'>Add Service</a>
		<a class='navlink' href='list.php'>List</a>
		<a class='navlink' href='profile.php'>Profile</a>
	</div>
		";
}
?>