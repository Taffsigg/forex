<?php
session_start();
if(!$_SESSION['SESS_MEMBER_ID']) exit();
include 'header.php';
?>

<!-- Left Content Starts Here -->
 <div class="mainbar">
			 <p class="headings"> Profile</p>
			 
<?php
	if( isset($_SESSION['Success']) && is_array($_SESSION['Success']) && count($_SESSION['Success']) >0 ) {
		echo '<ul>';
		foreach($_SESSION['Success'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['Success']);
	}
?> 
			
			
<?php 
include("database.php");
$username=$_SESSION['SESS_MEMBER_ID'];
$query=mysql_query("SELECT * FROM user_login WHERE member_id='$username'");
$x=mysql_fetch_assoc($query);
?>
							<p>
      <table width="384" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr> 
        <th><label for="fname">First Name</label> </th>
        <td> 
          <b><?php echo $x['firstname'];?></b>
		</td>
      </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr> 
        <th><label for="lname">Last Name</label> </th>
        <td> 
          <b><?php echo $x['lastname'];?></b>
		</td>
      </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr> 
        <th width="158.72"><label for="login">Username</label></th>
        <td width="215.04"> 
          <b><?php echo $x['login'];?></b>
      </td>
      </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr> 
        <th><label for="college">College</label> </th>
        
        <td><b><?php echo $x['college'];?></b> </td>
      </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr>
      <th><label for="email">Email</label> </th>        
		<td><b><?php echo $x['email'];?></b></td>
      </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr>
        <th><label for="contact">Contact</label> </th>
        <td><b><?php echo $x['contact'];?></b></td>
      </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

		
	 </table>
	 <br/>
	 <p class="headings"> </p>
	<p><a href="edit-profile.php" style="color:#00baff"> Edit Profile</a><br>
    <a href="change-password.php" style="color:#00baff"> Change Password </a></p>    
  <br><br><br>
     
    
							</p>

			</div>	

				
<?php
include 'footer.php'
?>
