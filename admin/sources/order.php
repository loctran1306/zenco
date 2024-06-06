<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

$urldanhmuc ="";
$urldanhmuc.= (isset($_REQUEST['id_user'])) ? "&id_user=".addslashes($_REQUEST['id_user']) : "";
$urldanhmuc.= (isset($_REQUEST['datefm'])) ? "&id_user=".addslashes($_REQUEST['datefm']) : "";
$urldanhmuc.= (isset($_REQUEST['dateto'])) ? "&id_user=".addslashes($_REQUEST['dateto']) : "";
$urldanhmuc.= (isset($_REQUEST['status'])) ? "&status=".addslashes($_REQUEST['status']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "order/items";
		break;
	case "add":		
		$template = "order/item_add";
		break;
	case "edit":		
		get_item();
		$template = "order/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;	
	default:
		$template = "index";
}

#====================================

function get_items(){		
	global $d, $items, $url_link,$totalRows , $pageSize, $offset;
	
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);				
		if($multi=='del'){
			for($i=0;$i<$count;$i++){

				$sql = "select madonhang from #_donhang where id='".$id_array[$i]."'";
				$d->query($sql);
				$code_donhang = $d->fetch_array();	
				
				$sql = "delete from #_chitietdonhang where madonhang ='".$code_donhang."'";
				$d->query($sql);
		
				$sql = "delete from table_donhang where id = '".$id_array[$i]."'";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
							
			}
			redirect("index.php?com=order&act=man&type=".$_REQUEST['type']);			
		}
		
		
	}
	

	/*
	if($_REQUEST['status']!=''){
		$trangthai = $_REQUEST['status'];	
		$where.=	" where trangthai='$trangthai'";
		
	}*/
	$where=" where id<> 0 "; 
	if($_GET["ngaybd"]!=''){
	 $ngaybatdau = $_GET["ngaybd"];		
	$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày <br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao>=".strtotime($ngaybatdau)." ";
	}

	if($_GET["ngaykt"]!=''){
	 $ngayketthuc = $_GET["ngaykt"];		
	$Ngay_arr = explode("/",$ngayketthuc); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày <br>";} else  $ngayketthuc=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao<=".strtotime($ngayketthuc)." ";
		
	}

	
	if($_GET["keyword"]!=''){
		$where.=" and (madonhang like '%".$_GET["keyword"]."%' or hoten like '%".$_GET["keyword"]."%' )  ";
	}
	//sotien
	if($_GET["sotien"]!='' && $_GET["sotien"]>0){
		$sql="select giatu,giaden from #_giasearch where id='".$_GET["sotien"]."'";
		$d->query($sql);
		$giatim=$d->fetch_array();
		if($giatim!=null){
			$where.=" and tonggia>=".$giatim['giatu']." and tonggia<=".$giatim['giaden']." ";			
		}
	}
	//httt
	if($_GET["httt"]!='' && $_GET["httt"] > 0){
		$where.=" and httt=".$_GET["httt"]." ";
	}
	//tinhtrang
	if($_GET["tinhtrang"]!='' && $_GET["tinhtrang"]>0){
		$where.=" and tinhtrang=".$_GET["tinhtrang"]." ";
	}

								
	$sql="SELECT count(id) AS numrows FROM #_donhang $where";
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
	
	$sql = "select * from #_donhang $where order by id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link='index.php?com=order&act=man&keyword='.$_GET['keyword'].'&ngaybd='.$_GET['ngaybd'].'&ngaykt='.$_GET['ngaykt'].'&sotien='.$_GET['sotien'].'&httt='.$_GET['httt'].'&tinhtrang='.$_GET['trangthai'];		
}

function get_item(){
	global $d, $item,$result_ctdonhang;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
	
	$sql = "select * from #_donhang where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=order&act=man");
	$item = $d->fetch_array();

	$sqlUPDATE_ORDER = "UPDATE table_donhang SET view =1 WHERE  id = ".$id."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	

	$d->reset();
	$sql="select * from #_chitietdonhang where madonhang = '".$item['madonhang']."'";
	$d->query($sql);
	$result_ctdonhang=$d->result_array();


}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);			
		
		$data['ghichu'] = $_POST['ghichu'];
		$data['tinhtrang'] = $_POST['id_tinhtrang'];				
		$d->setTable('donhang');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=order&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=order&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);

		$sql = "select madonhang from #_donhang where id='".$id."'";
		$d->query($sql);
		$code_donhang = $d->fetch_array();


		$d->reset();
		$sql = "delete from #_donhang where id='".$id."'";
		$d->query($sql);
		
		$d->reset();
		$sql = "delete from #_chitietdonhang where madonhang ='".$code_donhang['madonhang']."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=order&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=order&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
}
?>