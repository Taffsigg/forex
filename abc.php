<?php
		include_once("database.php");
		$query = "SELECT LOGIN FROM USER_LOGIN";
		$result = mysql_query($query);
		$query1 = "SELECT LOGIN FROM USER_AMOUNT";
		$result1 = mysql_query($query);
		
		$i = 0;
		$finalValues = array();
		while( $arrayTemp = mysql_fetch_array( $result ) )
		{
			$arrayTemp2 = mysql_fetch_array( $result1 );
			if()
			$finalValues[$i++ ] = $arrayTemp[ 0 ];
		}
		
?>
