<?php
include_once('allFunctions.php');


session_start();

$_SESSION['currencyRates'] = getRates();
$_SESSION['currencyVariations'] = getVariations();


 

$fromCurrencyIndex = (int) $_GET['ffv'];
$toCurrencyName = $_GET['tfv'];
$fromCurrencyName = $_SESSION['currencies1'][$fromCurrencyIndex];
$amount = (double) $_GET['sv'];

$ca = $_SESSION['amountsExpected'];
$finalAmount = 0;
if($toCurrencyValue == 'JPY')
$finalAmount = $ca['JPY'];
$index = 0;
switch($toCurrencyName)
{
	case 'USD': $finalAmount = $ca['USD']; $index = 0;
	break;
	case 'INR': $finalAmount = $ca['INR']; $index = 1;
	break;
	case 'JPY': $finalAmount = $ca['JPY']; $index = 2;
	break;
	case 'EUR': $finalAmount = $ca['EUR']; $index = 3;
	break;
	case 'HKD': $finalAmount = $ca['HKD']; $index = 4;
	break;
	case 'SLR': $finalAmount = $ca['SLR']; $index = 5;
	break;
	case 'COP': $finalAmount = $ca['COP']; $index = 6;
	break;
	case 'CNY': $finalAmount = $ca['CNY']; $index = 7;
	break;
	case 'DKK': $finalAmount = $ca['DKK']; $index = 8;
	break;

}
if($_SESSION['currentAmounts'][$fromCurrencyName]<$amount)
$amount = $_SESSION['currentAmounts'][$fromCurrencyName];


echo 'Last transaction was from '.$fromCurrencyName.' '.$amount.' to '.$toCurrencyName.' '.$finalAmount;
$sa = $_SESSION['currentAmounts'][$fromCurrencyName]-$amount;
if($sa<1)
$sa=0;
$_SESSION['currentAmounts'][$fromCurrencyName] = round($sa,4);
$da = $_SESSION['currentAmounts'][$toCurrencyName]+$finalAmount; 
if($da<1)
$da=0;
$_SESSION['currentAmounts'][$toCurrencyName] = round($da,4);

	$finalValues = getRates();
	$usd = 0.0;
	$count = 0;
	
	foreach($_SESSION['currentAmounts'] as $currencyName => $currencyAmount)
	{
		$usd = $usd + $currencyAmount * 1.0/(doubleval($finalValues[$count++]));
	}
	$_SESSION['currentAmount'] = $usd;

?>
