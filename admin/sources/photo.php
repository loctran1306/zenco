<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "photo/photos";
		break;
	case "add_photo":		
		$template = "photo/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "photo/photo_add";
		break;
	case "save_photo": 
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
		break;			
	default:
		$template = "index";
}

function get_photos(){
	global $d, $items, $url_link,$totalRows , $pageSize, $offset;
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);
		if($multi=='show'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_photo SET hienthi =1 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);			
		}
		
		if($multi=='hide'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_photo SET hienthi =0 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);			
		}
		
		if($multi=='del'){
			for($i=0;$i<$count;$i++){
				
				$sql = "select id from #_photo where id= ".$id_array[$i]."";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_hinhanh.$row['photo']);
					}
				}
				$sql = "delete from table_photo where id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
							
			}
			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);			
		}				
	}
		
	#----------------------------------------------------------------------------------------
	
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_photo where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_photo SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_photo SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------			
	
	if($_REQUEST['type']!='')
	{
		$where.=" where type='".$_REQUEST['type']."'";
	}
	
	$sql="SELECT count(id) AS numrows FROM #_photo $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=10;
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_photo $where order by stt,id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link="index.php?com=photo&act=man_photo&type=".$_REQUEST['type'];	

}

function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
	$d->setTable('photo');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
	$item = $d->fetch_array();	
}

function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,15);
	$file_name1=fns_Rand_digit(0,9,15);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file_vi", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
				$data['photo_vi'] = $photo;
				$data['thumb_vi'] = create_thumb($data['photo_vi'], _width_thumb, _height_thumb , _upload_hinhanh,$file_name,_style_thumb);	
				$d->setTable('photo');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_hinhanh.$row['photo_vi']);
					delete_file(_upload_hinhanh.$row['thumb_vi']);
				}
			}
			if($photo = upload_image("file_en", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name1)){
				$data['photo_en'] = $photo;
				$data['thumb_en'] = create_thumb($data['photo_en'], _width_thumb, _height_thumb , _upload_hinhanh,$file_name1,_style_thumb);	
				$d->setTable('photo');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_hinhanh.$row['photo_en']);
					delete_file(_upload_hinhanh.$row['thumb_en']);
				}
			}
						
			$data['stt'] = $_POST['stt'];
			$data['link'] = $_POST['link'];	
			$data['ten_vi'] = $_POST['ten_vi'];	
			$data['ten_en'] = $_POST['ten_en'];	
			$data['mota_vi'] = $_POST['mota_vi'];	
			$data['mota_en'] = $_POST['mota_en'];
			$data['type'] = $_POST['type'];	
			$data['hienthi'] = isset($_POST['active']) ? 1 : 0;
			$d->reset();
			$d->setTable('photo');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
			
	}else{ 		
			if($photo = upload_image("file_vi", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
				$data['photo_vi'] = $photo;
				$data['thumb_vi'] = create_thumb($data['photo_vi'], _width_thumb, _height_thumb , _upload_hinhanh,$file_name,_style_thumb);	
			}

			if($photo = upload_image("file_en", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name1)){
				$data['photo_en'] = $photo;
				$data['thumb_en'] = create_thumb($data['photo_en'], _width_thumb, _height_thumb , _upload_hinhanh,$file_name1,_style_thumb);	
			}
						
			$data['stt'] = $_POST['stt'];
			$data['link'] = $_POST['link'];	
			$data['ten_vi'] = $_POST['ten_vi'];	
			$data['ten_en'] = $_POST['ten_en'];	
			$data['mota_vi'] = $_POST['mota_vi'];	
			$data['mota_en'] = $_POST['mota_en'];
			$data['type'] = $_POST['type'];	
			$data['hienthi'] = isset($_POST['active']) ? 1 : 0;
			$d->reset();
			$d->setTable('photo');
			$d->setWhere('id', $id);
			if(!$d->insert($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
	}
}

function delete_photo(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo_vi']);
		delete_file(_upload_hinhanh.$row['thumb_vi']);
		delete_file(_upload_hinhanh.$row['photo_en']);
		delete_file(_upload_hinhanh.$row['thumb_en']);
		if($d->delete())
			redirect("index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_photo&type=".$_REQUEST['type']);
}
?>	