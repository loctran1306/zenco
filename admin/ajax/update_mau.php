<?php
	include_once "ajax_lib.php";

	$table = (string)$_POST['table'];
	$id = (int)$_POST['id'];
	$value = (string)$_POST['value'];
	if((isset($_SESSION[$login_name]) && $_SESSION[$login_name]==true)){
		$data['ten'] = $value;
		$d->setTable($table);
		$d->setWhere('id', $id);
		$d->update($data);
	}

?>
	
	