<?php
include_once("allFunctions.php"); 
?>

<?php
include 'header.php';
?>

<!-- Left Content Starts Here -->
 <div class="mainbar">
			 <p class="headings">End Contest</p>
			 
			 
<?php
if(isset($_SESSION['SESS_LOGIN']))
	session_start();
	echo "Thanks for playing .";
	

	$finalValues = getRates();
	$usd = 0.0;
	$count = 0;
	$asd = getAmount($_SESSION['SESS_LOGIN']);
	
	foreach($_SESSION['currentAmounts'] as $currencyName => $currencyAmount)
	{
		$usd = $usd + $currencyAmount * 1.0/(floatval($finalValues[$count++]));
	}
	echo "<br /> Your current amount is $usd";
    if($usd> (10*$asd))
    $usd=10*$asd;
	setAmount($_SESSION['SESS_LOGIN'], $usd);
	
	unset($_SESSION['currentAmounts']);
	session_unset();
	session_destroy();
?>
			

	</div>  
     


<?php
include 'footer.php'
?>
