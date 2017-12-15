<?php
		require_once('include/connect.php');
		require_once('include/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>firmVote</title>
        <meta name="description" content="firmVote 0.2 - This is a voting system" />
        <meta name="keywords" content="firmVote, creative, effective votes, votes, voting system, easy vote" />
        <meta name="author" content="Michael Johnson" />
        <link rel="shortcut icon" href="assets/images/logo.ico">
        <link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<script type="text/javascript" src="assets/js/modernizr.custom.79639.js"></script>
		<!--[if lte IE 8]><style>.support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">

			<!-- This is the button that links to the login page -->

			<header>

            <!-- the firmVote Logo -->
			 <?php
			 	$append = "";
			 	head_banner($append, $connection);
			?>
                <!-- the firmVote Logo -->
				<div class="support-note"><!-- let's check browser support with modernizr -->
					<span class="no-csstransforms">CSS transforms are not supported in your browser</span>
					<span class="no-csstransitions">CSS transitions are not supported in your browser</span>
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>

			</header>

			<section class="main">
				<a href="login/login.php">
				<h2 class="cs-text">
					<span>f</span>
					<span>ir</span>
					<span>m</span>
					<span></span>
					<span>v</span>
					<span>ot</span>
					<span>e</span>
					<span></span>
				</h2>
				</a>
			</section>

        </div>
    </body>
</html>