<?PHP
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<?PHP include 'menu.php'; ?>
<form action='login.php' method='POST'>
<fieldset>
<legend>Login</legend>
	<input name="email" type="email" placeholder="Enter your email"><br>
    <input name="pw" type="password" placeholder="And password"><br>
    <input type="submit" name="submit">
</fieldset>
</form>
<?PHP // kører scriptet hvis submit knappen bliver trykket på.
	if(isset($_POST['submit'])) {
		// henter database tilslutningen fra filen dbconfig.php
		require_once 'dbconfig.php';
		// sætter sql statementen op for databasen og henter variablene fra de indtastede felter. 
		$sql = 'SELECT idmd2_users, email, pw FROM md2_users WHERE email=?';
		$pw = $_POST['pw'] or die('Wrong password');
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) or die('Please fill in your email adress'); 
		// forbereder brug af $sql.
		$stmt = $link->prepare($sql);
		// binder parametrene for vores prepared statement. Sørger for at finde de rigtige værdier i databasen.
		$stmt->bind_param('s', $email);
		$stmt->bind_result($id, $email, $pwHash);
		// kører $stmt
		$stmt->execute();
		while($stmt->fetch()) {
			// oversætter passwordet til password hashen i databasen
			if(password_verify($pw,$pwHash)){
				// sætter session uid til at være det samme som id i databasen for brugeren.
				$_SESSION['uid'] = $id;
				// header("Location: http://localhost/Modul2/index.php");
				echo 'Logged in!';
				die();		
			} else {
				echo 'login failed';
			}
		}
	}
?>
</body>
</html>