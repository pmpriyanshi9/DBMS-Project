
 
<?php 
session_start(); 
session_unset(); 
session_destroy(); 
?> 
<html> 
<head> 
<title>Doctor Login Page</title> 
</head> 
<body> 
<h3 align="center"> - Enter your login Details - </h3> 
<form name="doctor_login_form" method="post" action="doctor_login_check.php"> 
<table width="300" border="1" align="center" cellpadding="5" cellspacing="0"> 
<tr> 
<td style="color:rgb(6,59,118)"><b>Login</b></td> 
<td><input name="login" type="text" id="login" /></td> 
</tr> 
<tr> 
<td style="color:rgb(6,59,118)"><b>Password</b></td> 
<td><input name="password" type="password" /></td> 
</tr> 
<tr> 
<td colspan="2" align="center"> 
<input type="submit" name="submit" value="submit" /></td> 
</tr> 
</table> 
</body> 
</html>
