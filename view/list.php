<?php 
	include(__DIR__.'/../web/head.php');
	require_once __DIR__.'/../controller/xmlController.php';

	$xmls = xmlController::getXMLFiles();
?>
	<body>
		<table>
			<tr>
				<th>Nom</th>
				<th>Dernier éditeur</th>
				<th>Date de dernière modification</th>
			</tr>
				<?php 
					foreach ($xmls as $xml) {
						echo "<tr>
								<td>".$xml['filename']."</td>
								<td>".$xml['editor']."</td>
								<td>".$xml['date']."</td>
								<td><form method='post' action='../helpers/formHandler.php'>
										<input type='text' name='formType' value='edit' hidden/>
										<input type='text' name='filename' value=".$xml['filename']." hidden/>
										<button type='submit'>Modifier</button>
									</form>
								</td>
							  </tr>";
					}
				?>

		</table>
		
	</body>
</html>