<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	$file_name=images_name($_FILES['watermark']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		
	$data['ten_vi'] = $_POST['ten_vi'];
	$data['ten_en'] = $_POST['ten_en'];
	$data['slogan_vi'] = $_POST['slogan_vi'];
	$data['slogan_en'] = $_POST['slogan_en'];
	$data['diachi_vi'] = $_POST['diachi_vi'];	
	$data['diachi_en'] = $_POST['diachi_en'];

	if($_FILES['watermark']['name']!=''){
		delete_file(_upload_hinhanh.'watermark.png');		
		$photo = upload_image("watermark", 'png|PNG', _upload_hinhanh,'watermark');
		remove_dir("../$#cache");
	}
	
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['email'] = $_POST['email'];
	$data['website'] = $_POST['website'];
	$data['bgweb'] = $_POST['bgweb'];

	$data['facebook'] = $_POST['facebook'];
	$data['chiduong'] = $_POST['chiduong'];
	$data['hotline'] = $_POST['hotline'];
	$data['hotline2'] = $_POST['hotline2'];
	$data['hotline3'] = $_POST['hotline3'];
	$data['zalo'] = $_POST['zalo'];

	$data['codehead'] = magic_quote($_POST['codehead']);
	$data['codebody'] = magic_quote($_POST['codebody']);

	$data['version_face'] = magic_quote($_POST['version_face']);
	$data['appid_face'] = magic_quote($_POST['appid_face']);
	$data['iframe'] = magic_quote($_POST['iframe']);

	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];
	
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>