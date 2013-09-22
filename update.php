<?php 
	include_once("allFunctions.php");
	//$referer2 = $_SERVER['HTTP_REFERER'];
	//echo $referer2;
?>
<?php

session_start();


showCurrentAmountsTable();

getFromField();
function showCurrentAmountsTable()
{
	
	
	
	$newAmounts = explode('^', $_GET['na']);
	$flag = false;
	
	$count =0;
	echo "<table id = 'amountsTable' cellspacing='0' cellpadding='2' border='1' width='30% style=background-color: white;'>
	      <tbody>";
  
    if($_GET['t'] == 1)
	{
		foreach($_SESSION['currentAmounts'] as $currencyName => &$currencyAmount)
		{
			$currencyAmount = $newAmounts[$count];
			
           echo "<tr>
				<td>".$currencyName."</td>
				<td id='".$currencyName."'>".$currencyAmount."</td>
				</tr>";
			$count++;

		}
		
	}
	else {
		$iniAmt = $_SESSION['currentAmounts'][0];
		}
       
	if($_GET['t'] != 1)
	{
		foreach($_SESSION['currentAmounts'] as $currencyName => $currencyAmount)
		{
			
           echo "<tr>
				<td align='center'>".$currencyName."</td>
				<td width='300' align='right'id='".$currencyName."'>".$currencyAmount."</td>
				</tr>";
			
		}
	
		echo "</tbody>
		  </table>";
	}

	
}
function getFromField()
{
	echo "<select id = 'from' style='font-size: 14pt; color: blue' >";
	echo "<option >Select From Which Currency</option>";
	$count = 0;
	foreach($_SESSION['currentAmounts'] as $currencyName => $currencyAmount)
		{
			
			if($currencyAmount !=0)
			{
				echo "<option value = '" .$count. "' >".$currencyName."</option>";
			}
			$count++;
		}
		echo "</select>";
}


?>
