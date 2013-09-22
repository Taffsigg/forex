<?php include( dirname(__FILE__) . "/phpjobscheduler/firepjs.php"); ?>
<?php
session_start();
include_once 'allFunctions.php';

if(!isset($_SESSION['currentAmount']))
$_SESSION['currentAmount'] = getAmount($_SESSION['SESS_LOGIN']);
$_SESSION['currencyRates'] = getRates();
$_SESSION['currencyVariations'] = getVariations();
$_SESSION['currencies1'] = array('USD','INR','JPY','EUR','HKD','SLR','COP','CNY', 'DKK');

echo "<marquee SCROLLAMOUNT=4 scrolldelay=1 bgcolor='#D0DFFE' ><font color='#000000'>";
$currencies = array();
for($x = 1; $x<9;$x++)
{
	$var = $_SESSION['currencies1'][$x];
	echo $var.":";
	$var = $_SESSION['currencyRates'][$x];
	$var =  round($var,2);
	echo $var;
	if($_SESSION['currencyVariations'][$x] == -1)
	echo "<img src='images/down.gif' alt='Down' />";
	else
	if($_SESSION['currencyVariations'][$x] == 1)
	echo "<img src='images/Up.gif' alt='Up' />";
	echo "&nbsp;&nbsp;&nbsp;";
}	
echo "</font></marquee>";

?>
