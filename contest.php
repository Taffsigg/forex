<?php
include_once("allFunctions.php"); 

session_start();

if (!isset($_SESSION['SESS_MEMBER_ID'])) header("location:index.php");
    $end=time(); 
    include("start_timer.php"); 
    include("end_timer.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FOREX-V.J.T.I.'s first Foreign Exchange Installment</title>
<meta name="keywords" content="Forex,Technovanza" />
<meta name="description" content="Forex is online currency trading game" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="contest.js" ></script>
</head>
<body onload="updateClock(); setInterval('updateClock()', 1000 )">


<?php	  


if (isset($_SESSION['SESS_MEMBER_ID'])) echo $logged;
else echo $unlogged;

?>
   
</div> <!-- end of templatemo_menu_wrapper -->

<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
<p><span id='mrqe'>
			<?php include 'marquee.php';?></span>

<!-- Left Content Starts Here -->
<div class="mainbar" align="center">

			 
			 
			 
			<p><span id='lastTransaction'></span></p>
			</p>
				<p style="font-size:16px;align:left;">Current Amounts</p>
			<p>
			<span id="aT">
			<?php
			include 'update.php';
			?></p>
			</span>
			<p><span id="timeOut"></p>
		<p><span id = "toTable"></span></p>
		<br/>
<p><span id="fromJS" onchange="validateSourceValue();document.getElementById('dispEA').value = ''"></span><br/>
<input type= "text" id="sourceValue" onkeypress="return isNumberKey(event)"  onkeyup="validateSourceValue();" /></p><br/><br/>
<span id='cb'><input id ='confirm' type="checkbox"  onclick='confirmNow();'>Lock Transaction</input></span><br /><br/><br/>
</br>
<p><span id = "expTable"></span></p>
<p><button id='conv' type="button" onclick="convertNow()" >Convert</button>
<form action="endContest.php">
<button id='endC' type="submit" >End Session</button>
</form>
</p>

<br/>
<br/>
<p>

</p>

</div>
<!-- Left Content Ends Here -->   






	      
	<div class="cleaner_h10"></div>

    </div> <!-- end of templatemo_content -->
    <div id="templatemo_content_bottom"></div>
<div class="cleaner_h10"></div>
</div> <!-- end of templatemo_content_wrapper -->

<div id="templatemo_footer">

    <center>

    <form name="counter"><input type="text" size="8" 
name="d2"></form> 

<script> 
<!-- 
// 
 var time = document.getElementById('clock').innerHTML;
 var min1 = parseInt(time.charAt(0));
 var sec1 = parseInt(time.charAt(2));
 var sec2 = parseInt(sec1)*10+parseInt(time.charAt(3)) + min1*60;
 var milisec= sec2% 60
 var seconds = min1

 document.counter.d2.value='30' 

function display(){ 
 if (milisec>=59){ 
    milisec=0 
    seconds+=1 
 } 
 if (seconds>=60){ 
    milisec=0 
    seconds+=1 
 } 
 else 
    milisec+=1 
    if(milisec<10)
    document.counter.d2.value=seconds+":0"+milisec 
    else
    document.counter.d2.value=seconds+":"+milisec 
    setTimeout("display()",1000) 
}
if(seconds == 10)
 window.location.reload();
display() 
--> 
</script> 
<span style="color:#00baff;">NOTE: If the confirm transaction checkbox doesnt work please refresh the page! 
        Developed by <a href="aboutus.php" style="color:#00baff;">FOREX Team</a>  | 
		Copyright &copy; <span style="color:#00baff;">FOREX <a href="http://technovanza.org" style="color:#00baff;">Technovanza 11</a></span>. All Rights Reserved
	</center>
    
</div> <!-- end of footer -->
</body>
</html>
