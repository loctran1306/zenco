<?php 
	include_once "ajax_lib.php";
	$table = htmlspecialchars($_POST["bang"]);
	$type = htmlspecialchars($_POST["type"]);
	$value = htmlspecialchars($_POST["value"]);
	$id = (int)$_POST["id"];
	if((isset($_SESSION[$login_name]) && $_SESSION[$login_name]==true)){
		if(isset($_POST["id"])){
			echo $sql = "update ".$table." SET ".$type."=".$value." WHERE  id = ".$id."";
			$d->query($sql);
		}
	}
?>