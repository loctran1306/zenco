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
	$row_list_snk_ = $d->result_array();

	$d->reset();
	$sql = "select ten_$lang as ten,tenkhongdau,id from #_baiviet_list where hienthi=1 and type='du-an' order by stt,id";
	$d->query($sql);
	$row_list_da = $d->result_array();
?>
<div class="margin-auto d-flex flex-between">
	<div class="logo">
       <a href=""><img src="<?=_upload_hinhanh_l.$logo_top['thumb_'.$lang]?>" alt="Logo"></a>
    </div>
	<div class="menu_dflex">
		<ul class="ul_menu1">
			<li><a class="<?php if($_REQUEST['com'] == 'tin-tuc')  echo 'active'; ?> cla_span" href="tin-tuc"><span><?=_tintuc?></span></a></li>
			<li><a class="<?php if($_REQUEST['com'] == 'tuyen-dung') echo 'active'; ?> cla_span" href="tuyen-dung"><span><?=_tuyendung?></span></a></li>
			<?php include _template."layout/ngonngu.php";?>
			<li>
			    <div id="timkiem">
			      <input type="text" name="keyword1" id="keyword1"  class="input" onkeypress="doEnter1(event,'keyword1');" placeholder="Search ..." />
			      <span class="img_search"><img src="images/tkiemm.png"></span>       
			    </div>
			</li>
		</ul>
		<ul class="ul_menu2">	
		    <li><a class="<?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href=""><span><?=_trangchu?></span></a></li>
		   	<li><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="javascript:void(0)"><span><?=_gioithieu?></span></a>
		   		<?php if($row_gthieu) {?>
		            <ul>
			            <?php foreach($row_gthieu as $k=>$v){?>
			                <li>
			                	<a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a> 
			                </li>
			            <?php } ?>
		            </ul>
		        <?php } ?>
		   	</li>
		  	<li><a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham"><span><?=_sanpham?></span></a>
		        <?php if($row_list) {?>
	            <ul>
		            <?php foreach($row_list as $k=>$v){?>
					<?php
						$d->reset();
						$sql = "select ten_$lang as ten,tenkhongdau,id from #_product_cat where hienthi=1 and id_list='".$v['id']."' and type='san-pham' order by stt,id";
						$d->query($sql);
						$row_cat = $d->result_array();
					?>
		                <li><a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
		                    <?php if($row_cat) {?>
		                        <ul>
		                            <?php foreach($row_cat as $h =>$j){?>
		                              	<li><a href="<?=$j['tenkhongdau']?>" title="<?=$j['ten']?>"><?=$j['ten']?></a>
		                                </li>
		                            <?php } ?>
		                        </ul>
		                   <?php } ?>
		                </li>
		            <?php } ?>
	            </ul>
		        <?php } ?>
		 	</li>

		 	<li><a class="<?php if($_REQUEST['com'] == 'giai-phap') echo 'active'; ?>" href="giai-phap"><span><?=_giaiphap?></span></a>
		        <?php if($row_list_giaiphap) {?>
		            <ul>
			            <?php foreach($row_list_giaiphap as $k=>$v){?>
			                <li>
			                	<a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a> 
			                </li>
			            <?php } ?>
		            </ul>
		        <?php } ?>
		 	</li>
		 	<li><a class="<?php if($_REQUEST['com'] == 'xuat-nhap-khau') echo 'active'; ?>" href="xuat-nhap-khau"><span><?=_xuatnhapkhau?></span></a>
		        <?php if($row_list_snk) {?>
		            <ul>
			            <?php foreach($row_list_snk as $k=>$v){?>
			                <li>
			                	<a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>  
			                </li>
			            <?php } ?>
		            </ul>
		        <?php } ?>
		 	</li>
		 	<li><a class="<?php if($_REQUEST['com'] == 'du-an') echo 'active'; ?>" href="du-an"><span><?=_duan?></span></a>
		        <?php if($row_list_da) {?>
		            <ul>
			            <?php foreach($row_list_da as $k=>$v){?>
			                <li>
			                	<a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>  
			                </li>
			            <?php } ?>
		            </ul>
		        <?php } ?>
		 	</li>
		 	<li><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he"><span><?=_lienhe?></span></a></li>
		</ul>
	</div>
</div>
