<?php
require_once('functions.php');
secure(2);
require_once('conn.php');
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
					$sql="Select username,id,name,designation,department,location,description,processed,area,time,dispatchedTime, contactPerson, contactNumber, room,timing,descText,availablefrom,availableto,contact from complaints where id=".$arr[$i]."";
					$result=mysql_query($sql,$conn);
				}
			}
			$row=mysql_fetch_array($result);
			echo '<form>';
			//echo '<img style = "margin-top: -25px; margin-left:120px;" src="images/nitt_banner1.jpg" alt="Logo"/>';		
			//echo "<center><h4>DEPARTMENT OF ESTATE MAINTENANCE</h4></center>";
			echo "<u style='font-size:14px; font-weight: bold; margin-left:300px;'>DEPT OF ESTATE MAINTENANCECOMPLAINT FORM</u>";
 //echo "<center><h3>DEPARTMENT OF ESTATE MAINTENANCE COMPLAINT FORM</h3></center>";
                     //echo "<u style='font-size:14px; font-weight: bold;margin-top: -25px; margin-left:120px;'>DEPARTMENT OF ESTATE MAINTENANCE COMPLAINT FORM</u>";
                     
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
				<input type="button" id="btnPrint" onclick="window.print();" value="Print Page" />
				<?php
				echo '&nbsp' ?>
				<input type="button" id="btnBack" value="Back" onClick="history.back(1);"></center></h4>
				<br /><br />
				<table  style='margin-left:30px; text-align:center;' border = '1'>
				<tr><th>Complaint No</th><th>Name</th><th>Designation</th><th>Hostel & Room No.</th><th>Street & Quarters No.</th><th>Available Time(09.30 a.m. to 05.30 p.m)</th></tr>
				<?php
                      $ref="EL".str_pad($row[id],5,"0",STR_PAD_LEFT);

			echo "<tr><td>$ref</td><td>" . $row['name'] . "</td><td>" . $row['designation'] . "</td><td>" . $row['location'] . "- ". $row['room'] ."</td><td>" .  $row['room']. "</td><td>" . $row['availablefrom'] . " - " . $row['availableto'] . "</td></tr>";
			echo "<tr><td><b>Nature of complaint</b></td><td colspan = '5'>";
		
		  if($row['description']==1) {echo"Fan is not working. ".$row['descText'];}
			else if($row['description']==2) {echo"TubeLight is not working. ".$row['descText'];}
			else if($row['description']==4) {echo"Switch is not working. ".$row['descText'];}
			else if($row['description']==8) {echo"PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==16) {echo"StreetLight is not working. ".$row['descText'];}
			else if($row['description']==32) {echo"Power Failure. ".$row['descText'];}
			else if($row['description']==3) {echo"Fan, TubeLight is not working. ".$row['descText'];}
			else if($row['description']==5) {echo"Fan, Switch is not working. ".$row['descText'];}
			else if($row['description']==9) {echo"Fan, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==17) {echo"Fan, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==33) {echo"Fan is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==6) {echo"TubeLight, Switch is not working. ".$row['descText'];}
			else if($row['description']==10) {echo"TubeLight, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==18) {echo"TubeLight, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==34) {echo"TubeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==12) {echo"Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==20) {echo"Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==36) {echo"Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==24) {echo"PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==40) {echo"PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==48) {echo"StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==7) {echo"Fan, TubeLight, Switch is not working. ".$row['descText'];}
			else if($row['description']==11) {echo"Fan, TubeLight, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==19) {echo"Fan, TubeLight, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==35) {echo"Fan, TubeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==14) {echo"TubeLight, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==22) {echo"TubeLight, Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==38) {echo"TubeLight, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==28) {echo"Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==44) {echo"Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==56) {echo"PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==13) {echo"Fan, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==21) {echo"Fan, Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==37) {echo"Fan, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==25) {echo"Fan, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==41) {echo"Fan, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==49) {echo"Fan, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==26) {echo"TubeLight, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==42) {echo"TubeLight, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==50) {echo"TubeLight, StreetLight is not working. Power Failure".$row['descText'];}
			else if($row['description']==52) {echo"Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==15) {echo"Fan, TubeLight, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==23) {echo"Fan, TubeLight, Switch, Street Light is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==39) {echo"Fan, TubeLight, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==29) {echo"Fan, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==45) {echo"Fan, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==57) {echo"Fan, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==30) {echo"TubeLight, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==46) {echo"TubeLight, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==58) {echo"TubeLight, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==60) {echo"Switch, PlugPoint, StreeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==31) {echo"Fan, TubeLight, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==47) {echo"Fan, TubeLight, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==62) {echo"TubeLight, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==63) {echo"Fan, TubeLight, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==27) {echo"Fan, TubeLight, PlugPoint is not working".$row['descText'];}			
			else if($row['description']==43) {echo"Fan, TubeLight, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==51) {echo"Fan, TubeLight, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==53) {echo"Fan, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==54) {echo"TubeLight, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==55) {echo"Fan, TubeLight, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==59) {echo"Fan, TubeLight, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==61) {echo"Fan, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			
			
			
			
			
			
			else if($row['description']==64) {echo "AC is not working ".$row['descText'];}
			else if($row['description']==128) {echo "Lift is not working ".$row['descText'];}			
			else if($row['description']==256) {echo $row['descText'];}			
else if($row['description']==65) {echo"Fan & AC are not working.".$row['descText'];}
else if($row['description']==129) {echo"Fan & Lift are not working.".$row['descText'];}
else if($row['description']==66) {echo"TubeLight & AC are not working.".$row['descText'];}
else if($row['description']==130) {echo"TubeLight & Lift are not working.".$row['descText'];}
else if($row['description']==68) {echo"Switch & AC are not working.".$row['descText'];}
else if($row['description']==132) {echo"Switch & Lift are not working.".$row['descText'];}
else if($row['description']==72) {echo"PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==136) {echo"PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==80) {echo"Street Light & AC are not working.".$row['descText'];}
else if($row['description']==144) {echo"Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==96) {echo"Power failure(fuse) problem & AC is not working.".$row['descText'];}
else if($row['description']==160) {echo"Power failure(fuse) problem & Lift is not working.".$row['descText'];}
else if($row['description']==192) {echo"AC & Lift are not working.".$row['descText'];}
else if($row['description']==67) {echo"Fan, TubeLight & AC are not working.".$row['descText'];}
else if($row['description']==131) {echo"Fan, TubeLight & Lift are not working.".$row['descText'];}
else if($row['description']==69) {echo"Fan, Switch & AC are not working.".$row['descText'];}
else if($row['description']==133) {echo"Fan, Switch & Lift are not working.".$row['descText'];}
else if($row['description']==73) {echo"Fan, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==137) {echo"Fan, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==81) {echo"Fan, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==145) {echo"Fan, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==97) {echo"Fan, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==161) {echo"Fan, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==70) {echo"TubeLight, Switch & AC are not working.".$row['descText'];}
else if($row['description']==134) {echo"TubeLight, Switch & Lift are not working.".$row['descText'];}
else if($row['description']==74) {echo"TubeLight, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==138) {echo"TubeLight, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==82) {echo"TubeLight, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==146) {echo"TubeLight, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==98) {echo"TubeLight, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==162) {echo"TubeLight, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==76) {echo"Switch, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==140) {echo"Switch, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==84) {echo"Switch, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==148) {echo"Switch, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==102) {echo"Switch, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==164) {echo"Switch, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==88) {echo"PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==152) {echo"PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==104) {echo"PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==168) {echo"PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==112) {echo"Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==176) {echo"Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==193) {echo"Fan, AC & Lift are not working.".$row['descText'];}
else if($row['description']==194) {echo"TubeLight, AC & Lift are not working.".$row['descText'];}
else if($row['description']==196) {echo"Switch, AC & Lift are not working.".$row['descText'];}
else if($row['description']==200) {echo"PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==208) {echo"Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==224) {echo"Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==71) {echo"Fan, TubeLight, Switch & AC are not working.".$row['descText'];}
else if($row['description']==135) {echo"Fan, TubeLight, Switch & Lift are not working.".$row['descText'];}
else if($row['description']==75) {echo"Fan, TubeLight, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==139) {echo"Fan, TubeLight, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==84) {echo"Fan, TubeLight, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==147) {echo"Fan, TubeLight, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==99) {echo"Fan, TubeLight, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==163) {echo"Fan, TubeLight, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==77) {echo"Fan, Switch, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==141) {echo"Fan, Switch, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==85) {echo"Fan, Switch, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==149) {echo"Fan, Switch, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==101) {echo"Fan, Switch, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==165) {echo"Fan, Switch, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==89) {echo"Fan, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==153) {echo"Fan, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==105) {echo"Fan, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==169) {echo"Fan, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==113) {echo"Fan, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==177) {echo"Fan, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==78) {echo"TubeLight, Switch, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==142) {echo"TubeLight, Switch, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==86) {echo"TubeLight, Switch, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==150) {echo"TubeLight, Switch, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==102) {echo"TubeLight, Switch, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==166) {echo"TubeLight, Switch, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==92) {echo"Switch, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==156) {echo"Switch, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==108) {echo"Switch, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==172) {echo"Switch, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==120) {echo"PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==184) {echo"PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==114) {echo"TubeLight, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==178) {echo"TubeLight, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==90) {echo"TubeLight, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==154) {echo"TubeLight, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==106) {echo"TubeLight, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==170) {echo"TubeLight, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==116) {echo"Switch, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==180) {echo"Switch, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==195) {echo"Fan, TubeLight, AC & Lift are not working.".$row['descText'];}
else if($row['description']==197) {echo"Fan, Switch, AC & Lift are not working.".$row['descText'];}
else if($row['description']==201) {echo"Fan, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==209) {echo"Fan, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==225) {echo"Fan, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==198) {echo"TubeLight, Switch, AC & Lift are not working.".$row['descText'];}
else if($row['description']==202) {echo"TubeLight, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==210) {echo"TubeLight, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==226) {echo"TubeLight, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==204) {echo"Switch, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==212) {echo"Switch, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==228) {echo"Switch, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==216) {echo"PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==232) {echo"PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==240) {echo"Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==79) {echo"Fan, TubeLight, Switch, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==143) {echo"Fan, TubeLight, Switch, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==87) {echo"Fan, TubeLight, Switch, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==151) {echo"Fan, TubeLight, Switch, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==103) {echo"Fan, TubeLight, Switch, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==167) {echo"Fan, TubeLight, Switch, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==91) {echo"Fan, TubeLight, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==155) {echo"Fan, TubeLight, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==107) {echo"Fan, TubeLight, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==97) {echo"Fan, TubeLight, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==93) {echo"Fan, Switch, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==157) {echo"Fan, Switch, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==109) {echo"Fan, Switch, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==173) {echo"Fan, Switch, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==121) {echo"Fan, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==185) {echo"Fan, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==94) {echo"TubeLight, Switch, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==158) {echo"TubeLight, Switch, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==110) {echo"TubeLight, Switch, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==174) {echo"TubeLight, Switch, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==122) {echo"TubeLight, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==186) {echo"TubeLight, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==124) {echo"Switch, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==188) {echo"Switch, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==115) {echo"Fan, TubeLight, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==179) {echo"Fan, TubeLight, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==118) {echo"TubeLight, Switch, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==182) {echo"TubeLight, Switch, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==117) {echo"Fan, Switch, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==181) {echo"Fan, Switch, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==230) {echo"TubeLight, Switch, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==220) {echo"Switch, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==236) {echo"Switch, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==248) {echo"PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==242) {echo"TubeLight, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==218) {echo"TubeLight, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==234) {echo"TubeLight, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==244) {echo"Switch, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==199) {echo"Fan, TubeLight, Switch, AC & Lift are not working.".$row['descText'];}
else if($row['description']==203) {echo"Fan, TubeLight, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==211) {echo"Fan, TubeLight, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==227) {echo"Fan, TubeLight, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==205) {echo"Fan, Switch, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==213) {echo"Fan, Switch, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==229) {echo"Fan, Switch, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==217) {echo"Fan, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==233) {echo"Fan, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==241) {echo"Fan, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==206) {echo"TubeLight, Switch, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==214) {echo"TubeLight, Switch, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==207) {echo"Fan, TubeLight, Switch, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==238) {echo"TubeLight, Switch, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==250) {echo"TubeLight, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==252) {echo"Switch, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==243) {echo"Fan, TubeLight, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==246) {echo"TubeLight, Switch, Street Light, Power failure(fuse) problem, AC & Lift are not working".$row['descText'];}
else if($row['description']==245) {echo"Fan, Switch, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==95) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==159) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==111) {echo"Fan, TubeLight, Switch, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==175) {echo"Fan, TubeLight, Switch, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==119) {echo"Fan, TubeLight, Switch, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==183) {echo"Fan, TubeLight, Switch, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==123) {echo"Fan, TubeLight, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==187) {echo"Fan, TubeLight, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==125) {echo"Fan, Switch, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==189) {echo"Fan, Switch, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==126) {echo"TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==190) {echo"TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==215) {echo"Fan, TubeLight, Switch, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==231) {echo"Fan, TubeLight, Switch, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==219) {echo"Fan, TubeLight, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==205) {echo"Fan, TubeLight, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==221) {echo"Fan, Switch, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==237) {echo"Fan, Switch, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==249) {echo"Fan, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==222) {echo"TubeLight, Switch, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==127) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==191) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==223) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==239) {echo"Fan, TubeLight, Switch, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==247) {echo"Fan, TubeLight, Switch, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==251) {echo"Fan, TubeLight, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==253) {echo"Fan, Switch, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==254) {echo"TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==255) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
			
			
			
			
			
			
			
			else  if($row['description']==257) {echo"Fan is not working. ".$row['descText'];}
			else if($row['description']==258) {echo"TubeLight is not working. ".$row['descText'];}
			else if($row['description']==260) {echo"Switch is not working. ".$row['descText'];}
			else if($row['description']==264) {echo"PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==272) {echo"StreetLight is not working. ".$row['descText'];}
			else if($row['description']==288) {echo"Power Failure. ".$row['descText'];}
			else if($row['description']==259) {echo"Fan, TubeLight is not working. ".$row['descText'];}
			else if($row['description']==261) {echo"Fan, Switch is not working. ".$row['descText'];}
			else if($row['description']==265) {echo"Fan, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==273) {echo"Fan, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==289) {echo"Fan is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==262) {echo"TubeLight, Switch is not working. ".$row['descText'];}
			else if($row['description']==266) {echo"TubeLight, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==274) {echo"TubeLight, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==290) {echo"TubeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==268) {echo"Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==276) {echo"Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==292) {echo"Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==280) {echo"PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==296) {echo"PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==304) {echo"StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==263) {echo"Fan, TubeLight, Switch is not working. ".$row['descText'];}
			else if($row['description']==267) {echo"Fan, TubeLight, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==275) {echo"Fan, TubeLight, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==291) {echo"Fan, TubeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==270) {echo"TubeLight, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==278) {echo"TubeLight, Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==294) {echo"TubeLight, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==284) {echo"Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==300) {echo"Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==312) {echo"PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==369) {echo"Fan, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==277) {echo"Fan, Switch, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==293) {echo"Fan, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==281) {echo"Fan, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==297) {echo"Fan, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==305) {echo"Fan, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==282) {echo"TubeLight, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==298) {echo"TubeLight, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==306) {echo"TubeLight, StreetLight is not working. Power Failure".$row['descText'];}
			else if($row['description']==308) {echo"Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==271) {echo"Fan, TubeLight, Switch, PlugPoint is not working. ".$row['descText'];}
			else if($row['description']==279) {echo"Fan, TubeLight, Switch, Street Light is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==295) {echo"Fan, TubeLight, Switch is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==285) {echo"Fan, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==301) {echo"Fan, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==313) {echo"Fan, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==286) {echo"TubeLight, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==302) {echo"TubeLight, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==314) {echo"TubeLight, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==316) {echo"Switch, PlugPoint, StreeLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==287) {echo"Fan, TubeLight, Switch, PlugPoint, StreetLight is not working. ".$row['descText'];}
			else if($row['description']==303) {echo"Fan, TubeLight, Switch, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==318) {echo"TubeLight, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==319) {echo"Fan, TubeLight, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==283) {echo"Fan, TubeLight, PlugPoint is not working".$row['descText'];}			
			else if($row['description']==299) {echo"Fan, TubeLight, PlugPoint is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==307) {echo"Fan, TubeLight, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==309) {echo"Fan, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==310) {echo"TubeLight, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==311) {echo"Fan, TubeLight, Switch, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==315) {echo"Fan, TubeLight, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			else if($row['description']==317) {echo"Fan, Switch, PlugPoint, StreetLight is not working. Power Failure. ".$row['descText'];}
			
			
			
			
			
			
			else if($row['description']==320) {echo "AC is not working ".$row['descText'];}
			else if($row['description']==384) {echo "Lift is not working ".$row['descText'];}			
			else if($row['description']==512) {echo $row['descText'];}			
else if($row['description']==321) {echo"Fan & AC are not working.".$row['descText'];}
else if($row['description']==385) {echo"Fan & Lift are not working.".$row['descText'];}
else if($row['description']==322) {echo"TubeLight & AC are not working.".$row['descText'];}
else if($row['description']==386) {echo"TubeLight & Lift are not working.".$row['descText'];}
else if($row['description']==324) {echo"Switch & AC are not working.".$row['descText'];}
else if($row['description']==388) {echo"Switch & Lift are not working.".$row['descText'];}
else if($row['description']==328) {echo"PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==392) {echo"PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==336) {echo"Street Light & AC are not working.".$row['descText'];}
else if($row['description']==400) {echo"Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==352) {echo"Power failure(fuse) problem & AC is not working.".$row['descText'];}
else if($row['description']=416) {echo"Power failure(fuse) problem & Lift is not working.".$row['descText'];}
else if($row['description']==448) {echo"AC & Lift are not working.".$row['descText'];}
else if($row['description']==323) {echo"Fan, TubeLight & AC are not working.".$row['descText'];}
else if($row['description']==387) {echo"Fan, TubeLight & Lift are not working.".$row['descText'];}
else if($row['description']==325) {echo"Fan, Switch & AC are not working.".$row['descText'];}
else if($row['description']==389) {echo"Fan, Switch & Lift are not working.".$row['descText'];}
else if($row['description']==329) {echo"Fan, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==393) {echo"Fan, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==337) {echo"Fan, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==401) {echo"Fan, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==353) {echo"Fan, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==417) {echo"Fan, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==326) {echo"TubeLight, Switch & AC are not working.".$row['descText'];}
else if($row['description']==390) {echo"TubeLight, Switch & Lift are not working.".$row['descText'];}
else if($row['description']==330) {echo"TubeLight, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==394) {echo"TubeLight, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==338) {echo"TubeLight, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==402) {echo"TubeLight, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==354) {echo"TubeLight, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==418) {echo"TubeLight, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==332) {echo"Switch, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==396) {echo"Switch, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==340) {echo"Switch, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==404) {echo"Switch, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==358) {echo"Switch, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==420) {echo"Switch, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==344) {echo"PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==408) {echo"PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==360) {echo"PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==424) {echo"PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==368) {echo"Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==432) {echo"Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==449) {echo"Fan, AC & Lift are not working.".$row['descText'];}
else if($row['description']==450) {echo"TubeLight, AC & Lift are not working.".$row['descText'];}
else if($row['description']==452) {echo"Switch, AC & Lift are not working.".$row['descText'];}
else if($row['description']==456) {echo"PlugPoint, AC & Lift are not working.".$row['descText'];}

else if($row['description']==464) {echo"Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==480) {echo"Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==327) {echo"Fan, TubeLight, Switch & AC are not working.".$row['descText'];}
else if($row['description']==391) {echo"Fan, TubeLight, Switch & Lift are not working.".$row['descText'];}
else if($row['description']==331) {echo"Fan, TubeLight, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==395) {echo"Fan, TubeLight, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==340) {echo"Fan, TubeLight, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==403) {echo"Fan, TubeLight, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==355) {echo"Fan, TubeLight, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==419) {echo"Fan, TubeLight, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==333) {echo"Fan, Switch, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==397) {echo"Fan, Switch, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==341) {echo"Fan, Switch, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==405) {echo"Fan, Switch, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==357) {echo"Fan, Switch, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==421) {echo"Fan, Switch, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==345) {echo"Fan, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==409) {echo"Fan, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==361) {echo"Fan, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==425) {echo"Fan, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==369) {echo"Fan, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==433) {echo"Fan, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==334) {echo"TubeLight, Switch, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==398) {echo"TubeLight, Switch, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==342) {echo"TubeLight, Switch, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==406) {echo"TubeLight, Switch, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==358) {echo"TubeLight, Switch, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==422) {echo"TubeLight, Switch, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==348) {echo"Switch, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==412) {echo"Switch, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==364) {echo"Switch, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==428) {echo"Switch, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==376) {echo"PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==440) {echo"PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==370) {echo"TubeLight, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==434) {echo"TubeLight, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==346) {echo"TubeLight, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==410) {echo"TubeLight, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==362) {echo"TubeLight, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==426) {echo"TubeLight, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==372) {echo"Switch, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==436) {echo"Switch, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==451) {echo"Fan, TubeLight, AC & Lift are not working.".$row['descText'];}
else if($row['description']==453) {echo"Fan, Switch, AC & Lift are not working.".$row['descText'];}
else if($row['description']==457) {echo"Fan, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==465) {echo"Fan, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==481) {echo"Fan, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==454) {echo"TubeLight, Switch, AC & Lift are not working.".$row['descText'];}
else if($row['description']==458) {echo"TubeLight, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==466) {echo"TubeLight, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==482) {echo"TubeLight, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==460) {echo"Switch, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==468) {echo"Switch, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==484) {echo"Switch, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==472) {echo"PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==488) {echo"PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==496) {echo"Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==335) {echo"Fan, TubeLight, Switch, PlugPoint & AC are not working.".$row['descText'];}
else if($row['description']==399) {echo"Fan, TubeLight, Switch, PlugPoint & Lift are not working.".$row['descText'];}
else if($row['description']==343) {echo"Fan, TubeLight, Switch, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==407) {echo"Fan, TubeLight, Switch, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==359) {echo"Fan, TubeLight, Switch, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==423) {echo"Fan, TubeLight, Switch, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==347) {echo"Fan, TubeLight, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==411) {echo"Fan, TubeLight, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==363) {echo"Fan, TubeLight, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==353) {echo"Fan, TubeLight, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==349) {echo"Fan, Switch, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==413) {echo"Fan, Switch, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==365) {echo"Fan, Switch, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==429) {echo"Fan, Switch, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==377) {echo"Fan, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==441) {echo"Fan, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==350) {echo"TubeLight, Switch, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==414) {echo"TubeLight, Switch, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==366) {echo"TubeLight, Switch, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==430) {echo"TubeLight, Switch, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==378) {echo"TubeLight, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==442) {echo"TubeLight, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==380) {echo"Switch, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==444) {echo"Switch, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}

else if($row['description']==371) {echo"Fan, TubeLight, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==435) {echo"Fan, TubeLight, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==374) {echo"TubeLight, Switch, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==438) {echo"TubeLight, Switch, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==373) {echo"Fan, Switch, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==437) {echo"Fan, Switch, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==486) {echo"TubeLight, Switch, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==476) {echo"Switch, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==492) {echo"Switch, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==504) {echo"PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==498) {echo"TubeLight, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==474) {echo"TubeLight, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==490) {echo"TubeLight, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==500) {echo"Switch, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==455) {echo"Fan, TubeLight, Switch, AC & Lift are not working.".$row['descText'];}
else if($row['description']==459) {echo"Fan, TubeLight, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==467) {echo"Fan, TubeLight, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==483) {echo"Fan, TubeLight, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==461) {echo"Fan, Switch, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==469) {echo"Fan, Switch, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==485) {echo"Fan, Switch, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==473) {echo"Fan, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==489) {echo"Fan, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==497) {echo"Fan, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==462) {echo"TubeLight, Switch, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==470) {echo"TubeLight, Switch, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==463) {echo"Fan, TubeLight, Switch, PlugPoint, AC & Lift are not working.".$row['descText'];}
else if($row['description']==494) {echo"TubeLight, Switch, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==506) {echo"TubeLight, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==508) {echo"Switch, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==499) {echo"Fan, TubeLight, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==402) {echo"TubeLight, Switch, Street Light, Power failure(fuse) problem, AC & Lift are not working".$row['descText'];}
else if($row['description']==501) {echo"Fan, Switch, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']=351) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light & AC are not working.".$row['descText'];}
else if($row['description']==415) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light & Lift are not working.".$row['descText'];}
else if($row['description']==367) {echo"Fan, TubeLight, Switch, PlugPoint, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==431) {echo"Fan, TubeLight, Switch, PlugPoint, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==375) {echo"Fan, TubeLight, Switch, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==439) {echo"Fan, TubeLight, Switch, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==379) {echo"Fan, TubeLight, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==443) {echo"Fan, TubeLight, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==381) {echo"Fan, Switch, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==445) {echo"Fan, Switch, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==382) {echo"TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==446) {echo"TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==471) {echo"Fan, TubeLight, Switch, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==487) {echo"Fan, TubeLight, Switch, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==475) {echo"Fan, TubeLight, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==461) {echo"Fan, TubeLight, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==477) {echo"Fan, Switch, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==493) {echo"Fan, Switch, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==505) {echo"Fan, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==478) {echo"TubeLight, Switch, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==383) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem & AC are not working.".$row['descText'];}
else if($row['description']==447) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem & Lift are not working.".$row['descText'];}
else if($row['description']==479) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light, AC & Lift are not working.".$row['descText'];}
else if($row['description']==495) {echo"Fan, TubeLight, Switch, PlugPoint, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==503) {echo"Fan, TubeLight, Switch, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==507) {echo"Fan, TubeLight, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==509) {echo"Fan, Switch, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==510) {echo"TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
else if($row['description']==511) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light, Power failure(fuse) problem, AC & Lift are not working.".$row['descText'];}
	
			
			
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

		if(1)
		{//changes here	
			$sql="Select id,name,designation,location,description,processed,area,time,dispatchedTime,contactPerson, contactNumber, room,timing,descText,availablefrom,availableto,contact from complaints ";
			$status="and";
			$sql.="where ( 1=1 ";
			$status.=" processed=1";
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
		else//changes here	
		$sql="Select id,name,designation,location,description,processed,area,time,dispatchedTime, contactPerson, contactNumber, room,timing,descText,availablefrom,availableto,contact from complaints where processed=0";
//limit ".($page*$itemsperpage).",$itemsperpage
		$result=mysql_query($sql,$conn);

?>

<script>

function calct()
{
	var f=document.form1
	var tr1=0,tr2=0,tr3=0
	if(f.t1.checked)tr1=1
	if(f.t2.checked)tr2=2
	if(f.t3.checked)tr3=4
	return tr1+tr2+tr3
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



function myDesc(dVal,descText)
{
	var k=0,j=0,j1=0
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
			case 32:str+="Power Failure(fuse) problem<br/>";break;
			case 64:str+="AC is not working <br/>";break;
			case 128:str+="Lift is  not working <br/>";break;
			case 256:str+="Others : "+descText+"<br/>";j1=1;break;
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
			case 1:str+="Weekday 12noon to 1 pm.<br/>"; break;
			case 2:str+="Weekday 4pm to 6 pm.<br/>"; break;
			case 4:str+="Weekend 9am to 5pm.<br/>"; break;
			case 8:str+="Anytime. <br/>";break;

		}
		dVal-=j;
		k=0;
	}
	return document.getElementById("descdiv").innerHTML=str;

}


function rowover(id,str,timing,contact, descText)
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
</script>

<?php require_once('header.php') ?>

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
echo'<a href="dispatched.php"><center><font color=orange>Dispatched</font></center></a><a href="unprocessed.php"><center>Unprocessed</center></a>';  
    echo '';
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
	var pr1=0,pr2=0,pr3=0,pr4=0,pr5=0,pr6=0,pr7=0,pr8=0,pr9=0
	if(f.p1.checked)pr1=1
	if(f.p2.checked)pr2=2
	if(f.p3.checked)pr3=4
	if(f.p4.checked)pr4=8
	if(f.p5.checked)pr5=16
	if(f.p6.checked)pr6=32
	if(f.p7.checked)pr7=64
	if(f.p8.checked)pr8=128
		if(f.p9.checked)pr9=256
		return pr1+pr2+pr3+pr4+pr5+pr6+pr7+pr8+pr9
	
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
 <input type="checkbox" name="p7" value "64"/>Air Comnditioner<br/>
 <input type="checkbox" name="p8" value "128"/>Lift
 <input type="checkbox" name="p9" value "256"/>Others
<input type="hidden" name="problem" value="" onsubmit="form2validate()" />


</td>
</tr>
<tr><td colspan="4" align="center"><input type="submit" name="datesubmit" value="SHOW"/></td>
</tr>
             </table>

         </form>
     </div>
<!--  Date wise search form ends   -->

            <form name="form1" method="post">

			<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; ?>
            <input type="checkbox" onclick="this.form.submit()" name="loc1" id="loc1"  <?php if (isset($_POST['loc1'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc1">Hostel</label>
            <input type="checkbox" onclick="this.form.submit()" name="loc2" id="loc2" <?php if (isset($_POST['loc2'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc2">Street</label>
            <input type="checkbox" onclick="this.form.submit()" name="loc3" id="loc3" <?php if (isset($_POST['loc3'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc3">Departments</label>
            <input type="checkbox" onclick="this.form.submit()" name="loc4" id="loc4" <?php if (isset($_POST['loc4'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc4">Mess</label>
            <input type="checkbox" onclick="this.form.submit()" name="loc5" id="loc5" <?php if (isset($_POST['loc5'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc5">Others</label>
            <input type="checkbox" onclick="this.form.submit()" name="allloc" id="allloc" <?php if (isset($_POST['allloc'])) echo "checked" ?> onclick="chkclick(this,'loc'); this.form.submit();"/>
            <label for="allloc">All</label>
            <?php //<input type="submit" name="Submit" value="Show" align="Right"/>?>
			<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; ?>
			<div id="n1right">
<table align="center" width="80%" id="table1">
<tr>
<th>Compl.No</th>
<th>Name</th>
<th>Designation</th>
<th>Location</th>
<th>Room/Quarter No</th>
<th>Status</th>
<th>Time</th>
<?php //changes here ?><th>Dispatched Time</th>
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
<td align="center"><?php echo $row['name'] ?></td>
<td align="center"><?php echo $row['designation'] ?></td>
<td align="center"><?php echo $row['location'] ?></td>
<td align="center"><?php echo $row['room'] ?></td>
<input type = "hidden" id = "toPrint<?php echo $row['id'];?>" value="<?php echo $row['processed']; ?>">
<td align="center"><?php
$src2="images/dispatched.png";
		if ($row['processed']=='1')
		echo "<img src='$src2'height='20' width='20' border='0'alt='' alt='' />";
		else if($row['processed']=='2')
		echo "<image src='finished.jpeg'></img> ";
		else
		echo "<image src='unprocessed.jpeg'></img>";
 ?></td>
<td align="center"><?php echo $row['time'] ?></td>
<td align="center"><?php //changes here ?><?php if(strlen($row['dispatchedTime']) != 0) echo $row['dispatchedTime']; ?></td>
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
<input type="hidden" name="ids" value="<?php echo $ids  ?>" />
</div>




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
<?php 
echo "Total numbers of Complaints ";
if($a==0)
	echo $count2;
else
	echo $count1;
 ?>

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
	
<div class="box" id="descdiv" style="display:none; right:20px;min-width:180px;"></div>

</div>
<?php //require_once('footer.php') ?>

</form>
</div>


<form name="formSearch" method="post">
<input style="position:absolute;top:150px;right:105px;" type="input" id = "searchText" name="process3" />
<input style="position:absolute;top:150px;right:20px;" type="submit" id = "searchBtn" name="nm" value="search" />
</form>
</body>
</html>