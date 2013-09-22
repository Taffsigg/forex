<?php
include_once("allFunctions.php"); 
if (!isset($_SESSION['SESS_MEMBER_ID'])) header("location:tutorial.php");
?>
<?php
header( "Location: contest.php" ); 

session_start();

$usd = getAmount($_SESSION['SESS_LOGIN']);
$_SESSION['startAmount'] = $usd ; 
echo $usd;
$_SESSION['currentAmounts'] = array('USD' => $usd , 'INR'=> 0, 'JPY'=> 0 , 'EUR'=> 0,  'HKD'=> 0, 'SLR'=> 0, 'COP'=> 0, 'CNY'=> 0, 'DKK'=> 0);
$_SESSION['currencyRates'] = getRates();
$_SESSION['currencyVariations'] = getVariations();

?>
