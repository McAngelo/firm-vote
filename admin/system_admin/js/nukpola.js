// JavaScript Document
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
		
		if(f_name=="")
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
		}
		
		if(surname=="" || f_name=="" || dep==" -  Choose - " || lvl==" -  Choose - " || std=="")
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
