<?php 
  $d->reset();
    $sql = "select ten_$lang,noidung_$lang,id from #_baiviet where hienthi=1 and type='httt' order by stt,ngaysua desc";
    $d->query($sql);
    $httt = $d->result_array();
 ?>
<div class="wrap_background_aside mgt-20 mgb-30 clearfix">
    <div class="margin-auto">
		<div class="title_main_page">
            <h1 class="title-head"><?=$title_detail?></h1>
        </div>
		<form method="post" name="frm_order" id="frm_order" class="form-horizontal from-thanhtoan" action="" enctype="multipart/form-data" role="form">  
			<div class="w_thongtinthanhtoan d-flex">

				<div class="thanhtoan_left col-lg-4 col-md-4 col-sm-12 col-xx-12 col-xs-12">
					<div class="title_thanhtoan"><span>1</span> <?=_thongtinnhanhang?></div>
					<div class="box_containerlienhe shop">
						<div class="content ">
							<div class="cus-info">      
								<div class="margin-am">
									<div class="bill_form">
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-3 control-label none"><?=_fullname?><span>*</span></label>
											<div>
											<div class="col-sm-12">
												<input class="t form-control" name="hoten" id="hoten" type="text" value="<?=$thongtin_user['hoten']?>" placeholder="<?=_hoten?>"/>
											
											</div>
										</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-3 control-label none"><?=_dienthoai?><span>*</span></label>
											<div class="col-sm-12">
												<input class="t form-control" name="dienthoai" id="dienthoai" type="text" value="<?=$thongtin_user['dienthoai']?>" placeholder="<?=_dienthoai?>" />
											
											</div>
										</div>
										<div class="form-group">
							            	<label for="inputEmail3" class="col-sm-3 control-label none"><?=_tinhthanhpho?><span>*</span></label>

							                <div class="col-sm-12">
								                <select name="thanhpho" id="thanhpho" class="sl form-control">
								                	<option value=""><?=_tinhthanhpho?></option>
								                    <?php foreach($thanhpho as $k){ ?>
								                    	<option value="<?=$k['id']?>"><?=$k['ten']?></option>
								                    <?php }?>
								                </select>
							                </div>
							            </div>

							            <div class="form-group">
							            	<label for="inputEmail3" class="col-sm-3 control-label none"><?=_quanhuyen?><span>*</span></label>
							                <div class="col-sm-12">
								                <select name="quan" id="quan" class="sl form-control form-control">
								                	<option value=""><?=_quanhuyen?></option> 
								                </select>
							                </div>
							            </div>


										<div class="form-group">
											<label for="inputEmail3" class="col-sm-3 control-label none" ><?=_address?><span>*</span></label>
											<div class="col-sm-12">
												<input class="t form-control" name="diachi"  id="diachi" type="text" value="" placeholder="<?=_diachi?>" />
											
											</div>
										</div>
										
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-3 control-label none">E-Mail<span>*</span></label>
											<div class="col-sm-12">
												<input class="t form-control" name="email" id="email" type="email" value="<?=$thongtin_user['email']?>" placeholder="<?=_email?>" />
											
											</div>
										</div>
							            <div class="form-group">
											<label class="col-sm-3 control-label none"><?=_ghichu?><span></span></label>
											<div class="col-sm-12">
												<textarea name="noidung"  class="form-control ax" style="resize:none" cols="50" rows="4" placeholder="<?=_ghichu?>" ></textarea>
											
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
						 	</div>  
					 	</div>
				  	</div>
				</div>

				<div class="thanhtoan_mid col-lg-4 col-md-4 col-sm-6 col-xx-6 col-xs-12">
					<div class="title_thanhtoan"><span>2</span><?=_hinhthucthanhtoan?></div>
					<div class="content_hinhthuc">
						<?php foreach($httt as $k){?>
			    			<div class="item-httt">
			    				<label class="label-httt" data-httt="<?=$k['id']?>">
				    				<input type="radio" name="httt" value="<?=$k['ten_'.$lang]?>" required="">
				    				<span><?=$k['ten_'.$lang]?></span>
				    			</label>
				    			<div class="info-httt info-httt-<?=$k['id']?> transition"><?=nl2br($k['noidung_'.$lang])?></div>
			    			</div>
			    		<?php } ?>
					</div>
				</div>

				<div class="thanhtoan_right col-lg-4 col-md-4 col-sm-6 col-xx-6 col-xs-12">
					<div class="title_thanhtoan"><span>3</span><?=_thongtindonhang?></div>
					<div class="content_hoadon shop">

						<?php if(is_array($_SESSION['cart'])){
							foreach($_SESSION['cart'] as $k=>$v){
								$pid=$v['productid'];
								$code  =$k;
								$color = $v['color'];
			                    $size = $v['size'];
								$q=$v['qty'];
								$pmasp=get_code($pid);					
								$pname=get_product_name($pid,$lang);
								$info= getProductInfo($pid);
								$image = _upload_product_l.$info['photo'];
								$image_thumb = _upload_product_l.'300x300x1/'.$info['photo'];
								if($q==0) continue;
							?>
								<div class="item_bill">
									<div class="img_sp_bill">
										<a target="_blank"  href="<?= $info['tenkhongdau'] ?>"><img src="<?=$image ?>" class='img-responsive' /></a>
										
									</div>
									<div class="info_bill">
										<div class="tensp_bill"><a class="name" target="_blank" href="<?= $info['tenkhongdau'] ?>"><b><?= $pname ?></b></a>
											<?php if ($color || $size) {?>
											<div class="option">
												<?php if ($color) {?>
												 	<b>Màu sắc:</b> <span style="color: #ff0000;font-weight: 700"><?=getnameColor($color);?></span>
												<?php } ?><br />
												<?php if ($size) {?>
												 	<b>Size:</b> <span style="color: #ff0000;font-weight: 700"><?=getnameSize($size);?></span>
												<?php } ?>
											</div>
											<?php } ?>
										</div>
										<div class="price_qty">
											<p class="dongia"><?=$q?> x  <?=number_format($info['giaban'],0, ',', '.')?>&nbsp;đ</p>
										</div>
									</div>
								</div>


							<?php } ?>
						<?php } ?>	
						<div class="sum_price">
							<p><?=_total_price?>:</p><span id="all_hoadon" ><?= number_format(get_order_total(), 0, ',', '.') ?>&nbsp;đ</span>
						</div>

						<div class="clearfix"></div>
					    <div style="text-align: right;">	
					        <button class="btn xbtn" type="button" onclick="check();"  value="" style="cursor:pointer;"/><?=_dathang?></button>
					    </div>
					</div>
				</div>
			</div>
	    </form>		
	</div>
</div>