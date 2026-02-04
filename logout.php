<?php require_once('db.php');
unset($_SESSION['userid']);
unset($_SESSION['name']);

header("Location: index.php");
exit;
?>
