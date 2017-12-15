<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vote</title>
<style type="text/css">
body { margin:135px 0px 0px 0px;
	background-color: #FFFFFF;
}
body,td,th {
	color: #333333;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
a:link {
	color: #006600;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #006600;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.font1 {
	color: #666;
}
</style>
<link rel="stylesheet" href="/css/nav.css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {
	font-size: 20px;
	font-weight: bold;
}
.style4 {color: #003300}
-->
</style>
<link href="/css/local.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="<?php echo site_url("/login/") ?>">
  <table width="200" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td colspan="2">
	  <?php if (isset($_POST['usr'],$_POST['pass']))
	  echo validation_errors();
	   if (isset($error1))
	   echo $error1
	   ?>&nbsp;</td>
    </tr>
    <tr>
      <td>Username</td>
      <td><label for="usr"></label>
      <input type="text" name="usr" id="usr" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="pass" id="pass" />
      <label for="textfield3"></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
  </table>
</form>

</body>
</html>
