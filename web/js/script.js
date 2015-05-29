$(document).ready(function () {
	var lastScrollTop = 0;
	var window_height = $(window).height();
	var window_top = $(window).scrollTop();
	

	$( window ).scroll(function() {
		var st = $(this).scrollTop();
		$('#wrapper-content').css('top', 0.01 * st);
		window_top = $(window).scrollTop();
		lastScrollTop = st;		
	});
	
	
	var $content = $('#popupcontent');
	var $window = $('#popupwindow');
	
	$(document).on('click', '.open', function(e){
		e.preventDefault();

	    var a = $(this).contents('span');
	    $content.append(a.clone());
	    $window.fadeIn(300);
	});
	$(document).on('click','.close', function(e){
		e.preventDefault();
	    var a = $content.contents('span');
	    $window.fadeOut(300);
	    $('#popupcontent span').remove();
	});

	
	function getXMLByYear( filename, year ) {
		var cpt = (year -1 )*2 +1;
		$.ajax({
			type: "GET",
			url: filename,
			cache: false,
			dataType: "xml",
			success: function(xml) {
				
				$("#year" + year ).append("<div class='separate'></div>");
				$(xml).find('semester').each(function(){
				
					var semesterNumber = $(this).attr("number");
					
					$("#year" + year ).append("<div class='column' id='semestre" + semesterNumber + "'><div class='content'><h3>Semestre " + cpt + "</h3><div class='block'><ul></ul></div></div></div>");
					
					cpt++;
					
					$(this).find("ue").each(function(){
						
						var unite_name = $(this).attr("name");
						var unite_credits = $(this).attr("ects");
						
						$(this).find("course-part").each(function(){
						
							$("#year" + year + " #semestre" + semesterNumber + " .content .block ul").append("<li><a href='#' class='open'>" + $(this).attr("name") + "<span><p>UE : "+ unite_name +" </p><p>Crédits : "+ unite_credits +" </p><p>Coefficient : "+ $(this).attr("coefficient") +"</p></span></a></li>");
							
						});
					});
				});
			}
		});
	}
	
	getXMLByYear( "../../xml/IMAC1.xml", 1 );
	getXMLByYear( "../../xml/IMAC2.xml", 2 );
	getXMLByYear( "../../xml/IMAC3.xml", 3 );
	
});