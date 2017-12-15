<?php
	 session_start();
	include("../../include/connect.php");
	
	//Probably caused by back button... Check if logged-in...
		if(!$_SESSION['ID'])
		{
			//Do not show protected data, redirect to login...
			header('Location: ../index.php');
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>firmVote 0.2 | Admin</title>
        
        <!-- Tab Icons -->
        <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico" />
       
        <!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="css/reset.css" tppabs="css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="css/grid.css" tppabs="css/grid.css" media="screen" />
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/styles.css" tppabs="css/styles.css" media="screen" />
        
        <!-- WYSIWYG editor stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/jquery.wysiwyg.css" tppabs="css/jquery.wysiwyg.css" media="screen" />
        
        <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/tablesorter.css" tppabs="css/tablesorter.css" media="screen" />
        
        <!-- Thickbox stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/thickbox.css" tppabs="css/thickbox.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <link rel="stylesheet" type="text/css" href="css/theme-blue.css" tppabs="css/theme-blue.css" media="screen" />
        <!--<link rel="stylesheet" type="text/css" href="css/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-graphite.css" media="screen" />-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="js/jquery-1.3.2.min.js" tppabs="js/jquery-1.3.2.min.js"></script>
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="js/jquery.wysiwyg.js" tppabs="js/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="js/jquery.tablesorter.min.js" tppabs="js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="js/jquery.tablesorter.pager.js" tppabs="js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="js/jquery.pstrength-min.1.2.js" tppabs="js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="js/thickbox.js" tppabs="js/thickbox.js"></script>
        
        <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
	</head>
	<body>
    	<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
					&nbsp;
                    </div>
                    <div class="grid_4">
                        <a id="ses"><?php
					 				if (isset($_SESSION['ID'])) 
									{
					  					echo 'Welcome : '. $_SESSION['firstName'];
									 }
							?></a><a href="../include/validate.php?action=LOG OUT" id="logout">
                        Logout
                        </a>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                           <!-- <ul id="nav">
                                <li id="current"><a href="">Dashboard</a></li>
                                <li><a href="">Articles</a></li>
                                <li><a href="">Files</a></li>
                                <li><a href="">Profile</a></li>
                                <li><a href="">Settings</a></li>
                            </ul>-->
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                       <!-- <ul>
                            <li><a href="#">link 1</a></li>
                            <li><a href="#">link 2</a></li>
                            <li><a href="#">link 3</a></li>
                            <li><a href="#">link 4</a></li>
                            <li><a href="#">link 5</a></li>
                        </ul>-->
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7">
             
                <a href="" class="dashboard-module">
                	<img src="images/Crystal_Clear_user.gif" tppabs="images/Crystal_Clear_user.gif" width="64" height="64" alt="edit" />
                	<span>Home</span>
                </a>
                
            	<a href="re6gi7str87at2ion/reg_voter.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_write.gif" tppabs="images/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	<span>Registration</span>
                </a>
                
                 <a href="ec23oral/ec.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_calendar.gif" tppabs="images/Crystal_Clear_calendar.gif" width="64" height="64" alt="edit" />
                	<span>Electoral Commission</span>
                </a>
               
                <a href="v073in9rog3/votein9ro.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_file.gif" tppabs="images/Crystal_Clear_file.gif" width="64" height="64" alt="edit" />
                	<span>Vote in Progress</span>
                </a>
                
                <a href="r39or7/re90rt.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_files.gif" tppabs="images/Crystal_Clear_files.gif" width="64" height="64" alt="edit" />
                	<span>Reports</span>
                </a>
                
                <a href="s7t5a89itsc/stats.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_stats.gif" tppabs="images/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
                	<span>Statistics</span>
                </a>
                
                <a href="s5e3t7t7i1n4g9/poll_setup.php" class="dashboard-module">
                	<img src="images/Crystal_Clear_settings.gif" tppabs="images/Crystal_Clear_settings.gif" width="64" height="64" alt="edit" />
                	<span>Settings</span>
                </a>
                
              <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            <div style="clear:both;"></div>
            
            
            <div style="clear:both;"></div>
            
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>This is a brief report on the voting in progress:</span></h2>
                        
                     <div class="module-body">
                                 
               <?php 
			   			//Total count for all voters
			   			$all_voters = mysql_query("SELECT * FROM electrates_tbl", $connection);
						$total_voters = mysql_num_rows($all_voters);
						
						if ($total_voters >= 1)
						{
			   			  echo '<p>Currently we have <b>' . $total_voters . ' voters</b>, who have registered.</p> ';
						}
						elseif($total_voters == 0)
						{
							echo '<p>Currently <b> NO voter</b>, has been registered.</p> ';
						}
			   
			   ?> 
               
               <?php 
			   			//Total count for positions registered into the system
			   			$all_positions = mysql_query("SELECT * FROM  position_tbl", $connection);
						$total_positions = mysql_num_rows($all_positions);
						
						if ($total_positions >= 1)
						{
			   			  echo '<p>We have <b>' . $total_positions . ' positions</b>, registered into the system.</p> ';
						}
						elseif($total_positions == 0)
						{
							echo '<p>Currently <b> NO positions</b>, are registered into the system.</p> ';
						}
			   
			   ?>
                 <?php 
			   			//Total count for candidates viaing for positions
			   			$all_candidates = mysql_query("SELECT * FROM  candidates_tbl", $connection);
						$total_candidates = mysql_num_rows($all_candidates);
						
						if ($total_candidates >= 1)
						{
			   			  echo '<p>There are <b>' . $total_candidates . ' candidates</b>, viaing for the positions.</p> ';
						}
						elseif($total_candidates == 0)
						{
							echo '<p>Currently <b> NO candidate</b>, is registered into the system.</p> ';
						}
			   
			   ?>    
               
               <?php 
			   			//Total count for levels
						
			   			$all_levels = mysql_query("SELECT * FROM  level_tbl", $connection);
						$total_levels = mysql_num_rows($all_levels);
						
						if ($total_levels >= 1)
						{
			   			  echo '<p>The vote is been conducted by <b>' . $total_levels . ' levels</b>, in the department.</p> ';
						}
						elseif($total_levels == 0)
						{
							echo '<p>Currently <b> NO level</b>, is registered into the system.</p> ';
						}
			   
			   ?>          
                          
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p>&copy; 2013. <a href="http://www.codafric.com" title="Visit codAfric for updates">firmVote Version 0.2</a></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>