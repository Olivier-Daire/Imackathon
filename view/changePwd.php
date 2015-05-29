<?php include(__DIR__.'/../web/head.php'); ?>
<body>

<h3>Changer de mot de passe</h3>
	<form method="POST" action="../helpers/formHandler.php">
		<input type="text" name="formType" value="changePassword" hidden/>

					<p><label for="oldPwd">Ancien mot de passe</label></p>
			   		<p><input type="password" class="u-full-width" name="oldPwd" id="oldPwd" required /></p>


				   	<p><label for="newPwd">Nouveau mot de passe</label></p>
				   	<p><input type="password" class="u-full-width" name="newPwd" id="newPwd" required/></p>

				   	<p><label for="newPwd2">Retapez le nouveau mot de passe</label></p>
				   	<p><input type="password" class="u-full-width" name="newPwd2" id="newPwd2" required/></p>

		   			<button type="submit">Submit</button>
		
	</form>

</body>

</html>