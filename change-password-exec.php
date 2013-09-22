<?php
	//Start session
	session_start();
	$username=$_SESSION['SESS_MEMBER_ID'];
	
	//Array to store validation errors
	$errmsg_arr = array();
	$success=array();
	//Validation error flag
	$errflag = false;
	
	require_once('database.php');
	//Connect to mysql server
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	
	//Input Validations
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: change-password.php");
		exit();
	}

	//Create INSERT query
	$qry = "UPDATE myst11_mem1 SET passwd = '".md5($_POST['password'])."' WHERE member_id ='$username'";
	$result = @mysql_query($qry);
	
	$success[] = 'Password Changed Suceesfully';
	$_SESSION['Success'] = $success;
	//Check whether the query was successful or not
	if($result) {
		header("location: profile.php");
		exit();
	}else {
		die("Query failed");
	}
?>