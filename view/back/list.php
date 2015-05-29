<?php 
	include(__DIR__.'/../../web/head.php');
	require_once __DIR__.'/../../controller/xmlController.php';

	xmlController::scanDirectory();
	$xmls = xmlController::getXMLFiles();
?>
	<body>
		<div id="header">
			<div id="fade">
				<div id="logo"></div>
		</div>


		<div id="uploadForm">
			<form  method="post" action="../../helpers/formHandler.php" enctype="multipart/form-data">
			<input type="text" name="formType" value="upload" hidden/>
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" /> 		
			<input type='file' name='fichierXML' value='upload' />
			<button type="submit" name="submit"  > Envoyer</button>
			</form>
		</div>

		<div id="list">
			
			

			<table>
				<tr>
					<th>Nom du fichier</th>
					<th>Date de dernière modification</th>
					<th colspan="2">Actions</th>
				</tr>
					<?php 
						foreach ($xmls as $xml) {
							echo "<tr>
									<td>".$xml['filename']."</td>
									<td>".$xml['date']."</td>
									<td><form method='POST' action='../../helpers/formHandler.php'>
											<input type='text' name='formType' value='edit' hidden/>
											<input type='text' name='filename' value=".$xml['filename']." hidden/>
											<button type='submit'>Modifier</button>
										</form>
									
									<form method='POST' action='../../helpers/formHandler.php' onsubmit='return confirm(\"Voulez vous vraiment supprimer ce fichier ?\")'>
											<input type='text' name='formType' value='deleteFile' hidden/>
											<input type='number' name='idFile' value=".$xml['id']." hidden/>
											<button type='submit'>Supprimer</button>
										</form>
									</td>
								  </tr>";
						}
					?>

			</table>

			
		</div>
		
	
	
	
	</body>
</html>