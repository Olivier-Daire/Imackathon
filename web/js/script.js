$(document).ready(function () {
	
	function getXMLByYear( filename, year ) {
		$.ajax({
			type: "GET",
			url: filename,
			cache: false,
			dataType: "xml",
			success: function(xml) {
				$(xml).find('semester').each(function(){
					var semesterNumber = $(this).attr("number");
				
					$("#year" + year ).append("<div class='semestre' id='semestre" + semesterNumber + "'><h1>Année " + year + ", Semestre" + semesterNumber + "</h1><div class='content'></div></div>");
				
					$(this).find("ue").each(function(){
						$("#year" + year + " #semestre" + semesterNumber + " .content").append("<div class='column'><div class='block' style='width: 200px; height: 200px;'><h3>" + $(this).attr("name") + "</h3></div></div>");
					
					});
				
				});
			}
		});
	}
	
	getXMLByYear( "../xml/IMAC1.xml", 1 );
	getXMLByYear( "../xml/IMAC2.xml", 2 );
	getXMLByYear( "../xml/IMAC3.xml", 3 );
	
});