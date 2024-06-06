<?php  if(!defined('_source')) die("Error");

		$id =  $_GET['id'];
		$idl =  addslashes($_GET['idl']);
		$idc =  addslashes($_GET['idc']);
		
		if($id!=''){
			$sql_lanxem = "UPDATE #_baiviet SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
			$d->query($sql_lanxem); 
			
			$sql = "select * from #_baiviet where hienthi=1 and tenkhongdau='".$id."' and type='".$type_bar."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
			$share_facebook .= '<meta property="og:type" content="'.$type_og.'" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.$row_detail['description'].'" />';
			$share_facebook .= '<meta property="og:image" content="'.$http.$config_url.'/'._upload_baiviet_l.$row_detail['photo'].'" />';

			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];
			
			#các tin cu hon
			$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau,thumb,photo,mota_$lang,ngaytao,name_vi,ngaysua from #_baiviet where hienthi=1 and id !='".$row_detail['id']."' and type='".$type_bar."' order by stt,id desc";
			$d->query($sql_khac);
			$tintuc = $d->result_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_list']."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,thumb from #_baiviet_cat where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_cat']."' order by stt,ngaytao desc";
			$d->query($sql);
			$row_detail_cat = $d->fetch_array();

			if($row_detail_list){
				$bread->add($row_detail_list['ten_'.$lang],$row_detail_list['tenkhongdau']);
			}
			if($row_detail_cat){
				$bread->add($row_detail_cat['ten_'.$lang],$row_detail_cat['tenkhongdau']);
			}

			$bread->add($row_detail['ten_'.$lang],getCurrentPageURL());


		} elseif($idl!=''){

			$d->reset();
			$sql = "select * from #_baiviet_list where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idl."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$per_page = 6; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'  order by stt,ngaytao desc";

			$sql = "select ten_$lang,id,thumb,photo,mota_$lang,tenkhongdau,ngaytao,name_vi,ngaysua from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];

			$bread->add($title_detail,getCurrentPageURL());


		} elseif($idc!=''){

			$d->reset();
			$sql = "select * from #_baiviet_cat where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idc."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_list']."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();

			$per_page = 6; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and id_cat='".$row_detail['id']."'  order by stt,id desc";

			$sql = "select ten_$lang,id,thumb,photo,mota_$lang,tenkhongdau,ngaytao,name_vi,ngaysua from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];


			$bread->add($row_detail_list['ten_'.$lang],$row_detail_list['tenkhongdau']);
			$bread->add($title_detail,getCurrentPageURL());

		} else {

			//cac tin tuc
			$per_page = 6; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' order by stt,id desc";

			$sql = "select ten_$lang,thumb,tenkhongdau,id,ngaytao,mota_$lang,photo,name_vi,ngaysua from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			#=============seo==========
			$d->reset();
			$sql = "select title,keywords,description,photo,thumb from #_seo where type='seo_".$type_bar."' limit 0,1 ";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
			$share_facebook .= '<meta property="og:type" content="'.$type_og.'" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['title'].'" />';
			$share_facebook .= '<meta property="og:description" content="'.$row_detail['description'].'" />';
			$share_facebook .= '<meta property="og:image" content="'.$http.$config_url.'/'._upload_hinhanh_l.$row_detail['photo'].'" />';

			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];

		}
?>