<?php

	/**
	* Utilitaire pour gérer les inputs
	*/
	class InputData
	{
		/**
		 * Vérifie que le champs aest bien remplie
		 * @param  [string] $input
		 * @return [int]        0 si rempli -1 sinon
		 */
		public static function checkForEmpty($input)
		{
			if (empty($input)) {
				return -1;
			}else{
				return 0;
			}
		}
	}


?>
