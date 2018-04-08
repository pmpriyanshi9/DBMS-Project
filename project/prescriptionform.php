
<?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('doc_menu.php'); 
} 
else{ 
header('location:doctor_login_form.php'); 
exit(); 
} 
?> 
<html> 
<body> 
<center> 
<h1>PRESCRIPTION PAGE</h1> 
<form action = "prescription.php" method = "post"> 
<table cellpadding = "10"> 
<tr> 
<td>Patient ID*</td> 
<td><input type="text" name="p_id" maxlength="25"></td> 
</tr> 
<tr> 
<td>Doctor ID*</td> 
<td><input type="text" name="doc_id" maxlength="25"></td> 
</tr> 

<tr> 
<td>Medicine Name*</td> 
<td><input type="text" name="med_name" maxlength="25"></td> 
</tr> 

<tr> 
<td>Medicine Quantity*</td> 
<td><input type="text" name="med_quant" ></td> 
</tr> 
<tr> 
<td>Test Name</td> 
<td><input type="text" name="t_name" maxlength="25"></td> 
</tr> 
<tr> 
<td>Date<*/td> 
<td><input type="date(yyyy-mm-dd)" name="m_date" ></td> 
</tr> 



</table> 
<table cellpadding = "20"> 
<tr> 
<td><input type="submit" name="submit" value="submit"></td> 

</tr> 
</table> 
</form> 
</center> 
</body> 
</html>