<?php 
	include_once("allFunctions.php");
	//$referer2 = $_SERVER['HTTP_REFERER'];
	//echo $referer2;
?>
<?php
getConvertRates();

function getConvertRates()
{
	srand(time());
	$currentConv[] = array();
	$currentConv[0] = array();
    $currentConv[1] = array();
    $currentConv[2] = array();
    $currentConv[3] = array();
    $currentConv[4] = array();
    $currentConv[5] = array();
    $currentConv[6] = array();
    $currentConv[7] = array();
    $currentConv[8] = array();
    
    $currentConv[0][0] =    1;                  // to USD min
    $currentConv[0][1] =    1;                  // to USD min
    $currentConv[1][0] =   43.75;              // to INR min
    $currentConv[1][1] =   47.25;              // to INR max
    $currentConv[2][0] =   78.2;               // to JPY min
    $currentConv[2][1] =   86.5;               // to JPY max
    $currentConv[3][0] =    0.83;               // to EUR min
    $currentConv[3][1] =    0.66;               // to EUR max
    $currentConv[4][0] =    7.2;                // to HKD min
    $currentConv[4][1] =    7.9;                // to HKD max
    $currentConv[5][0] =  110.31;              // to SLR min(SRI LANKAN RUPEE)
    $currentConv[5][1] =  119.29;              // to SLL max
    $currentConv[6][0] = 1832.98;            // to COP min(COLUMBIAN PESO)
    $currentConv[6][1] = 1855.32;            // to COP max
    $currentConv[7][0] =  199.85;              // to CNY min(CHINESE YUAN)
    $currentConv[7][1] =  226.71;              // to CNY max
    $currentConv[8][0] =    5.23;              // to DKK min (dENMARK kRONER)
    $currentConv[8][1] =    5.62;              // to DKK max


	$initial = array();
    $change = array();
    $finalValues = array();
    $profOrLoss = array();
    for($i =1 ; $i<9;$i++)
    {
               $operation = round(rand(-1,1));
               $initial[$i] = ($currentConv[$i][0] + $currentConv[$i][1])/2 ;
               $change[$i] = $initial[$i] * rand( 100, 400 ) * 0.0001 * $operation;
               $finalValues[$i] = $initial[$i] + $change[$i];
               
               if($finalValues[$i] > $currentConv[$i][1])
               {
                       $change[$i]=-$change[$i];
                       $operation = - $operation;
                       $finalValues[$i] = $currentConv[$i][1] - $change[$i];
               }
               else
               if($finalValues[$i] < $currentConv[$i][0])
               {
                       $change[$i]=-$change[$i];
                       $operation = -$operation;
                       $finalValues[$i] = $currentConv[$i][0] - $change[$i];
               }
               $profOrLoss[$i] = $operation;  
       }
       $finalValues[0]=1;
       
       setRates($finalValues);
       setPL($profOrLoss);
 /*      echo "<br />";
       echo "<table id = 'currentRates' cellspacing='0' cellpadding='2' border='1' width='30% style='background-color: white;'>
       <tbody>";
       
       $count = 0;
       
        foreach($_SESSION['currentAmounts'] as $currencyName => $currencyAmount)
		{
           echo "<tr>
				<td>".$currencyName."</td>
				<td>".$finalValues[$count]."</td>
				</tr>";
		   $count++;
		}
		
		echo "</tbody></table>";
		
*/
    
}

?>
