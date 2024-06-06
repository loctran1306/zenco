<?php
	include_once "ajax_lib.php";
	
	$id=(int)$_POST['id'];
	$table=(string)$_POST['table'];
	$links=(string)$_POST['links'];

	$d->reset();
	$sql = "select id,photo,thumb from #_$table where id='".$id."'";
	$d->query($sql);
	$row = $d->result_array();
	if(count($row)>0){
		for($i=0;$i<count($row);$i++){
			delete_file('../'.$links.$row[$i]['photo']);
			delete_file('../'.$links.$row[$i]['thumb']);
		}
		$sql = "delete from #_$table where id='".$id."'";
		$d->query($sql);
	}
?>
