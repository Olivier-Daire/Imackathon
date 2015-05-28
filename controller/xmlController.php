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

		public static function deleteXMLFile($idFile){

			$xmlFile = Xml::getXMLFileById($idFile);

			unlink("../xml/".$xmlFile['filename']);
			Xml::deleteXMLFile($idFile);

			header("Location: ../view/list.php");
		}
	}
?>
