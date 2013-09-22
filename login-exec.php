<?php
	ini_set('session.gc_maxlifetime','72000');
    session_start(); 
    $start=time(); 
    $_SESSION['time_start']=$start; 
	//Start session
	include_once("allFunctions.php"); 
	
	
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	require_once('database.php');
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login-failed.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM user_login WHERE login='$login' AND passwd='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//$qry1="SELECT * FROM members1 WHERE login='$login' AND passwd='".md5($_POST['password'])."'";
	//$res1=mysql_query($qry1);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			//$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_LOGIN'] = $member['login'];
			//$_SESSION['SESS_COLLEGE'] = $member['college'];
			//$_SESSION['SESS_CONTACT'] = $member['contact'];
			//$_SESSION['EMAIL'] = $member['email'];
			
			setcookie(("member_id"),base64_encode($member['member_id']), time()+3600);
			
			//$member_id=$member['member_id'];
			//$firstname=$member['firstname'];
			//$lastname=$member['lastname'];
			//$login=$member['login'];
			//$college=$member['college'];
			//$contact=$member['contact'];
			//$email=$member['email'];
			//$t=time();
			
			//$q="SELECT * FROM session WHERE member_id='$member_id'";
			//$res=mysql_query($q);
			
			//if($res)
			//{
			//	$q1="DELETE FROM session WHERE member_id='$member_id'";
			//	mysql_query($q1);				
			//}
			
			//$q2 = "INSERT INTO session(member_id,firstname, lastname, login, college, contact,email,time) VALUES('$member_id','$firstname','$lastname','$login','$college','$contact','$email','$t')";
			//$res2 = mysql_query($q2);
			
			session_write_close();
			$usd = getAmount($_SESSION['SESS_LOGIN']);
			$_SESSION['startAmount'] = $usd ; 
			echo $usd;

			
			header( "Location: startContest.php" ); 
			exit();
		}
		else {
					session_unset();
					session_destroy();
					header("location: login-failed.php");
					exit();
				}
			
	}
	else {
		die("Query failed");
	}
?>
