<?PHP
// constants for database connection
//Test

const DB_HOST = '';
const DB_USER = '';
const DB_PASS = '';
const DB_NAME = '';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) {
	die("Connection Failed: " . $link->connect_error);
}
$link->set_charset('utf8');
?>
