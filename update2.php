<?php 
	include_once("allFunctions.php");
	//$referer2 = $_SERVER['HTTP_REFERER'];
	//echo $referer2;
?>
<?php

session_start();



$sourceValue  =(double)$_GET['v'];	
$indexCurrency    = (int)$_GET['c'];
$from = $_SESSION['currencyRates'][$indexCurrency];
$amtExp= array();
$txt = "<select id='to' style='font-size: 14pt; color: blue' onchange='validateSourceValue()'>";
echo "<table id='expTb'>";
for($x = 0; $x<9;$x++)
{
	echo "<tr>";
	if($indexCurrency==$x)
	continue;
	echo "<td>to&nbsp;";
	$var = $_SESSION['currencies1'][$x];
	echo "".$var.":"."</td>";
	$txt.="<option value = '".$var."' >".$var."</option>";
	$to = $_SESSION['currencyRates'][$x];
	$expectedAmount = (double)($to/$from)*$sourceValue;
	$amtExp[$var] = $expectedAmount;
	echo "<td>".$amtExp[$var]."</td>";
	echo "</tr>";
}	
$_SESSION['amountsExpected'] = $amtExp;

$txt.="</select>";
echo "</table>";
echo $txt;


?>
