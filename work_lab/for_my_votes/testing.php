<?php
	session_start();
	require_once("../../include/connect.php");
	require_once("func/functions.php");
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>firmVote 0.2</title>
        <meta name="description" content="firmVote 0.2 - This is a voting system" />
        <meta name="keywords" content="firmVote, creative, effective votes, votes, voting system, easy vote" />
        <meta name="author" content="Michael Johnson" />
		<link rel="shortcut icon" href="../../images/logo.ico"> 
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
	</head>
	<body>
		<div class="container">	
			<!--  -->
            <form name="frmVote" id="frmVote">
			<header class="clearfix">
				 <!-- the firmVote Logo -->
                 
                <table width="1200">
                	<tr>
                    	<td width="50%" align="left"><img src="../../images/ban.png" /></td><td width="50%" align="right"><a href="#"><img onClick="vote();" src="images/vote.png" /></a></td>
                    </tr>
                </table>
                <!-- the firmVote Logo --> 
			</header>
            
			<div class="main">
				<div id="mi-slider" class="mi-slider">
                <?php
               		// <!-- The Candidates for Positions -->
					
					positions();
					
					// <!-- The Candidates for Positions ends here -->					                    
                   // <!-- The navigation controls  -->      
				   
					navigation();
					
					//<!-- The navigation controls ends here --> 
					?>  
                    
				</div>
			</div></form>
		</div><!-- /container -->
        
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.catslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>
	</body>
</html>