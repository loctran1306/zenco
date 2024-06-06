<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0) $page = 1;
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();

	$d->reset();
    $sql = "select thumb_$lang from #_photo where type='favicon'";
    $d->query($sql);
    $favicon = $d->fetch_array();

	$ngaytao_seo='1503023927﻿';
	
	if (class_exists('breadcrumb')) {
		$bread = new breadcrumb();
		$bread->add(_trangchu,"");		
	}

	$datacom = array(
		array("tbl"=>"product_list","field"=>"idl","source"=>"product","com"=>"san-pham","type"=>"san-pham","pagemain"=>"true"),
		array("tbl"=>"product_cat","field"=>"idc","source"=>"product","com"=>"san-pham","type"=>"san-pham","pagemain"=>"true"),
		array("tbl"=>"product","field"=>"id","source"=>"product","com"=>"san-pham","type"=>"san-pham","pagemain"=>"true"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"tin-tuc","type"=>"tin-tuc","pagemain"=>"true"),



		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"gioi-thieu","type"=>"gioi-thieu","pagemain"=>"true"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"tuyen-dung","type"=>"tuyen-dung","pagemain"=>"true"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"chinh-sach","type"=>"chinh-sach","pagemain"=>"true"),


		array("tbl"=>"baiviet_list","field"=>"idl","source"=>"news","com"=>"du-an","type"=>"du-an","pagemain"=>"true"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"du-an","type"=>"du-an","pagemain"=>"false"),


		array("tbl"=>"baiviet_list","field"=>"idl","source"=>"news","com"=>"xuat-nhap-khau","type"=>"xuat-nhap-khau","pagemain"=>"true"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"xuat-nhap-khau","type"=>"xuat-nhap-khau","pagemain"=>"false"),

		array("tbl"=>"baiviet_list","field"=>"idl","source"=>"news","com"=>"giai-phap","type"=>"giai-phap","pagemain"=>"true"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"giai-phap","type"=>"giai-phap","pagemain"=>"false"),



		// array("tbl"=>"info","field"=>"id","source"=>"about","com"=>"gioi-thieu","type"=>"gioi-thieu","pagemain"=>"true")
	);
    if($com){
		foreach($datacom as $k=>$v){
			if(isset($com) && $v['tbl']!='info'){
				$d->query("select tenkhongdau,id from #_".$v['tbl']." where tenkhongdau='".$com."' and type='".$v['type']."' and hienthi=1");
				if($d->num_rows()>=1){
					$row = $d->fetch_array();
					$_GET[$v['field']] = $row['tenkhongdau'];
					$com = $v['com'];	
					break;
				}
			}
		}
    }

	switch($com){

		case 'ajax':
			$source = "ajax";
			break;	
		case 'gio-hang':
			$source = "giohang";
			$template = "giohang";
			$title_detail = _giohang;
			$bread->add($title_detail,"gio-hang");
			break;
		case 'thanh-toan':
			$source = "giohang";
			$template = _thanhtoan;
			$title_detail = _thanhtoan;
			$bread->add($title_detail,"thanh-toan");
			break;
			
		case 'album':
			$source = "album";
			$template = isset($_GET['id']) ? "album_detail" : "album";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'album';
			$title_bar = _thuvienanh;
			$title_detail = _thuvienanh;
			$bread->add($title_detail,"album");
			break;

		case 'video':
			$source = "video";
			$template =isset($_GET['id']) ? "video_detail" : "video";
			$type_bar = 'video';	
			$title_bar="Video";
			$title_detail = "Video";
			$bread->add($title_detail,"video");
			break;

		

		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "tins";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'tin-tuc';
			$title_bar=_tintuc;
			$title_detail = _tintuc;
			$bread->add($title_detail,"tin-tuc");
			break;
		case 'gioi-thieu':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'gioi-thieu';
			$title_bar=_gioithieu;
			$title_detail = _gioithieu;
			$bread->add($title_detail,"gioi-thieu");
			break;
		case 'tuyen-dung':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "tins";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'tuyen-dung';
			$title_bar=_tuyendung;
			$title_detail = _tuyendung;
			$bread->add($title_detail,"tuyen-dung");
			break;
		case 'chinh-sach':
			$source = "news";
			$template = isset($_GET['id']) ? "chinhsach_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'chinh-sach';
			$title_bar=_chinhsach;
			$title_detail = _chinhsach;
			$bread->add($title_detail,"chinh-sach");
			break;
		case 'du-an':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'du-an';
			$title_bar=_duan;
			$title_detail = _duan;
			$bread->add($title_detail,"du-an");
			break;
		case 'giai-phap':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'giai-phap';
			$title_bar=_giaiphap;
			$title_detail = _giaiphap;
			$bread->add($title_detail,"giai-phap");
			break;
		case 'xuat-nhap-khau':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'xuat-nhap-khau';
			$title_bar=_xuatnhapkhau;
			$title_detail = _xuatnhapkhau;
			$bread->add($title_detail,"xuat-nhap-khau");
			break;

		case 'bai-viet':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'bai-viet';
			$title_bar=_baiviet;
			$title_detail = _baiviet;
			$bread->add($title_detail,"bai-viet");
			break;

		case 'san-pham':
			$source = "product";
			$template =isset($_GET['id']) ? "product_detail" : "product";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'san-pham';	
			$title_bar=_sanpham;
			$title_detail = _sanpham;
			$bread->add($title_detail,"san-pham");
			break;
	
		case 'lien-he':
			$source = "contact";
			$template = "contact";
			$type_bar = 'lien-he';	
			$title_detail = _lienhe;
			$bread->add($title_detail,"lien-he");
			break;
		
		case 'tim-kiem':
			$source = "search";
			$template = "search";
			$title_detail = _timkiem;
			$bread->add($title_detail,"tim-kiem");
			break;

		case 'ngonngu':
			if(isset($_GET['lang']))
			{
				switch($_GET['lang'])
					{
						case '':
							$_SESSION['lang'] = 'vi';
							break;
						case 'en':
							$_SESSION['lang'] = 'en';
							break;
						default: 
							$_SESSION['lang'] = 'vi';
							break;
					}
			}
			else{
				$_SESSION['lang'] = 'vi'; 
			}
		redirect($_SERVER['HTTP_REFERER']);
		break;

		case '': 
			$source = 'index';
			$template = 'index'; 
			$type_og = "website";
			break;
		default:
			$template = '404';
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
	        break;
	}

	if($config['index']==1){
		if($_SERVER["REQUEST_URI"]=='/index.php'){
			header("location:".$http.$config_url);
		}
	}
	
	if($source!="") include _source.$source.".php";
	
	if($_REQUEST['com']=='logout')
	{
		session_unregister($login_name);
		header("Location:index.php");
	}		
?>
