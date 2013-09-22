<?php session_start();?>
<?php include( dirname(__FILE__) . "/phpjobscheduler/firepjs.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FOREX-V.J.T.I.'s first Foreign Exchange Installment</title>
<meta name="keywords" content="Forex,Technovanza" />
<meta name="description" content="Foregin exchange currency game" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />


</head>
<body>


<div id="templatemo_banner_wrapper">
 
</div> <!-- end of templatemo_banner_wrapper -->

<div id="templatemo_menu_wrapper">

<?php	  
$unlogged='
<div id="templatemo_menu">
        <ul>
          <li><a href="index.php">Home</a></li>
         <li><a href="http://technovanza.org/index.php?option=com_kunena&Itemid=79" target="_blank">Forums</a></li>
          <li><a href="scoreboard.php">Scoreboard</a></li>
		  <li><a href="register.php">Register</a></li>
		  <li><a href="tutorial.php">Tutorial</a></li>
        </ul>
      </div>
';
 
$logged='
<div id="templatemo_menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="http://technovanza.org/index.php?option=com_kunena&Itemid=79" target="_blank">Forums</a></li>
          <li><a href="scoreboard.php">Scoreboard</a></li>
		  <li><a href="profile.php">Profile</a></li>
		  <li><a href="tutorial.php">Tutorial</a></li>
        </ul>
      </div>
';



if (isset($_SESSION['SESS_MEMBER_ID'])) echo $logged;
else echo $unlogged;

?>
   
</div> <!-- end of templatemo_menu_wrapper -->

<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
	
	
