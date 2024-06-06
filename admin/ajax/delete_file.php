<?php
	include_once "ajax_lib.php";
	
	$id=(int)$_POST['id'];
	$table=(string)$_POST['table'];
	$links=(string)$_POST['links'];

	$d->reset();
	$sql = "select id from #_$table where id='".$id."'";
	$d->query($sql);
	$row = $d->result_array();
	if(count($row)>0){
		for($i=0;$i<count($row);$i++){
			delete_file('../'.$links.$row[$i]['file_download']);
		}
		$sql = "update #_$table set file_download='' where id='".$id."'";
		$d->query($sql);
	}
?>
