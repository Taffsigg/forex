<?php
	//Start session
	session_start();
	

	
	//Array to store validation errors
	$errmsg_arr = array();
	
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
		$str = strip_tags($str);
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$fname = clean($_POST['fname']);
	$lname = clean($_POST['lname']);
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	$college = clean($_POST['college']);
	$email = clean($_POST['email']);
	$contact = clean($_POST['contact']);
	//Input Validations
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
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
	if($college == '') {
		$errmsg_arr[] = 'College name missing';
		$errflag = true;
	}
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($contact == '') {
		$errmsg_arr[] = 'Contact number missing';
		$errflag = true;
	}
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
$errmsg_arr[]='Invalid Email ID';
$errflag = true;
}	
//Check for contact number
	if($contact != '') {
	if(!is_numeric($contact))
	{
		$errmsg_arr[] = 'Check your Contact number';
		$errflag = true;
	}
	}

	
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM user_login WHERE login='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Login ID already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed:1");
		}
	}
	
	//Check for duplicate email
	if($login != '') {
		$qry = "SELECT * FROM user_login WHERE email='$email'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Email ID already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed:2");
		}
	}
	
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: register.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO user_login(firstname, lastname, login, passwd, college, email, contact) VALUES('$fname','$lname','$login','".md5($_POST['password'])."','$college','$email','$contact')";
	$result = @mysql_query($qry);
	
//	$qry1 = "INSERT INTO members1(firstname, lastname, login, passwd, college, email, contact) VALUES('$fname','$lname','$login','".md5($_POST['password'])."','$college','$email','$contact')";
//	$result1 = @mysql_query($qry1);
	//Check whether the query was successful or not
	if($result) {
		header("location: register-success.php");
		$sql = "INSERT INTO user_amount(login,amount) VALUES ('$login', '500.0000')";
		$result = @mysql_query($sql);
		exit();
	}else {
		die("Query failed:3");
	}
?>
