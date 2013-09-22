<?php 
	include_once("database.php");
	//$referer2 = $_SERVER['HTTP_REFERER'];
	//echo $referer2;
?>
<?php	
	
	//setRates(null);
	//getRates();
	//getAmount(1);
	
	//setRates(null);
	//getRates();
	//getAmount(1);
	function setRates($finalArray){

		//accepts an array containing the rates upon trigger by updateConvertRates

		foreach($finalArray as $sr_no=>$value)
		{
			
			//echo $sr_no."\n".$value;
			$query = "UPDATE current_rates SET rate = $value  where sr_no = '".($sr_no+1)."' ";
			mysql_query($query);
		}

		
	}
	function setPL($finalArray){

		//accepts an array containing the rates upon trigger by updateConvertRates

		foreach($finalArray as $sr_no=>$value)
		{
			
			//echo $sr_no."\n".$value;
			$query = "UPDATE current_rates SET dif = $value  where sr_no = '".($sr_no+1)."' ";
			mysql_query($query);
		}

		
	}	
	
	function getRates(){
	
		$query = "SELECT rate from current_rates";
		$result = mysql_query($query);
		
		$i = 0;
		$finalValues = array();
		while( $arrayTemp = mysql_fetch_array( $result ) )
		{
			$finalValues[$i++ ] = $arrayTemp[ 0 ];
		}
		//foreach($finalValues as $key=>$value)
		//	echo $key."<br />".$value;
		
		return $finalValues;
		
	
	}
	
	function setAmount($login, $usd){
			$query = "UPDATE user_amount SET amount = '".$usd."' where login = '".($login)."' ";
			mysql_query($query);
			$query = "UPDATE forex_sessions SET amount = '".$usd."' where login = '".($login)."' ";
			mysql_query($query);
	}
	
	function getAmount($login){
		
		$query = "SELECT amount from user_amount where login = '".$login."'";
		$result = mysql_query($query);
		
		$i = 0;
		$finalValues = array();
		while( $arrayTemp = mysql_fetch_array( $result ) )
		{
			$finalValues[$i++ ] = $arrayTemp[ 0 ];
		}		
		return $finalValues[0];
	}
	
	 function getVariations(){
		$query = "SELECT dif from current_rates";
		$result = mysql_query($query);
		$i = 0;
		$finalValues = array();
		while( $arrayTemp = mysql_fetch_array( $result ) )
		{
			$finalValues[$i++ ] = $arrayTemp[ 0 ];
		}
		return $finalValues;
		
	}

	
	
?>
