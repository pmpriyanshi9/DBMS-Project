


<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
   require('pat_entry_menu.php'); 
	
	if ($_POST['submit'] == 'submit'){
			//validation flag to check that all validations are done 
			$validationFlag = true; 
			//Check all the required fields are filled 
			if(!($_POST['p_id'] && $_POST['p_name'] ))
				{ 	
					echo 'All the fields marked as * are compulsary.<br>'; 
					$validationFlag = false; 
				} 

			else{ 
				
				$p_id=$_POST['p_id'];
				$p_name=$_POST['p_name'];
				$p_phone=$_POST['p_phone'];
				$p_age=$_POST['p_age'];
				$p_address=$_POST['p_address'];
				}


			//If all validations are correct, connect to MySQL and execute the query 
			if($validationFlag){ 
			//Connect to mysql server 
			$link = mysql_connect('localhost', 'root', ''); 
				//Check link to the mysql server 
			if(!$link){ 
						die('Failed to connect to server: ' . mysql_error()); 
						} 
				//Select database 
			$db = mysql_select_db('hospital_management_system'); 
			if(!$db){ 
				die("Unable to select database"); 
					} 





				//Create Insert query 
			


	$str="insert into patient values('$p_id','$p_name','$p_age','$p_phone','$p_address')";
	$res=@mysql_query($str)or die(mysql_error());
	if(! $res)
	{
		echo 'There is some problem in inserting the data .Try Again';
	}
	else echo 'Patient Data has been successfully inserted' ;
 


 
			}
				}
			}
			
 
	else{ 
			header('location:pat_entry_login_form.php'); 
			exit(); 
		} 
?>

