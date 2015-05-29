<?php
	// FIXME file path and name hardcoded
	$xmlFilename = "IMAC1.xml";
	$target = "../../xml/IMAC1.xml";
	$xml = simplexml_load_file($target); // returns false if xml is invalid
	if ($xml) {
		$xmlString = $xml->asXML();
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SubChild.com - Live XML Editor</title>
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
				GLR.messenger.show({msg:"Generating file...", mode:"loading"});
				$.post("do/saveXml.php", {xmlString:xmlEditor.getXmlAsString(), xmlFilename:"<?php echo $xmlFilename ?>"}, function(data){
					if (data.error){
						GLR.messenger.show({msg:data.error,mode:"error"});
					}
					else {
						GLR.messenger.inform({msg:"Done.", mode:"success"});
						if (!$("button#viewFile").length){
							$("<button id='viewFile'>View Updated File</button>")
								.appendTo("#actionButtons div")
								.click(function(){ window.open(data.filename); });
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
	//	$("#todos, #links").height($("#about").height()+"px");
});
</script>
</head>

<body>
	<div id="header">
		<a href="index.php" id="home"></a>
	</div>
  
<?php /*   <div style="margin:50px auto; width:500px; text-align:center; font:helvetica neue, arial;">I'm working on this at the moment so it might be funky for a bit. And yes, I'll try not to make changes in "production" in the future.</div> */ ?>
  
	<div id="xml" style="display:none;"></div>
	<div id="actionButtons" style="display:none;">
		<div></div>
		<button id="saveFile">Save XML</button>
	</div>
	<div id="nodePath"></div>

	<?php /* if ($xmlString){ ?><textarea style="display:none;" id="xmlString"><?php=$xmlString?></textarea><?php } */ ?>
	
</body>
</html>

