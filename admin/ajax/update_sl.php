<?php
	include_once "ajax_lib.php";

	$table = (string)$_POST['table'];
	$id = (int)$_POST['id'];
	$value = (int)$_POST['value'];
	if((isset($_SESSION[$login_name]) && $_SESSION[$login_name]==true)){
		$data['soluong'] = $value;
		$d->setTable($table);
		$d->setWhere('id', $id);
		$d->update($data);
	}

?>
	
	