<?php
include 'header.php';
?>

<!-- Left Content Starts Here -->
<div id="left_content">
			 <p class="headings">Welcome To FOREX</p>
			
<?php	
	

if (!isset($_SESSION['SESS_MEMBER_ID']))	{echo'		
<p>
<br/>
HOW TO PLAY FOREX?<br/>



1. You will be provided a fixed amount of USD, EURO, INR (Indian rupees), GBP (Great Britain Pound) and JPY (Japanese yen).
<br/>
2. Select the currency, you want to start the transaction with.
<br/>
3. Select the amount of that currency to be converted.
<br/>
4. Choose the type of currency, you want the former to be converted to.
<br/>
5. Expected amount after the conversion will be displayed on the screen.
<br/>
6. Click on the convert button to implement the conversion.
<br/>
7. Conversion rates will continuously fluctuate at a time interval of 30 seconds.
<br/>
8. Carefully observe the changing rates and decide which conversion will take you up from rags to riches.
<br/>
9. Every time, USD equivalent of the dealing amount will be displayed.
<br/>
10. Winner will be decided on the basis of net maximum profit.
<br/>

</p>							</ol>
';}
else {?>
			 
			<span id='cntst'>
			<p><span id='lastTransaction'></span></p>
			<p><span id='mrqe'>
			<?php include 'marquee.php';?></span></p><br/>
				<p>Current Amounts</p>
			<p>
			<span id="aT">
			<?php
			include 'update.php';
			?></p>
			</span>
			<p><span id="timeOut"></p>
		<p><span id = "toTable"></span></p>
		<br/>
<p><span id="fromJS" onchange="validateSourceValue();"></span><br/>
<input type= "text" id="sourceValue" onkeypress="return isNumberKey(event)"  onkeyup="validateSourceValue();" /></p><br/><br/>
<label><input id ='confirm' type="checkbox"  onclick='confirmNow();' />Lock Transaction</label><br /><br/><br/>
</br>
<p><span id = "expTable"></span></p>
<p><button id='conv' type="button" onclick="convertNow()" >Convert</button>
</p>
</span>



<?php}?>


</div>
<!-- Left Content Ends Here -->     


<?php
include 'footer.php'
?>
