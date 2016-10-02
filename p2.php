<?PHP session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Page 2</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<?PHP include 'menu.php'; ?>
<h1>Page 2</h1>
<?PHP if(empty($_SESSION['uid'])) { echo '<p>You are not logged in. <a href="login.php">Login</a> or <a href="register.php">register</a></p>';} ?>
<?PHP if(!empty($_SESSION['uid'])) { echo session_id('uid').' Is the current session ID';} ?>
</body>
</html>
