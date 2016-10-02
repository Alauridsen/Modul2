<?PHP session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<?PHP include 'menu.php'; ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Signup</legend>
    	<input type="text" name="name" placeholder="Name"/><br>
        <input type="email" name="email" placeholder="Email"/><br>
        <input type="number" name="age" min="15" max="120" placeholder="Age"/><br>
        <input type="password" name="pw" min="6" placeholder="Password"/><br>
        <input type="password" name="cf_pw"  min="6" placeholder="Confirm password"/><br>
    	<input type="submit" name="submit"/>
	</fieldset>
</form>

<?PHP
	// kører scriptet når man trykker på submit knappen. 
	if(isset($_POST['submit'])) {
	// filtrerer de individuelle felter så de passer i databasen. Sanitizer special chars for at gøre sql injection sværere. stopper scriptet ved forkert indtastning.
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) or die('Please fill in your name');
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) or die('please fill in your email adress');
	$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT) or die('Please fill in your age (You must be over 15)');
	// hasher passwords så de ikke er let tilgængelige i databasen.
	$pw = $_POST['pw'] or die('Please fill in your password (Must be atleast 6 characters long)');
	$pwHash = password_hash($pw, PASSWORD_DEFAULT);
	// Checker om passwordet og confirm password er ens. Hvis de ikke er, stopper scriptet.
	if ($_POST['pw'] != $_POST['cf_pw']) {
		die('Ooops! you did not successfully confirm your password');	
	}
	// henter database informationerne ind og tilslutter til databasen.
require_once 'dbconfig.php';	
	// Variabel der indeholder sql som en string. 
	$sql = "INSERT INTO md2_users (name, email, age, pw) VALUES (?,?,?,?)";
	// Forbereder på at skulle bruge $sql statementen. 
	$stmt = $link->prepare($sql);
	// definerer datatyperne. her er det en "string" "string" "integer" "string" vi binder. 
	$stmt->bind_param('ssis', $name, $email, $age, $pwHash);
	// kører statement
	$stmt->execute();
	echo 'Success!';
	}
?>

</body>
</html>