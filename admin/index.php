<?php
		require_once('../include/connect.php');
		require_once('../include/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>firmVote 0.2</title>
        <meta name="description" content="firmVote 0.2 - This is a voting system" />
        <meta name="keywords" content="firmVote, creative, effective votes, votes, voting system, easy vote" />
        <meta name="author" content="Michael Johnson" />
        <link rel="shortcut icon" href="../images/logo.ico">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">


			<header>

				 <!-- the firmVote Logo -->
			 <?php
			 	$append = "../";
			 	head_banner($append, $connection);
			?>
                <!-- the firmVote Logo -->

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>

			</header>

			<section class="main">
				<form name="frmAdminLog" id="frmAdminLog" method="post" action="../include/validate.php" class="form-1">
					<p class="field">
						<input type="text" name="userlogin" id="userlogin" placeholder="Username">
						<i class="icon-user icon-large"></i>
					</p>
						<p class="field">
							<input type="password" name="password" id="password" placeholder="Password">
							<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit" name="action" id="action" value="Sign In"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</form>
			</section>
        </div>
    </body>
</html>