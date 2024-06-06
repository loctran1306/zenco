<?php  if(!defined('_source')) die("Error");

		$id =  addslashes($_GET['id']);
		
		if($id!=''){

			$sql_lanxem = "UPDATE table_video SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
			$d->query($sql_lanxem);

			$sql = "select * from #_video where hienthi=1 and tenkhongdau='".$id."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

			$title_bar = $row_detail['ten_'.$lang];

			$bread->add($title_detail,getCurrentPageURL());
			
			#các tin cu hon
			$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau,links,luotxem from #_video where hienthi=1 and tenkhongdau !='".$id."' and type='".$type_bar."' order by stt,id desc limit 0,10";
			$d->query($sql_khac);
			$video = $d->result_array();

		} else {
				
				$per_page = 12; // Set how many records do you want to display per page.
				$startpoint = ($page * $per_page) - $per_page;
				$limit = ' limit '.$startpoint.','.$per_page;
				
				$where = " #_video where hienthi=1 and type='".$type_bar."' order by id desc";

				$sql = "select ten_$lang,tenkhongdau,id,ngaytao,links,luotxem,type from $where $limit";
				$d->query($sql);
				$video = $d->result_array();

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