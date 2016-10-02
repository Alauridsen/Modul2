<?PHP
// constants for database connection
//Test

const DB_HOST = 'mysql34.unoeuro.com';
const DB_USER = 's733l_dk';
const DB_PASS = 'hnke354b';
const DB_NAME = 's733l_dk_db';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) {
	die("Connection Failed: " . $link->connect_error);
}
$link->set_charset('utf8');
?>
