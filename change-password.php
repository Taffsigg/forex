<?php
include 'header.php';
?>

<!-- Left Content Starts Here -->
 <div class="mainbar">
			 <p class="headings">Change Password</p>


<form method="post" action="change-password-exec.php">    

<table width="384" border="0" align="center" cellpadding="2" cellspacing="0" style="text-align:left">
<tr><th colspan="2">
	  <?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?> 
</th></tr>
      <tr> 
        <th><label for="password">New Password: </label></th>
        <td> 
          <input name="password" type="password" class="textfield" id="password" />
        </td>
      </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr> 
        <th><label for="cpassword">Confirm Password: </label> </th>
        <td> 
          <input name="cpassword" type="password" class="textfield" id="cpassword" />
        </td>
      </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td>
	  </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
	  <tr>
        <th>&nbsp;</th>
		<td><input type="submit" value="     Submit    "></td>
      </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 	
	 </table>

	</form>
 
							</p>

</div>
<!-- Left Content Ends Here -->   						

<?php
include 'footer.php'
?>