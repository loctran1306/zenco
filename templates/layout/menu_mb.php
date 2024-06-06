<?php
	$d->reset();
	$sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and type='san-pham' order by stt,id";
	$d->query($sql);
	$row_list = $d->result_array();

	$d->reset();
	$sql = "select ten_$lang as ten,tenkhongdau,id from #_baiviet where hienthi=1 and type='gioi-thieu' order by stt,id";
	$d->query($sql);
	$row_gthieu = $d->result_array();

	$d->reset();
	$sql = "select ten_$lang as ten,tenkhongdau,id from #_baiviet_list where hienthi=1 and type='giai-phap' order by stt,id";
	$d->query($sql);
	$row_list_giaiphap = $d->result_array();



	$d->reset();
	$sql = "select ten_$lang as ten,tenkhongdau,id from #_baiviet_list where hienthi=1 and type='xuat-nhap-khau' order by stt,id";
	$d->query($sql);
	$row_list_xnk_ = $d->result_array();

	$d->reset();
	$sql = "select ten_$lang as ten,tenkhongdau,id from #_baiviet_list where hienthi=1 and type='du-an' order by stt,id";
	$d->query($sql);
	$row_list_da = $d->result_array();
?>
<?/*
<!-- <div class="header_mobi">
	<a href="#menu_mobi" class="btn_hamber menu-mobile">
	    <p class="nav-click"><span class="line"></span></p>
	    <p>Menu</p>
	</a>
</div> -->
*/?>

<div class="header_mobi">
	<a href="#menu_mobi" class="btn_hamber menu-mobile">
	    <p class="nav-click"><span class="line"></span></p>
	</a>
	<a href="" class="logo_mb">
		<img src="<?=_upload_hinhanh_l.$logo_top['thumb_'.$lang]?>" alt="Logo">
	</a>
	<div class="dich_gg">
		<?php include _template."layout/google_dich.php";?>
	</div>
</div>


<div class="opacity-menu"></div>
<div class="header-left-fixwidth">
	<div class="section wrap-header">
		<div class="logos-menu">
			<a href="">
				<img src="<?=_upload_hinhanh_l.$logo_top['thumb_'.$lang]?>" alt="logo">
			</a>
		</div>
		<div class="searchs-menu">
			<div class="search-bar p-relative">
			     <input type="text" name="keyword2" id="keyword2" onKeyPress="doEnter2(event,'keyword2');" placeholder="<?=_nhaptukhoatimkiem?>" class="search-text">
			     <div class="search-btn"><i class="fa fa-search" aria-hidden="true" onclick="onSearch2(event,'keyword2');"></i></div>
			</div>
		</div>
		<div class="nav-menu margin-top-10 padding-bottom-40">
			<ul>
			    <li class="nav-item"><a class="<?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href=""><span><?=_trangchu?></span></a></li>
			   	<li class="nav-item"><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu"><span><?=_gioithieu?></span></a></li>

			   	<li class="nav-item"><a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham"><span><?=_sanpham?></span></a>
					<?php if(count($row_list)>0) { ?>
						<span class="btn-dropdown-menu"><i class="fa fa-angle-right"></i></span>
					<?php } ?>
					<?php if($row_list) {?>
						<ul class="sub-menu none level0">
							<?php foreach($row_list as $k=>$v){?>
								<?php
								$d->reset();
								$sql = "select * from #_product_cat where hienthi=1 and id_list='".$v['id']."' and type='san-pham' order by stt,id";
								$d->query($sql);
								$row_cat = $d->result_array();
							?>
							<li><a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
							<?php if(count($row_cat)>0) { ?><span class="btn-dropdown-menu"><i class="fa fa-angle-right"></i></span><?php } ?>
								<?php if($row_cat) {?>
									<ul class="sub-menu none level1">
										<?php foreach($row_cat as $h =>$j){?>
										<?php
											$d->reset();
											$sql = "select * from #_product_item where hienthi=1 and id_cat='".$j['id']."' and type='san-pham' order by stt,id";
											$d->query($sql);
											$row_item = $d->result_array();
										?>
										<li class="level2"><a href="<?=$j['tenkhongdau']?>" title="<?=$j['ten_'.$lang]?>"><?=$j['ten_'.$lang]?></a>
										<?php if(count($row_item)>0) { ?><span class="btn-dropdown-menu"><i class="fa fa-angle-right"></i></span><?php } ?>
										<?php if($row_item) {?>
											<ul class="sub-menu none level2">
											<?php foreach($row_item as $i =>$w){?>
												<li class="level3"><a href="<?=$w['tenkhongdau']?>" title="<?=$w['ten_'.$lang]?>"><?=$w['ten_'.$lang]?></a>
												</li>
											<?php } ?>
											</ul>
										<?php } ?>
										</li>
										<?php } ?>
									</ul>
								<?php } ?>
							</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>

				<li class="nav-item"><a class="<?php if($_REQUEST['com'] == 'giai-phap') echo 'active'; ?>" href="giai-phap"><span><?=_giaiphap?></span></a>
					<?php if(count($row_list_giaiphap)>0) { ?>
						<span class="btn-dropdown-menu"><i class="fa fa-angle-right"></i></span>
					<?php } ?>
					<?php if($row_list_giaiphap) {?>
						<ul class="sub-menu none level0">
							<?php foreach($row_list_giaiphap as $k=>$v){?>	
								<li>
									<a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>

				<li class="nav-item"><a class="<?php if($_REQUEST['com'] == 'du-an') echo 'active'; ?>" href="du-an"><span><?=_duan?></span></a>
					<?php if(count($row_list_da)>0) { ?>
						<span class="btn-dropdown-menu"><i class="fa fa-angle-right"></i></span>
					<?php } ?>
					<?php if($row_list_da) {?>
						<ul class="sub-menu none level0">
							<?php foreach($row_list_da as $k=>$v){?>	
								<li>
									<a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>

				<li class="nav-item"><a class="<?php if($_REQUEST['com'] == 'xuat-nhap-khau') echo 'active'; ?>" href="xuat-nhap-khau"><span><?=_xuatnhapkhau?></span></a>
					<?php if(count($row_list_xnk)>0) { ?>
						<span class="btn-dropdown-menu"><i class="fa fa-angle-right"></i></span>
					<?php } ?>
					<?php if($row_list_xnk) {?>
						<ul class="sub-menu none level0">
							<?php foreach($row_list_xnk as $k=>$v){?>	
								<li>
									<a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>

			    <li class="nav-item"><a class="<?php if($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>" href="tin-tuc"><span><?=_tintuc?></span></a></li>

			    <li><a class="<?php if($_REQUEST['com'] == 'video') echo 'active'; ?>" href="video"><span>Video</span></a></li>

			    <li><a class="<?php if($_REQUEST['com'] == 'tuyen-dung') echo 'active'; ?>" href="tuyen-dung"><span><?=_tuyendung?></span></a></li>

			    <li class="nav-item"><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he"><span><?=_lienhe?></span></a></li>
			   
			</ul>
		</div>
	</div>
</div>