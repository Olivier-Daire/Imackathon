<?php

	require_once __DIR__.'/../model/xml.php';

	/**
	* Gère la page principale du business
	*/
	class xmlController
	{
		/**
		 * Récupère les infos sur l'utilisateur connecté
		 * @return [mixed] infos user
		 */
		public static function getXMLFiles()
		{
			
			$xml = Xml::getXMLFiles();

			return $xml;
		}

		public static function updateXML($filename){
			Xml::updateXML($filename);
		}

		public static function deleteXMLFile($idFile){

			$xmlFile = Xml::getXMLFileById($idFile);

			unlink("../xml/".$xmlFile['filename']);
			Xml::deleteXMLFile($idFile);

			header("Location: ../view/back/list.php");
		}

		/* Scan le dossier xml/ et met à jour la bdd avec les fichiers trouvés */
		public static function scanDirectory(){

			/* Scan des dossiers */
			if($dossier = opendir(__DIR__.'/../xml/'))
			{
				while(false !== ($fichier = readdir($dossier)))
				{
					if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
					{
						$query = Xml::getXMLFileByName($fichier);
						if ($query == null) {
							/* On rajoute le fichier à la DB*/
							Xml::addXml($fichier);
						}

					}
				}
			}

		
		}

		public static function uploadFile($filename, $tmpname, $errors){

			if ($errors > 0) {
				echo "Erreur lors du transfert";
			}
			else{
				$extensions_valides = array( 'xml' );
				$extension_upload = strtolower(  substr(  strrchr($filename, '.')  ,1)  );
				
				if ( in_array($extension_upload,$extensions_valides) ) {
					$nom = __DIR__.'/../xml/'.$filename;
					$resultat = move_uploaded_file($tmpname,$nom);
					if (!$resultat) echo "<p>Echec du transfert</p>";
					header("Location: ../view/list.php");
				}
				else{ echo "Veuillez choisir un fichier XML valide";}
			}

			


		}

	}
?>
