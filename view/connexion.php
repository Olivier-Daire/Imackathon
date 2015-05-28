<?php include(__DIR__.'/../web/head.php'); ?>
<body>

		    	<h1>Connexion</h1>

		<form method="post" action="../helpers/formHandler.php">
			<input type="text" name="formType" value="connexion" hidden/>

					<p><label for="login">Pseudo</label></p>
			   		<p><input type="text" class="u-full-width" name="login" id="login" required /></p>


				   	<p><label for="password">Mot de passe</label></p>
				   	<p><input type="password" class="u-full-width" name="password" id="password" required/></p>

		   			<button type="submit">Connexion</button>

		</form>

</body>
</html>
