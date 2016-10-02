<?php
session_start();

// Unsetter alle session variable
$_SESSION = array();

// Sletter cookien og alle session dataene.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// "Ødelægger" sessionen
session_destroy();
// sender brugeren til forsiden
header("Location: http://s733l.dk/modul2/index.php");
die();
?>