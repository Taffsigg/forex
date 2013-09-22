<?php
	//Start session
	session_start();
	$username=$_SESSION['SESS_MEMBER_ID'];
	//Include database connection details
	require_once('database.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	
	$college = clean($_POST['college']);
	$contact = clean($_POST['contact']);
	//Input Validations
	
	if($college == '') {
		$errmsg_arr[] = 'College name missing';
		$errflag = true;
	}
	if($contact == '') {
		$errmsg_arr[] = 'Contact number missing';
		$errflag = true;
	}
	
//Check for contact number
	if($contact != '') {
	if(!is_numeric($contact))
	{
		$errmsg_arr[] = 'Check u r Contact number';
		$errflag = true;
	}
	}

	
	
	
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: edit-profile.php");
		exit();
	}

	//Create INSERT query
	$qry = "UPDATE user_login SET contact = '$contact' WHERE member_id ='$username'";
	$result = @mysql_query($qry);
	$qry = "UPDATE user_login SET college = '$college' WHERE member_id ='$username'";
	$result = @mysql_query($qry);
	//Check whether the query was successful or not
	if($result) {
		header("location: profile.php");
		exit();
	}else {
		die("Query failed");
	}
?>
