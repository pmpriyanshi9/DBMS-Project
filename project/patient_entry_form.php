
<?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('pat_entry_menu.php'); 
} 
else{ 
header('location:pat_entry_login_form.php'); 
exit(); 
} 
?> 
<html> 
<body> 
<center> 
<h1>ENTER THE DETAILS OF PATIENT </h1> 
<form action = "patient_entry.php" method = "post"> 
<table cellpadding = "10"> 
<tr> 
<td>Patient ID*</td> 
<td><input type="number" name="p_id" maxlength="10"></td> 
</tr> 
<tr> 
<td>Patient Name*</td> 
<td><input type="text" name="p_name" maxlength="40"></td> 
</tr> 

<tr> 
<td>Patient Phone No..</td> 
<td><input type="text" name="p_phone" maxlength="10"></td> 
</tr> 


<tr> 
<td>Patient Age</td> 
<td><input type="number" name="p_age" ></td> 
</tr> 


<tr> 
<td>Patient Address</td> 
<td><input type="text" name="p_address" ></td> 
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