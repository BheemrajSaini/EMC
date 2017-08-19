<?php
require_once('functions.php');
secure(1);
require_once('conn.php');
include('inject.php');
if($_SESSION['type']==1)
header("Location: index.php");
?>
<?php 
		if(isset($_POST['Submit']))
		{
		   $_POST['oldpasswd']=clean($_POST['oldpasswd']);
		   $_POST['newpasswd']=clean($_POST['newpasswd']);
		   $_POST['newpasswd2']=clean($_POST['newpasswd2']);
		   $newpasswd=SHA1($_POST['newpasswd']);
	          $oldpasswd=SHA1($_POST['oldpasswd']);	   
        	   $username=$_SESSION['user'];

                //echo $_POST['oldpasswd'];	
		  //echo $_POST['newpasswd'];
		  //echo $_POST['newpasswd2'];
                  
               
		  
			
		$sql="Select username,password from users where username='$username' and password='".(($oldpasswd))."'";
		$result=mysql_query($sql,$conn);
		//echo mysql_num_rows($result);
              if($result and mysql_num_rows($result)>0)		     
                 {
                    $sql = "update users set password='".(($newpasswd))."' where username='$username'";
		      mysql_query($sql,$conn);
		      $text="Password Changed Successfully!";
                   }
		 else{
		      $text1="Old Password Doesn't match!";
                   }
		   
		}	
?>
<?php require_once('header.php') ?>
<script>
function show()
{	
	i=1
	while(document.getElementById(i))
	document.getElementById(i++).style.display='none'
	if(document.form1.comlocation.value)
	document.getElementById(document.form1.comlocation.value).style.display='block'
}
var x;
function blinkBorder(colorA, colorB, element, time){
  x++;
  if(x == 10)
	  return;
  element.style.borderColor = colorB ;
  setTimeout( function(){
    blinkBorder(colorB, colorA, element, time);
    colorB = null;
    colorA = null;
    element = null;
    time = null;
  } , time) ;
}

function validate()
{
       var f=document.form21
	var oldpasswd = f.oldpasswd.value;
	var newpasswd=f.newpasswd.value;
       var newpasswd2=f.newpasswd2.value;
       var nameReg =  /^[a-zA-Z ]*$ || ^\d+$/;
       var passReg = /^[a-zA-Z ]*$ || ^\d+$/;
	var numReg = /^\d+$/;
	if(oldpasswd=="" || !nameReg.test(oldpasswd)|| oldpasswd.length < 5)
	{	alert("Please Enter Your Current Password Correctly.")
		f.oldpasswd.focus()
		x = 0;
		blinkBorder("white","red", f.oldpasswd, 500);
		return false;
	}
	if(newpasswd=="" || !passReg.test(newpasswd) || newpasswd.length < 5)
	{	alert("Please Enter Your New Password\n Password should be more than 5 Characters.")
		f.newpasswd.focus()
		x = 0;
		blinkBorder("white","red", f.newpasswd, 500);
		return false;
	}
		

	if(newpasswd2=="" || newpasswd2!=newpasswd || newpasswd2.length < 5)
	{	alert("Please Confirm Your New Password\nPassword Should Match New Password.")
		f.newpasswd2.focus()
		x = 0;
		blinkBorder("white","red", f.newpasswd2, 500);
		return false;
	}
	
	
	return true
}
function error(str)
{
	document.getElementById("errorbox").innerHTML=str
}
function levelChange()
{
		var f=document.form1
		if(f.designation.value=="Other")
		{
			document.getElementById("otherdesig").style.display='table-row'
		}
		else
			document.getElementById("otherdesig").style.display='none'

}

</script>
<form name="form21" method="post" onsubmit="return validate()">
<div id="content">
<div id="right">
<div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>
<div align="center" class="box1" align="center" style="color:#FF0000""><?php if (!isset($text1)) $text1=""; echo $text1 ?></div>
<div id="errorbox" class="box" align="center" style="color:#FF0000"></div>
<table border="0" cellpadding="10" cellspacing="5">
<tr align="Left">
<td width = "200px;">Old Password: </td>
<td><input type="password" name="oldpasswd" size="20" /></td>
<tr align="Left">
<td width = "200px;">New Password: </td>    
<td><input type="password" name="newpasswd" size="20" /></td>
</tr>
<tr align="Left">
<td width = "200px;">Confirm New Password: </td>    
<td><input type="password" name="newpasswd2" size="20" /></td>
</tr>
<tr align="center">
<td colspan="2" align="center"><input type="submit" name="Submit" value="Submit" /></td>
</tr>
</table>
</div>
	
<div id="left">
	<div class="box">
			This is a section for updates/ news.
	</div>
   
</div>
</form>
<?php require_once('footer.php') ?>
</body>
</html>