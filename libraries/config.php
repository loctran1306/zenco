<?php 
	if(!defined('_lib')) die("Error");
	function nettuts_error_handler($number, $message, $file, $line, $vars)
	{
		if ( ($number !== E_NOTICE) && ($number < 2048) ) {
			include 'templates/error_tpl.php';
			die();
		}
	}	
	error_reporting(0);
 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	
	$config['salt']='u#9t1cln'; 

	$meta_robots = 'NOODP, INDEX, FOLLOW';  #seo
	$config_url=$_SERVER["SERVER_NAME"].'';
	$config['debug']=1;#Bật chế độ debug dành cho developer
	$config['lang']="vi|en";
	
	$config_email="";
	$config_pass="";
	$config_ip="210.211.111.88";
	$config_port="587";#ssl 465
	$config_smtp ="tsl";#ssl
	$config_gmail=false;#send gmail

	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'apxbqonbhosting_dbs';
	$config['database']['password'] = 'g.rd[f5ag;C5';
	$config['database']['database'] = 'apxbqonbhosting_dbs';
	$config['database']['refix'] = 'table_';

	$config_recaptcha="6LcywtwZAAAAAP0MhQYYh33QhT9FMYRyR4ihTkRN";
	$config_secretkey="6LcywtwZAAAAAJqkdMzS6N-2cpyTbDLglitxna0y";
	
	$config['index']=0;
	$config['strucdata']=array(
		'addressRegion'=>'Ho Chi Minh',
		'postalCode'=>'70000',
		'mxh-head'=>'false',
		'mxh-footer'=>'true',
	);

	$config['phi']=2;
	$config['watermark']=array(
		'status'=>true,
		'width'=>'270',
		'height'=>'270',
	);
	$config['cart']="false";
	$config['banner'] ="true";
	$config['mobile'] ="false";
	$config['mobile_admin'] ="false";
	$config['minify'] ="true";
	

	if (version_compare(phpversion(), '7.0.0', '<')) {
	   $config['database']['dbtype'] = 'mysql';
	}else{
		$config['database']['dbtype'] = 'mysqli';
	}
	
	$config['login']['delay'] =1;
	$config['login']['attempt']=5;

	$config['arrayDomainSSL']=array("zencomex.com");
	include_once _lib."checkSSL.php";
	$http = getProtocol();
?>