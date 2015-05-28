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
								<td><form method='POST' action='../helpers/formHandler.php'>
										<input type='text' name='formType' value='edit' hidden/>
										<input type='text' name='filename' value=".$xml['filename']." hidden/>
										<button type='submit'>Modifier</button>
									</form>
								</td>
								<td><form method='POST' action='../helpers/formHandler.php' onsubmit='return confirm(\"Voulez vous vraiment supprimer ce fichier ?\")'>
										<input type='text' name='formType' value='deleteFile' hidden/>
										<input type='number' name='idFile' value=".$xml['id']." hidden/>
										<button type='submit'>Delete</button>
									</form>
								</>
							  </tr>";
					}
				?>

		</table>
		
	</body>
</html>