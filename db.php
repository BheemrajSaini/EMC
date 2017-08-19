<?php	
	require_once('conn.php');
	$tableName = "report";
	$datefrom=$_GET['datefrom']." 00:00:00";
	$dateto=$_GET['dateto']." 00:00:00";
	$datefrom = substr(str_replace("-", "/", $datefrom), 0, 10);
	$dateto = substr(str_replace("-", "/", $dateto), 0, 10);
	$table = "SELECT * from " . $tableName . " where time >= '" . $datefrom . "' AND time <='" . $dateto . "'";
	$result = mysql_query($table) or die("Error...!!!");
	$count = mysql_num_fields($result);
       $head = '';
	for($i = 0; $i < $count; $i++)
	{
		$head .= mysql_field_name($result, $i) . "\t";
	}
	$row = '';
	$data = '';
	while($row = mysql_fetch_row($result))
	{
		$temp = '';
		foreach($row as $record)
		{
			if(!isset($record) || $record == "")
			{
				$record = " ";
			}
			else
			{
				$record = str_replace('"', '', $record);
				$record = str_replace('\'', '', $record);
				$record = "\t" . $record;
			}
			$temp .= $record;
		}
		$data .= trim($temp). "\n";
		$data = str_replace("\r", "", $data);
	}
	$file = $tableName . "_export_" . date('d-m-y') . ".xls";
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=$file");
	echo "REPORT AS ON - " . date('d-m-y'). "\n\n" . $head . "\n\n" . $data;		

 ?>