<?php
		echo ' <footer><p>';
		if (!isset($_SESSION['userLogin']))
			echo"<a href='../back/connexion.php'>Connexion</a>";
		else
			echo"<a href='../../helpers/formHandler.php?logout=true'>Déconnexion</a>";
		echo "</p></footer>";
?>
