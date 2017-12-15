<?php
require_once 'connect.php';
require_once 'http.php';

	if (isset($_REQUEST['action'])) 
	{
		 switch ($_REQUEST['action']) 
		 {
			  /*-------------  This is the System Admin login code --------------*/
				  case 'Sign In':
			   if (isset($_POST['userlogin']) and isset($_POST['password']))
			   {
				$sql = "SELECT * FROM system_admin_tbl " .
					   "WHERE userName='" . $_POST['userlogin'] . "'" .
					   "AND password='". $_POST['password'] . "'";
				$result = mysql_query($sql, $connection)
				 or die('Could not look up admin information; ' . mysql_error());
			
				if ($row = mysql_fetch_array($result)) 
				{
					 $last_log = $row['current_login'];
					 $date = date("Y-m-d H:i:s");
					 $id = $row['sysAd_id'];
					 
					 $sql_update = "UPDATE system_admin_tbl " .
						   "SET last_login ='" . $last_log . "'" .
						   ", current_login ='". $date . "'" .
						   "WHERE sysAd_id ='". $id . "'";
						   
					$result2 = mysql_query($sql_update) or die('Could not log in this user; ' . mysql_error());
					 
					 // this is for the System Administrator
					 
					 if($row['acc_lvl'] == 1)
					 {
						 session_start();
						 $_SESSION['ID'] = $row['sysAd_id'];
						 $_SESSION['firstName'] = $row['firstName'];
						 redirect('../a/s56ka0d9m7i5n2/dashboard.php');
					 }
					 
					 // this is for the E. C. Chairman
					 
					 else if($row['acc_lvl'] == 2)
					 {
						 session_start();
						 $_SESSION['ID'] = $row['sysAd_id'];
						 $_SESSION['firstName'] = $row['firstName'];
						 redirect('../e7c2ch3i8a7/dashboard.php');
					 }
					 
					 // this is for the E. C. Member
					 
					 else if($row['acc_lvl'] == 3)
					 {
						 session_start();
						 $_SESSION['ID'] = $row['sysAd_id'];
						 $_SESSION['firstName'] = $row['firstName'];
						 redirect('../ec1j2m/dashboard.php');
					 }
				 
				  
				}
				else
				{
					 redirect('../a/index.php');
				}
			   }
			  
			   break;
		 
			/*------- This is the level registration script---------*/
			case 'Add Level':
			if (isset($_POST['lvl']))
		   {
				$lvl = $_POST['lvl'];
				$date 	= date("Y-m-d H:i:s");
			
				$sql = "INSERT INTO level_tbl (level, date) " .
								"VALUES ('" . $lvl . "','" . $date . "') ";
				mysql_query($sql, $connection) or die('Sorry Level registration failed; ' . mysql_error());
				
				redirect('../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/level_setup.php');
			}
			else
			{
				 redirect('../s56ka0d9m7i5n2/dashboard.php');
				
			}
			
			break;
			
			/*------- This is the level update script---------*/
			case 'Update Level':
			if (isset($_POST['lvl']))
		   {
				$lvl2 = $_POST['lvl'];
				$date1 	= date("Y-m-d H:i:s");
				$lvl_id = $_POST['lvl_id'];
			
				//$sql = "UPDATE level_tbl SET level='" . $lvl2 . "', update='" . $date1 ."' WHERE ID='" . $lvl_id ."'";
				$sql = "UPDATE level_tbl SET level= '$lvl2', up_date= '$date1' WHERE ID= '$lvl_id'";

					mysql_query($sql,$connection) or die('Could not update level record; ' . mysql_error());
				
				redirect('../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/level_setup.php');
			}
			else
			{
				 redirect('../s56ka0d9m7i5n2/dashboard.php');
				
			}
			
			break;
			
			
			/*------- This is the department registration script---------*/
			case 'Add Department':
			if (isset($_POST['dep']))
		   {
				$dep = $_POST['dep'];
				$date 	= date("Y-m-d H:i:s");
			
				$sql = "INSERT INTO department_tbl (dep_name, date_cr) " .
								"VALUES ('" . $dep . "','" . $date . "') ";
				mysql_query($sql, $connection) or die('Sorry Department registration failed; ' . mysql_error());
				
				redirect('../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/department_setup.php');
			}
			else
			{
				 redirect('../s56ka0d9m7i5n2/dashboard.php');
				
			}
			
			break;
		 	  
		  /*------- This is the department update script---------*/
			case 'Update Department':
			if (isset($_POST['dep']))
		   {
				$dep = $_POST['dep'];
				$date 	= date("Y-m-d H:i:s");
				$dep_id = $_POST['dep_id'];
			
				$sql = "UPDATE department_tbl SET dep_name= '$dep', up_date= '$date' WHERE ID= '$dep_id'";

					mysql_query($sql,$connection) or die('Could not update department record; ' . mysql_error());
				
				redirect('../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/department_setup.php');
			}
			else
			{
				 redirect('../s56ka0d9m7i5n2/dashboard.php');
				
			}
			break;
			
			/*------- This is the position registration script---------*/
			case 'Add Position':
			if (isset($_POST['position']))
		   {
				$name = $_POST['position'];
				$place = $_POST['place'];
				$post_space = str_replace (" ", "", $name);
				$post = strtolower($post_space);
				$date 	= date("Y-m-d H:i:s");
			
				$sql = "INSERT INTO position_tbl (name, post_name, page_number, date_cr) " .
								"VALUES ('" . $name . "','" . $post . "','" . $place . "','" . $date . "') ";
				mysql_query($sql, $connection) or die('Sorry Position registration failed; ' . mysql_error());
				
				redirect('../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/position_setup.php');
			}
			else
			{
				 redirect('../s56ka0d9m7i5n2/dashboard.php');
				
			}
			
			break;
		 	  
		  /*------- This is the position update script---------*/
			case 'Update Position':
			if (isset($_POST['position']))
		   {
				$name = $_POST['position'];
				$place = $_POST['place'];
				$post_space = str_replace (" ", "", $name);
				$post = strtolower($post_space);
				$date 	= date("Y-m-d H:i:s");
				$post_id = $_POST['post_id'];
			
				$sql = "UPDATE position_tbl SET name= '$name', post_name= '$post', page_number= '$place', up_date= '$date' WHERE ID= '$post_id'";

					mysql_query($sql,$connection) or die('Could not update position record; ' . mysql_error());
				
				redirect('../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/position_setup.php');
			}
			else
			{
				 redirect('../s56ka0d9m7i5n2/dashboard.php');
				
			}
			break;
			
			/*------- This is the System registration script---------*/
			case 'Submit System':
			
			if (isset($_POST['sys_name']))
		   {
				// Define file size limit 
				$limit_size=500000;
				
				$name = $_POST['sys_name'];
				
				// random 4 digit to add to our file name 
				$random_digit=rand(0000,9999);
				
				$file_name = $_FILES['ufile']['name'];
				$file_size = $_FILES['ufile']['size'];
				$file_type = $_FILES['ufile']['type'];
				$date 	= date("Y-m-d H:i:s");
				$new_file_name= $random_digit . $file_name;
				
				$path= "../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/uploads/". $new_file_name;
			
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
							echo $name . "<br />";
							echo $new_file_name . "<br />";
							echo $file_size . "<br />";
							echo $file_type . "<br />";
							echo "<img src=\"$path\" width=\"300\" height=\"100\">";
							
							/*$sql = "INSERT INTO system_tbl (sys_name, logo, date_cr) " .
								"VALUES ('" . $name . "','" . $path . "','" .  $date . "') ";
								mysql_query($sql, $connection) or die('Sorry System registration failed; ' . mysql_error());
								redirect('../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/poll_setup.php');*/
						}
						else
						{
							echo "Copy Error";
						}
					}
				}
				
			}
			else
			{
				 redirect('../s56ka0d9m7i5n2/dashboard.php');
				
			}
			
			break;
		
		/*------------- This is the Candidates registration code ---------------*/	
			case 'Submit Candidate':
			
			if (isset($_POST['stud_id']) && isset($_POST['position']))
		   {
				// Define file size limit 
				$limit_size=500000;
				
				$stud_id = $_POST['stud_id'];
				$position = $_POST['position'];
				
				// random 4 digit to add to our file name 
				$random_digit=rand(0000,9999);
				
				$file_name = $_FILES['ufile']['name'];
				$file_size = $_FILES['ufile']['size'];
				$file_type = $_FILES['ufile']['type'];
				$date 	= date("Y-m-d H:i:s");
				$new_file_name= $random_digit . $file_name;
				
				$path= "../s56ka0d9m7i5n2/re6gi7str87at2ion/uploads/". $new_file_name;
			
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
							echo $new_file_name . "<br />";
							echo $file_size . "<br />";
							echo $file_type . "<br />";
							echo "<img src=\"$path\" width=\"280\" height=\"280\">";
							
							/*$sql = "INSERT INTO system_tbl (sys_name, logo, date_cr) " .
								"VALUES ('" . $name . "','" . $path . "','" .  $date . "') ";
								mysql_query($sql, $connection) or die('Sorry System registration failed; ' . mysql_error());
								redirect('../s56ka0d9m7i5n2/s5e3t7t7i1n4g9/poll_setup.php');*/
						}
						else
						{
							echo "Copy Error";
						}
					}
				}
				
			}
			else
			{
				 redirect('../s56ka0d9m7i5n2/dashboard.php');
				
			}
			
			break;
			
		/*-------------  This is the log out code --------------*/
		  case 'LOG OUT':
		   session_start();
		   session_unset();
		   session_destroy();
		
		   redirect('../index.php');
		   break;	
			
			
			/*This is the end of the switch ($_REQUEST['action']) */
		 }	
		 
		 /*This is the end of the (isset($_REQUEST['action']))  */   
	}
?>