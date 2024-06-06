<?php  if(!defined('_source')) die("Error");

		@$idc =  addslashes($_GET['idc']);
		@$idl =  addslashes($_GET['idl']);
		@$idi =  addslashes($_GET['idi']);
		@$ids =  addslashes($_GET['ids']);
		@$id=  addslashes($_GET['id']);
		#các sản phẩm khác======================

		if($id!=''){
			$sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
			$d->query($sql_lanxem);
			
			$d->reset();
			$sql_detail = "select * from #_product where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$id."'";
			$d->query($sql_detail);
			$row_detail = $d->fetch_array();

			$d->reset();
		    $sql = "select thumb,id,photo,ten from #_product_photo where hienthi=1 and  type='".$type_bar."' and id_product='".$row_detail['id']."' order by stt,id desc ";
		    $d->query($sql);
		    $product_photos = $d->result_array();
			

			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
			$share_facebook .= '<meta property="og:type" content="'.$type_og.'" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.$row_detail['description'].'" />';
			$share_facebook .= '<meta property="og:image" content="'.$http.$config_url.'/'._upload_product_l.$row_detail['photo'].'" />';


			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,thumb,giaban, new,giacu,mota_$lang,photo from #_product where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id_list']."' and id!='".$row_detail['id']."'".$where_tk." order by stt,id desc limit 0,9";
			$d->query($sql);
			$product = $d->result_array();

			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];
			$title_detail=$row_detail['ten_'.$lang];
			$motal_detail=$row_detail['mota_'.$lang];

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau from #_product_list where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_list']."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,thumb from #_product_cat where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_cat']."' order by stt,id desc";
			$d->query($sql);
			$row_detail_cat = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,thumb from #_product_item where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_item']."' order by stt,id desc";
			$d->query($sql);
			$row_detail_item = $d->fetch_array();


			if($row_detail_list){
				$bread->add($row_detail_list['ten_'.$lang],$row_detail_list['tenkhongdau']);
			}
			if($row_detail_cat){
				$bread->add($row_detail_cat['ten_'.$lang],$row_detail_cat['tenkhongdau']);
			}
			if($row_detail_item){
				$bread->add($row_detail_item['ten_'.$lang],$row_detail_item['tenkhongdau']);
			}

			$bread->add($title_detail,getCurrentPageURL());

		} elseif($idl!=''){

			$d->reset();
			$sql = "select * from #_product_list where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idl."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,thumb from #_product_cat where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."' order by stt,id desc";
			$d->query($sql);
			$row_item_tt = $d->result_array();

			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'";
			$where .= $where_tk;
			$where .= " order by stt,id desc ";

			$sql = "select id,ten_$lang,tenkhongdau,thumb,photo,giaban, new,giacu,mota_$lang from $where $limit";
			$d->query($sql);
			$product = $d->result_array();
	

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$motal_detail=$row_detail['mota_'.$lang];
			
			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];

			$bread->add($title_detail,getCurrentPageURL());


		} elseif($idc!=''){

			$d->reset();
			$sql = "select * from #_product_cat where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idc."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau from #_product_list where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_list']."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();

			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where hienthi=1 and type='".$type_bar."' and id_cat='".$row_detail['id']."'";
			$where .= $where_tk;
			$where .= " order by stt,id desc ";

			$sql = "select id,ten_$lang,tenkhongdau,thumb,photo,giaban, new,giacu,mota_$lang from $where $limit";
			$d->query($sql);
			$product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);


			$title_detail = $row_detail['ten_'.$lang];
			$motal_detail=$row_detail['mota_'.$lang];
			
			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];


			$bread->add($row_detail_list['ten_'.$lang],$row_detail_list['tenkhongdau']);
			$bread->add($title_detail,getCurrentPageURL());

		} elseif($idi!=''){

			$d->reset();
			$sql = "select * from #_product_item where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idi."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau from #_product_list where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_list']."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,thumb from #_product_cat where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_cat']."' order by stt,id desc";
			$d->query($sql);
			$row_detail_cat = $d->fetch_array();

			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where hienthi=1 and type='".$type_bar."' and id_item='".$row_detail['id']."'";
			$where .= $where_tk;
			$where .= " order by stt,id desc ";

			$sql = "select id,ten_$lang,tenkhongdau,thumb,photo,giaban, new,giacu,mota_$lang from $where $limit";
			$d->query($sql);
			$product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar = $row_detail['title'];
			$keyword_bar = $row_detail['keywords'];
			$description_bar = $row_detail['description'];


			$bread->add($row_detail_list['ten_'.$lang],$row_detail_list['tenkhongdau']);
			$bread->add($row_detail_cat['ten_'.$lang],$row_detail_cat['tenkhongdau']);
			$bread->add($title_detail,getCurrentPageURL());


		} else {
			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;

			if($com=='khuyen-mai'){
				$where_tk  = " and khuyenmai!=0 ";
			}

			
			$where = " #_product where hienthi=1 and type='".$type_bar."' ";
			$where .= $where_tk;
			$where .= " order by stt,id desc ";

			$sql = "select * from $where $limit";
			$d->query($sql);
			$product = $d->result_array();

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