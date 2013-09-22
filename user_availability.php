<?php
// connect to the database
include 'database.php';

	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		$str = strip_tags($str);
		return mysql_real_escape_string($str);
	}
	
	
if (isset($_POST['username']))
{
$username = clean($_POST['username']);
if($username == '') {exit('no');}
$query = "SELECT * FROM user_login WHERE login = '$username'";
}
else
{
$email = clean($_POST['email']);
if($email == '' || !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {exit('no');}
$query = "SELECT * FROM user_login WHERE email = '$email'";
}
$result = mysql_query($query);
if(mysql_num_rows($result) > 0)
{
//username already exists,not avaliable
echo 'no';
}
else
{
echo 'yes';
}
?>