<?php
	session_start();
	require_once("../../../include/connect.php");
	require_once '../../../include/http.php';	
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
        <link rel="shortcut icon" type="image/x-icon" href="../images/logo.ico" />
       
        <!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="../css/reset.css" tppabs="css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="../css/grid.css" tppabs="css/grid.css" media="screen" />
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="../css/styles.css" tppabs="css/styles.css" media="screen" />
        
        <!-- WYSIWYG editor stylesheet -->
        <link rel="stylesheet" type="text/css" href="../css/jquery.wysiwyg.css" tppabs="css/jquery.wysiwyg.css" media="screen" />
        
        <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="../css/tablesorter.css" tppabs="css/tablesorter.css" media="screen" />
        
        <!-- Thickbox stylesheet -->
        <link rel="stylesheet" type="text/css" href="../css/thickbox.css" tppabs="css/thickbox.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <link rel="stylesheet" type="text/css" href="../css/theme-blue.css" tppabs="css/theme-blue.css" media="screen" />
        <!--<link rel="stylesheet" type="text/css" href="css/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-graphite.css" media="screen" />-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="../js/jquery-1.3.2.min.js" tppabs="js/jquery-1.3.2.min.js"></script>
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="../js/jquery.wysiwyg.js" tppabs="js/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="../js/jquery.tablesorter.min.js" tppabs="js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="../js/jquery.tablesorter.pager.js" tppabs="js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="../js/jquery.pstrength-min.1.2.js" tppabs="js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="../js/thickbox.js" tppabs="js/thickbox.js"></script>
        
        <!-- JQuery Validation plugin script 
		<script type="text/javascript" src="../js/nukpola.js" tppabs="js/thickbox.js"></script>-->
        
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
        <script language="JavaScript">

<!--

		<!-- TextInput validation-->
	function validateTextBox()
	{
		var form=document.getElementById("frmVoterReg");
		var surname=form["surname"].value;
		var f_name=form["f_name"].value;
		var dep=form["dep"].value;
		var lvl=form["lvl"].value;
		var student_id=form["student_id"].value;
		var email =form["email"].value;
		var sn_err=document.getElementById("sn_err");
		var fn_err=document.getElementById("fn_err");
		var dep_err=document.getElementById("dep_err");
		var lvl_err=document.getElementById("lvl_err");
		var std_err=document.getElementById("std_err");
		var email_err=document.getElementById("email_err");
		
		if(surname=="")
		{
			//sn_err.innerHTML="<span class=\"notification-input ni-error\">Sorry, try again.</span>";
			sn_err.innerHTML="Sorry, try again.";
		}
		else
		{
			//sn_err.innerHTML="<span class=\"notification-input ni-correct\">This is correct, thanks!</span>";
			sn_err.innerHTML="Good.";
		}
		
		/*if(f_name=="")
		{
			fn_err.innerHTML="Please enter first Name";
		}
		else
		{
			fn_err.innerHTML="";
		}
		
		if(dep=="-Choose-")
		{
			dep_err.innerHTML="Please select the department name";
		}
		else
		{
			dep_err.innerHTML="";
		}
		
		if(lvl=="-Choose-")
		{
			lvl_err.innerHTML="Please select the Level";
		}
		else
		{
			lvl_err.innerHTML="";
		}
		
		if(student_id=="")
		{
			std_err.innerHTML="Please Student Id Number";
		}
		else
		{
			std_err.innerHTML="";
		}*/
		
		if(surname=="" /*|| f_name=="" || dep==" -  Choose - " || lvl==" -  Choose - " || std==""*/)
		{
			alert("Please fill in voter's nformation correctly");
			return false
		}
		else
		{
			return true;
		}
	}
-->
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
							?></a> <a href="../../include/validate.php?action=LOG OUT" id="logout">
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
                           <ul id="nav">
                            <li><a href="#">Registration</a></li>
                            <li id="current"><a href="../dashboard.php">back</a></li>
                            </ul>
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
                        <ul>
                            <li><a href="#">Register Electoral Commission</a></li>
                            <li><a href="reg_candidate.php">Register Candidate</a></li>
                            <li><a href="reg_voter.php">Register Voter</a></li>
                        </ul>
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        