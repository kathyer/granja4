<?php
	session_start();
	$_SESSION = []; //Array vacio
	session_destroy();
	header("Location: index.php");
?>