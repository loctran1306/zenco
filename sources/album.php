<?php  if(!defined('_source')) die("Error");

		$id =  $_GET['id'];
		$idl =  addslashes($_GET['idl']);
		
		if($id!=''){

				$sql = "select * from #_album where hienthi=1 and tenkhongdau='".$id."'";
				$d->query($sql);
				$album_detail = $d->fetch_array();


				$title_bar = $album_detail['title'];
				$keyword_bar = $album_detail['keywords'];
				$description_bar = $album_detail['description'];

				$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
				$share_facebook .= '<meta property="og:type" content="'.$type_og.'" />';
				$share_facebook .= '<meta property="og:title" content="'.$album_detail['ten_'.$lang].'" />';
				$share_facebook .= '<meta property="og:description" content="'.$album_detail['mota_'.$lang].'" />';
				$share_facebook .= '<meta property="og:image" content="'.$http.$config_url.'/'._upload_album_l.$album_detail['photo'].'" />';

				
				#các tin cu hon
				$sql_khac = "select * from #_album_photo where hienthi=1 and id_album ='".$album_detail['id']."' order by stt,id desc";
				$d->query($sql_khac);
				$album_images = $d->result_array();

				$d->reset();
				$sql_khac = "select ten_$lang,thumb,tenkhongdau,id,ngaytao,mota_$lang,photo from #_album where hienthi=1 and id !='".$album_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc limit 0,4";
				$d->query($sql_khac);
				$album = $d->result_array();

		} elseif($idl!=''){

			$d->reset();
			$sql = "select * from #_album_list where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idl."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_album where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'  order by stt,ngaytao desc";

			$sql = "select ten_$lang,id,thumb,mota_$lang,tenkhongdau,photo from $where $limit";
			$d->query($sql);
			$album = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];

		} else {

			// cac tin tuc
			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_album where hienthi=1 and type='".$type_bar."' order by stt,id desc";

			$sql = "select ten_$lang,thumb,tenkhongdau,id,ngaytao,mota_$lang,photo from $where $limit";
			$d->query($sql);
			$album = $d->result_array();

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