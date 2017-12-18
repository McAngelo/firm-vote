<?php
	$currentPage = basename($_SERVER['SCRIPT_NAME']);
	session_start();
	require_once("../../include/connect.php");
	require_once("../../include/functions.php");

	//Probably caused by back button... Check if logged-in...
		if(!$_SESSION['ID'])
		{
			//Do not show protected data, redirect to login...
			header('Location: ../../index.php');
		}
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
        <link rel="stylesheet" href="css/reveal.css">

		<script src="js/modernizr.custom.63321.js"></script>
        <script type="text/javascript" src="js/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="js/jquery.reveal.js"></script>

	</head>
	<body>

		<div class="container">
            <form name="frmVote" id="frmVote" method="post" action="../out.php">

			<header class="clearfix">
				 <!-- the firmVote Logo -->
                 <div style="padding-top:5px; width:1200px; margin-top:20px; margin-left:350px; margin-bottom:20px; position:relative;" align="center">
                 <table width="1000">
                	<tr>
			 <?php
                $dep = "SELECT sys_name, logo FROM system_tbl WHERE status = '1'";
				$result = mysqli_query($connection, $dep)  or die('Could not look up Departments data; ' . mysqli_error());
				 while ($row = mysqli_fetch_assoc($result))
				{
					echo'';

					echo '<td width="30%" align="left"><img src="../../'. $row['logo'] .'" /></td>';

					echo '<td width="50%" align="center"><h1>' . $row['sys_name'] . '</h1></td>';
				}
					?>
                        <td width="30%" align="right">
                        	<!--<a href="#" class="big-link" data-reveal-id="myModal">-->
                            	<button type="submit" style="border:none; cursor: pointer;" ><img src="images/vote.png" /></button>
                         <!-- <input type="submit" name="action" id="action" value="Vote" />
                              </a>-->

                        </td>
                    </tr>
                    <tr>
                    <td align="center"><font color="#0099FF" size="+1"><?php echo 'Hello "' . $_SESSION['firstName'] . '"' ;?></font></td>
                    <td align="center"><?php
							if ($currentPage == $currentPage)
							{
								echo "<h3>{Display Position Here}</h3>";
							}
					?></td>
                    <td>&nbsp;
					</td>
                    </tr>
                </table><br><br><hr width="1000"/>
                 </div>
                <!-- the firmVote Logo -->
			</header>
            <input type="hidden" id="voted" name="voted" value="yes">
			<div class="main">
				<div id="mi-slider" class="mi-slider">

                    <?php


               		// <!-- The Candidates for Positions -->

					positions($connection);

					// <!-- The Candidates for Positions ends here -->


                   // <!-- The navigation controls  -->

					navigation($connection);

					//<!-- The navigation controls ends here -->
					?>

				</div>
			</div>
         </form>
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