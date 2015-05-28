<?php
	session_start();

	if (!isset($_SESSION['userId']) && basename($_SERVER['PHP_SELF']) != "connexion.php") {
		header("Location: ../view/connexion.php");
	}

	echo '<!DOCTYPE html>
		  <html>
		  <head>
			<title></title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		  </head>';
?>
