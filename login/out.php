<?php
		session_start();
		require_once('../include/connect.php');
		require_once('../include/functions.php');
		
		//Probably caused by back button... Check if logged-in...
		if(!$_SESSION['ID'])
		{
			//Do not show protected data, redirect to login...
			header('Location: ../index.php');
		}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>firmVote 0.2</title>
        <meta name="description" content="firmVote 0.2 - This is a voting system" />
        <meta name="keywords" content="firmVote, creative, effective votes, votes, voting system, easy vote" />
        <meta name="author" content="Michael Johnson" />
        <link rel="shortcut icon" href="images/logo.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
                <!-- the firmVote Logo -->
			 <?php
             	    $append = "../assets/";
					head_banner($append);
			 ?>
                <!-- the firmVote Logo -->
            </header>
            <section>				
                <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <?php
							
							//Successful voting
							
                            	final_votes();
							?>
                        </div>

                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>