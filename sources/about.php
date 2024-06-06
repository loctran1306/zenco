<?php  if(!defined('_source')) die("Error");


	$d->reset();
	$sql = "select ten_$lang,noidung_$lang,title,keywords,description,photo,thumb,ngaysua,mota_$lang from #_info where type='".$type_bar."' limit 0,1 ";
	$d->query($sql);
	$row_detail = $d->fetch_array();

	$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
	$share_facebook .= '<meta property="og:type" content="'.$type_og.'" />';
	$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
	$share_facebook .= '<meta property="og:description" content="'.$row_detail['description'].'" />';
	$share_facebook .= '<meta property="og:image" content="'.$http.$config_url.'/'._upload_hinhanh_l.$row_detail['photo'].'" />';

	$title_bar = $row_detail['title'];
	$keyword_bar = $row_detail['keywords'];
	$description_bar = $row_detail['description'];
?>