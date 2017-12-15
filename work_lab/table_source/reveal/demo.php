<!DOCTYPE html>
<!-- 
 * Markup for jQuery Reveal Plugin 1.0
 * www.ZURB.com/playground
 * Copyright 2010, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 -->
	<head>
		<meta charset="utf-8" />
		<title>Reveal Demo</title>
		
		<!-- Attach our CSS -->
	  	<link rel="stylesheet" href="reveal.css">	
	  	
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="jquery.reveal.js"></script>
		
		<style type="text/css">
			body { font-family: "HelveticaNeue","Helvetica-Neue", "Helvetica", "Arial", sans-serif; }
			.big-link { display:block; margin-top: 100px; text-align: center; font-size: 70px; color: #06f; }
		</style>
		
	</head>
	<body>

		<a href="#" class="big-link" data-reveal-id="myModal">
			Vote
		</a>	
		
		<!--<a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade">
			Fade
		</a>
		
		<a href="#" class="big-link" data-reveal-id="myModal" data-animation="none">
			None
		</a>-->

		<div id="myModal" class="reveal-modal">
			<h1>You have elected the following...</h1>
			<p><?php include 'vote.php';?></p>
			<!--<a class="close-reveal-modal">&#215;</a>-->
		</div>
			
	</body>
</html>