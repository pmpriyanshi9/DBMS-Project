

<?php 
if ($_POST['submit'] == 'submit'){ 

$login = $_POST['login']; 
$password = $_POST['password']; 
if($login && $password){ 
 
$link = mysql_connect('localhost', 'root', ''); 

if(!$link) { 
die('Failed to connect to server: ' . mysql_error()); 
} 
 
$db = mysql_select_db('hospital_management_system'); 
if(!$db) { 
die("Unable to select database"); 
} 
//Create query (if you have a Logins table the you can select login id and password from there)
$qry="SELECT * FROM doctor_login WHERE doc_username='$login' AND doc_password='$password' "; 
//Execute query 
$result=mysql_query($qry); 
//Check whether the query was successful or not 
if($result){ 
//$count = mysql_num_rows($result);
$count = 1; 
} 
else{ 
//Login failed 
include('doctor_login_form.php'); 
echo '<center>Incorrect Username or Password !!!<center>'; 
exit(); 
} 
//if query was successful it should fetch 1 matching record from the table. 
if( $count == 1){ 
   //Login successful set session variables and redirect to prescription form  page. 
     session_start(); 
	 $_SESSION['IS_AUTHENTICATED'] = 1; 
	 $_SESSION['USER_ID'] = $login; 
header('location:prescriptionform.php'); 
} 

else{ 
//Login failed 
include('doctor_login_form.php'); 
echo '<center>Incorrect Username or Password !!!<center>'; 
exit(); 
} 
} 
else{ 
include('doctor_login_form.php'); 
echo '<center>Username or Password missing!!</center>'; 
exit(); 
} 
} 
else{ 
header("location: doctor_login_form.php"); 
exit(); 
} 
?>
