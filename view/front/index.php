<?php session_start(); ?>

<!DOCTYPE html>
	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=640, maximum-scale=1, user-scalable=no">
	
		<title>IMAC</title>
		
		<link href="../../web/css/front/style.css" rel="stylesheet" type="text/css" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
		<script src="../../web/js/script.js"></script>
		<script src="../../web/js/modernizr.js"></script>
	</head>
	<body class="parallax">	
		<div id="wrapper-content">
			<div class="shapes one">
				<svg class="shape triangle" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve" style="transform: translate(0%, -11.58%) matrix3d(-0.80212, 0.59716, 0, 0, -0.59716, -0.80212, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);">
	                    <polygon fill="none" stroke-width="0.3px" stroke="#436D77" stroke-linejoin="round" stroke-miterlimit="10" points="14.921,2.27 28.667,25.5 1.175,25.5 "></polygon>
	            </svg>
				<svg class="shape triangle small" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve" style="transform: translate(0%, -11.58%) matrix3d(-0.80212, 0.59716, 0, 0, -0.59716, -0.80212, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);">
	                    <polygon fill="none" stroke-width="0.3px" stroke="#436D77" stroke-linejoin="round" stroke-miterlimit="10" points="14.921,2.27 28.667,25.5 1.175,25.5 "></polygon>
	            </svg>
				<svg class="shape hexa" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve" style="transform: translate(0%, -0.04%) matrix3d(0.26443, 0.9644, 0, 0, -0.9644, 0.26443, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);">
                    <polygon fill="none" stroke-width="0.8px" stroke="#F15D49" stroke-linejoin="round" stroke-miterlimit="10" points="27.5,21.904 15,28.809  2.5,21.904 2.5,8.095 15,1.19 27.5,8.095 "></polygon>
                </svg>
				<svg class="shape hexa small" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve" style="transform: translate(0%, -0.04%) matrix3d(0.26443, 0.9644, 0, 0, -0.9644, 0.26443, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);">
                    <polygon fill="none" stroke-width="0.6px" stroke="#436D77" stroke-linejoin="round" stroke-miterlimit="10" points="27.5,21.904 15,28.809  2.5,21.904 2.5,8.095 15,1.19 27.5,8.095 "></polygon>
                </svg>
	            <div class="shape circle" style="transform: translate(0%, -33.29%) translate3d(0px, 0px, 0px);"></div>
	            <div class="shape circle small" style="transform: translate(0%, -33.29%) translate3d(0px, 0px, 0px);"></div>
				<div class="shape diamond" style="transform: translate(0%, -349.95%) matrix3d(0.9848, -0.17364, 0, 0, 0.17364, 0.9848, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);"></div>
	        </div>
		</div>
		<div id="header">
			<div id="fade">
				<div id="logo"></div>
			</div>
			<div class="fifty">
				<h2>Image, multimédia, audiovisuel et communication</h2>
				<p>Un des objectifs fondamentaux de cette formation d’ingénieur est d’associer un esprit créatif à une formation scientifique et technique dans les domaines de l’informatique, du multimédia et de l’audiovisuel. Le diplôme d’ingénieur IMAC a pour but de former des cadres supérieurs scientifiques capables de conduire l’étude, la conception, le développement et la réalisation de projets dans les secteurs de l’entreprise ayant trait au traitement et à la gestion de l’information et de la communication.</p>
			</div>
		</div>
		<div align="center" id="popupwindow"><div id="popupcontent"></div><a onclick="return false" href="/" class="close">FERMER</a></div>
		<div id="container"  class="parallax">
			<div class="multimedia">
				<div class="middle">
					<h2>Qu'est-ce qu'on fait ?</h2>
					<img src="../../web/images/hackaton.png">
				</div>
			</div>
			<div class="year" id="year1"></div>
			<div class="year" id="year2"></div>
			<div class="year" id="year3"></div>
		</div>
		<div class="middle2">
			<h2>Vidéo</h2>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/11JooXLaaKY" frameborder="0" allowfullscreen></iframe>
		</div>
		<script src="../../web/js/parallax.js"></script>
	</body>
 <?php include(__DIR__.'/../../web/footer.php'); ?>
</html>
