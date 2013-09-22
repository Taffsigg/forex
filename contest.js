setInterval('updateMarquee()',20000);
//checkTimeOut();

function updateMarquee()
{
	var flag = false;
	if(document.getElementById('confirm').checked)
	flag = true;
			if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
	else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200 && flag == false)
    {
    document.getElementById("mrqe").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","marquee.php",true);
xmlhttp.send();
	
}
function checkTimeOut()
{
			if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
	else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("timeOut").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","timeout.php",true);
xmlhttp.send();
	
}

function confirmNow()
{
	if(document.getElementById('confirm').checked)
	{
		if(document.getElementById('from').value.length >9  || document.getElementById('sourceValue').value.length==0)
		{
			alert('Please enter the Required Source Fields and then confirm');
			document.getElementById('confirm').checked = false;
		}
		else{
		document.getElementById('from').disabled = true;
		document.getElementById('sourceValue').disabled = true;
		validateSourceValue();
		toFieldAjaxCall();
	}
	}
	else
	{
		document.getElementById('from').disabled = false;
		document.getElementById('sourceValue').disabled = false;
		document.getElementById('expTable').innerHTML = "";
		
		
	}
		
}
function isNumberKey(evt)
{
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
         return false;

     return true;
}
function toFieldAjaxCall()
{
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
	 	 
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("expTable").innerHTML=xmlhttp.responseText;

    }
    else
    
    document.getElementById("expTable").innerHTML="<img src='indicator.gif' alt='LOADING PLEASE WAIT' />";
  }
xmlhttp.open("GET","update2.php?c= "+document.getElementById('from').value+ "&v=" + document.getElementById('sourceValue').value,true);
xmlhttp.send();
     
}

function validateSourceValue()
{
		var sourceValue = document.getElementById('sourceValue').value;
		var fromFieldValue = document.getElementById('from').value;
		

		sourceValue = parseFloat(document.getElementById('sourceValue').value,10);

		

	    var table = document.getElementById('amountsTable'), 
		rows = table.getElementsByTagName('tr'),i, j, cells;
		
		var currentAmounts = new Array();
	
		for (i = 0, j = rows.length; i < j; ++i) {
		cells = rows[i].getElementsByTagName('td');
		if (!cells.length) {
			continue;
		}
		
		currentAmounts[i] = cells[1].innerHTML;
		
		}
	   
       if(sourceValue >= currentAmounts[fromFieldValue] || sourceValue <=0)
         {
            document.getElementById('sourceValue').value = currentAmounts[fromFieldValue];
              
              
        
          }
          

}




function convertNow()
{
	if(document.getElementById('confirm').checked == false)
	{
		alert('Please confirm the transaction first!');
	}
	else{
		
       var fromFieldValue = document.getElementById('from').value;
       var toFieldValue = document.getElementById('to').value;
       var sourceValue = document.getElementById('sourceValue').value;
       convertNowAjaxCall(fromFieldValue, toFieldValue, sourceValue);
       
	}
}
function convertNowAjaxCall(ffv,tfv,sv)
{
		if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
	else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("lastTransaction").innerHTML=xmlhttp.responseText;
	window.location.reload();
    }
  }
xmlhttp.open("GET","convert.php?ffv= "+ffv+ "&tfv=" + tfv + "&sv=" + sv,true);
xmlhttp.send();

}
