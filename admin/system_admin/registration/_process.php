<?php

		// Accept the inputs

		function good_surname(){
			echo '<span class="notification-input ni-correct">This is correct, thanks!</span>';
			}

		function error_msg(){
			echo '<span class="notification-input ni-error">Sorry, try again.</span>';
			}

		function raw_form($connection)
		{
			echo '<div class="module">
                     <h2><span>Voter Registration</span></h2>

                     <div class="module-body">

			<form name="frmVoterReg" id="frmVoterReg" method="post" action="reg_voter.php">

                            <table width="200" border="0" cellspacing="0" cellpadding="0">
							<tr>
                                <td><label>Title</label></td>
                                <td colspan="2"><select name="title" id="title" class="input-short">
                                    <option>-Choose-</option>
                                    <option>Mr.</option>
                                    <option>Miss</option>
                                    <option>Mrs.</option>
                                </select></td>
                                <td>&nbsp;</td>
                              </tr>
                               <tr>
                                <td><label>Surname :</label></td>
                                <td colspan="2"><input name="surname" id="surname" type="text" class="input-medium" /></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><label>First Name :</label></td>
                                <td colspan="2"><input name="firstName" id="firstName" type="text" class="input-medium" /></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><label>Middle Name :</label></td>
                                <td colspan="2"><input name="middleName" id="middleName" type="text" class="input-medium" /></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><legend>Gender</legend></td>
                                <td><label><input type="radio" name="gender" id="gender" checked="checked" value="Male" /> Male</label></td>
                                <td><label><input type="radio" name="gender" id="gender" value="Female" /> Female</label></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><label>Department</label></td>
                                <td colspan="2">';

									  $dep = "SELECT ID, dep_name FROM department_tbl ORDER BY dep_name ASC";
									  $result = mysqli_query($connection, $dep)  or die('Could not look up Departments data; ' . mysqli_error());

									 echo  '<select name="dep" id="dep" class="input-medium">' ;
										echo '<option>-Choose-</option>';
									  while ($row = mysqli_fetch_assoc($result))
									  {

										echo '<option value="' . $row['ID'] .'">' .
										$row['dep_name'];
										echo  "<br />\n</option>";
									  }
									  echo '</select>' ;


                                    echo '</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><label>Level</label></td>
                                <td colspan="2">';

									  $lvl = "SELECT ID, level FROM level_tbl ORDER BY level ASC";
									  $result2 = mysqli_query($connection, $lvl)  or die('Could not look up Course data; ' . mysqli_error());

									 echo  '<select name="lvl" id="lvl" class="input-medium">' ;
										echo '<option>-Choose-</option>';
									  while ($row = mysqli_fetch_assoc($result2))
									  {

										echo '<option value="' . $row['ID'] .'">' .
										$row['level'];
										echo  "<br />\n</option>";
									  }
									  echo '</select>' ;
								echo '</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><label>Student ID :</label></td>
                                <td colspan="2"><input name="std_id" id="std_id" type="text" class="input-short" /></td>
                                <td>&nbsp;</td>
                              </tr>
                               <tr>
                                <td><label>E-mail :</label></td>
                                <td colspan="2"><input name="email" id="email" type="text" class="input-medium" /></td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>

                            <fieldset>
                                <input name="action" id="action" class="submit-green" type="submit" value="Submit" />
                                <input class="submit-gray" type="submit" value="Cancel" />
                       </fieldset>
                       </form>

					   </div> <!-- End .module-body -->

                </div>  <!-- End .module -->';
		}

		function processed_form()
		{
			$title = $_POST['title'];
			$surname = $_POST['surname'];
			$firstname = $_POST['firstName'];
			$middlename = $_POST['middleName'];
			$gender = $_POST['gender'];
			$dep = $_POST['dep'];
			$lvl = $_POST['lvl'];
			$std_id = $_POST['std_id'];
			$email = $_POST['email'];

			if ($surname != "" && $firstname != "" && $dep != "-Choose-" && $lvl != "-Choose-" && $std_id != "")
     		{
				check_voter();
	 		}
			else
			{
				entry_error();
			}
		}

		function insert_values()
		{
			$title = $_POST['title'];
			$surname = $_POST['surname'];
			$firstname = $_POST['firstName'];
			$middlename = $_POST['middleName'];
			$gender = $_POST['gender'];
			$dep = $_POST['dep'];
			$lvl = $_POST['lvl'];
			$std_id = $_POST['std_id'];
			$email = $_POST['email'];

			$registrar = $_SESSION['ID'];
			$date = date("Y-m-d H:i:s");
			$query = "INSERT INTO electrates_tbl( student_id, title, surname, firstName, middleName, gender, department, level, email, registrar_id, date)
					  VALUES ('" . $std_id . "','" . $title. "','" . $surname . "','" . $firstname . "','" . $middlename . "', '" . $gender . "', '" . $dep . "', '" . $lvl . "', '" .  $email . "', '" . $registrar . "', '" . $date . "');";
          $result = mysql_query($query) or die(mysql_error());

		  echo '<span class="notification n-success">' . $surname . " " . $firstName . " " . $middle .' has been registered Successfully</span>';
		  echo "<meta http-equiv=Refresh content=5;url=reg_voter.php>";
		}

		function check_voter()
		{
			$title = $_POST['title'];
			$surname = $_POST['surname'];
			$firstname = $_POST['firstName'];
			$middlename = $_POST['middleName'];
			$gender = $_POST['gender'];
			$dep = $_POST['dep'];
			$lvl = $_POST['lvl'];
			$std_id = $_POST['std_id'];
			$email = $_POST['email'];

          $query = "SELECT * FROM electrates_tbl WHERE student_id = '$std_id';";
          $result = mysql_query($query) or die(mysql_error());

          if (mysql_num_rows($result) != 0)
			{
				echo '<span class="notification n-error"> Voter has already been registered! </span>';
				echo "<meta http-equiv=Refresh content=5;url=reg_voter.php>";

			}
			else
			{
				insert_values();
			}

		}

		function entry_error()
		{
			$title = $_POST['title'];
			$surname = $_POST['surname'];
			$firstname = $_POST['firstName'];
			$middlename = $_POST['middleName'];
			$gender = $_POST['gender'];
			$dep = $_POST['dep'];
			$lvl = $_POST['lvl'];
			$std_id = $_POST['std_id'];
			$email = $_POST['email'];
			echo '<span class="notification n-attention">Please fill the form correctly.</span>';
			echo '<div class="module">
                     <h2><span>Voter Registration</span></h2>

                     <div class="module-body">

					 <form name="frmVoterReg" id="frmVoterReg" method="post" action="reg_voter.php">

                            <table width="200" border="0" cellspacing="0" cellpadding="0">';
							if($dep == "-Choose-")
							{
							echo '<tr>
                                <td><label>Title</label></td>
                                <td colspan="2"><select name="title" id="title" class="input-short">
                                    <option>-Choose-</option>
                                    <option>Mr.</option>
                                    <option>Miss</option>
                                    <option>Mrs.</option>
                                </select></td>
                                <td><span class="notification-input ni-error">Sorry, try again.</span></td>
                              </tr>';
							}
							else
							{
							 echo '<tr>
                                <td><label>Title</label></td>
                                <td colspan="2"><select name="title" id="title" class="input-short">
                                    <option>-Choose-</option>
                                    <option>Mr.</option>
                                    <option>Miss</option>
                                    <option>Mrs.</option>
                                </select></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>';
							}
							if($surname == "")
							{
                              echo' <tr>
                                <td><label>Surname :</label></td>
                                <td colspan="2"><input name="surname" id="surname" type="text" class="input-medium" /></td>
                                <td><span class="notification-input ni-error">Sorry, try again.</span></td>
                              </tr>';
							}
							else
							{
								echo '<tr>
                                <td><label>Surname :</label></td>
                                <td colspan="2"><input name="surname" id="surname" type="text" class="input-medium" value="' . $surname .'"/></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>';
							}
							if($firstname == "")
							{
                              echo '<tr>
                                <td><label>First Name :</label></td>
                                <td colspan="2"><input name="firstName" id="firstName" type="text" class="input-medium" /></td>
                                <td><span class="notification-input ni-error">Sorry, try again.</span></td>
                              </tr> ';
							}
							else
							{
								echo '<tr>
                                <td><label>First Name :</label></td>
                                <td colspan="2"><input name="firstName" id="firstName" type="text" class="input-medium" value="' . $firstname .'"/></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>';
							}
                             echo ' <tr>
                                <td><label>Middle Name :</label></td>
                                <td colspan="2"><input name="middleName" id="middleName" type="text" class="input-medium" value="' .$middlename .'" /></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><legend>Gender</legend></td>';
								if($gender == 'Male')
								{
                                	echo '<td><label><input type="radio" name="gender" id="gender" checked="checked" value="Male" /> Male</label></td>';
									echo '<td><label><input type="radio" name="gender" id="gender" value="Female" /> Female</label></td>';
								}
								else
								{
									echo '<td><label><input type="radio" name="gender" id="gender"/> Male</label></td>';
                                	echo '<td><label><input type="radio" name="gender" id="gender" checked="checked"  /> Female</label></td>';
								}
                               echo ' <td>&nbsp;</td>
                              </tr>';
                              if($dep == "-Choose-")
							  {
								  echo '<tr>
                                <td><label>Department</label></td>
                                <td colspan="2">';

									  $dep = "SELECT ID, dep_name FROM department_tbl ORDER BY dep_name ASC";
									  $result = mysql_query($dep)  or die('Could not look up Departments data; ' . mysql_error());

									 echo  '<select name="dep" id="dep" class="input-medium">' ;
										echo '<option>-Choose-</option>';
									  while ($row = mysql_fetch_assoc($result))
									  {

										echo '<option value="' . $row['ID'] .'">' .
										$row['dep_name'];
										echo  "<br />\n</option>";
									  }
									  echo '</select>' ;


                                    echo '</td>
                                <td><span class="notification-input ni-error">Sorry, please select a department.</span></td>
                              </tr>';
							  }
							  else
							  {
								  echo '<tr>
                                <td><label>Department</label></td>
                                <td colspan="2">';

									  $dep = "SELECT ID, dep_name FROM department_tbl ORDER BY dep_name ASC";
									  $result = mysql_query($dep)  or die('Could not look up Departments data; ' . mysql_error());

									 echo  '<select name="dep" id="dep" class="input-medium">' ;
										echo '<option>-Choose-</option>';
									  while ($row = mysql_fetch_assoc($result))
									  {

										echo '<option value="' . $row['ID'] .'">' .
										$row['dep_name'];
										echo  "<br />\n</option>";
									  }
									  echo '</select>' ;


                                    echo '</td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>';
							  }
                              if($lvl == "-Choose-")
							  {
								  echo '<tr>
                                <td><label>Level</label></td>
                                <td colspan="2">';

									  $lvl = "SELECT ID, level FROM level_tbl ORDER BY level ASC";
									  $result2 = mysql_query($lvl)  or die('Could not look up Level data; ' . mysql_error());

									 echo  '<select name="lvl" id="lvl" class="input-medium">' ;
										echo '<option>-Choose-</option>';
									  while ($row = mysql_fetch_assoc($result2))
									  {

										echo '<option value="' . $row['ID'] .'">' .
										$row['level'];
										echo  "<br />\n</option>";
									  }
									  echo '</select>' ;
								echo '</td>
                                <td><span class="notification-input ni-error">Sorry, please select a Level.</span>
                              </tr>';
							  }
							  else
							  {
								  echo '<tr>
                                <td><label>Level</label></td>
                                <td colspan="2">';

									  $lvl = "SELECT ID, level FROM level_tbl ORDER BY level ASC";
									  $result2 = mysql_query($lvl)  or die('Could not look up Level data; ' . mysql_error());

									 echo  '<select name="lvl" id="lvl" class="input-medium">' ;
										echo '<option>-Choose-</option>';
									  while ($row = mysql_fetch_assoc($result2))
									  {

										echo '<option value="' . $row['ID'] .'">' .
										$row['level'];
										echo  "<br />\n</option>";
									  }
									  echo '</select>' ;
								echo '</td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>';
							  }
							  if($std_id == "")
							  {
								echo'  <tr>
									<td><label>Student ID :</label></td>
									<td colspan="2"><input name="std_id" id="std_id" type="text" class="input-short" /></td>
									<td><span class="notification-input ni-error">Sorry, try again.</span></td>
								  </tr>';
							  }
							  else
							  {
								  echo '<tr>
									<td><label>Student ID :</label></td>
									<td colspan="2"><input name="std_id" id="std_id" type="text" class="input-short" value="'. $std_id .'" /></td>
									<td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
								  </tr>';
								}
                              echo ' <tr>
                                <td><label>E-mail :</label></td>
                                <td colspan="2"><input name="email" id="email" type="text" class="input-medium" /></td>
                                <td></td>
                              </tr>
                            </table>

                            <fieldset>
                                <input name="action" id="action" class="submit-green" type="submit" value="Submit" />
                                <input class="submit-gray" type="submit" value="Cancel" />
                       </fieldset>
                       </form>

					   </div> <!-- End .module-body -->

                </div>  <!-- End .module -->';
		}

		function processed_candidate_form()
		{
			$stud_id = $_POST['stud_id'];
			$file_name = $_FILES['ufile']['name'];
			$position = $_POST['position'];

			if ($stud_id != "" && $position != "-Choose-")
     		{
				check_candidates();
	 		}
			else
			{
				candidate_entry_error();
			}
		}

		function raw_candidate_form(){

             echo '
                <div class="module">
                     <h2><span>Candidate Registration</span></h2>

                     <div class="module-body">
                     <form name="frmCandidate" id="frmCandidate" action="reg_candidate.php" method="post" enctype="multipart/form-data">

                            <table width="200" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><legend>Candidate\'s ID :</legend></td>
                                <td>Please Select the Candidate\'s ID number&nbsp;</td>
                              </tr>
                              <tr>
                                <td valign="top">&nbsp;<!--<label>Department</label>--></td>
                                <td colspan="2">';

									$dep = "SELECT ele_ID, student_id FROM electrates_tbl ORDER BY student_id ASC";
									  $result = mysql_query($dep)  or die("Could not look up Departments data; " . mysql_error());

									 echo '<select name="stud_id" id="stud_id" size="10" class="input-medium">' ;

									 while ($row = mysql_fetch_assoc($result))
									  {

										echo '<option value="' . $row['ele_ID'] .'">' .
										$row['student_id'];
										echo  "<br />\n</option>";
									  }
						echo '</select>
                              </td>
                              </tr>
                              <tr>
                                <td><label>Candidate\'s Image :</label></td>
                                <td colspan="2"><input name="ufile" type="file" id="ufile" size="35" /></td>
                              </tr>
                              <tr>
                                <td><label>Position :</label></td>
                                <td colspan="2">';

									$dep = "SELECT ID, name FROM position_tbl ORDER BY name ASC";
									  $result = mysql_query($dep)  or die('Could not look up Departments data; ' . mysql_error());

									 echo  '<select name="position" id="position" class="input-medium">
									 		<option>-Choose-</option>';
									 while ($row = mysql_fetch_assoc($result))
									  {

										echo '<option value="' . $row['ID'] .'">' .
										$row['name'];
										echo  "<br />\n</option>";
									  }
						 echo '</select>
						        </td>
                              </tr>
                              <tr>
                                <td><label>Place of Appearance</label></td>
                                <td colspan="2"><select name="place" id="place" class="input-short">
                                    <option>-Choose-</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
									<option>4</option>
                                    <option>5</option>
                                </select></td>
                              </tr>
                            </table>

                            <fieldset>
                                <input name="action" id="action" class="submit-green" type="submit" value="Submit Candidate" />
                                <input class="submit-gray" type="reset" value="Cancel" />
                       </fieldset>
                       </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
				';

			}

		function check_candidates()
		{

			// Define file size limit
				$limit_size=500000;

				$stud_id = $_POST['stud_id'];
				$position = $_POST['position'];
				$place = $_POST['place'];

				// random 4 digit to add to our file name ../s56ka0d9m7i5n2/re6gi7str87at2ion/
				$random_digit=rand(0000,9999);

				$file_name = $_FILES['ufile']['name'];
				$file_size = $_FILES['ufile']['size'];
				$file_type = $_FILES['ufile']['type'];
				$date 	= date("Y-m-d H:i:s");
				$new_file_name= $random_digit . $file_name;

				$path= "uploads/". $new_file_name;

				if($ufile != none)
				{

					// Store upload file size in $file_size
					$file_size=$_FILES['ufile']['size'];

					if($file_size >= $limit_size)
					{
						echo "Your file size is over limit<BR>";
						echo "Your file size = ".$file_size;
						echo " K";
						echo "<BR>File size limit = 500000 k";
					}
					else
					{
						//copy file to where you want to store the file
						if(move_uploaded_file($_FILES['ufile']['tmp_name'], $path))
						{
							echo "Successful<BR/>";
							echo $stud_id . "<br />";
							echo $position . "<br />";
							echo $place . "<br />";
							echo $new_file_name . "<br />";
							echo $file_size . "<br />";
							echo $file_type . "<br />";
							echo "<img src=\"$path\" width=\"280\" height=\"280\">";


							$sql = "INSERT INTO candidates_tbl (student_id, position_id, image_link, place, date) " .
								"VALUES ('" . $stud_id . "','" . $position . "','" . $path . "','" . $place . "','" .  $date . "') ";
								mysql_query($sql) or die('Sorry Candidate registration failed; ' . mysql_error());
								//redirect('../s56ka0d9m7i5n2/re6gi7str87at2ion/reg_candidate.php');
								echo "<meta http-equiv=Refresh content=2;url=reg_candidate.php>";
						}
						else
						{
							echo '<span class="notification n-error">Copy Error.</span>';
						}
					}
				}
		}

		function candidate_entry_error()
		{
			echo '<span class="notification n-error">There are errors in your code OGA.</span>';
		}
?>