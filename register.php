<?php
session_start();
include 'header.php';
?>

<script src="jquery.js" type="text/javascript" language="javascript"></script>
<script language="javascript">


$(document).ready(function()
{
	$("#cpassword").blur(function()
	{		$("#pass").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
			
			$pass1=$("#password").val();
			$pass2=$("#cpassword").val();
		  if($pass1 != $pass2) //if username not avaiable
		  {
		  	$("#pass").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).removeClass().html('<img src="images/invalid.jpg" alt="Inalid" />').fadeTo(900,1);	
			});
		  }
		  else{
		  	$("#pass").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).removeClass().html('<img src="images/valid.jpg" alt="Valid" />').fadeTo(900,1);
			});		
          }

	});


	$("#login").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("user_availability.php",{ username:$(this).val() } ,function(data)
        {
		
				
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).removeClass().html('<img src="images/invalid.jpg" alt="Invalid" />').fadeTo(900,1);
			});		
          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).removeClass().html('<img src="images/valid.jpg" alt="Valid" />').fadeTo(900,1);	
			});
		  }
				
        });
 
	});
	
	$("#email").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox1").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("user_availability.php",{ email:$(this).val() } ,function(data)
        {
		
				
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox1").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).removeClass().html('<img src="images/invalid.jpg" alt="Invalid" />').fadeTo(900,1);
			});		
          }
		  else
		  {
		  	$("#msgbox1").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).removeClass().html('<img src="images/valid.jpg" alt="Valid" />').fadeTo(900,1);	
			});
		  }
				
        });
 
	});
	

	
		
});

</script>


<style type="text/css">
.messagebox{
	color:red;
	width:auto;
	margin-left:5px;
	border:1px solid #c93;
	background:#ffc;
	padding:2px;
}


</style>



<!-- Left Content Starts Here -->
 <div class="mainbar">
			 <p class="headings"> Registration</p>

<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) { 
echo ("Please fill the form again");}
echo '<br>';
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
	
?>  
<ul>
<li>Username will be the one visible on scoreboard</li>
<li>Please provide a valid email id and correct details as it will be used incase you forget your username/password.</li>

</ul>
<form name="frmRegistration" method="post"
action="register-exec.php">    
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="0" style="text-align:left">
      <tr><th colspan="2" style="	color: #9B1919;">All Fields Are Compulsory.</th><td></td></tr> 
	  <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr> 
        <th width="33%"><label for="fname">First Name</label> </th>
        <td width="23%"> 
          <input name="fname" type="text" class="textfield" id="fname" maxlength="25"/>
	</td>
	<td width="44%" align="left"></td>
      </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td><td></td></tr>
      <tr> 
        <th><label for="lname">Last Name</label> </th>
        <td> 
          <input name="lname" type="text" class="textfield" id="lname" maxlength="25"/>
		</td>
		<td></td>
      </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td><td></td></tr>
      <tr> 
        <th ><label for="login">Username</label></th>
        <td> 
          <input name="login" type="text" class="textfield" id="login" maxlength="25"/>
      </td>
	  
	 
	  <td><span id="msgbox" style="display:none;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11px;padding:0px"></span>
	  </td>
	  
	  
      </tr>
	  	  <tr><th>&nbsp;</th><td>&nbsp;</td><td></td></tr>

	  
	        <tr>
      <th><label for="email">Email</label> </th>        
		<td><input type="text" id="email" name="email" class="textfield" maxlength="40" />
		</td>
      
	  <td><span id="msgbox1" style="display:none;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11px;padding:0px"></span>
	  </td>
	  </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td><td></td></tr>
      <tr> 
        <th><label for="password">Password</label></th>
        <td> 
          <input name="password" type="password" class="textfield" id="password" maxlength="25"/>
        </td>
 		<td></td>
     </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td><td></td></tr>
      <tr> 
        <th><label for="cpassword">Confirm Password</label> </th>
        <td> 
          <input name="cpassword" type="password" class="textfield" id="cpassword" maxlength="25"/>
        </td>
 		<td><span id="pass" style="display:none;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11px;padding:0px"></span></td>
     </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td><td></td>
	  </tr>
      <tr> 
        <th><label for="college">College</label> </th>
        
        <td><input type="text" name="college" class="textfield" id="college" maxlength="50"/> </td>
		<td></td>
      </tr>

	  
	  <tr><th>&nbsp;</th><td>&nbsp;</td><td></td></tr>
     
	 <tr>
        <th><label for="contact">Contact No</label> </th>
        <td><input type="text" class="textfield" id="contact" name="contact" maxlength="10"></td>
 		<td></td>
     </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td><td></td></tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
 		<td></td>
     </tr>
<tr>
        <td>&nbsp;</td>
        <td>
          <input type="submit" name="Submit2" value="Register" />
        </td>
		<td></td>
      </tr> 
	  <tr><th>&nbsp;</th><td>&nbsp;</td><td></td></tr>
	  	
	 </table>

	</form>
	
	
	

	</div> 
	
	
<?php
include 'footer.php'
?>	