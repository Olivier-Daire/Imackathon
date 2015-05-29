<?php

	if(!isset($_SESSION)) session_start();
	if (!isset($_SESSION['userLogin']) && basename($_SERVER['PHP_SELF']) != "connexion.php") {
		header("Location: ../view/connexion.php");
	}

	$xmlFilename = $_SESSION['filename'];
	$target = "../../xml/".$xmlFilename;
	$xml = simplexml_load_file($target); // returns false if xml is invalid

	if ($xml) {
		$xmlString = $xml->asXML();
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="js/ext/jquery-2.1.4.min.js"></script>
<script src="js/ext/jquery.browser.min.js"></script>
<script type="text/javascript" src="js/ext/GLR/GLR.js"></script>
<script type="text/javascript" src="js/ext/GLR/GLR.messenger.js"></script>
<script type="text/javascript" src="js/loc/xmlEditor.js"></script>
<link href="css/main.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
	$(document).ready(function(){
		<?php if ($target && $xml){ ?>
			GLR.messenger.show({msg:"Loading XML..."});
			console.time("loadingXML");
			
			xmlEditor.loadXmlFromFile("<?php echo $target ?>", "#xml", function(){																													 																													 
				console.timeEnd("loadingXML");
				$("#xml").show();
				$("#actionButtons").show();																																				
				xmlEditor.renderTree();

				$("button#saveFile").show().click(function(){
					GLR.messenger.show({msg:"Generating file...", mode:"loading"})
					$.post("do/saveXml.php", {xmlString:xmlEditor.getXmlAsString(), xmlFilename:"<?php echo $xmlFilename ?>"}, function(data){
						if (data.error){
							GLR.messenger.show({msg:data.error,mode:"error"});
						}
						else {
							GLR.messenger.inform({msg:"XML sauvegardé.", mode:"success"});
							if (!$("button#viewFile").length){
								$("<button id='viewFile'>View Updated File</button>")
									.appendTo("#actionButtons div")
									.click(function(){ window.open("../../xml/"+data.filename); });
							}
						}
					}, "json");
				});
			});

		<?php } else { ?>
			$("#xml").html("<span style='font:italic 11px georgia,serif; color:#f30;'>Please upload a valid XML file.</span>").show();
			<?php if ($target && !$xml){ ?>
				GLR.messenger.showAndHide({msg:"Uploaded file is not valid XML and cannot be edited.", mode:"error", speed:3000});
			<?php } ?>
		<?php } ?>
	});
</script>
</head>

<body>
 
	<div id="xml" style="display:none;"></div>
	<div id="actionButtons" style="display:none;">
		<div></div>
		<button id="saveFile">Save XML</button>
	</div>
	<div id="nodePath"></div>

</body>
</html>

