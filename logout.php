  <?php
require 'connect.php';

$_SESSION['login'] = "Inactive";
$_SESSION = [];
session_unset();
session_destroy();
header("Location: inventory.php");
?>