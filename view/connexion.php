<?php include(__DIR__.'/../web/head.php'); ?>
<body>	
	<div id="header">
		<div id="fade">
			<div id="logo"></div>
		</div>
	<div id="connection">
		<h2>Connexion</h2>
		<form method="post" action="../helpers/formHandler.php">
			<input type="text" name="formType" value="connexion" hidden/>

					<p><label for="login">Pseudo</label></p>
			   		<p><input type="text" class="u-full-width" name="login" id="login" required /></p>


				   	<p><label for="password">Mot de passe</label></p>
				   	<p><input type="password" class="u-full-width" name="password" id="password" required/></p>

		   			<p><button type="submit">Connexion</button></p>

		</form>
	</div>
</body>
</html>