<?php
    $d->reset();
    $sql = "select noidung_$lang as noidung from #_company where type='footer' ";
    $d->query($sql);
    $footer = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select ten_$lang,tenkhongdau from #_baiviet where type='chinh-sach' and hienthi!=0 order by stt,id";
    $d->query($sql_banner_top);
    $chinhsach = $d->result_array();

    $d->reset();
    $sql_banner_top= "select ten_$lang,tenkhongdau from #_baiviet where type='tin-tuc' and hienthi!=0 order by stt,id";
    $d->query($sql_banner_top);
    $tintucs = $d->result_array();

    $d->reset();
    $sql_banner_top= "select ten_$lang,tenkhongdau from #_product_list where type='san-pham' and hienthi!=0 order by stt,id limit 0,5";
    $d->query($sql_banner_top);
    $spham = $d->result_array();

    $d->reset();
	$sql = "select ten,thumb,url from #_lkweb where hienthi=1 and type='lkweb_ft' order by stt,id desc ";
	$d->query($sql);
	$lienket_ft = $d->result_array();

    $d->reset();
    $sql = "select id,links,ten_vi , photo from #_video where hienthi=1 and type='video' order by stt";
    $d->query($sql);
    $videos = $d->result_array(); 

	$d->reset();
    $sql_banner_top= "select thumb_$lang,link from #_photo where type='bocongthuong'";
    $d->query($sql_banner_top);
    $bocongthuong = $d->fetch_array();
 ?>
<div class="margin-auto">
	<div class="top_footer">
	 	<div class="item_footer">
	 		<p><?=_ctys?></p>
	 		<span><?=$row_setting['ten_'.$lang]?> </span>
	 	</div>
	 	<div class="hotr-tuvan animated infinite tada">
		    <a class="btn-singup" href="#dangkyhoc" data-fancybox>
		        <h3 class="tada dk_thu"><i class="fa fa-file-text" aria-hidden="true"></i><?=_dangkybaogia?></h3>
		         <i class="fa fa-angle-up" aria-hidden="true"></i>
		    </a>
		</div>
	 </div>
	<div id="bottom_ft">
		<div class="content_ft">
			<div class="cot1_ft wow zoomIn animate">
				<div class="title_ft"><p><?=_trusochinh?></p></div>
				<?=$footer['noidung']?>
			</div>
			<div class="cot2_ft wow zoomIn animate">
				<div class="title_ft"><p><?=_sanpham?></p></div>
				<div class="tab_chinhsach">
					<?php foreach($spham as $k){?>
						<a class="bv_ft" href="<?=$k['tenkhongdau']?>"><?=$k['ten_'.$lang]?></a>
					<?php } ?>
				</div>
				<?php if (count($spham) > 5) {?>
					<a href="san-pham"><i class="fa fa-plus" aria-hidden="true"></i><span><?=_xemthem?></span></a>
				<?php }?>	
			</div>
			<div class="cot3_ft wow zoomIn animate">
				<div class="title_ft"><p><?=_chinhsachvahotro?></p></div>
				<div class="tab_chinhsach">
					<?php foreach($chinhsach as $k){?>
						<a class="bv_ft" href="<?=$k['tenkhongdau']?>"><?=$k['ten_'.$lang]?></a>
					<?php } ?>
				</div>		
			</div>
			<div class="cot4_ft wow zoomIn animate">
				<div class="title_ft"><p>Hotline 24/7</p></div>
				<div class="call_ft">
					<a href=""><i class="fa fa-phone" aria-hidden="true"></i>
						<span><?=$row_setting['dienthoai']?></span>
					</a>
				</div>
				
				<?php if($bocongthuong){?>
					<div class="bocongthong ">
					    <a href="<?=$bocongthuong['link']?>" title="Bộ công thương"><img src="<?=_upload_hinhanh_l.$bocongthuong['thumb_'.$lang]?>" alt="Bộ công thương"></a>
					</div>
				<?php } ?>

				
			</div>
		</div>
	</div>
	<div class="bottom_ft2 d-flex flex-between">
		<div class="cot1_ft1 wow zoomIn animate">
			<div class="title_ft"><p><?=_nhamaysanxuat?></p></div>
			<span><?=$row_setting['diachi_'.$lang]?> </span>
		</div>
		<div class="cot1_ft2 wow zoomIn animate">
			<div class="title_ft"><p><?=_tintuc?></p></div>
			<div class="tab_chinhsach">
				<?php foreach($tintucs as $k){?>
					<a class="bv_ft" href="<?=$k['tenkhongdau']?>"><?=$k['ten_'.$lang]?></a>
				<?php } ?>
			</div>
		</div>
		<div class="cot1_ft3 wow zoomIn animate">
			<div class="title_ft"><p>Video</p></div>
			<div class="tab_chinhsach">
				<?php foreach($videos as $k){?>
					<a class="bv_ft" href="<?=$k['tenkhongdau']?>"><?=$k['ten_'.$lang]?></a>
				<?php } ?>
			</div>
		</div>
		<div class="cot1_ft4 wow zoomIn animate">
			<div class="title_ft"><p><?=_ketnoi?></p></div>
			<div class="lienket_ft">
				<div class="icon-footer">	
					<?php foreach($lienket_ft as $k){?>
						<a href="<?=$k['url']?>" target="_blank"><img src="<?=_upload_hinhanh_l?><?=$k['thumb']?>" alt="<?=$k['ten']?>" /></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?/*
<div id="copyright">
	<div class="margin-auto">
		<div class="flex">
			<div>2020 Copyright © <?=$row_setting['ten_'.$lang]?>. All rights reserved.Design by Nina</div>
			<div>
				<span>Đang online: <?php $count=count_online();echo $tong_xem=$count['dangxem'];?>&nbsp;&nbsp;&nbsp;&nbsp;Tổng truy cập: <?=$all_visitors?></span>
			</div>
		</div>
	</div>
</div>
*/?>