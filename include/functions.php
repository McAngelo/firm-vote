<?php


	//This displays the banner and system information
	function head_banner($append, $connection)
	{
		$dep = "SELECT sys_name, logo FROM system_tbl WHERE status = '1'";
				$result = mysqli_query($connection, $dep)  or die('Could not look up Departments data; ' . mysqli_error());
				 while ($row = mysqli_fetch_assoc($result))
				{
				if($append != "")
				{
					echo '<a href="../"> <img src="'. $append . $row['logo'] .'" /></a><br><br>';
				}
				else
				{
					echo ' <img src="' . $row['logo'] .'" /><br><br>';
				}
					echo '<h1>' . $row['sys_name'] . '</h1><br>';
				}
	}

	// this functions accepts user login
	function candidate_login()
	{
		echo '<form name="frmVoterLogin" id="frmVoterLogin" method="post"  action="index.php" autocomplete="on">
					<input type="hidden" name="voted" value="yes">
                    <h1>Log in</h1>
                    <p>
                    	<label for="student" class="uname" data-icon="u" > Your Student ID </label>
                    	<input id="studentID" name="studentID" type="text" required placeholder="CS 02001928"/>
                    </p>
                    <p class="login button">
                        <input type="submit" name="action" id="action" value="Login" />
					</p>
              </form>';
	}

	//This function display an error that indicates incorrect input format
	function login_error()
	{
		echo '<h1>Error</h1>
			  <font color="#FF0000" size="+1">Please Verify that you entered a correct STUDENT ID</font><br />';
			 echo "<meta http-equiv=Refresh content=5;url=index.php>";
	}

	//This function display an error that indicates incorrect input
	function input_error()
	{
		echo '<h1>Error</h1>
			  <font color="#FF0000" size="+1">You have entered an incorrect STUDENT ID format</font><br />';
			  echo "<meta http-equiv=Refresh content=5;url=index.php>";
	}

	//This function display login success
	function login_success($student_id, $connection)
	{
		$voter = "SELECT student_id,	title,	surname,	firstName,	middleName FROM electrates_tbl WHERE student_id = '" . $student_id . "'";
				$result = mysqli_query($connection, $voter)  or die('Could not look up Electrates data; ' . mysqli_error());
				 while ($row = mysqli_fetch_assoc($result))
				{
					$name = $row['title'] . " " . $row['surname'] . " " . $row['firstName'] . " " . $row['middleName'];

					echo '<h1>Welcome</h1>
			 				 <font size="+1">' . $name . '</font><br />
			 				 <font size="+1">ID : ' . $student_id . ' </font><br /><br />
							 <font color="#0000FF">Enjoy a simple voting experience</font>';

     				$_SESSION['ID'] = $row['student_id'];
     				$_SESSION['firstName'] = $row['firstName'];

				  	echo "<meta http-equiv=Refresh content=5;url=votes/v78o10t93e62r.php>";
				}
	}

	//This function display an error that indicates double voting
	function fraud_alert($student_id, $connection)
	{
		$voter = "SELECT student_id,	title,	surname,	firstName,	middleName FROM electrates_tbl WHERE student_id = '" . $student_id . "'";
				$result = mysqli_query($connection, $voter)  or die('Could not look up Electrates data; ' . mysqli_error());
					 while ($row = mysqli_fetch_assoc($result))
					{
						$name = $row['title'] . " " . $row['surname'] . " " . $row['firstName'] . " " . $row['middleName'];
							echo '<h1>Fraud Alert</h1>
								 <font color="#FF0000" size="+1">'. $name .' has already voted</font>';
								 echo "<meta http-equiv=Refresh content=6;url=index.php>";
					}
	}

	//This is function actually performs the voting process
	function vote_success($connection, $id)
	{
		//send the user back to thepage they were just viewing
		echo '<h1>Congratulations !!!</h1>
			  <font color="#0000FF" size="+1">Thank You for Successfully Voting with firmVote 2.0</font><br />';

	  		$resulta = mysqli_query($connection, "SELECT * FROM position_tbl ORDER BY page_number ASC");
	         	$row_nr = mysqli_num_rows($resulta);

	  		if ($row_nr >= 1)
	  		{
	  			while($myrow = mysqli_fetch_array($resulta))
	  			{

					//update candidate's polls
	  				$id	  = $myrow['post_name'];
	  				$name = $myrow['name'];
	  				$elected_can = $_POST["$id"];
					$post_polls = "UPDATE candidates_tbl
									SET polls = polls+1
									WHERE student_id ={$elected_can}";

					mysqli_query($connection, $post_polls) or die('Sorry could not update voter count; ' . mysqli_error());

					//echo $name . " -------> " . $elected_can . "<br>";
	  			}

				// count the voter and make him / her nullify to vote again
					$stud_id = $_SESSION['ID'];
					$date 	= date("Y-m-d H:i:s");
					$status = 1;

					$count_voter = "INSERT INTO votes_tbl(student_id, status, time) " .
								"VALUES ('" . $stud_id . "','" . $status ."','" . $date . "') ";

						mysqli_query($connection, $count_voter) or die('Sorry could not update voter count; ' . mysqli_error());
			}

		 echo "<meta http-equiv=Refresh content=5;url=../index.php>";

	}

	//This function submits the elected candidates to be voted for
	function final_votes($connection)
	{
		echo '<h1>You elected the following...</h1>';

		echo '<form id="frmVote" name="frmVote" method="post" action="thanks.php">
			<table width="450" border="1" cellpadding="2" cellspacing="2" align="center">
			  <tr>
				<td align="center" width="40%">Position</td>
				<td align="center" width="20%">Image</td>
				<td align="center" width="40%">Name</td>
			  </tr>';

		$resulta = mysqli_query($connection, "SELECT * FROM position_tbl ORDER BY page_number ASC");
       	$row_nr = mysqli_num_rows($resulta);

		if ($row_nr >= 1)
		{
			while($myrow = mysqli_fetch_array($resulta))
			{
				$id	  = $myrow['post_name'];
				$post = $myrow['ID'];
				$name = $myrow['name'];
				$display_post = $_POST["$id"];

				$can_result = mysqli_query($connection, "SELECT * FROM candidates_tbl, electrates_tbl
										   WHERE electrates_tbl.ele_ID =" . $display_post . "
										   AND candidates_tbl.student_id = electrates_tbl.ele_ID
										   ORDER BY place ASC");

				$elected_row_can = mysqli_num_rows($can_result);
				$no_elected_can = "No " . $name;


				echo '<tr>';
				echo '<td width="40%">'. $name .'<br /></td>';

				if($elected_row_can >= 1)
				{
					while($final_vote = mysqli_fetch_array($can_result))
					{

						@$elected_can = $final_vote['title'] . " " . $final_vote['surname'] . " " . $final_vote['firstName'] . " " . $final_vote['middleName'];
						echo '<td align="center" width="20%"><img src="../admin/system_admin/registration/' . $final_vote['image_link'] .'" width="50" height="50"/><br /></td>';
						echo '<td width="40%">' . $elected_can .'<br /><input type="hidden" name="'. $id .'" id="'. $id .'" value="'. $display_post .'"</td>';
					}
				}
				else
				{
					echo '<td align="center" width="20%"><img src="votes/images/p.jpg" width="50" height="50"/><br /></td>';
					echo '<td width="40%">' . $no_elected_can .'<br /><input type="hidden" name="'. $id .'" id="'. $id .'" value="'. $display_post .'"</td>';
				}

				echo '</tr>';

			}
			echo '</table>
				  <p class="login button">
                        <input type="submit" name="action" id="action" value="Confirm Vote" />&nbsp;&nbsp;&nbsp;
						<input type="button" onclick="history.back(-1)" id="action" value="Cancel" />
					</p>';
			echo '</form>';
		}
	}

	// This function prints all the position from the system
	function positions($connection)
	{
		$result = mysqli_query($connection, "SELECT * FROM position_tbl ORDER BY page_number ASC");
       	$row_nr = mysqli_num_rows($result);

		if ($row_nr >= 1)
		{
			while($myrow = mysqli_fetch_array($result))
			{
				@$i = $i + 1;
				$post = $myrow['ID'];
				$name = $myrow['name'];
				$id	  = $myrow['post_name'];

              	echo '<ul>';
                    	candidates($connection, $post, $name, $id);
				echo '</ul>';

			}

		}
		elseif($row_nr == 0)
		{
				echo '<ul>
						<li>
                            <a href="#">
                            <img src="images/p.jpg" alt="img02" />
                            <h4>Please you do not have any candidates in the system</h4></a>
                        </li>
					</ul>';

		}

	}

	// This function prints all the candidates for each position from the system
	function candidates($connection, $post, $name, $id)
	{
		$can_result = mysqli_query($connection, "SELECT * FROM candidates_tbl, electrates_tbl
							   	   WHERE candidates_tbl.position_id ={$post}
								   AND candidates_tbl.student_id = electrates_tbl.ele_ID
								   ORDER BY place ASC");
       	$row_can = mysqli_num_rows($can_result);

		if ($row_can >= 1)
		{
			$non = $id . 0;
			$non_name = "No " . $name ;
			$key_non = 0;
			echo '<li>
				  		<input type="radio" name="'. $id .'" id="'. $non .'" value="'. 0 .'" checked="checked"/>';
            echo        "<a href=\"#\" onClick=\"document.getElementById('{$non}').checked= true;\">";
            echo '     <img src="images/p.jpg" alt="img02" />
                        <h4>' . $name . '</h4></a>
                   </li>';
			while($mycan = mysqli_fetch_array($can_result))
			{
				@$i = $i + 1;
				$can = $id.$i;
				$can_name = $mycan['title'] . " " . $mycan['surname'] . " " . $mycan['firstName'] . " " . $mycan['middleName'];
				$key_id = $mycan['ele_ID'];
              	echo '<li>
                        	<input type="radio" name="'. $id .'" id="'. $can .'" value="'. $key_id .'"/>';
                echo        "<a href=\"#\" onClick=\"document.getElementById('{$can}').checked= true;\">";
                echo '      <img src="../../admin/system_admin/registration/'. $mycan['image_link'] .'"/>
                            <h4>' . $can_name .'</h4></a>
                     </li>';

			}

		}
		elseif($row_can == 0)
		{
				echo '<li>
                            <a href="#">
                            <img src="images/p.jpg" alt="img02" />
                            <h4>There are no candidates for this position</h4></a>
                      </li>';
		}
	}

	// This function prints the navigation links to the user
	function navigation($connection)
	{
    	echo '<nav>';
		$result_nav = mysqli_query($connection, "SELECT name FROM position_tbl ORDER BY page_number ASC");
		$row_nav = mysqli_num_rows($result_nav);

			if ($row_nav >= 1)
			{
				while($mynav = mysqli_fetch_array($result_nav))
				{
					echo   '<a href="#president"  title="'. $mynav['name'] .'"><img src="images/vote-icon.gif" /></a>';
				}
			}
			elseif($row_nav == 0)
			{
				echo '<h4>Please you do not have any candidates in the system</h4>';
			}
            echo '</nav>';
	}
?>