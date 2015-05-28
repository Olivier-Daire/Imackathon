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

		public static function editXML($filename){

			// FIXME Redirect to XML editor
			//header("Location: ../view/connexion.php");
		}

		public static function deleteXMLFile($idFile){

			$xml = Xml::deleteXMLFile($idFile);

			return $xml;
		}

	}
?>
