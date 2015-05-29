<?php
	session_start();

	if (!isset($_SESSION['userLogin']) && basename($_SERVER['PHP_SELF']) != "connexion.php") {
		header("Location: ../view/back/connexion.php");
	}

	echo '<!DOCTYPE html>
		  <html>
		  <head>
			<title></title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="icon" href="../../web/images/favicon.png" type="image/png" />
			<link href="../../web/css/style.css" rel="stylesheet" type="text/css" />
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
			<script src="../../web/js/script.js"></script>
		  </head>';
?>
