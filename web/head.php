<?php
	session_start();

	if (!isset($_SESSION['userLogin'])) {
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
