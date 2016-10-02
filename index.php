<?PHP session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<?PHP include 'menu.php'; ?>

<h1>Welcome!</h1>
<?PHP if(empty($_SESSION['uid'])) { echo '<p>You are not logged in. <a href="login.php">Login</a> or <a href="register.php">register</a></p>';} ?>
<?PHP if(!empty($_SESSION['uid'])) { echo '<p>you are logged in!</p>';} ?>
</body>
</html>
