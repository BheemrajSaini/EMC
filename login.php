<?php
	if(!isset($text))
	$text="";
	if(!isset($username))
	$username="";
		require_once('functions.php');
		if(isset($_POST['username']))
				$username=htmlentities($_POST['username'],ENT_QUOTES);
		if(isset($_POST['password']))	
				$password=htmlentities($_POST['password'],ENT_QUOTES);
			if($username=="" or $password=="")
			{
			$text="<font color=red>Please Enter Username/Password</font>";
			$_SESSION['type']=0;
			}
			else
			{

                     //$username = escapeshellcmd($username);
	             // $password = escapeshellarg($password);
       	       $command1 = "python imap.py $username $password";
		       $auth_status1 = trim(shell_exec($command1));
       	        if ($auth_status1)
	                    {
			        $_SESSION['login']=true;
			        $_SESSION['user']=$username;
				 $_SESSION['type']=1;
				 die("<script>top.location='index.php'</script>");
				}
				else 
				{
					require_once('conn.php');
                                   $password = SHA1($password); 
					$sql="Select username,role from users where username='$username' and password='".(($password))."'";
					$result=mysql_query($sql,$conn);
					//echo mysql_num_rows($result);
                                   if($result and mysql_num_rows($result)>0)
					{
						$row=mysql_fetch_array($result);
						$_SESSION['login']=true;
						$_SESSION['user']=$row['username'];
						$_SESSION['type']=$row['role'];
						//echo 'here';
						die("<script>top.location='index.php'</script>");
					
					}
				}
				$text="<font color=red>Invalid Username/Password</font>";
			}
		

?>
<?php require_once('header.php') ?>
<script>
function validate()
{
	var f=document.form1
	if(f.username.value=="")
	{	error(document.getElementById("usernametext"))
		f.username.focus()
		return false;
	}
	if(f.password.value=="")
	{	error(document.getElementById("passwordtext"))
		f.password.focus()
		return false;
	}
	return true
}
function error(id)
{
	id.style.color='red'
}

</script>
<form name="form1" method="post" onsubmit="return validate()">
<div id="content">
<div id="right">
<div align="center" class="box"><?php echo $text ?></div>
<table width="60%" align="center" border="0" cellpadding="5" cellspacing="5">
<tr align="center">
<td width="39%" align="right"><span id="usernametext">Username(Webmail)</span> : </td>
<td width="25%" align="left"><input type="text" name="username" size="18"  value="<?php echo $username; ?>"/></td>
</tr>
<tr align="center">
<td width="39%" align="right"><span id="passwordtext">Password(Webmail)</span> : </td>
<td width="25%" align="left"><input type="password" name="password" size="18" /></td>
</tr>
<tr align="center">
<td>&nbsp;</td>
<td  align="left"><input type="submit" name="Submit" value="Login" /></td>
</tr><tr><td>&nbsp;</td></tr>
</table>


<div id="conDiv">
<table align="center" border="0" cellpadding="5" cellspacing="5" width="100%">
<tr>
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>
<tr>
<td>
<center>Dr. Muthukkumaran K , </center><br />
<center>ESTATE OFFICER<br /></center>
</td>
<td><center>-</center></td>
<td><center>kmk@nitt.edu</center>
</td>
</tr>

<tr>
<td>
<center>Dr.Sishaj P Simon , </center><br />
<center>ASSOCIATE DEAN<br />
Electrical issues, services & maintenance</center>
</td>
<td><center>-</center></td>
<td><center>sishajpsimon@nitt.edu</center>
</td>
</tr>

<tr>
<td>
<center><font color="red">Power House(24 hrs.)</font></center>
</td><td><center><font color="red">Landline: 2503846<br />
Moblie: 9489066206 (Emergecy / Night Hours)</font>
</center></td>
<td><center>-</center></td></tr>
</font>
<tr>

<td>
<center>Er. Ravi P. ,</center></br>
<center>AE Maintenance And Services (Complaint Incharge)</center>
</td><td><center>Landline: 2503836<br />
Moblie: 9489066203
</center>
</td>
<td><center>ravip@nitt.edu</center></td></tr>
<tr>
<td>
<center>Lift / Emergency</center>
</td>
<td><center>Moblie: 9489066204 / 205</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Er. Nallathambi C. , </center>

<center>A.E.(P & D)</center>
</td>
<td><center>Landline: 2503840<br />
Moblie: 9489066205
</center></td>
<td><center>nallatambi@nitt.edu
</center></td>
</tr>
<tr><td><center>Departmental Complaints</center></td><td><center>Moblie: 9486001170</center>
</td><td><center>-</center></td></tr>
<tr>
<td>
<center><strong>Appeleate Authority</strong></center></td><td><center>-</center></td>
<td><center>-</center>
</td>
</tr>
<tr>
<td>
<center>AEE / Electrical</center></td>
<td><center>Landline: 2503835<br />
Moblie: 9486001188</center></td>
<td><center>-</center></td></tr>
<tr><td><center>EE / Electrical</center></td><td><center>Landline: 2503839<br />
Moblie: 9489066224</center>
</td><td><center>-</center></td></tr>



<tr>
<td>
<center>Er.Muruganatham k.</center>
<center>AE / R & AC</center>

</td>

<td><center>Moblie: 9486001170</center></td>
<td><center>muru@nitt.edu</center></td></tr>
</table>
</div>
</div>

<div id="left">
	<div class="box">
			<b>* Use Your Webmail ID as USERNAME  </br>&nbsp & Webmail Password as PASSWORD</b></br>
                    </br>* For <b>first year students Only</b> who are </br>&nbsp&nbsp
                           not  having webmail username and</br>&nbsp&nbsp
                           password please use user1 as your </br>&nbsp&nbsp
                           username  and nittuser  as password. 
                    <marquee style="color:green"><h4>Save Energy Save India</h4></marquee>
					
                    <marquee  style="color:Red"><h4>Power Shutdown Notice: Every 3rd Saturday is power shudwon according to TANGEDCO </h4> </marquee>
	</div>
</div>
</div>
</form>

<?php require_once('footer.php') ?>
</body>
</html>
