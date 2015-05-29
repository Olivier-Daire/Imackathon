<?php
/**
 * Saves POST input as an XML file and returns a JSON response
 * Make sure it has the correct access rights
 */
	require_once __DIR__.'/../../../controller/xmlController.php';

if (isset($_POST['xmlString'])){
	$filename  = $_POST['xmlFilename'];
	$xmlString = stripslashes($_POST['xmlString']);

	//write new data to the file, along with the old data 
	$handle = fopen("../../../xml/".$filename, "w");
	if (fwrite($handle, $xmlString) === false) {
		echo json_encode(array("error"=>"Couldn't write to file."));
	} 
	else {
		xmlController::updateXML($filename);
		echo json_encode(array("filename"=>$filename));
	}
	fclose($handle); 	
}
?>