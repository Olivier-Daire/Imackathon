$(document).ready(function () {
	
	var lastScrollTop = 0;
	var window_height = $(window).height();
	var window_top = $(window).scrollTop();
	

	$( window ).scroll(function() {
		var st = $(this).scrollTop();
		console.log(st);
		$('#wrapper-content').css('top', 0.01 * st);
		window_top = $(window).scrollTop();
		lastScrollTop = st;		
	});
	
	
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
					
					var cptBackground = 1;
					var ColorBackground;
					
					$(this).find("ue").each(function(){
					
						if(cptBackground == 1) ColorBackground = "#436D77";
						if(cptBackground == 2) ColorBackground = "#F15D49";
						if(cptBackground == 3){
							ColorBackground = "#76AF50";
							cptBackground=1;	
						}
					
						$("#year" + year + " #semestre" + semesterNumber + " .content").append("<div class='column'><div class='block' style='width: 200px; height: 200px; background-color: "+ColorBackground+"'><h3>" + $(this).attr("name") + "</h3></div></div>");
						cptBackground++;
					
					});
				
				});
			}
		});
	}
	
	getXMLByYear( "xml/IMAC1.xml", 1 );
	getXMLByYear( "xml/IMAC2.xml", 2 );
	getXMLByYear( "xml/IMAC3.xml", 3 );
	
});