<?php
		require_once('../include/connect.php');
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
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../images/logo.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
               <!-- the firmVote Logo -->
			 <?php
                $dep = "SELECT sys_name, logo FROM system_tbl WHERE status = '1'";
				$result = mysql_query($dep)  or die('Could not look up Departments data; ' . mysql_error());
				 while ($row = mysql_fetch_assoc($result))
				{
				
				echo ' <img src="../'. $row['logo'] .'" /><br><br>';
               
					echo '<h1>' . $row['sys_name'] . '</h1><br>';
				}
					?>
                <!-- the firmVote Logo -->
				<nav class="codrops-demos">
					<a href="index.php#toregister">Register Voter</a>
					<a href="view.php">View Voters</a>
					<a href="index.php#tologin">Election Report</a>
                    <a href="../"  class="current-demo">logout</a>
				</nav>
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toview"></a>
                    <div id="wrapper">
                    
                    <!--This wrapper is for the Voter Registration -->
                    	 <div id="register" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1> Register Voter </h1> 
                                <p> 
                                    <label >Your username</label>
                                    <select name="title" id="title">
                                        <option>-Choose-</option>
                                        <option>Mr.</option>
                                        <option>Miss</option>
                                        <option>Mrs.</option>
                                	</select>
                                </p>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Surname</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" /> 
                                </p>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > First Name</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" /> 
                                </p>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Other Names</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" /> 
                                </p>
                                
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Student ID</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="usernamesignup">Gender</label>
                                    <table>
                                    	<tr>
                                        	<td>
                                    			<input type="radio" name="gender" id="gender" checked="checked" value="Male" /> Male
                                            </td>
                                			<td>
                                        		<input type="radio" name="gender" id="gender" value="Female" /> Female
                                            </td>
                                        </tr>
                                    </table>
                                </p>
                                <p> 
                                    <label >Department</label>
                                    <select name="title" id="title">
                                        <option>-Choose-</option>
                                        <option>Computer Science</option>
                                        <option>Business</option>
                                        <option>Nursing</option>
                                	</select>
                                </p>
                                <p> 
                                    <label >Level</label>
                                    <select name="title" id="title">
                                        <option>-Choose-</option>
                                        <option>100</option>
                                        <option>200</option>
                                        <option>300</option>
                                	</select>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									<!--Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>-->
								</p>
                            </form>
                        </div>
						
                        <!--This wrapper is for the View Voters -->
                            <div id="login" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1> Election Report </h1> 
                                <!--<p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>-->
                                <p>This is where we display all the voters</p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>