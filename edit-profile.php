<?php
session_start();
if(!$_SESSION['SESS_MEMBER_ID']) exit();
include 'header.php';
?>

<!-- Left Content Starts Here -->
 <div class="mainbar">
			 <p class="headings">Edit Profile</p>


<h2><b><?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) { 
echo ("Please fill the form again");
}?>
</font></b></h2>


<?php 
include("database.php");
$username=$_SESSION['SESS_MEMBER_ID'];
$query=mysql_query("SELECT * FROM user_login WHERE member_id='$username'");
$x=mysql_fetch_assoc($query);
?>


<p>
<form method="post" action="edit-profile-exec.php">
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
        <th width="158"><label for="login">Username</label></th>
        <td width="215"> 
          <b><?php echo $x['login'];?></b>
      </td>
      </tr>
	  <tr>
	  <th>&nbsp;</th><td>&nbsp;</td></tr>
	  <tr>
      <th><label for="email">Email</label> </th>        
		<td><b><?php echo $x['email'];?></b></td>
      </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr> 
        <th><label for="college">College</label> </th>        
        <td><b><input type="text" name="college" class="textfield" id="college" value="<?php echo $x['college'];?>"/></b> </td>
      </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr>
        <th><label for="contact">Contact</label> </th>
        <td><b><input type="text" class="textfield" id="contact" name="contact" value="<?php echo $x['contact'];?>"></b></td>
      </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
	  <tr>
        <th>&nbsp;</th>
		<td><input type="submit" value="     Update    "></td>
      </tr>
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
<tr>
        <td>&nbsp;</td>
      </tr> 
	  <tr><th>&nbsp;</th><td>&nbsp;</td></tr>	
	 </table>



  <br><br><br> 
  </form>
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
							</p>

							
	</div> 

<?php
include 'footer.php'
?>
