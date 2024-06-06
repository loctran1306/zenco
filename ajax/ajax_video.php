<?php
	include_once "ajax_config.php";
		
	@$pid = $_GET['id'];
	settype($pid,'int');

    $d->reset();
    $sql = "select id,links,ten_vi from #_video where hienthi=1 and type='video' and id=$pid order by stt";
	$d->query($sql);
	$result_video = $d->result_array();  
?>
<iframe width="100%" height="270" src="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($result_video[0]['links'])?>?rel=0&autoplay=0" frameborder="0" allowfullscreen></iframe>