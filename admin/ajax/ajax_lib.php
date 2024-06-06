<?php
	session_start();
	@define ( '_lib' , '../../libraries/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	include_once _lib."pclzip.php";
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";	
	$d = new database($config['database']);
	$login_name = 'LOGINCODER';	

	if(!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false){
		header('Content-Type: text/html; charset=utf-8');
		die("Bạn Không có quyền vào đây !");
	}
 ?>