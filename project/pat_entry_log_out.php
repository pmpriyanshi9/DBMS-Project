 <?php 
//Destroy the session 
session_start(); 
session_unset(); 
session_destroy(); 
//Redirect to login page 
header("location: pat_entry_login_form.php"); 
exit(); 
?>
