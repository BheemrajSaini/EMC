<?php
require_once('functions.php');
secure(2);
require_once('conn.php');

if($_SESSION['type']==1)
header("Location: index.php");
if($_SESSION['type']==4)
header("Location: login.php");
if($_SESSION['type']==3)
header("Location: reports_final.php");
?>
<?php
if(isset($_POST['datesubmit']))
            {

                $_SESSION['fromdate']=$_POST['fromdate'];
                 $_SESSION['todate']=$_POST['todate'];
                 
				$_SESSION['problem']=$_POST['problem'];
				 
            }
$i=0;
$_GET['page']=0;
		if($_GET['page']>0)
		$page=$_GET['page'];
		else
		$page=0;
		$itemsperpage=10;
		$sql="Select Count(*) from complaints";
		$result=mysql_query($sql,$conn);
		if($result and mysql_num_rows($result)>0)
		{
			$row=mysql_fetch_array($result);
			$totalpages=$row[0]/10;
		}
		else
		$totalpages=1;
		if(isset($_POST['process']))
		{		
			$arr=explode(",",$_POST['ids']);		
			for($i=0;$i<(count($arr)-1);$i++)
			{					
				if(isset($_POST[$arr[$i]]))
				{								//changes here	
					mysql_query("Update complaints set processed=1,dispatchedTime=now(),contactPerson='" . $_POST['inchargeName'] . "', contactNumber=" . $_POST['inchargeContact'] . " where processed<2 and id=".$arr[$i]);
				}			
			}
			/*exit();*/
		}		
		if(isset($_POST['print']))
		{
			$arr=explode(",",$_POST['ids']);
			for($i=0;$i<(count($arr)-1);$i++)
			{
				if(isset($_POST[$arr[$i]]))
				{//changes here	
					//$sql="Select username,id,name,designation,department,location,description,processed,area,time,dispatchedTime, contactPerson, contactNumber, room,timing,descText,availablefrom,availableto,contact from complaints where id=".$arr[$i]."" ;
					$result=mysql_query($sql,$conn);
				}
			}
			$row=mysql_fetch_array($result);
			?>
			<form>
			<!--<img style = "margin-top: -25px; margin-left:120px;" src="images/nitt_banner1.jpg" alt="Logo"/>		
			<center><h4>DEPARTMENT OF ESTATE MAINTENANCE</h4></center>
			<u style='font-size:15px; font-weight: bold; margin-left:475px;'>COMPLAINT FORM</u>-->
                     <u style='font-size:14px; font-weight: bold; margin-left:300px;'>DEPT OF ESTATE MAINTENANCECOMPLAINT FORM</u>

			<?php
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
<style type="text/css">
@media print {
input#btnPrint {
display: none;
}
input#btnBack {
display: none;
}
}
</style> 
				<input type="button" id="btnPrint" onclick="window.print();" value="Print" />
				<?php
				echo '&nbsp' ?>
				<input type="button" id="btnBack" value="Back" onClick="history.back(1);"></center></h4>
				<br /><br />
				<table  style='margin-left:30px; text-align:center;' border = '1'>
				<tr><th>Complaint No</th><th>Name</th><th>Designation</th><th>Hostel & Room No.</th><th>Street & Quarters No.</th><th>Available Time(09.30 a.m. to 05.30 p.m)</th></tr>
			<?php 
                         $ref="EL".str_pad($row[id],5,"0",STR_PAD_LEFT);
                     echo "<tr><td>$ref</td><td>" . $row['name'] . "</td><td>" . $row['designation'] . "</td><td>" . $row['location'] . "- ". $row['room'] ."</td><td>" .  $row['room']. "</td><td>" . $row['availablefrom'] . " - " . $row['availableto'] . "</td></tr>";
                     echo "<tr><td><b>Nature of complaint</b></td><td colspan = '5'>";if($row['description']==1) {echo "Fan is not working. ".$row['descText'];} else if($row['description']==2) {echo"Tubelight is not working. ".$row['descText'];} 
			else if($row['description']==4){ echo"Switch is not working. ".$row['descText'];}else if($row['description']==8) {echo"Plug Point is not working. ".$row['descText'];} else if($row['description']==16) {echo"Street Light is not working. ".$row['descText'];}else if($row['description']==32) {echo"Power Failure(fuse) problem. ".$row['descText'];}
			else if($row['description']==3){ echo"Fan, TubeLight is not working. ".$row['descText'];} else if($row['description']==5) {echo"Fan, Switch is not working. ".$row['descText'];} else if($row['description']==9) {echo"Fan, Plug Point is not working. ".$row['descText'];}
			else if($row['description']==17) {echo" Fan, Street Light is not working. ".$row['descText'];}else if($row['description']==33) {echo" Fan is not working,power failure(fuse) problem. ".$row['descText'];}else if($row['description']==6) {echo"TubeLight, Switch is not working. ".$row['descText'];}
			else if($row['description']==10) {echo"Tube Light, PlugPoint is not working. ".$row['descText'];} else if($row['description']==18) {echo" TubeLight, Street Light is not working. ".$row['descText'];}else if($row['description']==34) {echo" TubeLight is not working, power failure(fuse) problem. ".$row['descText'];}
			else if($row['description']==12) {echo"Switch, Plug Point is not working. ".$row['descText'];} else if($row['description']==20) {echo"Switch, Street Light is not working. ".$row['descText'];}else if($row['description']==36) {echo"Switch is not working, power failure(fuse) problem. ".$row['descText'];}
			else if($row['description']==24) {echo"Plug Point, Street Light is not working. ".$row['descText'];}else if($row['description']==40) {echo"Plug Point is not working,power failure(fuse) problem. ".$row['descText'];}else if($row['description']==48) {echo"Street Light is not working,power failure(fuse) problem. ".$row['descText'];} 
			else if($row['description']==7) {echo"Fan, TubeLight, Switch is not working. ".$row['descText'];}else if($row['description']==11) {echo"Fan, TubeLight, PlugPoint is not working. ".$row['descText'];} else if($row['description']==19) {echo"Fan, TubeLight, Street Light is not working. ".$row['descText'];} else if($row['description']==35) {echo"Fan, TubeLight is not working & power failure(fuse) problem. ".$row['descText'];}
			else if($row['description']==14) {echo"Switch, TubeLight, PlugPoint is not working. ".$row['descText'];}else if($row['description']==22) {echo"TubeLight,Switch,Street Light is not working. ".$row['descText'];}else if($row['description']==38) {echo"TubeLight,Switch is not working & power failure(fuse) problem. ".$row['descText'];}
			else if($row['description']==28) {echo"Switch,PlugPoint,Street Light is not working. ".$row['descText'];}else if($row['description']==44) {echo"Switch,PlugPoint is not working & power failure(fuse) problem. ".$row['descText'];}else if($row['description']==56) {echo"Streetlight,PlugPoint is not working & power failure(fuse) problem. ".$row['descText'];}
			else if($row['description']==15) {echo"Fan, TubeLight, Switch, PlugPoint is not working. ".$row['descText'];} else if($row['description']==23) {echo"Fan, TubeLight, Switch, Street Light is not working. ".$row['descText'];}else if($row['description']==39) {echo"Fan, TubeLight, Switch is not working & power failure(fuse) problem. ".$row['descText'];} 
			else if($row['description']==30){echo"TubeLight, Switch, Plugpoint,Street Light is not working. ".$row['descText'];} else if($row['description']==46){echo"TubeLight, Switch, Plugpoint is not working & power failure(fuse) problem. ".$row['descText'];} 
			else if($row['description']==60) {echo" Switch, PlugPoint, Street Light is not working 7 power failure(fuse) problem. ".$row['descText'];}else if($row['description']==31) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light is not working. ".$row['descText'];}else if($row['description']==62) {echo"TubeLight, Switch, PlugPoint, Street Light is not working & power failure(fuse) problem. ".$row['descText'];}
			else if($row['description']==63) {echo"fan, TubeLight, Switch, PlugPoint, Street Light is not working & power failure(fuse) problem. ".$row['descText'];}
			else if($row['description']==64) {echo $row['descText'];}
			else if($row['description']==65) {echo"Fan is not working. ".$row['descText'];}
			else if($row['description']==66) {echo"TubeLight is not working. ".$row['descText'];}
			else if($row['description']==68) {echo"Switch is not working. ".$row['descText'];}
			else if($row['description']==72) {echo"PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==80) {echo"StreetLight is not working. ".$row['descText'];}
			else if($row['description']==96) {echo"Power Failure. ".$row['descText'];}
			else if($row['description']==67) {echo"Fan, TubeLight is not working. ".$row['descText'];}
			else if($row['description']==69) {echo"Fan, Switch is not working. ".$row['descText'];}
			else if($row['description']==73) {echo"Fan, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==81) {echo"Fan, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==97) {echo"Fan is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==70) {echo"TubeLight, Switch is not working. ".$row['descText'];}
			else if($row['description']==74) {echo"TubeLight, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==82) {echo"TubeLight, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==98) {echo"TubeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==76) {echo"Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==84) {echo"Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==100) {echo"Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==88) {echo"PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==104) {echo"PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==112) {echo"StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==71) {echo"Fan, TubeLight, Switch is not working. ".$row['descText'];}
			else if($row['description']==75) {echo"Fan, TubeLight, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==83) {echo"Fan, TubeLight, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==99) {echo"Fan, TubeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==78) {echo"TubeLight, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==86) {echo"TubeLight, Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==102) {echo"TubeLight, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==92) {echo"Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==108) {echo"Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==120) {echo"PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==77) {echo"Fan, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==85) {echo"Fan, Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==101) {echo"Fan, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==89) {echo"Fan, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==105) {echo"Fan, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==113) {echo"Fan, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==90) {echo"TubeLight, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==106) {echo"TubeLight, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==114) {echo"TubeLight, StreetLight is not working. Power Failure".$row['descText'];}
			else if($row['description']==116) {echo"Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==79) {echo"Fan, TubeLight, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==87) {echo"Fan, TubeLight, Switch, Street Light is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==103) {echo"Fan, TubeLight, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==93) {echo"Fan, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==109) {echo"Fan, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==121) {echo"Fan, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==94) {echo"TubeLight, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==110) {echo"TubeLight, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==122) {echo"TubeLight, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==124) {echo"Switch, PlugPoint, StreeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==95) {echo"Fan, TubeLight, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==111) {echo"Fan, TubeLight, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==126) {echo"TubeLight, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==127) {echo"Fan, TubeLight, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==91) {echo"Fan, TubeLight, PlugPoint is not working".$row['descText'];}
			else if($row['description']==107) {echo"Fan, TubeLight, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==115) {echo"Fan, TubeLight, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==117) {echo"Fan, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==118) {echo"TubeLight, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==119) {echo"Fan, TubeLight, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==123) {echo"Fan, TubeLight, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==125) {echo"Fan, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			"</td></tr>";
			
			
			echo "<tr><td><b>Contact Number</b></td><td colspan = '5'>" . $row['contact'] . "</td></tr>";
                     echo "<tr><td><b>Email-ID</b></td><td colspan = '5'>". $row['username'] ."@nitt.edu</td></tr>";
			echo "</table>";
				echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date: _____________</b>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SIGNATURE: </b>__________________";
echo "<br /><br />";
echo "<div style = 'width: 100%';>";
echo "<div style = 'float:left; width: 500px;'>";
echo "<table border = '1' style = 'margin-left: 30px; text-align:center;'>";
echo "<tr><td colspan = '2'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FOR OFFICE USE ONLY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td></tr>";
echo "<tr><td style='text-align:left; width: 85px';><b>Indent No.</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
echo "<tr><td style='text-align:left';><b>Material Details</b></td><td>&nbsp;</td></tr>";
echo "<tr><td style='text-align:left';><b>Used</b></td><td>&nbsp;</td></tr>";
echo "<tr><td style='text-align:left';><b>Returned</b></td><td>&nbsp;</td></tr>";
echo "</table>";
echo "</div>";
echo "<div>";
echo "<table border = '1;' style = 'margin-left: 600px; text-align:center;'>";
echo "<tr><td colspan = '2'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACKNOWLEDGEMENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td></tr>";
echo "<tr><td style='width:190px;'><b>Name</b></td><td><b>Signature with date</b></td></tr>";
echo "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "</table>";
echo "</div>";
echo "</div>";
echo "<p style='margin-top: 50px; margin-left:215px;'><b>SIGNATURE OF ATTENDANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STORES IN - CHARGE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASSISTANT ENGINEER</b></p>";
			echo '</form>';			exit();
		}

		if(1)//(isset($_POST['Submit']))
		{
			$sql="Select id,name,designation,department,location,description,processed,area,time, contactPerson, contactNumber, room,timing,descText,availablefrom,availableto,contact from complaints ";
			$status="and";
			$sql.="where ( 1=1 ";

			if(isset($_POST['process1']))
				$status.=" processed=2";
			if(isset($_POST['process2']))
			{	if($status=="and")
			    $status.=" processed=1";
				else
				$status.=" or processed=1";
			}
			if(isset($_POST['process3']))
			{	if($status=="and")
			    $status.=" processed=2";
				else
				$status.=" or processed=2";
				if($status=="and")
			    $status.=" processed=1";
				else
				$status.=" or processed=1";
				if($status=="and")
			    $status.=" processed=0";
				else
				$status.=" or processed=0";
			}

			if ($status=="and")
			$sql.=") ";
			else
			$sql.=$status.") ";
			if(isset($_POST['nm']))		
			//if($isSetId != 0)
			{
				$sql.="and (id=". $_POST['process3'] .")";
			}

			$sql.=" and (1=1 ";
			$loc="and";
			if(isset($_POST['loc1']))
				$loc.=" area=1";
			if(isset($_POST['loc2']))
			    if($loc=="and")
					$loc.=" area=2";
				else
					$loc.=" or area=2";
			if(isset($_POST['loc3']))
			    if($loc=="and")
					$loc.=" area=3";
				else
					$loc.=" or area=3";
			if(isset($_POST['loc4']))
			    if($loc=="and")
					$loc.=" area=4";
				else
					$loc.=" or area=4";
			if(isset($_POST['loc5']))
			    if($loc=="and")
					$loc.=" area=5";
				else
					$loc.=" or area=5";

			if ($loc=="and")
			$sql.=") ";
			else
			$sql.=$loc.") ";

			$sql.=" order by time ASC ";



		}
		else
		$sql="Select id,name,designation,department,location,description,processed,area,time, contactPerson, contactNumber, room,timing,descText,availablefrom,availableto,contact from complaints order by processed ASC";
//limit ".($page*$itemsperpage).",$itemsperpage
		$result=mysql_query($sql,$conn);

?>

<script>

function myDesc(dVal,descText)
{
	var k=0,j=0,j1=0;
	var str=""
	while(dVal>0){
		while(Math.pow(2,k)<=dVal){
		j=Math.pow(2,k)
		k+=1;
		}
		switch(j)
		{
			case 1:str+="Fan is not working.<br/>"; break;
			case 2:str+="Tubelight is not working.<br/>"; break;
			case 4:str+="Switch is not working.<br/>"; break;
			case 8:str+="Plug point is not working.<br/>"; break;
			case 16:str+="Street Light is not working.<br/>"; break;
			case 32:str+="Power Failure(fuse) problem.<br/>";break;
			case 64:str+="Others : "+descText+"<br/>";j1=1;break;
			
		}
		dVal-=j;
		k=0;
	}
	if((descText!="")&&(j1!=1))
	str+="-"+descText;
	return document.getElementById("descdiv").innerHTML=str

}
function myTime(dVal)
{
	var k=0,j=0
	var str=""
	while(dVal>0){
		while(Math.pow(2,k)<=dVal){
		j=Math.pow(2,k)
		k+=1;
		}
		switch(j)
		{
			case 1:str+="weekday 12noon to 1 pm.<br/>"; break;
			case 2:str+="weekday 3pm to 5:30 pm.<br/>"; break;
			case 4:str+="saturday 9am to 5pm.<br/>"; break;
			case 8:str+="Anytime. <br/>";break;
			case 16:str+="weekday 5:30 pm to 7pm.<br/>";break;
			case 32:str+="Morning 10am to 12:30 pm.<br/>";break;
			case 64:str+="Evening 3pm to 5:30 pm.<br/>";break;
		}
		dVal-=j;
		k=0;
	}
	return document.getElementById("descdiv").innerHTML=str;

}


function rowover(id,str,timing,contact,descText)
{
	id.style.background='#9ec630'; id.style.cursor='pointer';
	document.getElementById("optiondiv").style.display='none'
	document.getElementById("descdiv").innerHTML="<h2>Description : </h2>" + myDesc(document.getElementById("desc"+str).value,descText)
	document.getElementById("descdiv").innerHTML+="<h4>Availablity Time : </h4>" + myTime(document.getElementById("tm"+str).value)
	if(contact!='')
	document.getElementById("descdiv").innerHTML+="<h4>Contact Number : </h4>" + contact
	document.getElementById("descdiv").style.display='block'
}
function rowout(id,col,cid)
{	if(!document.getElementById("ID"+cid).checked)
	id.style.background=col
	else
	id.style.background='#fff6bf'
	document.getElementById("optiondiv").style.display='block'
	document.getElementById("descdiv").innerHTML=""
	document.getElementById("descdiv").style.display='none'
}
function rowclick(rowid,cid)
{
	if(document.getElementById("toPrint"+cid).value=="1")
	{			
		document.getElementById("printBtn").disabled=false;						
		document.getElementById("inchargeName").disabled=true;
		document.getElementById("processedBtn").disabled=true;
		document.getElementById("inchargeContact").disabled=true;
	}
	else
	{
		document.getElementById("printBtn").disabled=true;
		document.getElementById("inchargeName").disabled=false;
		document.getElementById("inchargeContact").disabled=false;
		document.getElementById("processedBtn").disabled=false;
	}
	var f=document.getElementById("ID"+cid)	
	if(f.checked)
	f.checked=false
	else
	{	f.checked=true
		rowid.style.background='#fff6bf'
		document.getElementById('incharge').hidden = false;
	}	
}
function chkclick(id,str)
{
	if(id.checked)
	{	i=1
		while(document.getElementById(str+i))
		{	document.getElementById(str+i).checked=true
			document.getElementById(str+i++).disabled=true
		}
	}
	else
	{	i=1
		while(document.getElementById(str+i))
		{	document.getElementById(str+i).checked=false
			document.getElementById(str+i++).disabled=false
		}
	}
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

function validate1()
{
var f=document.form1
var name = f.inchargeName.value;
var nameReg = /^[a-zA-Z ]*$/;
if(name=="" || !nameReg.test(name))
	{	
              alert("Please enter the Technician Name.\nName can only have Alphabets")
		f.inchargeName.focus()
		x = 0;
		blinkBorder("white","red", f.inchargeName, 500);
		return false;
	}

//changes here	
/*
if(f.inchargeName.value=="0")
	{	alert("Please Select your inchargeName.")
		f.inchargeName.focus()
		x = 0;
		blinkBorder("white","red", f.inchargeName, 500);
		return false;
	}
*/
/*
var numReg = /^\d+$/;
if(f.inchargeContact.value=="" || !numReg.test(f.inchargeContact.value) || f.inchargeContact.value.length > 10||f.inchargeContact.value.length < 10)
	{	alert("Please Enter Proper Contact Number.\nContact can have only numbers (Max 10 digits)");
		f.inchargeContact.focus()
		x = 0;
		blinkBorder("white","red", f.inchargeContact, 500);
		return false;
	}
		
*/

}

function validate()
{
var f=document.form1
f.timing1.value=calct()
return true
}

</script>
<?php require_once('header.php');  ?>
 <?php
 /* changes to accomodate date filter */
if(isset($_SESSION['fromdate']))
    unset($_SESSION['fromdate']);
if(isset($_SESSION['todate']))
    unset($_SESSION['todate']);
if(isset($_POST['datesubmit']))
            {

                $_SESSION['fromdate']=$_POST['fromdate'];
                 $_SESSION['todate']=$_POST['todate'];
                 
            }
?>
<div id="menu" >
  <ul id="nav1">
  <?php 
  echo '<a href="completed.php"><center>Completed</center></a>' ;
echo'<a href="dispatched.php"><center>Dispatched</center></a><a href="unprocessed.php"><center>Unprocessed</center></a>';  
	
	?>	
   </ul>
 </div>
 <div id="content">
     <!--  Date wise search form starts- Vikas meghwani   -->
     <div id="content">

         <form name="date" method="post" id="date" onsubmit ="return form2validate();" action="">
             <table width="30%" align="center" border="0" cellpadding="5" cellspacing="5">
<tr align="center">
<td width="39%" align="right">From: </td>
<td id="userTbox" width="25%" align="left"><input type="date" name="fromdate" size="26" value="<?php if(isset($_SESSION['fromdate'])){echo $_SESSION['fromdate']; unset($_SESSION['fromdate']); }   ?>" /></td>
<td width="39%" align="right">To: </td>
<td id="userTbox" width="25%" align="left"><input type="date" name="todate" size="26"  value="<?php if(isset($_SESSION['todate'])){echo $_SESSION['todate']; unset($_SESSION['todate']); }   ?>"/></td>
</tr>
<tr>
<td>
</td>
<td colspan ="3">
<script>

function calcp()
{
	var f=document.date
	var pr1=0,pr2=0,pr3=0,pr4=0,pr5=0,pr6=0,pr7=0
	if(f.p1.checked)pr1=1
	if(f.p2.checked)pr2=2
	if(f.p3.checked)pr3=4
	if(f.p4.checked)pr4=8
	if(f.p5.checked)pr5=16
	if(f.p6.checked)pr6=32
	if(f.p7.checked)pr7=64
	return pr1+pr2+pr3+pr4+pr5+pr6+pr7
}



function form2validate()
{
	var f=document.date

	f.problem.value=calcp()
	return true
}


</script>


<input type="checkbox" name="p1" value "1"/>Fan
<input type="checkbox" name="p2" value "2"/>Tubelight 
<input type="checkbox" name="p3" value "4"/>Switch 
 <input type="checkbox" name="p4" value "8"/>Plug Point<br/>
 <input type="checkbox" name="p5" value "16"/>Street Light
 <input type="checkbox" name="p6" value "32"/>Power Failure
 <input type="checkbox" name="p7" value "64"/>Others
<input type="hidden" name="problem" value="" onsubmit="form2validate()" />


</td>
</tr>
<tr><td colspan="4" align="center"><input type="submit" name="datesubmit" value="SHOW"/></td>
</tr>
             </table>

         </form>
     </div>
<!--  Date wise search form ends   -->

 <?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; ?>

<form name="form1" method="post" onsubmit="return validate()">
<div id="nright">

<table align="center" width="80%" id="table1">
<tr>
<th>Compl.No</th>
<th>Name</th>
<th>Designation</th>
<th>Department</th>
<th>Location</th>
<th>Room/Quarter No</th>
<th>Status</th>
<th>Time</th>
<th>Contact Person</th>
<th>Contact Number</th>
</tr>
<?php
	$i = 0;
	$j=0;
	$a=0;
	$count1=0;
	$count2=0;
        while($row=mysql_fetch_array($result))
	{	
	$count2++;
		if(!isset($ids))
			$ids = 0;

                /*searching in a particular period  */
                if(isset($_POST['datesubmit']))
            {
		
				$a=1;
                $from=$_POST['fromdate'];
                $to=$_POST['todate'];
                $f=strtotime($from);
                $t=strtotime($to);

                  if($f==$t)
                    $t=$f+86400;
                 
                $timestamp = strtotime($row['time']);


            if($timestamp <$f or $timestamp>$t)
                {
                $i++;
                continue;
				}
				$problem=$_SESSION['problem'];
				$description=$row['description'];
				if($problem!=$description)
					{
					$j++;
					continue;
					
					}
				 $count1++;
            }
            /*searching code ends */


?>
<tr <?php if($i%2) { ?> style="background:#CCCCCC" <?php } else { ?> <?php }?> onmouseover="rowover(this,'<?php echo $i ?>','<?php echo $row['time']?>','<?php echo $row['contact']?>','<?php echo $row['descText']?>')" onmouseout="rowout(this,'<?php if($i%2) echo '#CCCCCC'; else echo '#e6e6e6'; ?>','<?php echo $row['id'] ?>')" <?php if($row['processed']!='2') {?>onclick="rowclick(this,'<?php echo $row['id']?>')"<?php } ?>>
<td align="center"><?php echo "EL".str_pad($row['id'],6,"0",STR_PAD_LEFT) ?></td>
<td align="center"><?php echo $row['name']; ?></td>
<td align="center"><?php echo $row['designation'] ?></td>
<td align="center"><?php echo $row['department'] ?></td>
<td align="center"><?php echo $row['location'] ?></td>
<td align="center"><?php echo $row['room'] ?></td>
<input type = "hidden" id = "toPrint<?php echo $row['id'];?>" value="<?php echo $row['processed']; ?>">
<td align="center"><?php
$src="images/processed.png";
$src1="images/unprocessed.png";
$src2="images/dispatched.png";
		if ($row['processed']=='1')
		echo "<img src='$src2'height='20' width='20' border='0'alt='' alt='' />";
		else if($row['processed']=='2')
		echo "<img src='$src'height='15' width='15' border='0'alt='' alt='' />";
		else
		echo "<img src='$src1'height='20' width='20' border='0'alt='' alt='' />";
 ?></td>
<td align="center"><?php echo $row['time'] ?></td>
<td align="center"><?php echo $row['contactPerson'] ?></td>
<td align="center"><?php echo $row['contactNumber'] ?></td>
<input type="checkbox" name="<?php echo $row['id'] ?>" id="ID<?php echo $row['id']?>" style="display:none"/>
</tr>
<input type="hidden" value="<?php echo $row['description']?>" id="desc<?php echo $i ?>" />
<input type="hidden" value="<?php echo $row['timing']?>" id="tm<?php echo $i ?>" />
<?php
if ($i == 0)
$ids = $row['id']. ",";
else
$ids.=$row['id'].",";
$i++;
}
?>
</table><br />
<d
<input type="hidden" name="ids" value="<?php echo $ids ?>" />
</div>
</div>
<?php 
echo "Total numbers of rows ";
if($a==0)
	echo $count2;
else
	echo $count1;
 ?>
<div  class="box" id="left">
<div id = "incharge" style="margin-left:8px;"><br />
<!--
Technician Allotted:<?php echo '&nbsp';?><select name="inchargeName" id='inchargeName' value="options" disabled="true">
<option value="0">Select</option>
<option value="aaa">aaa</option>
<option value="bbb">bbb</option>
<option value="ccc">ccc</option>
<option value="ddd">ddd</option>
</SELECT>
//changes here-->

<br /><br />Technician:<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; ?><input disabled = "true" type = 'text' id = 'inchargeName' name = 'inchargeName' />
<br /><br />Contact:<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; ?><input disabled = "true" type = 'text' id = 'inchargeContact' name = 'inchargeContact' />
<br /><br />
</div>
<div id="printDisplay" align="center" >
<input type="submit" name="print" disabled = "true" id = "printBtn" value="Print" />
<input type="submit" name="process" id = "processedBtn" disabled = "true" value="Process" onClick="return validate1()" />
<input type="hidden" name="ids" disabled = "true" value = "<?php echo $ids ?>" />
</div>
<div class="box" id="optiondiv" style="position:fixed; right:5px; max-width:200px; bottom:-2px;">	
			
	</div>
<div class="box" id="descdiv" style="display:none; position:fixed;right:20px;min-width:180px;"></div>

</div>
<?php //require_once('footer.php') ?>
</div>

</form>
<form name="formSearch" method="post">
<input style="position:absolute;top:150px;right:105px;" type="input" id = "searchText" name="process3" />
<input style="position:absolute;top:150px;right:20px;" type="submit" id = "searchBtn" name="nm" value="search" />
</form>

</body>
</html>




