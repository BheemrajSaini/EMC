<?php
require_once('functions.php');
secure(4);
require_once('conn.php');
?>
<?php
require_once('header.php');
if($_SESSION['type']==1)
header("Location: index.php");
if($_SESSION['type']==2)
header("Location: reports.php");
if($_SESSION['type']==3)
header("Location: reports_final.php");

?>
<div id="content">

<div id="right">


<table align="center" width="100%" id="table1" cellpadding="5" cellspacing="5" border="1">
<tr>
<th>S.No.</th>
<th>User</th>
<th>Feedback</th>
<th>Time</th>
</tr>
<?php
	$result=mysql_query("Select user,feed,time from feedback order by time",$conn);
	$i=1;
	while($row=mysql_fetch_array($result))
	{
?>
	<tr align="center"<?php if($i%2) { ?> style="background:#CCCCCC" <?php } ?>>
    <td align="center"><?php echo $i++; ?></td>
    <td align="center"><?php echo $row['user'] ?></td>
    <td align="center"><?php echo $row['feed'] ?></td>
    <td align="center"><?php echo $row['time'] ?></td>
    </tr>

<?php } ?>
<td></td>
<td></td>
<td></td>
<td></td>
</table>
<br>
<br>
</div>
</div>

<?php require_once('footer.php')?>
</body>

</html>
