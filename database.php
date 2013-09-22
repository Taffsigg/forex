<?php

/**
 * Connect to the mysql database.
 current rates
 user_login
 user_amount
 fxphpjobscheduler
 fxphpjobechedulerlogs
 */
$con = mysql_connect("70.86.2.162", "technovanza","xlabs981") or die(mysql_error());
mysql_select_db('technovanza', $con) or die(mysql_error($con));
/*
$con = mysql_connect("localhost", "root","") or die(mysql_error());
mysql_select_db('vjtinirm_forex', $con) or die(mysql_error($con));
*/

?>
