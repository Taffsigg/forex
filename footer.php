	        <div class="sidebar">

            <div class="box">
            	<div class="box_top"></div>
                
				<?php 
include_once('allFunctions.php');
if (isset($_SESSION['SESS_MEMBER_ID'])) 
{echo '
        <div id="box_content" align="center">
		
          <div class="button_01"> Hi '.$_SESSION['SESS_FIRST_NAME'].' !!! </div>
          <h2 > Current Cash $'.getAmount($_SESSION['SESS_LOGIN']).'</h2>
			<br/>
			<br/>
							<form action="endContest.php" method="post">
							<input type="submit" value="  Logout  " /> 
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
						 </p>
							</form>
		
        </div>

';}
else {echo '
        <div class="box_content" align="center">
		
          <div class="button_01"><a>Login </a></div>
          
							<form action="login-exec.php" method="post" align="center">
						 <p>Username:<br/><input name="login" type="text"><br>
							Password:<br><input name="password" type="password" /><br><br>
							<input type="submit" value="  Login  " />
						    <input name="reset" type="reset" value="  Reset  "/>
							<br><br>
							<a href="login-failed.php" style="color:#00baff">Forgot username/password?</a>
						 </p>
							</form>
							
							
		
        </div>
';}
?>	
				
				
                <div class="box_content">
                	<div class="button_01" align="center"><a>Elite Five</a></div>

<table width="80%" border="0" align="center">
   <tr> 
            <td><center>
                <b>Rank</b> 
              </center>            </td>
            <td> 
              <center>
                <b>Name </b>
              </center>            </td>
            <td> 
              <center>
                <b>Dollars</b>
              </center>            </td>
    </tr>
	<?php
include_once("database.php");

$result=mysql_query("SELECT  * FROM user_amount ORDER BY amount DESC");
$srno=1;
while($srno<=5&&$result)
{
$row=mysql_fetch_array($result);
print "<tr>";
print "<td>";
print  "<center>";
print  $srno;
print  "</center>";
print "</td>";
print "<td>";
print  "<center>";
print  htmlentities($row['login']);
print  "</center>";
print "</td>";

print  "<td align='right'>";
print " ".$row['amount'];

print "</td>";
print "</tr>";

$srno++;
}
mysql_close($con);
?>
</table>
                    
                 
                </div>
                
                <div class="box_bottom"></div>            
            </div>
        
			</div>
	<div class="cleaner_h10"></div>

    </div> <!-- end of templatemo_content -->
    <div id="templatemo_content_bottom"></div>
<div class="cleaner_h10"></div>
</div> <!-- end of templatemo_content_wrapper -->

<div id="templatemo_footer">

    <center>
        Developed by <a href="aboutus.php" style="color:#00baff;">FOREX Team</a>  | 
		Copyright &copy; <span style="color:#00baff;">FOREX <a href="http://technovanza.org" style="color:#00baff;">Technovanza 11</a></span>. All Rights Reserved
	</center>
    
</div> <!-- end of footer -->
</body>
</html>
