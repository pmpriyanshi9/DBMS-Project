


<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
   require('doc_menu.php'); 
	// Code to be executed when 'Insert' is clicked. 
	if ($_POST['submit'] == 'submit'){
			//validation flag to check that all validations are done 
			$validationFlag = true; 
			//Check all the required fields are filled 
			if(!($_POST['p_id'] && $_POST['doc_id'] && $_POST['med_name'] &&  $_POST['med_quant'] && $_POST['m_date']))
				{ 	
					echo 'All the fields marked as * are compulsary.<br>'; 
					$validationFlag = false; 
				} 

			else{ 
				$doc_id=$_POST['doc_id'];
				$p_id=$_POST['p_id'];
				$med_name=$_POST['med_name'];
				$med_quant=$_POST['med_quant'];
				$t_name=$_POST['t_name'];
				$m_date=$_POST['m_date'];
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
			$str="select med_quant from medicine where med_name='$med_name'";
$r1=@mysql_query($str);
$row=mysql_fetch_assoc($r1);

 if($row['med_quant']>0){


	$str1="insert into prescribe values('$p_id','$doc_id','$med_name','$m_date')";
	$res1=@mysql_query($str1)or die(mysql_error());
	if(! $res1)
	{
		echo 'There is some problem in inserting the data into prescribe table';
	}

  if($t_name){
	$str2="insert into advise values('$p_id','$doc_id','$t_name','$m_date')";
	$res2=@mysql_query($str2)or die(mysql_error());
	if(! $res2)
	{
		echo 'There is some problem in inserting the data into advise table';
	}
  }

$str3="update medicine set med_quant=med_quant - '$med_quant' where med_name='$med_name' ";
$res3=@mysql_query($str3)or die(mysql_error());
if(! $res3)
{
  echo 'There is some problem in updating the quantity of medicine in medicine table';
}


 }
 else echo 'medicine is not available (out of stock)';

			}
				}
			}
			
 
	else{ 
			header('location:doctor_login_form.php'); 
			exit(); 
		} 
?>

