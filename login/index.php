<?php
		session_start();
		require_once('../include/connect.php');
		require_once('../include/functions.php');
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
             	    $append = "../";
					head_banner($append, $connection);
			 ?>
                <!-- the firmVote Logo -->
            </header>
            <section>
                <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <?php

							@$voted = $_POST['voted'];
							@$student_id = $_POST['studentID'];

/*							@$voted = mysqli_real_escape_string($_POST['voted']);
							@$student_id = mysqli_real_escape_string($_POST['studentID']);*/

							//check if the user has logged in
							if($voted != "yes")
							{
                            	candidate_login();
							}
							//logged in and check if the user left the input field blank
							elseif(!empty($student_id))
							{

								$verify_voter = "SELECT * FROM votes_tbl WHERE student_id = '" . $student_id . "'";
								$result = mysqli_query($connection, $verify_voter)  or die('Could not Verify Voter; ' . mysqli_error());
								 while ($row = mysqli_fetch_assoc($result))
								{
									$verify = $row['status'];
								}

								$voter_id = "SELECT student_id FROM electrates_tbl WHERE student_id = '" . $student_id . "'";
								$correct_format = mysqli_query($connection, $voter_id)  or die('Could not look up Electrates data; ' . mysqli_error());
								$row_nr = mysqli_num_rows($correct_format);

								//check if the user entered the correct student ID format
								if($row_nr != 1)
								{
									input_error();
								}
								//check if the user has already voted
								elseif(@$verify != 1)
								{
									login_success($student_id, $connection);
								}

								//display a fraud alert
								else
								{
									fraud_alert($student_id, $connection);
								}
							}
							//display an error message
							else
							{
								login_error();
							}
							?>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
</html>